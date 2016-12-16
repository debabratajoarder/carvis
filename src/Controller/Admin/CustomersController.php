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
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 */
class CustomersController extends AppController {

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
	
        $customers = $this->paginate($this->Customers);
        $this->set(compact('customers'));
        $this->set('_serialize', ['customers']);
    }

    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null){
        	
		$this->viewBuilder()->layout('admin');	
        $customer = $this->Customers->get($id, [
            'contain' => ['Addresses', 'Orders', 'Templates']
        ]);
		
		//$results = $customer->toArray(); pr($results); exit;
		
		
		
        $this->set('customer', $customer);
        $this->set('_serialize', ['customer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add(){
        
		$this->viewBuilder()->layout('admin');	
        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The customer could not be saved. Please, try again.'));
            }
        }
		
		
		$grprority = array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5');
		
        $this->set(compact('customer','grprority'));
        $this->set('_serialize', ['customer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null){
        	
		$this->viewBuilder()->layout('admin');	
        $customer = $this->Customers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The customer could not be saved. Please, try again.'));
            }
        }

		$grprority = array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5');
        $this->set(compact('customer','grprority'));

        $this->set('_serialize', ['customer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('The customer has been deleted.'));
        } else {
            $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }



    public function addresslist($id = null){
        $this->viewBuilder()->layout('admin');
        //echo $id; exit;
		//$this->loadModel('Addrs'); $addr = $this->Addrs->find()->where(['customer_id' => $id]);
		//$adresses = TableRegistry::get('Adresses'); $adresses->find('all');
		
		$address = $this->Customers->Addresses->find()->contain(['Runs','Customers'])->where(['customer_id' => $id]);
		
		
		//$results = $address->toArray(); pr($results); exit;
		$address = $this->paginate($address);
		//$results = $address->toArray();
		//echo $id; pr($results); exit;
		
		$this->set(compact('address'));
        $this->set('_serialize', ['address']);
		
	}


}
