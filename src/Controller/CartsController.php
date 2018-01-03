<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Carts Controller
 *
 * @property \App\Model\Table\CartsTable $Carts
 *
 * @method \App\Model\Entity\Cart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartsController extends AppController
{


    public function isAuthorized($user)
    {
        $controller=$this->request->getParam('controller');
        $action=$this->request->getParam('action');
        $id=$user['group_id'];
        $groups = TableRegistry::get('Groups');
        $roles = TableRegistry::get('Roles');
        $group = $groups->get($id);
        $result = $roles->find('all',['fields'=>['name','url']])->where(['group_id'=>$group->id])->toArray();
        if($result){
            foreach($result as $role){
                $name=$role->name;
                $url=explode(",",$role->url);
                if($controller==$name && in_array($action,$url)){
                    return true;
                }

            }


        }
      return false;
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Goods', 'Users']
        ];
        $carts = $this->paginate($this->Carts);
        $this->set('name',$this->Auth->user('name'));
        if($this->Auth->user('id')) {
            $this->loadModel('Users');
            $user = $this->Users->get($this->Auth->user('id'));
            $this->set('user', $user);
        }
        $this->set(compact('carts'));
    }

    /**
     * View method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cart = $this->Carts->get($id, [
            'contain' => ['Goods', 'Users']
        ]);

        $this->set('cart', $cart);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cart = $this->Carts->newEntity();
        if ($this->request->is('post')) {
            $cart = $this->Carts->patchEntity($cart, $this->request->getData());
            if ($this->Carts->save($cart)) {
                $this->Flash->success(__('The cart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart could not be saved. Please, try again.'));
        }
        $goods = $this->Carts->Goods->find('list', ['limit' => 200]);
        $users = $this->Carts->Users->find('list', ['limit' => 200]);
        $this->set(compact('cart', 'goods', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cart = $this->Carts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cart = $this->Carts->patchEntity($cart, $this->request->getData());
            if ($this->Carts->save($cart)) {
                $this->Flash->success(__('The cart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart could not be saved. Please, try again.'));
        }
        $goods = $this->Carts->Goods->find('list', ['limit' => 200]);
        $users = $this->Carts->Users->find('list', ['limit' => 200]);
        $this->set(compact('cart', 'goods', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cart = $this->Carts->get($id);
        if ($this->Carts->delete($cart)) {
            $this->Flash->success(__('The cart has been deleted.'));
        } else {
            $this->Flash->error(__('The cart could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
