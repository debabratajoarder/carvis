<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Addresses Controller
 *
 * @property \App\Model\Table\AddressesTable $Addresses
 */
class AddressesController extends AppController
{

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
        $this->paginate = [
            'contain' => ['Customers', 'Runs']
        ];
        $addresses = $this->paginate($this->Addresses);

        $this->set(compact('addresses'));
        $this->set('_serialize', ['addresses']);
    }

    /**
     * View method
     *
     * @param string|null $id Address id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null){
        $address = $this->Addresses->get($id, [
            'contain' => ['Customers', 'Runs', 'Orders']
        ]);

        $this->set('address', $address);
        $this->set('_serialize', ['address']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id=null, $name=null){
        $this->viewBuilder()->layout('admin');	
        $address = $this->Addresses->newEntity();
		//pr($address); exit;
        if ($this->request->is('post')) {
        	//pr($this->request->data); exit;
            $address = $this->Addresses->patchEntity($address, $this->request->data);
            if ($this->Addresses->save($address)) {
                $this->Flash->success(__('The address has been saved.'));
                return $this->redirect(['controller' => 'customers', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The address could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Addresses->Customers->find('list', ['limit' => 200]);
		
		
		$customers = array($id => $name);
		//$results = $customers->toArray();
		
        //$runs = $this->Addresses->Runs->find('list', ['limit' => 200]);
        $runs = $this->Addresses->Runs->find('list', [ 'keyField' => 'id', 'valueField' => 'run_name'], ['limit' => 200]);
		
		
		//$this->loadModel('Customers');
		//$query = $this->Customers->find('all');
		//$results = $query->toArray();
        //pr($runs); 
        //echo $results[0]->created;
        //pr($results); exit;
        
        
        
        
        
        $this->set(compact('address', 'customers', 'runs'));
        $this->set('_serialize', ['address']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Address id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null, $cid = null){
    	//echo $id; echo "=="; echo $cid; //exit;
		
        $this->viewBuilder()->layout('admin');	
        $address = $this->Addresses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
        	//pr($this->request->data); exit;
            $address = $this->Addresses->patchEntity($address, $this->request->data);
            if ($this->Addresses->save($address)) {
                $this->Flash->success(__('The address has been saved.'));
				if($cid != ""){
					return $this->redirect(['controller' => 'customers', 'action' => 'view', $cid]);					
				} else {
					return $this->redirect(['controller' => 'customers', 'action' => 'index']);
				}
                
				
				
            } else {
                $this->Flash->error(__('The address could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Addresses->Customers->find('list', ['limit' => 200]);
        //$runs = $this->Addresses->Runs->find('list', ['limit' => 200]);
		$runs = $this->Addresses->Runs->find('list', [ 'keyField' => 'id', 'valueField' => 'run_name'], ['limit' => 200]);
		
        $this->set(compact('address', 'customers', 'runs'));
        $this->set('_serialize', ['address']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Address id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    
    
    public function delete($id = null, $cid = null){
        $this->request->allowMethod(['post', 'delete']);
        $address = $this->Addresses->get($id);
        if ($this->Addresses->delete($address)) {
    	    $this->Flash->success(__('The address has been deleted.'));
			if($cid != ""){
				return $this->redirect(['controller' => 'customers', 'action' => 'view', $cid]);					
			} else {
				return $this->redirect(['controller' => 'customers', 'action' => 'index']);
			}			
        } else {
			$this->Flash->error(__('The address could not be deleted. Please, try again.'));	
			if($cid != ""){
				return $this->redirect(['controller' => 'customers', 'action' => 'view', $cid]);					
			} else {
				return $this->redirect(['controller' => 'customers', 'action' => 'index']);
			}        	
        }
        return $this->redirect(['controller' => 'customers', 'action' => 'index']);
    }
	
	
}
