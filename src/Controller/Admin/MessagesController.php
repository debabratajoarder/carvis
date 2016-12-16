<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

use Cake\I18n\FrozenDate;
use Cake\Database\Type; 
Type::build('date')->setLocaleFormat('yyyy-MM-dd'); 


/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 */
class MessagesController extends AppController {

    public function doctorinbox() {
        $this->loadModel('Ordermsgs');
        $this->loadModel('Admins');
        $this->loadModel('Orders');
        $uid = $this->request->session()->read('Auth.Admin.id');
        $user = $this->Admins->get($this->request->session()->read('Auth.Admin.id'));
        $query1 = $this->Ordermsgs->find()->contain(['Users'])->where(['fromid' => $user->id, 'type' => 'd'])->orWhere(['toid' => $user->id, 'type' => 'd'])->all()->toArray();
        //pr($query1); exit; 
        if(!empty($query1)){
            $msgList = array();
            foreach($query1 as $q){ 
                $msgList[$q->ordid] = $q->toarray(); 
                if($q->is_new == 1 && $q->totype == 'admin'){
                    $msgList[$q->ordid]['newmsg'] = 1;
                } else {
                    $msgList[$q->ordid]['newmsg'] = 0;
                }
                
            }
        } else { 
            $msgList = array();
         }
        
         //pr($msgList); pr($query1); exit;
        $user = $this->Admins->get($this->request->session()->read('Auth.Admin.id')); 
         
        $this->set(compact('msgList','user'));
        $this->set('_serialize', ['msgList','user']);        
    }     
    
    
    public function doctormsgdetail($txn = null) {
        $this->loadModel('Admins');
        $user = $this->Admins->get($this->request->session()->read('Auth.Admin.id'));
        //pr($user); exit;
        $this->loadModel('Ordermsgs');
        $this->loadModel('Orders');
        $uid = $this->request->session()->read('Auth.Doctor.id');
        $msg = $this->Ordermsgs->find()->contain(['Users'])->where(['fromid' => $user->id, 'type' => 'd', 'ordid' => $txn])->orWhere(['toid' => $user->id, 'type' => 'd', 'ordid' => $txn])->order(['date' => 'DESC'])->all()->toArray();        
        
        //pr($msg); 
        
        $ordermessages = TableRegistry::get('Ordermsgs');
        $query = $ordermessages->query();
        foreach($msg as $readMsg){
            if($readMsg->totype == 'admin'){
                $query->update()->set(['is_new' => 0])->where(['id' => $readMsg->id])->execute();
            }
        }        
        
        //pr($msg); exit;
        
        $this->loadModel('Orders');
        $orderExist = $this->Orders->find()->where(['Orders.transaction_id' => $txn])->all()->toArray();       
        
        if($this->request->is('post')){
            //pr($this->request->data); exit;
            
            if($this->request->data['ftype'] == 'msg'){
                $this->loadModel('Ordermsgs');
                $ordermsgsTable = TableRegistry::get('Ordermsgs');
                $ordermsg = $ordermsgsTable->newEntity(); 
                $ordermsg->ordid = $this->request->data['transid'];
                $ordermsg->fromid = $this->request->data['fromid'];
                $ordermsg->toid = $this->request->data['toid'];
                $ordermsg->msg = $this->request->data['msg'];
                $ordermsg->pid = $this->request->data['pid'];
                $ordermsg->type = $this->request->data['type'];              
                $ordermsg->fromtype = $this->request->data['fromtype'];
                $ordermsg->totype = $this->request->data['totype'];
                $ordermsg->date = gmdate('Y-m-d H:i:s');               
                if ($ordermsgsTable->save($ordermsg)){ $id = $ordermsg->id; }                  
                $this->Flash->success(__('Message Sent To Doctor Successfully.'));
                $this->redirect(['controller'=>'Messages' ,'action' => 'doctormsgdetail',$txn]);
            }
        }        
        
        //pr($user); pr($msg); pr($orderExist); exit;
        
        $this->set(compact('user','msg','orderExist'));
        $this->set('_serialize', ['user']);        
    }       
    
