<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Goods Controller
 *
 * @property \App\Model\Table\GoodsTable $Goods
 *
 * @method \App\Model\Entity\Good[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GoodsController extends AppController
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
            'contain' => ['Users']
        ];
        $goods = $this->paginate($this->Goods);
        $this->set('name',$this->Auth->user('name'));
        if($this->Auth->user('id')) {
            $this->loadModel('Users');
            $user = $this->Users->get($this->Auth->user('id'));
            $this->set('user', $user);
        }
        $this->set(compact('goods'));
    }

    /**
     * View method
     *
     * @param string|null $id Good id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $good = $this->Goods->get($id, [
            'contain' => ['Users', 'Carts', 'Orders']
        ]);

        $this->set('good', $good);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $good = $this->Goods->newEntity();
        if ($this->request->is('post')) {
            $good = $this->Goods->patchEntity($good, $this->request->getData());
            if ($this->Goods->save($good)) {
                $this->Flash->success(__('The good has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The good could not be saved. Please, try again.'));
        }
        $users = $this->Goods->Users->find('list', ['limit' => 200]);
        $this->set(compact('good', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Good id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $good = $this->Goods->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $good = $this->Goods->patchEntity($good, $this->request->getData());
            if ($this->Goods->save($good)) {
                $this->Flash->success(__('The good has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The good could not be saved. Please, try again.'));
        }
        $users = $this->Goods->Users->find('list', ['limit' => 200]);
        $this->set(compact('good', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Good id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $good = $this->Goods->get($id);
        if ($this->Goods->delete($good)) {
            $this->Flash->success(__('The good has been deleted.'));
        } else {
            $this->Flash->error(__('The good could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
