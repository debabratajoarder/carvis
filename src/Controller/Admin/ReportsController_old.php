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

			 //$day = date("Y-m-d", strtotime($this->request->data['delivery_date'])); 
             $runid = $this->request->data['run_id'];
             //echo $runid; pr($this->request->data); echo $day; exit;
			 $order = $this->paginate($this->Orders->find('all')->distinct(['run_id'])->where(['delivery_date' => $day, 'run_id' => $runid]));
        } else {
			$day = date("Y-m-d");
			//echo $day;
			$order = $this->paginate($this->Orders->find('all')->distinct(['run_id'])->where(['delivery_date' => $day]));
					
        }
		
		$runs = $this->Orders->find();
		$runs->select(['run_id', 'run_name'])->distinct(['run_name']);
		
		$dates = $this->Orders->find();
		$dates->select(['delivery_date'])->distinct(['delivery_date'])->order(['delivery_date' => 'DESC']);		
		
		/* $runList = $this->Orders->find('all')->select('run_id','run_name')->group('run_name')->toArray();		
		pr($runList); exit; */				
		 
		//$myVal = $this->Orders->query("SELECT DISTINCT 'run_name' FROM orders;");
		//pr($runs->toArray()); pr($dates->toArray()); pr($order->toArray()); exit;						
		//$order = $this->paginate($this->order);	
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
		
		//echo date("Y-m-d", $date); 
		
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
		
		
		
		//pr($ordListRaw->toArray());
		//pr($ordList); pr($runDetail->toArray()); exit;
		
		
		
		
		/*	
		$this->viewBuilder()->layout('admin');
        $order = $this->Orders->get($id, [
            'contain' => ['Customers', 'Addresses', 'Runs', 'Orderdetails']
        ]);
		*/
		
		
	
		
		
        $this->set(compact('ordList','runDetail','date'));
        $this->set('_serialize', ['order']);
    }


    public function status($id = null){
        	
		$this->viewBuilder()->layout('admin');
        $order = $this->Orders->get($id, [
            'contain' => ['Customers', 'Addresses', 'Runs', 'Orderdetails']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            	//pr($this->request->data); exit;
            $order = $this->Orders->patchEntity($order, $this->request->data);
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
        }


	

		$payment_status = array('yes' => 'yes', 'no' => 'no');
        $this->set(compact('payment_status'));
        $this->set('order', $order);
        $this->set('_serialize', ['order']);
    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add(){
        	
			
		
		$this->viewBuilder()->layout('admin');
        $order = $this->Orders->newEntity();
        if ($this->request->is('post')) {
				
			//pr($this->request->data); exit;
			
			$this->loadModel('Customers');
			$custDetail = $this->Customers->find()->where(['id' => $this->request->data['customer_id']]);

            $order = $this->Orders->newEntity();
			$order->ordno	= $this->generateRandomString(15);
            $order->customer_id	= $this->request->data['customer_id'];
            $order->customer_name = $this->request->data['customer_name'];
			$order->address_id = $this->request->data['address_id'];
			$order->address_name = $this->request->data['address_name'];
			$order->run_id	= $this->request->data['run_id'];
			$order->run_name = $this->request->data['run_name'];
			//$order->payment_status = $this->request->data['payment_status'];
			//$order->comment = $this->request->data['comment'];
			$order->order_date = date("Y-m-d");
			$order->delivery_date = date("Y-m-d", time() + 86400);
			$order->created = date("Y-m-d");
			$order->modified = date("Y-m-d");
	
            if ($this->Orders->save($order)) {
				
				$thisOrderId = $order->id;

				$this->loadModel('Products');
				
				$this->loadModel('Products');
				
				$suplier = array();
				$supI = 1;
				$custProductDetail = "";
				foreach($this->request->data['product_idn'] as $key => $val){
					$prodDetail = $this->Products->find()->where(['id' => $val]);
					
					$this->loadModel('Orderdetails');
					$Orderdetail = $this->Orderdetails->newEntity();
		            $Orderdetail->order_id	= $thisOrderId;
		            $Orderdetail->product_id = $val;
					$Orderdetail->product_name = $prodDetail->toArray()[0]->description;
					$Orderdetail->product_price = $prodDetail->toArray()[0]->description;

					if($this->request->data['gpVal'] == "1") {
						$Orderdetail->product_price = $prodDetail->toArray()[0]->p1;
					} else if($this->request->data['gpVal'] == "2") {
						$Orderdetail->product_price = $prodDetail->toArray()[0]->p2;
					} else if($this->request->data['gpVal'] == "3") {
						$Orderdetail->product_price = $prodDetail->toArray()[0]->p3;
					} else if($this->request->data['gpVal'] == "4") {
						$Orderdetail->product_price = $prodDetail->toArray()[0]->p4;
					} else if($this->request->data['gpVal'] == "5") {
						$Orderdetail->product_price = $prodDetail->toArray()[0]->p5;
					}					

					$Orderdetail->product_qty	= $this->request->data['product_qtyn'][$key];
					$Orderdetail->created = date("Y-m-d");
					$Orderdetail->modified = date("Y-m-d");					
					$this->Orderdetails->save($Orderdetail);
					
					
					// Customer Mail Detail of Product
					$custProductDetail .= '<tr><td>'.$prodDetail->toArray()[0]->description.'</td><td>'.$Orderdetail->product_qty.'</td><td>'.$Orderdetail->product_price.'</td></tr>';
					
					// Supplier Mail Detail of Product
					if (!array_key_exists($prodDetail->toArray()[0]->supplier_id,$suplier)){
						$this->loadModel('Suppliers');
						$supplierDet = $this->Suppliers->find()->where(['id' => $prodDetail->toArray()[0]->supplier_id]);
						$suplier[$prodDetail->toArray()[0]->supplier_id]['name'] = $supplierDet->toArray()[0]->name;
						$suplier[$prodDetail->toArray()[0]->supplier_id]['email'] = $supplierDet->toArray()[0]->email;
					}
					
					$suplier[$prodDetail->toArray()[0]->supplier_id]['product'][$supI]['name'] = $prodDetail->toArray()[0]->description;
					$suplier[$prodDetail->toArray()[0]->supplier_id]['product'][$supI]['qty'] = $this->request->data['product_qtyn'][$key];
					
					$supI ++;
				}
				
					//pr($suplier); //exit;
							
					$mail_To = $custDetail->toArray()[0]->email;
					//$mail_From = "";					
					$mail_CC = "";
					$mail_subject = "Order Details From busybeewholesalebakery.";	
					$mail_Body = '<table>
									<tr><td colspan="3">busybeewholesalebakery.com new order detail.</td></tr>
									<tr><td>Order Id :</td><td>:</td><td>'.$order->ordno.'</td></tr>
									<tr><td>Despatch Address :</td><td>:</td><td>'.$this->request->data['address_name'].'</td></tr>
									<tr><td>Run No :</td><td>:</td><td>'.$this->request->data['run_name'].'</td></tr>
									<tr><td>Order Date :</td><td>:</td><td>'.date("Y-m-d").'</td></tr>
									<tr><td>Delivery Date :</td><td>:</td><td>'.date("Y-m-d", time() + 86400).'</td></tr>		
								  </table>';								  
					$mail_Body .= '<table border="1"><tr><td>Product Name</td><td>Qty</td><td>Price</td></tr>'.$custProductDetail.'</table>';								  
					$mail_Body .= '<table>
									<tr><td colspan="3">From : busybeewholesalebakery.com Admin</td></tr>
								  </table>';								  
					
					$this->Send_HTML_Mail($mail_To, $mail_CC, $mail_subject, $mail_Body);
					
					
					foreach($suplier as $key => $supl){
						$suplProductDetail = "";	
						foreach($supl['product'] as $suplOrd){	
						// Supliers Mail Detail of Product
						$suplProductDetail .= '<tr><td>'.$suplOrd['name'].'</td><td></td><td>'.$suplOrd['qty'].'</td></tr>';							
								
						}	
							
						$mail_To = $supl['email'];
						//$mail_From = "";					
						$mail_CC = "";
						$mail_subject = "Order Details From busybeewholesalebakery.";	
						$mail_Body = '<table>
										<tr><td colspan="3">busybeewholesalebakery.com new order detail.</td></tr>
										<tr><td>Order Id :</td><td>:</td><td>'.$order->ordno.'</td></tr>
										<tr><td>Order Date :</td><td>:</td><td>'.date("Y-m-d").'</td></tr>
										<tr><td>Delivery Date :</td><td>:</td><td>'.date("Y-m-d", time() + 86400).'</td></tr>		
									  </table>';								  
						$mail_Body .= '<table border="1"><tr><td>Product Name</td><td></td><td>Qty</td></tr>'.$suplProductDetail.'</table>';								  
						$mail_Body .= '<table>
										<tr><td colspan="3">From : busybeewholesalebakery.com Admin</td></tr>
									  </table>';								  
						
						
						
						$this->Send_HTML_Mail($mail_To, $mail_CC, $mail_subject, $mail_Body);
											
					}

				

                $this->Flash->success(__('The order has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
            	
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
			
        }
        $customers = $this->Orders->Customers->find('list', ['limit' => 200]);
        //pr($customers->toArray()); exit;
        
        $this->loadModel('Products');
        $products = $this->Products->find('all');
        //pr($products->toArray()); exit;
		
		$yesNoCond = array('yes' => 'Yes', 'no' => 'No');
        $addresses = $this->Orders->Addresses->find('list', ['limit' => 200]);
        $runs = $this->Orders->Runs->find('list', ['limit' => 200]);
		
        $this->set(compact('order', 'customers', 'addresses', 'runs','products','yesNoCond'));
        $this->set('_serialize', ['order']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null){
        	
			
		$this->viewBuilder()->layout('admin');
        $order = $this->Orders->get($id, [
            'contain' => []
        ]);
		
		
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->data);
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
        }
		
		
		
		
		
        $customers = $this->Orders->Customers->find('list', ['limit' => 200]);
        $addresses = $this->Orders->Addresses->find('list', ['limit' => 200]);
        $runs = $this->Orders->Runs->find('list', ['limit' => 200]);
        $this->set(compact('order', 'customers', 'addresses', 'runs'));
        $this->set('_serialize', ['order']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null){
        	
		$this->viewBuilder()->layout('admin');
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	
	
	public function getCustomerLocation(){
        $this->viewBuilder()->layout('ajaxcall');
        $this->loadModel('Addresses');
        $address = $this->Addresses->find('list', ['keyField' => 'id', 'valueField' => 'address'])->where(['customer_id' => $_POST['id']]);
        //pr($address->toArray()); exit;
		if(!empty($address->toArray())){ $this->set(compact('address')); } else { $this->autoRender = false; echo "blank"; exit; }
    }
	
	
	public function getCustomerDetail(){
        $this->viewBuilder()->layout('ajaxcall');
        $this->autoRender = false;
        

        $customers = $this->Orders->Customers->get($_POST['id']);

		$detData['name'] = $customers->name; 
		$detData['gpval'] = $customers->group_priority;  
	
		
        
		$this->autoRender = false;
		if(!empty($customers->toArray())){ echo json_encode($detData); exit; } else { echo 'blank'; exit; }		
		
    }	
	
	
	public function getTempleteDetail(){
        $this->viewBuilder()->layout('ajaxcall');
		
		$this->loadModel('Templates');
		$templt = $this->Templates->find('all');
		$filtered = $templt->where(['customer_id' => 2])->order(['created' => 'DESC']);
			
		//pr($templt->toArray()); exit;
		foreach($templt as $tval){
			$templ[$tval['id']] = $tval['day'];
			
		}
		
		//pr($templ); exit;
        //$address = $this->Addresses->find('list', ['keyField' => 'id', 'valueField' => 'address'])->where(['customer_id' => $_POST['id']]);

		if(!empty($templ)){ $this->set(compact('templ')); } else { $this->autoRender = false; echo "blank"; exit; }	
		
    }	
	

	public function getTempleteData(){
        $this->viewBuilder()->layout('ajaxcall');
		//pr($_POST); //exit;
		$this->loadModel('Templates');
		$templt = $this->Templates->find('all');
		$filtered = $templt->where(['id' => $_POST['id']])->order(['created' => 'DESC']);
		
		$tmpOrderJsondet = json_decode($templt->toArray()[0]->detail);
		//echo $templt->toArray()[0]->detail;
		//pr($tmpOrderJson); exit;

        $this->loadModel('Products');
        $products = $this->Products->find('all');

		$this->loadModel('Customers');
        $custDetail = $this->Customers->get($_POST['custId']);
		
		//pr($custDetail->toArray()); exit;
		
		//pr($templt->toArray()); exit;
		
		$tProd = array(); $ik = 0;
		foreach($tmpOrderJsondet as $templeteProd){
				$tmpOrderJson[$ik]['id'] = $templeteProd->id;
				$tmpOrderJson[$ik]['qty'] = $templeteProd->qty;
				$tmpOrderJson[$ik]['pricestd'] = $custDetail->group_priority;
				$tmpOrderJson[$ik]['runData'] = $_POST['runData'];
				
				$prod = $this->Products->find('all');
				$filtered = $prod->where(['id' => $templeteProd->id]);				
				
				
				$tmpOrderJson[$ik]['detail'] = $prod->toArray()[0];
				$ik ++;
		}


		//$result['finval'] = 50;
		
		$this->set(compact('tmpOrderJson','products'));
		
		
		//echo $result['view']; exit;
		
		


		//pr($tmpOrderJson); exit;
		
		//$result['view'] = htmlentities($this->render('get_templete_data'));
		//$result['view'] = htmlentities($this->render('get_templete_data')); $rs = json_encode($result); echo $rs; exit;
		
		
		$this->set(compact('tmpOrderJson','products'));

    }
	
	
	
	public function getFinalDetail(){
        $this->viewBuilder()->layout('ajaxcall');
	
		
		
		//pr($_POST); //exit;
		$this->loadModel('Templates');
		$templt = $this->Templates->find('all');
		$filtered = $templt->where(['id' => $_POST['id']])->order(['created' => 'DESC']);
		
		$tmpOrderJsondet = json_decode($templt->toArray()[0]->detail);

        $this->loadModel('Products');
        $products = $this->Products->find('all');

		$this->loadModel('Customers');
        $custDetail = $this->Customers->get($_POST['custId']);
		
				
		$tProd = array(); $ik = 0;
		foreach($tmpOrderJsondet as $templeteProd){
				$tmpOrderJson[$ik]['id'] = $templeteProd->id;
				$tmpOrderJson[$ik]['qty'] = $templeteProd->qty;
				$tmpOrderJson[$ik]['pricestd'] = $custDetail->group_priority;
				$tmpOrderJson[$ik]['runData'] = $_POST['runData'];
				
				$prod = $this->Products->find('all');
				$filtered = $prod->where(['id' => $templeteProd->id]);				
				
				
				$tmpOrderJson[$ik]['detail'] = $prod->toArray()[0];
				$ik ++;
		}
		
		$finalAmount = 0;
		foreach ($tmpOrderJson as $tmpOrderJsonData) {
			
			if($tmpOrderJsonData['pricestd'] == "1") {
				$tmpOrderJsonData['finpricestd'] = $tmpOrderJsonData['detail']->p1;
				$new_vals = $tmpOrderJsonData['finpricestd'] * $tmpOrderJsonData['qty'];
			} else if($tmpOrderJsonData['pricestd'] == "2") {
				$tmpOrderJsonData['finpricestd'] = $tmpOrderJsonData['detail']->p2;
				$new_vals = $tmpOrderJsonData['finpricestd'] * $tmpOrderJsonData['qty'];
			} else if($tmpOrderJsonData['pricestd'] == "3") {
				$tmpOrderJsonData['finpricestd'] = $tmpOrderJsonData['detail']->p3;
				$new_vals = $tmpOrderJsonData['finpricestd'] * $tmpOrderJsonData['qty'];
			} else if($tmpOrderJsonData['pricestd'] == "4") {
				$tmpOrderJsonData['finpricestd'] = $tmpOrderJsonData['detail']->p4;
				$new_vals = $tmpOrderJsonData['finpricestd'] * $tmpOrderJsonData['qty'];
			} else if($tmpOrderJsonData['pricestd'] == "5") {
				$tmpOrderJsonData['finpricestd'] = $tmpOrderJsonData['detail']->p5;
				$new_vals = $tmpOrderJsonData['finpricestd'] * $tmpOrderJsonData['qty'];
			}	
			$finalAmount = $finalAmount + $new_vals;
		} 
		
		//echo $finalAmount; exit;
		if($finalAmount != 0 ){ $this->autoRender = false; echo $finalAmount; exit; } else { $this->autoRender = false; echo "blank"; exit; }

    }	
	
	
	
	public function getNewDetail(){
        $this->viewBuilder()->layout('ajaxcall');

        $this->loadModel('Products');
        $products = $this->Products->find('all');


		$this->set(compact('products'));

    }	
	
	public function getRunDetail(){

        $this->viewBuilder()->layout('ajaxcall');
		
        $this->loadModel('Addresses');
		$this->loadModel('Runs');
		
		$address = $this->Addresses->find('all', ['conditions'=> ['id' => $_POST['id']]]);
		$runid = $address->toArray()[0]->run_id; $runid = $address->toArray()[0]->run_id; 
		$run = $this->Runs->find('all', ['conditions'=> ['id' => $runid]]);
		
		$detData['name'] = $address->toArray()[0]->address; 
		$detData['rid'] = $run->toArray()[0]->id; 
		$detData['rname'] = $run->toArray()[0]->run_name; 
		
		
		//echo $address['run_id']; echo "--"; echo $address->toArray()[0]->address;
        
		$this->autoRender = false;
		if(!empty($address)  && !empty($run)){ echo json_encode($detData); exit; } else { echo 'blank'; exit; }

    }	
	
	
	public function getProductDetail(){
        $this->viewBuilder()->layout('ajaxcall');
		$this->autoRender = false;
		
        $this->loadModel('Products');
		$this->loadModel('Suppliers');
        $prod = $this->Products->find('all', ['conditions'=> ['id' => $_POST['id']]]);
        $supl = $this->Suppliers->find('all', ['conditions'=> ['id' => $prod->toArray()[0]->supplier_id]]);
        
        //pr($prod->toArray()); exit;
		$pval = $_POST['priceVal'];

		
		
		$prodDetail = $prod->toArray()[0]->id." | ".$prod->toArray()[0]->description." | ".$prod->toArray()[0]->weight." | Price : ".$prod->toArray()[0]->$pval;
		
		
		$retValue = '<div class="input col-md-12"><label class="col-md-6">'.$prodDetail.'</label>';
		$retValue .= '</div><div class="clearfix"></div><div class="input col-md-12">';
		$retValue .= '<label >Suppliers : '.$supl->toArray()[0]->name.'</label></div>';			

		
		
		
		if(!empty($prod->toArray())){ echo $retValue; exit; } else { echo 'blank'; exit; }
    }	
	
	
	
}
