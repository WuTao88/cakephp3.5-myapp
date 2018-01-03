<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Home Controller
 *
 *
 * @method \App\Model\Entity\Home[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomeController extends AppController
{

    public function isAuthorized($user)
    {
        $this->set('user',$user);
        return true;
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $goods=TableRegistry::get('Goods');
        $result=$goods->find('all',['contain'=>['Users']])->toArray();
        $this->set('goods',$result);

    }
}