    public function patientinbox() {
        $this->loadModel('Ordermsgs');
        $this->loadModel('Admins');
        $this->loadModel('Orders');
        $uid = $this->request->session()->read('Auth.Admin.id');
        $user = $this->Admins->get($this->request->session()->read('Auth.Admin.id'));
        $query1 = $this->Ordermsgs->find()->contain(['Users'])->where(['fromid' => $user->id, 'type' => 'p'])->orWhere(['toid' => $user->id, 'type' => 'p'])->all()->toArray();
        //pr($query1); exit;
        if(!empty($query1)){
            $msgList = array();
            foreach($query1 as $q){ 
                $msgList[$q->ordid] = $q->toarray(); 
                if($q->is_new == 1 && $q->totype == 'admin'){
                    $msgList[$q->ordid]['newmsg'] = 1;
                } else {
                    $msgList[$q->ordid]['newmsg'] = 0;
                } 
            }
        } else { 
            $msgList = array();
         }
        
         
         //pr($msgList); pr($query1); exit;
         
        $user = $this->Admins->get($this->request->session()->read('Auth.Admin.id')); 
         
        $this->set(compact('msgList','user'));
        $this->set('_serialize', ['msgList','user']);        
    }     
    
    
    public function patientmsgdetail($txn = null) {
        $this->loadModel('Admins');
        $user = $this->Admins->get($this->request->session()->read('Auth.Admin.id'));
        //pr($user); exit;
        $this->loadModel('Ordermsgs');
        $this->loadModel('Orders');
        $uid = $this->request->session()->read('Auth.Doctor.id');
        $msg = $this->Ordermsgs->find()->contain(['Users'])->where(['fromid' => $user->id, 'type' => 'p', 'ordid' => $txn])->orWhere(['toid' => $user->id, 'type' => 'p', 'ordid' => $txn])->order(['date' => 'DESC'])->all()->toArray();        
        
        //pr($msg); exit;
        
        $ordermessages = TableRegistry::get('Ordermsgs');
        $query = $ordermessages->query();
        foreach($msg as $readMsg){
            if($readMsg->totype == 'admin'){
                $query->update()->set(['is_new' => 0])->where(['id' => $readMsg->id, 'totype' => 'admin'])->execute();
            }
        }
                

        $this->loadModel('Orders');
        $orderExist = $this->Orders->find()->where(['Orders.transaction_id' => $txn])->all()->toArray();       
        
        if($this->request->is('post')){
            //pr($this->request->data); exit;
            
            if($this->request->data['ftype'] == 'msg'){
                $this->loadModel('Ordermsgs');
                $ordermsgsTable = TableRegistry::get('Ordermsgs');
                $ordermsg = $ordermsgsTable->newEntity(); 
                $ordermsg->ordid = $this->request->data['transid'];
                $ordermsg->fromid = $this->request->data['fromid'];
                $ordermsg->toid = $this->request->data['toid'];
                $ordermsg->msg = $this->request->data['msg'];
                $ordermsg->pid = $this->request->data['pid'];
                $ordermsg->type = $this->request->data['type'];              
                $ordermsg->fromtype = $this->request->data['fromtype'];
                $ordermsg->totype = $this->request->data['totype'];
                $ordermsg->date = gmdate('Y-m-d H:i:s');               
                if ($ordermsgsTable->save($ordermsg)){ $id = $ordermsg->id; }                  
                $this->Flash->success(__('Message Sent To Patient Successfully.'));
                $this->redirect(['controller'=>'Messages' ,'action' => 'patientmsgdetail',$txn]);
            }
        }        
        
        //pr($user); pr($msg); pr($orderExist); exit;
        
        $this->set(compact('user','msg','orderExist'));
        $this->set('_serialize', ['user']);        
    }       
    
    
}
