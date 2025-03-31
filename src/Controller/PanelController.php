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
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        // Aquí puedes agregar la lógica para cargar datos necesarios para el panel
        $this->set('title', 'Panel Principal');
    }
}