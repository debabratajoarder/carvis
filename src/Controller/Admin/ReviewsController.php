<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\FrozenDate;
use Cake\Database\Type;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

Type::build('date')->setLocaleFormat('yyyy-MM-dd');

/**
 * Runs Controller
 *
 * @property \App\Model\Table\RunsTable $Runs
 */
class ReviewsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function beforeFilter(Event $event) {
        if (!$this->request->session()->check('Auth.Admin')) {
            return $this->redirect(
                            ['controller' => 'Users', 'action' => 'index']
            );
        }
    }

    public function index() {
        //pr($this->request->session()->check('Auth.Admin')); pr($this->request->session()->read('Auth.Admin')); exit;

        $this->viewBuilder()->layout('admin');
        $reviews = $this->paginate($this->Reviews, ['contain' => ['Users']]);
        $this->set(compact('reviews'));
        $this->set('_serialize', ['contacts']);
    }

    /**
     * View method
     *
     * @param string|null $id Run id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function revstatus($id = null, $status = null) {

        //echo $id; echo "--"; echo $status; //exit;
        $this->loadModel('Reviews'); 
        $tableRegObj = TableRegistry::get('Reviews');
        $query = $tableRegObj->find('all', [ 'conditions' => ['id' => $id]]);
        $row = $query->first()->toArray();
        //pr($row); exit;
        if($row){
            $review = TableRegistry::get('Reviews');
            $query = $review->query();
            if($status == 1){
                $query->update()->set(['is_active' => 1])->where(['id' => $id])->execute();
                $this->Flash->success(__('Review has been activated.'));
            } else if($status == 0){
                $query->update()->set(['is_active' => 0])->where(['id' => $id])->execute(); 
                $this->Flash->success(__('Review has been suspended.'));
            }
        } else {
            $this->Flash->error(__('Review Not Found.'));
        }        
        return $this->redirect(['action' => 'index']);         
        
        
        
        
    }

}
