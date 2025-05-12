<?php
namespace App\Controller;
use App\Service\PrologService;
use App\Controller\AppController;

/**
 * Chats Controller
 *
 *
 * @method \App\Model\Entity\Chat[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChatsController extends AppController
{
    public function index()
    {
        // Obtener todos los chats del usuario actual
        $userId = $this->Auth->user('id');
        $chats = $this->Chats->find('all', [
            'conditions' => ['id_user' => $userId],
            'order' => ['date' => 'ASC']
        ]);
        $this->request->getSession()->write('Diagnostico.mostrarEspecialista', false);
        if ($this->request->is('post')) {
            // Obtener la entrada del usuario
            $entrada = $this->request->getData('entrada');
            // Llamar a Prolog para procesar la entrada y obtener la respuesta
            $prologService = new PrologService();
            $session = $this->request->getSession();
            $respuesta = $prologService->procesarMensaje($entrada, $session);
            // Crear una nueva entidad de chat
            $chat = $this->Chats->newEntity([
                'entrada' => $entrada,
                'respuesta' => $respuesta,
                'hora_entrada' => date('H:i:s'),
                'date' => date('Y-m-d'),
                'id_user' => $userId
            ]);
            // Guardar el chat en la base de datos
            if(!$this->Chats->save($chat)){
                $this->Flash->error(__('El chat no se ha podido guardar.'));
            }
        }
        // Pasar todos los chats a la vista
        $this->set(compact('chats'));
    }
    public function ajaxResponder()
    {
        $this->request->getSession()->write('Diagnostico.mostrarEspecialista', false);
        $this->request->allowMethod(['ajax', 'post']);
        $this->autoRender = false;
        $userId = $this->request->getSession()->read('Auth.User.id');
        $entrada = $this->request->getData('entrada');
        // Procesar con Prolog
        $prologService = new PrologService();
        $session = $this->request->getSession();
        $respuesta = $prologService->procesarMensaje($entrada, $session);
        [$validSintoms, $season] = $prologService->foundSeason($entrada);
        $validSintoms = implode(', ', $validSintoms);
        $validSintoms = str_replace('_', ' ', $validSintoms);
        $entrada = 'Mis síntomas son: '. $validSintoms. ' y la estacion en la que me encuentro es: '. $season;
        // Guardar mensaje
        $chat = $this->Chats->newEntity([
            'entrada' => $entrada,
            'respuesta' => $respuesta,
            'hora_entrada' => date('H:i:s'),
            'date' => date('Y-m-d'),
            'id_user' => $userId
        ]);
        if ($this->Chats->save($chat)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'mensaje' => 'Error al guardar el mensaje']);
        }
        return $this->response->withType('application/json');
    }
    public function obtenerMensajes()
    {
        $this->request->allowMethod(['ajax', 'get']);
        $userId = $this->request->getSession()->read('Auth.User.id');
        $chats = $this->Chats->find('all', [
            'conditions' => ['id_user' => $userId],
            'order' => ['date' => 'ASC', 'hora_entrada' => 'ASC']
        ]);
        $this->set(compact('chats'));
        $this->render('chat_mensajes', 'ajax');
    }

    public function mostrarEspecialista()
    {
        $this->request->allowMethod(['ajax', 'post']);
        $this->autoRender = false;
        $respuestaForm = $this->request->getData('respuesta');
        $userId = $this->request->getSession()->read('Auth.User.id');
        $session = $this->request->getSession();
        $response = ['success' => false, 'mensaje' => 'Error en el proceso'];

        if ($respuestaForm === 'si') {
            $prologService = new PrologService();
            $prologAnswer = trim($prologService->getSpecialist($session));

            // Primer mensaje
            $chat = $this->Chats->newEntity([
                'entrada' => "¿Deseas saber a qué médico acudir?",
                'respuesta' => "Si",
                'hora_entrada' => date('H:i:s'),
                'date' => date('Y-m-d'),
                'id_user' => $userId
            ]);

            if ($this->Chats->save($chat)) {
                // Segundo mensaje con la respuesta del especialista
                $prologAnswer = 'El especialista que te recomiendo es: '. $prologAnswer;
                $chat = $this->Chats->newEntity([
                    'entrada'=> 'a',
                    'respuesta' => $prologAnswer,
                    'hora_entrada' => date('H:i:s'),
                    'date' => date('Y-m-d'),
                    'id_user' => $userId
                ]);

                if ($this->Chats->save($chat)) {
                    echo json_encode([
                       'success' => true,
                       'mensaje' => 'Mensajes guardados correctamente',
                        'actualizar' => true
                    ]);
                } else {
                    echo json_encode([
                       'success' => false,
                       'mensaje' => 'Error al guardar el mensaje',
                        'actualizar' => false
                    ]);
                }
            } else {
                echo json_encode([
                  'success' => false,
                  'mensaje' => 'Error al guardar el mensaje previo',
                'actualizar' => false
                ]);
            }
        } else {
            // Primer mensaje para respuesta negativa
            $chat = $this->Chats->newEntity([
                'entrada' => "¿Deseas saber a qué médico acudir?",
                'respuesta' => "No",
                'hora_entrada' => date('H:i:s'),
                'date' => date('Y-m-d'),
                'id_user' => $userId
            ]);

            if ($this->Chats->save($chat)) {
                // Segundo mensaje
                $prologAnswer = 'Hola, necesitas ayuda?';
                $chat = $this->Chats->newEntity([
                    'entrada'=> '',
                    'respuesta' => $prologAnswer,
                    'hora_entrada' => date('H:i:s'),
                    'date' => date('Y-m-d'),
                    'id_user' => $userId
                ]);

                if ($this->Chats->save($chat)) {
                    $response = [
                        'success' => true,
                        'mensaje' => 'Mensajes guardados correctamente',
                        'actualizar' => true
                    ];
                } else {
                    $response['mensaje'] = 'Error al guardar el mensaje';
                }
            } else {
                $response['mensaje'] = 'Error al guardar el mensaje previo';
            }
        }
        return $this->response->withType('application/json');
    }
}
