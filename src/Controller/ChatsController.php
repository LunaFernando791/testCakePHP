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
        if ($this->request->is('post')) {
            // Obtener la entrada del usuario
            $entrada = $this->request->getData('entrada');
            // Llamar a Prolog para procesar la entrada y obtener la respuesta
            $prologService = new PrologService();
            $respuesta = $prologService->procesarMensaje($entrada);
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
        $this->request->allowMethod(['ajax', 'post']);
        $this->autoRender = false;

        $userId = $this->request->getSession()->read('Auth.User.id');
        $entrada = $this->request->getData('entrada');

        // Procesar con Prolog
        $prologService = new PrologService();
        $respuesta = $prologService->procesarMensaje($entrada);

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
}
