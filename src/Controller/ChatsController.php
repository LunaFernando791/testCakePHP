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
            'order' => ['hora_entrada' => 'ASC']
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
                'hora_entrada' => date('Y-m-d H:i:s'),
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
    
}
