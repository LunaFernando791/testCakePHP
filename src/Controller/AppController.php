<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth',[
            'authorize' => ['Controller'], 
            'loginRedirect' => [
                'controller' => 'Chats',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email', // Cambiado de 'email' => 'email' a 'username' => 'email'
                        'password' => 'password'
                    ],
                    'finder' => 'auth'
                ]
            ],
            'storage' => 'Session',
            'unauthorizedRedirect' => $this->referer()
        ]);
        
        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }
    
    public function beforeFilter(Event $event) // Añadir esta función para establecer la variable 'authUser' en todas las vistas
    {
        $this->set('authUser', $this->Auth->user());
        $this->Auth->allow(['login', 'add']);
    }
    
   public function isAuthorized($user) // Añadir esta función para la autorización, que comprueba si el usuario tiene permisos para acceder a una acción
    {
        // Todos los usuarios pueden acceder a las acciones 'index' y 'view'
        if ($this->request->getParam('action') === 'index' || $this->request->getParam('action') === 'view' || $this->request->getParam('action') === 'logout') {
            return true;
        }
        // Solo los usuarios con rol 'admin' pueden acceder a las acciones 'add', 'edit' y 'delete'
        if ($user['rol'] === 'administrador') {
            return true;
        }
        // Por defecto, denegar el acceso
        return false;
    }
}
