<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController {

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
        $this->paginate = [
            'contain' => ['Suppliers']
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
        $this->set('_serialize', ['products']);
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null, $sid = null){
        
		$this->viewBuilder()->layout('admin');	
        $product = $this->Products->get($id, [
            'contain' => ['Suppliers', 'Orderdetails']
        ]);
		
		$this->set('sid', $sid);
        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null, $name = ""){

		//echo $id; echo "--"; echo $name; exit;
		$name = urldecode($name);
		
		$this->viewBuilder()->layout('admin');	
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            //pr($_POST); exit;
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));
				return $this->redirect(['action' => 'index']);
				//return $this->redirect(['controller' =>'suppliers', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $suppliers = $this->Products->Suppliers->find('list', ['limit' => 200]);
		//$suppliers = array($id => $name);
		$yesNoCond = array('yes' => 'Yes', 'no' => 'No');
        $this->set(compact('product', 'suppliers','yesNoCond'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null, $sid = null, $name = ""){
        	
		$this->viewBuilder()->layout('admin');
		
		$name = urldecode($name);
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['action' => 'index']);
				//return $this->redirect(['controller' =>'suppliers', 'action' => 'productlist', $sid, $name]);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $suppliers = $this->Products->Suppliers->find('list', ['limit' => 200]);
		//$suppliers = array($sid => $name);
		$yesNoCond = array('yes' => 'Yes', 'no' => 'No');
		
        $this->set(compact('product', 'suppliers','yesNoCond'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
     
    public function delete($id = null, $sid = null, $sname = null){
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
        //return $this->redirect(['controller' =>'suppliers', 'action' => 'productlist', $sid, $sname]);
    }
}
