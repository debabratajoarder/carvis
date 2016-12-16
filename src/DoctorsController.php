<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;

use Cake\Datasource\ConnectionManager;

use Cake\Mailer\Email;
use Cake\Routing\Router;

use Cake\I18n\FrozenDate;
use Cake\Database\Type; 
Type::build('date')->setLocaleFormat('yyyy-MM-dd');

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 */
class DoctorsController extends AppController {


    /**
     * Displays a view 
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['index', 'mypatients', 'mypatientdetail', 'dashboard','editprofile','newprescription', 'prescriptiondetail', 'rejectprescription','activeaccount','updateprofileimage','newprescriptiondetail','approvenow','rejectnow','mymessagelist', 'mymessage']); 
        $conn = ConnectionManager::get('default');
        $this->loadComponent('Paginator');
        
    }
 
    public $paginate = ['limit' => 15];    
    
   public function beforeFilter(Event $event) {
       if (!$this->request->session()->check('Auth.Doctor')) {
          return $this->redirect('/');
       }
    }     
    
    public $uses = array('User', 'Admin');

    public function index() {
        pr($this->request->session()->read('Auth.Doctor')); exit;
        //$this->redirect(['controller'=>'Users' ,'action' => 'signin']); 
    }    
    
    
    public function dashboard() {
        
        $this->loadModel('Users');
        $uid = $this->request->session()->read('Auth.Doctor.id');
        $user = $this->Users->get($this->request->session()->read('Auth.Doctor.id'));
        $this->loadModel('Treatments');
        $this->loadModel('Orders');
        $this->loadModel('Orderdetails');
        $this->loadModel('Medicines');
        $this->loadModel('Pils');
        $orderExist = $this->Orders->find()->contain(['Orderdetails','Treatments'])->where(['Orders.isverified' => 1,'Orders.verifiedby' => $user['id']])->all();
        if(!empty($orderExist)){
            $trans = array();
            $amt = 0;
            $i = 1;
            $arrExist = array();
            foreach($orderExist as $dt){
                
                if(!in_array( $dt->transaction_id , $arrExist )){
                    $arrExist[$dt->transaction_id] = $dt->transaction_id;
                    $trans[$i]['tid'] =  $dt->transaction_id;
                    $trans[$i]['name'] =  $dt->name;
                    $trans[$i]['treatment'] =  $dt->treatment->name;
                    $trans[$i]['date'] =  $dt->date;
                    $trans[$i]['delivery'] =  $dt->is_delivered;
                    $i ++;                    
                } else {
                    foreach($trans as $keyTran => $oldTran){
                        if($oldTran['tid'] == $dt->transaction_id){
                            $trans[$keyTran]['treatment'] = $trans[$keyTran]['treatment'].",".$dt->treatment->name;
                        }
                    }
                }
            }
        } else {
            $trans = array();
        }
        $this->set(compact('user','trans'));
        $this->set('_serialize', ['user']); 
    }    
    

    public function rejectprescription() {
        
        $this->loadModel('Users');
        $uid = $this->request->session()->read('Auth.Doctor.id');
        $user = $this->Users->get($this->request->session()->read('Auth.Doctor.id'));
        $this->loadModel('Treatments');
        $this->loadModel('Orders');
        $this->loadModel('Orderdetails');
        $this->loadModel('Medicines');
        $this->loadModel('Pils');
        $orderExist = $this->Orders->find()->contain(['Orderdetails','Treatments'])->where(['Orders.is_reject' => 1,'Orders.reject_by_id' => $user['id']])->all();
        if(!empty($orderExist)){
            $trans = array();
            $amt = 0;
            $i = 1;
            $arrExist = array();
            foreach($orderExist as $dt){
                
                if(!in_array( $dt->transaction_id , $arrExist )){
                    $arrExist[$dt->transaction_id] = $dt->transaction_id;
                    $trans[$i]['tid'] =  $dt->transaction_id;
                    $trans[$i]['name'] =  $dt->name;
                    $trans[$i]['treatment'] =  $dt->treatment->name;
                    $trans[$i]['date'] =  $dt->date;
                    $trans[$i]['delivery'] =  $dt->is_delivered;
                    $i ++;                    
                } else {
                    foreach($trans as $keyTran => $oldTran){
                        if($oldTran['tid'] == $dt->transaction_id){
                            $trans[$keyTran]['treatment'] = $trans[$keyTran]['treatment'].",".$dt->treatment->name;
                        }
                    }
                }
            }
        } else {
            $trans = array();
        }
        $this->set(compact('user','trans'));
        $this->set('_serialize', ['user']); 
    }     
    
    public function mypatients() {
        $this->loadModel('Users');
        $this->loadModel('Orders');
        $uid = $this->request->session()->read('Auth.Doctor.id');
        $user = $this->Users->get($this->request->session()->read('Auth.Doctor.id'));
        $query1 = $this->Orders->find()->where(['verifiedby' => $user->id])->all()->toArray();
        if(!empty($query1)){
            //pr($query1); exit;
            $testPt = array();
            foreach($query1 as $q){ $testPt[$q->user_id] = $q->user_id; }
            $query = $this->Users->find()->where(['id IN' => $testPt]);       
            $this->set('patient', $this->paginate($query));            
        } else { 
            $patient = array();
            $this->set(compact('patient'));
        }
        
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);        
    }     
    
    
    public function mypatientdetail($pid = null) {
        $patientid = base64_decode($pid);
        $this->loadModel('Users');
        $this->loadModel('Orders');
        $user = $this->Users->get($this->request->session()->read('Auth.Doctor.id'));
        $patient = $this->Users->get($patientid);
        $order = $this->Orders->find()->contain(['Orderdetails','Treatments','Orderdetails.Medicines'])->where(['Orders.isverified' => 1,'Orders.user_id' => $patientid,'Orders.verifiedby' => $user['id']])->all();
        $this->set(compact('user','patient','order'));
        $this->set('_serialize', ['user']);        
    }     
    
    
    public function mymessagelist() {
        $this->loadModel('Users');
        $user = $this->Users->get($this->request->session()->read('Auth.Doctor.id'));
        //pr($user); exit;
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);        
    }     
    
    
    public function mymessage() {
        $this->loadModel('Users');
        $user = $this->Users->get($this->request->session()->read('Auth.Doctor.id'));
        //pr($user); exit;
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);        
    }     
    
    public function editprofile() {
        $this->viewBuilder()->layout('default');
        $this->loadModel('Users');
        $user = $this->Users->get($this->request->session()->read('Auth.Doctor.id'));
        if ($this->request->is(['post', 'put'])) {
            $flag = true;
            if($flag){
                $this->request->data['created'] = gmdate("Y-m-d h:i:s");
                $this->request->data['modified'] = gmdate("Y-m-d h:i:s");
                if($this->request->data['password'] == ""){
                    $this->request->data['password'] = base64_decode($user->ptxt);
                    $this->request->data['ptxt'] = $user->ptxt;
                } else {
                    $this->request->data['ptxt'] = base64_encode($this->request->data['password']);
                }
                $user = $this->Users->patchEntity($user, $this->request->data);               
                if ($this->Users->save($user)) {
                    //pr($user); exit;
                    $this->Flash->success(__('Profile has been edited successfully.'));
                    return $this->redirect(['action' => 'editprofile']);
                } else {
                    $this->Flash->error(__('Profile could not be edit. Please, try again.'));
                    //return $this->redirect(['action' => 'editprofile']);
                }
            } else {
                $this->Flash->error(__('Profile could not be edit. Please, try again.'));
            }           
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }     
    
    public function newprescription() {
        $this->loadModel('Users');
        $uid = $this->request->session()->read('Auth.Doctor.id');
        $user = $this->Users->get($this->request->session()->read('Auth.Doctor.id'));

        $this->loadModel('Treatments');
        $this->loadModel('Orders');
        $this->loadModel('Orderdetails');
        $this->loadModel('Medicines');
        $this->loadModel('Pils');

        $orderExist = $this->Orders->find()->contain(['Orderdetails','Treatments'])->where(['Orders.isverified' => 0, 'Orders.is_reject' => 0, 'Orders.is_complete' => 1])->all();

        if(!empty($orderExist)){
            $trans = array();
            $amt = 0;
            $i = 1;
            $arrExist = array();
            foreach($orderExist as $dt){
                
                if(!in_array( $dt->transaction_id , $arrExist )){
                    $arrExist[$dt->transaction_id] = $dt->transaction_id;
                    $trans[$i]['tid'] =  $dt->transaction_id;
                    $trans[$i]['name'] =  $dt->name;
                    $trans[$i]['treatment'] =  $dt->treatment->name;
                    $trans[$i]['date'] =  $dt->date;
                    $trans[$i]['delivery'] =  $dt->is_delivered;
                    $i ++;                    
                } else {
                    foreach($trans as $keyTran => $oldTran){
                        if($oldTran['tid'] == $dt->transaction_id){
                            $trans[$keyTran]['treatment'] = $trans[$keyTran]['treatment'].",".$dt->treatment->name;
                        }
                    }
                }
            }
        } else {
            $trans = array();
        }

        $this->set(compact('user','trans'));
        $this->set('_serialize', ['user']);         
       
    }  
    
    public function prescriptiondetail($txn = null) {
        $this->loadModel('Users');
        $uid = $this->request->session()->read('Auth.Doctor.id');
        $user = $this->Users->get($this->request->session()->read('Auth.Doctor.id'));

        $this->loadModel('Treatments');
        $this->loadModel('Orders');
        $this->loadModel('Orderdetails');
        $this->loadModel('Medicines');
        $this->loadModel('Pils');
        $this->loadModel('Prescriptions');

        $orderExist = $this->Orders->find()->contain(['Orderdetails','Treatments','Orderdetails.Medicines'])->where(['Orders.transaction_id' => $txn])->all()->toArray();
        $presc = $this->Prescriptions->find()->where(['Prescriptions.txnid' => $txn])->all()->toArray();

        foreach($orderExist as $oExist){ $dt = json_decode($oExist['question']); }
        
        if($this->request->is('post')){
            
            
            pr($this->request->data); exit;
            
            if($this->request->data['ftype'] == 'reject'){
                
                $this->loadModel('Orders');
                $is_login = '';
                $orderExist = $this->Orders->find()->where(['Orders.transaction_id' => $this->request->data['transid']])->all()->toArray();
                $retTransactionId =  $this->generateRandomString();
                foreach($orderExist as $cancelOrder){
                    $record_id = $cancelOrder->id;
                    $order['is_reject'] = 1;
                    $order['reject_by'] = "DOctor";
                    $order['reject_by_id'] = $this->request->session()->read('Auth.Doctor.id');
                    $order['is_refunded'] = 1;
                    $order['refund_amt'] = $cancelOrder->amt;
                    $order['refund_transaction_id'] = $retTransactionId;
                    $order['reasion'] = $this->request->data['data'];

                    $pilpricesTable = TableRegistry::get('Orders');
                    $query = $pilpricesTable->query();
                    $query->update()->set($order)->where(['id' => $record_id])->execute();           
                }
                $this->Flash->success(__('Yo have rejected order Successfully.'));
                $this->redirect(['controller'=>'Doctors' ,'action' => 'rejectprescription']);                 
            }
            
            if($this->request->data['ftype'] == 'msg'){
                
                $this->loadModel('Orders');
                $is_login = '';
                $orderExist = $this->Orders->find()->where(['Orders.transaction_id' => $this->request->data['transid']])->all()->toArray();
                $retTransactionId =  $this->generateRandomString();
                foreach($orderExist as $cancelOrder){
                    $record_id = $cancelOrder->id;
                    $order['is_reject'] = 1;
                    $order['reject_by'] = "DOctor";
                    $order['reject_by_id'] = $this->request->session()->read('Auth.Doctor.id');
                    $order['is_refunded'] = 1;
                    $order['refund_amt'] = $cancelOrder->amt;
                    $order['refund_transaction_id'] = $retTransactionId;
                    $order['reasion'] = $this->request->data['data'];

                    $pilpricesTable = TableRegistry::get('Orders');
                    $query = $pilpricesTable->query();
                    $query->update()->set($order)->where(['id' => $record_id])->execute();           
                }
                $this->Flash->success(__('Yo have rejected order Successfully.'));
                $this->redirect(['controller'=>'Doctors' ,'action' => 'rejectprescription']);       
                
                
            }
               
        }
        
        
        //pr($orderExist); exit; 
        
        
        $this->set(compact('orderExist','user','presc'));
        $this->set('_serialize', ['user']);         
       
    }    
    
    
    
    public function approvenow($txn = null) {
        
        $this->viewBuilder()->layout('');
        $this->loadModel('Users');
        $this->loadModel('Orders');

        $user = $this->Users->get($this->request->session()->read('Auth.Doctor.id'));
        
        if ($txn != "") {
            $ord = $this->Orders->find()->where(['Orders.transaction_id' => $txn])->all()->toArray();
            //echo $txn; pr($user);pr($ord); exit;
             foreach($ord as $ordDet){
                $tableRegObj = TableRegistry::get('Orders');
                $query = $tableRegObj->query();
                $query->update()->set(['isverified' => 1, 'verifiedby' => $user['id']])->where(['id' => $ordDet->id])->execute();                 
             }
             
             $this->Flash->success(__('Prescription Approved successfully.'));
             return $this->redirect(['action' => 'newprescription']);
             
        } else {
            return $this->redirect(['action' => 'newprescription']);
        }
            
        $this->autoRender = false;
    }      
    
    public function rejectnow($txn = null) {
        
        $this->viewBuilder()->layout('');
        $this->loadModel('Users');
        $this->loadModel('Orders');

        $user = $this->Users->get($this->request->session()->read('Auth.Doctor.id'));
        
        if ($txn != "") {
            $ord = $this->Orders->find()->where(['Orders.transaction_id' => $txn])->all()->toArray();
            //echo $txn; pr($user);pr($ord); exit;
             foreach($ord as $ordDet){
                $tableRegObj = TableRegistry::get('Orders');
                $query = $tableRegObj->query();
                $query->update()->set(['isverified' => 2, 'verifiedby' => $user['id']])->where(['id' => $ordDet->id])->execute();                 
             }
             
             $this->Flash->success(__('Prescription Approved successfully.'));
             return $this->redirect(['action' => 'newprescription']);
             
        } else {
            return $this->redirect(['action' => 'newprescription']);
        }
            
        $this->autoRender = false;
    }     
    
    public function updateprofileimage() {
        
        $this->viewBuilder()->layout('');
        $this->loadModel('Users');
        $user = $this->Users->get($this->request->session()->read('Auth.Doctor.id'));
        if ($this->request->is(['post', 'put'])) {
            if(empty( $this->request->data )){
                return $this->redirect('/');
            }
            $flag = true;
            $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
            if (!empty($this->request->data['image']['name'])) {
                $file = $this->request->data['image']; //put the data into a var for easy use
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $fileName = time() . "." . $ext;
                if (in_array($ext, $arr_ext)) {
                    
                    if ($user->pimg != "" && $user->pimg != $fileName ) {
                        $filePathDel = WWW_ROOT . 'user_img' . DS . $user->pimg;
                        if (file_exists($filePathDel)) {
                            unlink($filePathDel);
                        }
                    }                     
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'user_img' . DS . $fileName);
                    $file = $fileName;

                } else {
                    $flag = false;
                    $this->Flash->error(__('Upload image only jpg,jpeg,png files.'));
                }
            } else {
                $flag = false;
                $this->Flash->error(__('Upload image For Treatment.'));
            }                
            
            if($flag){
                $tableRegObj = TableRegistry::get('Users');
                $query = $tableRegObj->query();
                $query->update()->set(['pimg' => $fileName])->where(['id' => $user->id])->execute();
                
                    $this->Flash->success(__('Profile Image has been updated successfully.'));
                    return $this->redirect( Router::url('/', true ).$this->request->data['returl'] );                
                
            } else {
                    $this->Flash->error(__('Profile Image could not be updated. Please, try again.'));
                    $this->Flash->success(__('Profile Image has been updated successfully.'));
                    return $this->redirect( Router::url('/', true ).$this->request->data['returl'] );                
            }    
        } else {
            return $this->redirect('/');
        }           
        $this->autoRender = false;
    }    
    
}