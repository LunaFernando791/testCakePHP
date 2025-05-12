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
        $userId = $this->Auth->user('id'); // Get the current user's ID
        $chats = $this->Chats->find('all', [
            'conditions' => ['id_user' => $userId],
            'order' => ['date' => 'ASC']
        ]); // Get all chats for the current user ordered by date
        $this->request->getSession()->write('Diagnostico.mostrarEspecialista', false); // Reset the flag
        if ($this->request->is('post')) { // If the form has been submitted
            $entrada = $this->request->getData('entrada');
            // Call Prolog to process the message
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
            // Save the message to the database
            if(!$this->Chats->save($chat)){
                $this->Flash->error(__('El chat no se ha podido guardar.'));
            }
        }
        // Render the view with the complete chat history
        $this->set(compact('chats'));
    }
    public function ajaxResponder()
    {
        $this->request->getSession()->write('Diagnostico.mostrarEspecialista', false);
        $this->request->allowMethod(['ajax', 'post']); // Only allow AJAX and POST requests
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
        if ($this->Chats->save($chat)) { // If the message was saved successfully
            echo json_encode(['success' => true]); // Return a JSON response indicating success
        } else {
            echo json_encode(['success' => false, 'mensaje' => 'Error al guardar el mensaje']); // Return a JSON response indicating failure
        }
        return $this->response->withType('application/json'); // Return a JSON response
    }
    public function obtenerMensajes()
    {
        $this->request->allowMethod(['ajax', 'get']); // Only allow AJAX and GET requests
        $userId = $this->request->getSession()->read('Auth.User.id');
        $chats = $this->Chats->find('all', [
            'conditions' => ['id_user' => $userId],
            'order' => ['date' => 'ASC', 'hora_entrada' => 'ASC']
        ]); // Get all chats for the current user ordered by date
        $this->set(compact('chats')); // Pass the chats to the view
        $this->render('chat_mensajes', 'ajax'); // Render the chat_mensajes view as JSON
    }

    public function mostrarEspecialista()
    {
        $this->request->allowMethod(['ajax', 'post']);
        $this->autoRender = false;
        $respuestaForm = $this->request->getData('respuesta');
        $userId = $this->request->getSession()->read('Auth.User.id');
        $session = $this->request->getSession();
        $response = ['success' => false, 'mensaje' => 'Error en el proceso'];
        if ($respuestaForm == 'si') {
            $prologService = new PrologService();
            $prologAnswer = trim($prologService->getSpecialist($session));

            // Primer mensaje
            $chat = $this->Chats->newEntity([
                'entrada' => "a",
                'respuesta' => "Desea saber a qué médico acudir?",
                'hora_entrada' => date('H:i:s'),
                'date' => date('Y-m-d'),
                'id_user' => $userId
            ]);

            if ($this->Chats->save($chat)) {
                $formatAnswer = $this->stringFormat($prologAnswer);
                // Segundo mensaje con la respuesta del especialista
                $completeAnswer = 'El especialista o especialistas que te recomiendo acudir: '. $formatAnswer;
                
                $chat = $this->Chats->newEntity([
                    'entrada'=> 'Si',
                    'respuesta' => $completeAnswer,
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
                    return $this->response->withType('application/json');
                } else {
                    echo json_encode([
                       'success' => false,
                       'mensaje' => 'Error al guardar el mensaje',
                        'actualizar' => false
                    ]);
                    return $this->response->withType('application/json');
                }
            } else {
                echo json_encode([
                  'success' => false,
                  'mensaje' => 'Error al guardar el mensaje previo',
                  'actualizar' => false
                ]);
                return $this->response->withType('application/json');
            }
        } else {
            // Primer mensaje para respuesta negativa
            $chat = $this->Chats->newEntity([
                'entrada' => "a",
                'respuesta' => "¿Deseas saber a qué médico acudir?",
                'hora_entrada' => date('H:i:s'),
                'date' => date('Y-m-d'),
                'id_user' => $userId
            ]);

            if ($this->Chats->save($chat)) {
                // Segundo mensaje
                $prologAnswer = 'Hola, si necesitas ayuda, escribe tus síntomas?';
                $chat = $this->Chats->newEntity([
                    'entrada'=> 'No',
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
                    return $this->response->withType('application/json');
                } else {
                    echo json_encode([
                      'success' => false,
                      'mensaje' => 'Error al guardar el mensaje ahaaaaaaaaaa',
                        'actualizar' => false
                    ]);
                    return $this->response->withType('application/json');
                    // Maneja el error de manera específica
                    $this->Flash->error(__('El chat no se ha podido guardar.'));
                }
            } else {
                echo json_encode([
                 'success' => false,
                 'mensaje' => 'Error al guardar el mensaje previo',
                  'actualizar' => false
                ]);
                return $this->response->withType('application/json');
                // Maneja el error de manera específica
                $this->Flash->error(__('El chat no se ha podido guardar.'));
            }
            // Siempre responde con JSON
            echo json_encode($response);
            return $this->response->withType('application/json');
        }
    }
    public function stringFormat($string){
        $string = str_replace('[', '', $string);
        $string = str_replace(']', '', $string);
        $string = str_replace("_", ' ', $string);
        return $string;
    }
}
