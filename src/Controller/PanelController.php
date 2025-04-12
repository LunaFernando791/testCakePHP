<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Event\EventInterface;

/**
 * Panel Controller
 *
 * @property \App\Model\Table\PanelTable $Panel
 */
class PanelController extends AppController
{
    
    public function index()
    {
        // Aquí puedes agregar la lógica para cargar datos necesarios para el panel
        $session = $this->request->getSession();
        $userData = $session->read('Auth.User');
        $this->set('title', 'Panel Principal');
        $this->loadModel('Proyectos');
        $recentProjects = $this->Proyectos->find('all', [
            'contain' => ['Users'],
            'conditions' => ['Proyectos.id_usuario_lider' => $userData['id']],
            'order' => ['Proyectos.id' => 'DESC'],
            'limit' => 5,
        ]);
        $this->loadModel('Tareas');
        $recentTasks = $this->Tareas->find('all', [
            'contain' => ['Users'],
            'conditions' => ['Tareas.id_usuario_asignado' => $userData['id']],
            'order' => ['Tareas.id' => 'DESC'],
            'limit' => 5,
        ]);
        $this->set(compact('recentProjects', 'recentTasks', 'userData'));
    }
}