<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 */
class OrdersController extends AppController {

    
    
    public function initialize() {
        parent::initialize();
        //$conn = ConnectionManager::get('default');
        //$this->loadComponent('Paginator');

    }  
    public $components = ['Paginator'];
    public $paginate = ['limit' => 15];
    
    public function beforeFilter(Event $event) {
        if (!$this->request->session()->check('Auth.Admin')) {
            return $this->redirect(['controller' => 'Users', 'action' => 'index']);
        }
    }

    public function index() {

        $this->viewBuilder()->layout('admin');
        
        $this->loadModel('Orders');
        $query = $this->Orders->find()->where(['is_reject' => 0,'isverified' => 0,'is_delivered' => 0,'is_complete' => 1,'is_active' => 1,'transaction_id !=' => '' ])->order(['id' => 'DESC'])->all()->toArray(); 
        
        $uniqueDt = array();
        foreach($query as $q){
            $uniqueDt[$q->transaction_id]['id'] = $q->id;
        }

        $dtArr = array();
        foreach($uniqueDt as $dt){
            $dtArr[$dt['id']] = $dt['id'];
        }
        if(empty($dtArr)){ $dtArr[0] = 0; }
        $this->set('orders', $this->Paginator->paginate($this->Orders, [ 'limit' => 10, 'order' => [ 'id' => 'DESC' ], 'conditions' => [ 'id IN' => $dtArr ]]));
          
        $this->set(compact('dtArr'));

    }

    
    public function approvedorders() {
        $this->viewBuilder()->layout('admin');
        $this->loadModel('Orders');
        $query = $this->Orders->find()->where(['is_reject' => 0,'isverified' => 1,'is_delivered' => 0,'is_complete' => 1,'is_active' => 1,'transaction_id !=' => '' ])->order(['id' => 'DESC'])->all()->toArray(); 
        $uniqueDt = array();
        foreach($query as $q){
            $uniqueDt[$q->transaction_id]['id'] = $q->id;
        }
        $dtArr = array();
        foreach($uniqueDt as $dt){
            $dtArr[$dt['id']] = $dt['id'];
        }
        if(empty($dtArr)){ $dtArr[0] = 0; }            
            
            
        $this->set('orders', $this->Paginator->paginate($this->Orders, [ 'limit' => 10, 'order' => [ 'id' => 'DESC' ], 'conditions' => [ 'id IN' => $dtArr ]]));

        $this->set(compact('dtArr'));

    }   
    
    public function rejectedorders() {
        $this->viewBuilder()->layout('admin');
        $this->loadModel('Orders');
        $query = $this->Orders->find()->where(['is_reject' => 1,'isverified' => 0,'is_delivered' => 0,'is_complete' => 1,'is_active' => 1,'transaction_id !=' => '' ])->order(['id' => 'DESC'])->all()->toArray(); 
        $uniqueDt = array();
        foreach($query as $q){
            $uniqueDt[$q->transaction_id]['id'] = $q->id;
        }
        $dtArr = array();
        foreach($uniqueDt as $dt){
            $dtArr[$dt['id']] = $dt['id'];
        }
        if(empty($dtArr)){ $dtArr[0] = 0; }  
        $this->set('orders', $this->Paginator->paginate($this->Orders, [ 'limit' => 10, 'order' => [ 'id' => 'DESC' ], 'conditions' => [ 'id IN' => $dtArr ]]));

        $this->set(compact('dtArr'));

    }    
    
    
    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($txn = null) {

        $this->viewBuilder()->layout('admin');
        $this->loadModel('Admins');
        $uid = $this->request->session()->read('Auth.Admin.id');
        $user = $this->Admins->get($this->request->session()->read('Auth.Admin.id'));

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
                //pr($this->request->data); exit;
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
                    $trans['reject_by'] = "Admin";
                    $trans['reject_by_id'] = $this->request->session()->read('Auth.Admin.id');
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
                        $order['reject_by'] = "Admin";
                        $order['reject_by_id'] = $this->request->session()->read('Auth.Admin.id');
                        $order['is_refunded'] = 1;
                        $order['refund_amt'] = $refAmt;
                        $order['refund_transaction_id'] = $retTransactionId;
                        $order['reasion'] = $this->request->data['data'];
                        $ordersTable = TableRegistry::get('Orders');
                        $query = $ordersTable->query();
                        $query->update()->set($order)->where(['id' => $record_ids])->execute();                
                    }
                    $this->Flash->success(__('Order Rejected Successfully.'));
                    $this->redirect(['controller' => 'Orders', 'action' => 'view',$txn]);                
                    
                } else {
                    $this->Flash->success(__('Order Not Rejected. Try again'));
                    $this->redirect(['controller' => 'Orders', 'action' => 'view',$txn]);
                }                

            }
            
            if($this->request->data['ftype'] == 'msg'){
                
                
                //pr($this->request->data); exit;
                
                
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
                $this->Flash->success(__('Message Sent Successfully.'));
            }
        }
         
        //pr($user); pr($orderExist); exit;
        
        $this->set(compact('orderExist','user','presc'));
        $this->set('_serialize', ['user']); 


    }

    public function approvenow($txn = null) {
        
        $this->viewBuilder()->layout('');
        $this->loadModel('Users');
        $this->loadModel('Orders');
        $this->loadModel('Transactions');
        $this->loadModel('Admins');
        
        $user = $this->Admins->get($this->request->session()->read('Auth.Admin.id'));
        
        if ($txn != "") {
            
            $transaction = $this->Transactions->find()->contain(['Orders','Users'])->where(['Transactions.transaction_id' => $txn])->first()->toArray();
            //$ord = $this->Orders->find()->where(['Orders.transaction_id' => $txn])->all()->toArray();
            
            $record_id = $transaction['id'];
            $transactionTable = TableRegistry::get('Transactions');
            $query1 = $transactionTable->query();
            $query1->update()->set(['isverified' => 1, 'verifiedby' => $user['id'], 'verifiedbytype' => 'Admin'])->where(['id' => $record_id])->execute(); 

            foreach($transaction['Orders'] as $cancelOrder){ 
                $record_ids = $cancelOrder['id'];
                $ordersTable = TableRegistry::get('Orders');
                $query = $ordersTable->query();
                $query->update()->set(['isverified' => 1, 'verifiedby' => $user['id'], 'verifiedbytype' => 'Admin'])->where(['id' => $record_ids])->execute();                   
            }            
             
             $this->Flash->success(__('Prescription Approved successfully.'));
             return $this->redirect(['action' => 'approvedorders']);
             
        } else {
            return $this->redirect(['action' => 'view', $txn]);
        }
            
        $this->autoRender = false;
    } 
    
    
    
}
