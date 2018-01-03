<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuthController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout', 'register']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['add', 'view', 'edit', 'index'])) {
            return true;
        }
    }

    /**
     * 登录
     */
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('用户名或密码错误！');
        }
    }

    /**
     * 注册
     */
    public function register()
    {
        $data = $this->request->getData();
        if ($data && $data['password'] != $data['repassword']) {
            $this->Flash->error('密码不一致！');

        }

        $user = $this->Users->newEntity();
        $user = $this->Users->patchEntity($user, $data);
        if ($this->Users->save($user)) {
            $this->Auth->setUser($user->toArray());
            return $this->redirect([
                'controller' => 'Pages',
                'action' => 'display'
            ]);
        }
    }

    /**
     * 注销
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

}

