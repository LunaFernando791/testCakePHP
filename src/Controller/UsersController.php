<?php
namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController
{
    
    public function index()
    {
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
    }
    public function login()
    {
        if($this->Auth->user()) { /* CONTROLADOR DESDE AUTH REDIRIGE AL INDEX EN LA RUTA LOGIN */
            return $this->redirect(['controller' => 'Panel', 'action' => 'index']);
        }
        if ($this->request->is('post')) { /* EVITA SOLUCITUDES QUE NO SEAN POR MEDIÓ DE UNA PETICIÓN HTTP */
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Email o contraseña incorrecta'));
        }
    }
    public function logout()
    {
        $this->Flash->success(__('Has cerrado sesión correctamente.'));
        return $this->redirect($this->Auth->logout());
    }
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $this->set('user', $user);
    }
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
    public function edit($id = null)
    {
        
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
