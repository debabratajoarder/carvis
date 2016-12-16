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
class  ReportsController extends AppController {

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
     
     
     
    public function index(){
        
		$this->viewBuilder()->layout('admin');
		$this->loadModel('Orders');
		
        if ($this->request->is(['patch', 'post', 'put'])) {
        	 
			 $dt = explode("-",$this->request->data['delivery_date']);
			 $day = $dt[2]."-".$dt[0]."-".$dt[1];

             $runid = $this->request->data['run_id'];

			 $order = $this->paginate($this->Orders->find('all')->distinct(['run_id'])->where(['delivery_date' => $day, 'run_id' => $runid]));
        } else {
			$day = date("Y-m-d");
			
			$order = $this->paginate($this->Orders->find('all')->distinct(['run_id'])->where(['delivery_date' => $day]));
					
        }
		
		$runs = $this->Orders->find();
		$runs->select(['run_id', 'run_name'])->distinct(['run_name']);
		
		$dates = $this->Orders->find();
		$dates->select(['delivery_date'])->distinct(['delivery_date'])->order(['delivery_date' => 'DESC']);		
			
		$this->set(compact('order', 'runs', 'dates'));
        $this->set('_serialize', ['order']);						
								
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null, $date = null){
        
		$this->viewBuilder()->layout('ajaxcall');
				
		$this->loadModel('Runs');
		$this->loadModel('Orders');
		$this->loadModel('Orderdetails');
 		$this->loadModel('Customers');
		$this->loadModel('Products');
		
		
		$runDetail = $this->Runs->find()->where(['id' => $id]);
		$ordListRaw = $this->Orders->find()->where(['run_id' => $id, 'delivery_date' => date("Y-m-d", $date)]);

		$ordk = 0;
		foreach($ordListRaw as $ordLists){
				
			$ordList[$ordk]['ordid'] = $ordLists->id;
			$ordList[$ordk]['ordno'] = $ordLists->ordno;
			
			$custDetail = $this->Customers->find()->where(['id' => $ordLists->customer_id]);
			//echo $custDetail->toArray()[0]->group_priority; pr($custDetail->toArray()); exit;
			$ordList[$ordk]['customer_name'] = $ordLists->customer_name;
			$ordList[$ordk]['address_name'] = $ordLists->address_name;
			$ordList[$ordk]['group_priority'] = $custDetail->toArray()[0]->group_priority;
			
			$ord_det_cal = $this->Orderdetails->find()->where(['order_id' => $ordLists->id])->toArray();
			
			$ordp = 0;
			foreach($ord_det_cal as $ordDetCal){
				$ordList[$ordk]['orderDetail'][$ordp]['product_id'] = $ordDetCal->product_id;
				$prodDetail = $this->Products->find()->where(['id' => $ordDetCal->product_id]);
				$ordList[$ordk]['orderDetail'][$ordp]['item_code'] = $prodDetail->toArray()[0]->item_code;
				$ordList[$ordk]['orderDetail'][$ordp]['product_name'] = $ordDetCal->product_name;
				$ordList[$ordk]['orderDetail'][$ordp]['product_price'] = $ordDetCal->product_price;
				$ordList[$ordk]['orderDetail'][$ordp]['product_qty'] = $ordDetCal->product_qty;
				$ordp++;
			}		
			$ordk ++;
		}
		
        $this->set(compact('ordList','runDetail','date'));
        $this->set('_serialize', ['order']);
    }

    public function packing() {
    	$this->viewBuilder()->layout('admin');
    }

    public function packing_report() {
    	$this->viewBuilder()->layout('ajaxcall');
    	$this->loadModel('Orders');
		$this->loadModel('Orderdetails');
		$dt = explode("-",$this->request->data['delivery_date']);
		$day = $dt[2]."-".$dt[0]."-".$dt[1];
		
		$ordListRaw = $this->Orders->find()->where(['order_date' => $day])->contain(['Orderdetails']);
		$ordListRaw = $ordListRaw->toArray();
		//pr($ordListRaw);
		
		$report_arr = array();
		$run = array();
		foreach($ordListRaw as $k=>$arr) {
			$run[] = $arr['run_name'];
			if($arr['orderdetails']) {
				foreach($arr['orderdetails'] as $ko=>$valo) {
					if (array_key_exists($valo->product_name, $report_arr)) {
					    $exist_arr = $report_arr[$valo->product_name];
					    if(array_key_exists($arr['run_name'], $exist_arr)) {
							$report_arr[$valo->product_name][$arr['run_name']] = $exist_arr[$arr['run_name']] + $valo->product_qty;;
					    } else {
					    	$report_arr[$valo->product_name] = array_merge($report_arr[$valo->product_name], array($arr['run_name'] => $valo->product_qty));
					    }
					} else {
						$report_arr[$valo->product_name] = array($arr['run_name'] => $valo->product_qty);
					}
				} 
			} else {
				//$run = array($arr['run_name'] => 0);
			}
		}
		$run = array_unique($run);

		$this->set(compact('report_arr','day','run'));
    }

}
