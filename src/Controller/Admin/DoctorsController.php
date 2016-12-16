<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;

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
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    /*
      public function beforeFilter(Event $event) {
      if (!$this->request->session()->check('Auth.Admin')) {
      return $this->redirect(
      ['controller' => 'Users', 'action' => 'index']
      );
      }
      }

     */

    public function index() {
        $this->viewBuilder()->layout('admin');
        $this->loadModel('Users');
        
        $this->paginate = ['conditions' => ['utype' => 'U']];

        //$this->set('disciplines', $this->paginate($this->Users));
        
        $doctors = $this->paginate($this->Users);
        pr($doctors);
        
        
        
        
        $this->set(compact('doctors'));
        $this->set('_serialize', ['doctors']);
    }

    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {

        $this->viewBuilder()->layout('admin');
        $doctors = $this->Doctors->get($id);

        //$results = $customer->toArray(); pr($results); exit;

        $this->set('doctors', $doctors);
        $this->set('_serialize', ['doctors']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {

        $this->viewBuilder()->layout('admin');
        $doctor = $this->Doctors->newEntity();
        if ($this->request->is('post')) {

            $doctors = $this->Doctors->patchEntity($doctor, $this->request->data);
            
            $this->request->data['created'] = gmdate("Y-m-d h:i:s");
            $this->request->data['modified'] = gmdate("Y-m-d h:i:s"); 
            
            if ($this->Doctors->save($doctors)) {
                $this->Flash->success(__('The Doctor has been saved.'));
                //pr($this->request->data); pr($doctors); exit;
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Doctor could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data['first_name'] = '';
            $this->request->data['last_name'] = '';
            $this->request->data['phone'] = '';
            $this->request->data['username'] = '';
            $this->request->data['email'] = '';
        }

        $this->set(compact('doctor'));
        $this->set('_serialize', ['doctor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {

        $this->viewBuilder()->layout('admin');
        $doctor = $this->Doctors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $doctor = $this->Doctors->patchEntity($doctor, $this->request->data);
            $this->request->data['modified'] = gmdate("Y-m-d h:i:s");
            if ($this->Doctors->save($doctor)) {
                $this->Flash->success(__('Doctor detail has been updated.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Doctors detail could not be update. Please, try again.'));
            }
        } else {
            $this->request->data = $doctor->toArray();
        }

        
        
        $this->set(compact('doctor'));
        $this->set('_serialize', ['doctor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    
    public function delete($id = null) {
        //$this->request->allowMethod(['post', 'delete']);
        $doctor = $this->Doctors->get($id);
        if ($this->Doctors->delete($doctor)) {
            $this->Flash->success(__('Doctors has been deleted.'));
        } else {
            $this->Flash->error(__('Doctors could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function addresslist($id = null) {
        $this->viewBuilder()->layout('admin');
        //echo $id; exit;
        //$this->loadModel('Addrs'); $addr = $this->Addrs->find()->where(['customer_id' => $id]);
        //$adresses = TableRegistry::get('Adresses'); $adresses->find('all');

        $address = $this->Customers->Addresses->find()->contain(['Runs', 'Customers'])->where(['customer_id' => $id]);


        //$results = $address->toArray(); pr($results); exit;
        $address = $this->paginate($address);
        //$results = $address->toArray();
        //echo $id; pr($results); exit;

        $this->set(compact('address'));
        $this->set('_serialize', ['address']);
    }

}