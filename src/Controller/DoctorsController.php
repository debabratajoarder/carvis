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
        $this->Auth->allow(['index', 'mypatients', 'mypatientdetail', 'dashboard','msgdetail','editprofile','newprescription', 'prescriptiondetail', 'rejectprescription','activeaccount','updateprofileimage','newprescriptiondetail','approvenow','rejectnow','mymessagelist', 'mymessage']); 
        $conn = ConnectionManager::get('default');
        $this->loadComponent('Paginator');
        
    }
 
    public $paginate = ['limit' => 5];    
    
   public function beforeFilter(Event $event) {
       if (!$this->request->session()->check('Auth.Doctor')) {
          return $this->redirect('/');
       }
    }     
    
    public $uses = array('User', 'Admin');

    public function index() {
        //pr($this->request->session()->read('Auth.Doctor')); exit;
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

        $query = $this->Orders->find()->where(['Orders.isverified' => 1,'Orders.verifiedby' => $user['id']])->all()->toArray();
        $uniqueDt = array();
        foreach ($query as $q) {
            $uniqueDt[$q->transaction_id]['id'] = $q->id;
        }

        $dtArr = array();
        foreach ($uniqueDt as $dt) {
            $dtArr[$dt['id']] = $dt['id'];
        }
        if (empty($dtArr)) {
            $dtArr[0] = 0;
        }
        $this->set('trans', $this->Paginator->paginate($this->Orders, [ 'limit' => 10, 'order' => [ 'id' => 'DESC'], 'conditions' => [ 'id IN' => $dtArr]]));
                
        $this->set(compact('user'));
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
        
        $query = $this->Orders->find()->where(['Orders.is_reject' => 1,'Orders.reject_by_id' => $user['id']])->all()->toArray();
        $uniqueDt = array();
        foreach ($query as $q) {
            $uniqueDt[$q->transaction_id]['id'] = $q->id;
        }

        $dtArr = array();
        foreach ($uniqueDt as $dt) {
            $dtArr[$dt['id']] = $dt['id'];
        }
        if (empty($dtArr)) {
            $dtArr[0] = 0;
        }
        $this->set('trans', $this->Paginator->paginate($this->Orders, [ 'limit' => 10, 'order' => [ 'id' => 'DESC'], 'conditions' => [ 'id IN' => $dtArr]]));
                
        $this->set(compact('user'));
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
        $query = $this->Orders->find()->contain(['Orderdetails','Treatments','Orderdetails.Medicines'])->where(['Orders.user_id' => $patientid]);
        
        //$query = $this->Users->find()->where(['id IN' => $testPt]);       
        $this->set('orders', $this->paginate($query, [ 'limit' => 5, 'order' => [ 'id' => 'DESC']] ));
        

        $this->set(compact('user','patient'));
        $this->set('_serialize', ['user']);        
    }     
    
   
    public function mymessagelist() {
        $this->loadModel('Ordermsgs');
        $this->loadModel('Users');
        $this->loadModel('Orders');
        $uid = $this->request->session()->read('Auth.Doctor.id');
        $user = $this->Users->get($this->request->session()->read('Auth.Doctor.id'));
        $query1 = $this->Ordermsgs->find()->contain(['Users'])->where(['fromid' => $user->id, 'type' => 'd'])->orWhere(['toid' => $user->id, 'type' => 'd'])->all()->toArray();
        //pr($query1); exit; 
        if(!empty($query1)){
            $msgList = array();
            foreach($query1 as $q){ $msgList[$q->ordid] = $q; }
        } else { 
            $msgList = array();
        }
        
        $user = $this->Users->get($this->request->session()->read('Auth.Doctor.id')); 
         
        $this->set(compact('msgList','user'));
        $this->set('_serialize', ['msgList','user']);        
    }     
    
    
    public function msgdetail($txn = null) {
        $this->loadModel('Users');
        $user = $this->Users->get($this->request->session()->read('Auth.Doctor.id'));
        //pr($user); exit;
        $this->loadModel('Ordermsgs');
        $this->loadModel('Orders');
        $uid = $this->request->session()->read('Auth.Doctor.id');
        $msg = $this->Ordermsgs->find()->contain(['Users'])->where(['fromid' => $user->id, 'type' => 'd',  'ordid' => $txn])->orWhere(['toid' => $user->id, 'type' => 'd', 'ordid' => $txn])->order(['date' => 'DESC'])->all()->toArray();        
        
        //pr($msg); exit;
        
        $this->loadModel('Orders');
        $orderExist = $this->Orders->find()->where(['Orders.transaction_id' => $txn])->all()->toArray();        
        
        if($this->request->is('post')){
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
                $this->Flash->success(__('Message Sent To Customer Care Successfully.'));
                $this->redirect(['controller'=>'Doctors' ,'action' => 'msgdetail',$txn]);
            }
        }        
        
        $this->set(compact('user','msg','orderExist'));
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
        
        $query = $this->Orders->find()->where(['Orders.isverified' => 0, 'Orders.is_reject' => 0, 'Orders.is_complete' => 1])->all()->toArray();

        $uniqueDt = array();
        foreach ($query as $q) {
            $uniqueDt[$q->transaction_id]['id'] = $q->id;
        }

        $dtArr = array();
        foreach ($uniqueDt as $dt) {
            $dtArr[$dt['id']] = $dt['id'];
        }
        if (empty($dtArr)) {
            $dtArr[0] = 0;
        }
        $this->set('trans', $this->Paginator->paginate($this->Orders, [ 'limit' => 10, 'order' => [ 'id' => 'DESC'], 'conditions' => [ 'id IN' => $dtArr]]));
        /*
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
        */
        
        $this->set(compact('user'));
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
        $this->loadModel('Transactions');

        $orderExist = $this->Orders->find()->contain(['Orderdetails','Treatments','Orderdetails.Medicines'])->where(['Orders.transaction_id' => $txn])->all()->toArray();
        $presc = $this->Prescriptions->find()->where(['Prescriptions.txnid' => $txn])->all()->toArray();

        foreach($orderExist as $oExist){ $dt = json_decode($oExist['question']); }
        
        if($this->request->is('post')){
            if($this->request->data['ftype'] == 'reject'){
                
                $transaction = $this->Transactions->find()->contain(['Orders','Users'])->where(['Transactions.transaction_id' => $this->request->data['transid']])->first()->toArray();

                $request_params = array(
                    'METHOD' => 'RefundTransaction',
                    'TRANSACTIONID' => $this->request->data['transid'],
                    'REFUNDTYPE' => 'Full',
                    'USER' => 'nits.debsoumen2_api1.gmail.com',
                    'PWD' => 'LJMGQ33VJGFUZGXQ',
                    'SIGNATURE' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AjUTZMwQl04R5EwZTojhK76GG1wR',
                    'VERSION' => '85.0',
                    'CURRENCYCODE' => 'GBP',
                );

                $nvp_string = '';
                foreach ($request_params as $var => $val) {
                    $nvp_string .= '&' . $var . '=' . urlencode($val);
                }

                $curl = curl_init();
                curl_setopt($curl, CURLOPT_VERBOSE, 1);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($curl, CURLOPT_TIMEOUT, 3000);
                curl_setopt($curl, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string);

                $result = curl_exec($curl);
                curl_close($curl);
                parse_str($result, $resArray);
                if($resArray['ACK'] == 'Success' ){ 
                    $retTransactionId = $resArray['REFUNDTRANSACTIONID'];
                    $refAmt = $resArray['NETREFUNDAMT'];
                    $record_id = $transaction['id'];
                    $trans['is_reject'] = 1;
                    $trans['reject_by'] = "Doctor";
                    $trans['reject_by_id'] = $this->request->session()->read('Auth.Doctor.id');
                    $trans['is_refunded'] = 1;
                    $trans['refund_amt'] = $refAmt;
                    $trans['refund_transaction_id'] = $retTransactionId;
                    $trans['reasion'] = $this->request->data['data'];

                    $transactionTable = TableRegistry::get('Transactions');
                    $query1 = $transactionTable->query();
                    $query1->update()->set($trans)->where(['id' => $record_id])->execute();

                    foreach($transaction['Orders'] as $cancelOrder){
                        $record_ids = $cancelOrder['id'];
                        $order['is_reject'] = 1;
                        $order['reject_by'] = "Doctor";
                        $order['reject_by_id'] = $this->request->session()->read('Auth.Doctor.id');
                        $order['is_refunded'] = 1;
                        $order['refund_amt'] = $refAmt;
                        $order['refund_transaction_id'] = $retTransactionId;
                        $order['reasion'] = $this->request->data['data'];
                        $ordersTable = TableRegistry::get('Orders');
                        $query = $ordersTable->query();
                        $query->update()->set($order)->where(['id' => $record_ids])->execute();                
                    }
                    $this->Flash->success(__('You have rejected order Successfully.'));
                    $this->redirect(['controller'=>'Doctors' ,'action' => 'rejectprescription']);                     
                    
                } else {
                    $this->Flash->success(__('Your rejected order Not done Try again.'));
                    $this->redirect(['controller'=>'Doctors' ,'action' => 'rejectprescription']);
                }

            }
            
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
                $this->Flash->success(__('Message Sent To Customer Care Successfully.'));
            }
        }
        
        //pr($orderExist); pr($presc); exit;
        
        
        
        $this->set(compact('orderExist','user','presc'));
        $this->set('_serialize', ['user']);         
    }    
    
    
    
    public function approvenow($txn = null) {
        
        $this->viewBuilder()->layout('');
        $this->loadModel('Users');
        $this->loadModel('Orders');
        $this->loadModel('Transactions');
        
        $user = $this->Users->get($this->request->session()->read('Auth.Doctor.id'));
        
        if ($txn != "") {
            
            $transaction = $this->Transactions->find()->contain(['Orders','Users'])->where(['Transactions.transaction_id' => $txn])->first()->toArray();
            //$ord = $this->Orders->find()->where(['Orders.transaction_id' => $txn])->all()->toArray();
            
            $record_id = $transaction['id'];
            $transactionTable = TableRegistry::get('Transactions');
            $query1 = $transactionTable->query();
            $query1->update()->set(['isverified' => 1, 'verifiedby' => $user['id'], 'verifiedbytype' => 'Doctor'])->where(['id' => $record_id])->execute(); 

            foreach($transaction['Orders'] as $cancelOrder){ 
                $record_ids = $cancelOrder['id'];
                $ordersTable = TableRegistry::get('Orders');
                $query = $ordersTable->query();
                $query->update()->set(['isverified' => 1, 'verifiedby' => $user['id'], 'verifiedbytype' => 'Doctor'])->where(['id' => $record_ids])->execute();                   
            }            
            
            /*
             foreach($ord as $ordDet){
                $tableRegObj = TableRegistry::get('Orders');
                $query = $tableRegObj->query();
                $query->update()->set(['isverified' => 1, 'verifiedby' => $user['id']])->where(['id' => $ordDet->id])->execute();                 
             } */
             
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
        $this->loadModel('Transactions');
        $user = $this->Users->get($this->request->session()->read('Auth.Doctor.id'));
        
        if ($txn != "") {
            $transaction = $this->Transactions->find()->contain(['Orders','Users'])->where(['Transactions.transaction_id' => $txn])->all()->toArray();

            $request_params = array(
                'METHOD' => 'RefundTransaction',
                'TRANSACTIONID' => $txn,
                'REFUNDTYPE' => 'Full',
                'USER' => 'nits.debsoumen2_api1.gmail.com',
                'PWD' => 'LJMGQ33VJGFUZGXQ',
                'SIGNATURE' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AjUTZMwQl04R5EwZTojhK76GG1wR',
                'VERSION' => '85.0',
                'CURRENCYCODE' => 'GBP',
            );

            $nvp_string = '';
            foreach ($request_params as $var => $val) {
                $nvp_string .= '&' . $var . '=' . urlencode($val);
            }

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_VERBOSE, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($curl, CURLOPT_TIMEOUT, 30);
            curl_setopt($curl, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string);

            $result = curl_exec($curl);
            curl_close($curl);
            //var_dump($result); 
            //$resArray = $this->NVPToArray($result);
            parse_str($result, $resArray);
            //echo "<pre>";  print_r($resArray); exit;        

            if($resArray['ACK'] == 'Success' || $resArray['ACK'] == 'SUCCESS'){

                $retTransactionId = $resArray['REFUNDTRANSACTIONID'];
                $refund_amt = $resArray['NETREFUNDAMT'];

                foreach ($orderExist as $cancelOrder) {
                    $record_id = $cancelOrder->id;
                    $order['is_reject'] = 1;
                    $order['reject_by'] = "Doctor";
                    $order['reject_by_id'] = $this->request->session()->read('Auth.Doctor.id');
                    $order['is_refunded'] = 1;
                    $order['refund_amt'] = $refund_amt;
                    $order['status_type'] = 2;
                    $order['refund_transaction_id'] = $retTransactionId;
                    $pilpricesTable = TableRegistry::get('Orders');
                    $query = $pilpricesTable->query();
                    $query->update()->set($order)->where(['id' => $record_id])->execute();
                }

                $this->Flash->success(__('Order Rejected Successfully.'));
                $this->redirect(['controller' => 'Doctors', 'action' => 'rejectedorder']);            
            } else {

                $this->Flash->success(__('Order Not Rejected. Try again'));
                $this->redirect(['controller' => 'Doctors', 'action' => 'Rejected']);            
            }            
                         
        } else {
            return $this->redirect(['action' => 'newprescription']);
        }
            
        $this->autoRender = false;
    }     
    
    
    public function cancelnow($txnId = null) {
        $this->viewBuilder()->layout('');

        $this->loadModel('Treatments');
        $this->loadModel('Orders');
        $this->loadModel('Orderdetails');
        $this->loadModel('Medicines');
        $this->loadModel('Pils');

        $is_login = '';
        if ($this->request->session()->check('Auth.User')) {
            $is_login = 1;
            $uid = $this->request->session()->read('Auth.User.id');
            $orderExist = $this->Orders->find()->where(['Orders.user_id' => $uid, 'Orders.transaction_id' => $txnId])->all()->toArray();
        }

        //pr($orderExist); exit;

        $request_params = array(
            'METHOD' => 'RefundTransaction',
            'TRANSACTIONID' => $txnId,
            'REFUNDTYPE' => 'Full',
            'USER' => 'nits.debsoumen2_api1.gmail.com',
            'PWD' => 'LJMGQ33VJGFUZGXQ',
            'SIGNATURE' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AjUTZMwQl04R5EwZTojhK76GG1wR',
            'VERSION' => '85.0',
            'CURRENCYCODE' => 'GBP',
        );

        $nvp_string = '';
        foreach ($request_params as $var => $val) {
            $nvp_string .= '&' . $var . '=' . urlencode($val);
        }

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_VERBOSE, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string);

        $result = curl_exec($curl);
        curl_close($curl);
        //var_dump($result); 
        //$resArray = $this->NVPToArray($result);
        parse_str($result, $resArray);
        //echo "<pre>";  print_r($resArray); exit;        
        
        
        if($resArray['ACK'] == 'Success' || $resArray['ACK'] == 'SUCCESS'){
            
            $retTransactionId = $resArray['REFUNDTRANSACTIONID'];
            $refund_amt = $resArray['NETREFUNDAMT'];
            
            foreach ($orderExist as $cancelOrder) {
                $record_id = $cancelOrder->id;
                $order['is_reject'] = 1;
                $order['reject_by'] = "User";
                $order['reject_by_id'] = $this->request->session()->read('Auth.User.id');
                $order['is_refunded'] = 1;
                $order['refund_amt'] = $refund_amt;
                $order['status_type'] = 2;
                $order['refund_transaction_id'] = $retTransactionId;
                $pilpricesTable = TableRegistry::get('Orders');
                $query = $pilpricesTable->query();
                $query->update()->set($order)->where(['id' => $record_id])->execute();
            }

            $this->Flash->success(__('Your Order Cancelled Successfully.'));
            $this->redirect(['controller' => 'Users', 'action' => 'rejectedorder']);            
        } else {
            
            $this->Flash->success(__('Your Order Not Cancelled. Try again'));
            $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);            
        }
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