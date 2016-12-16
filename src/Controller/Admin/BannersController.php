<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\View\Helper;
/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 */
class BannersController extends AppController {

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
        //pr($this->request->session()->check('Auth.Admin')); pr($this->request->session()->read('Auth.Admin')); exit;

        $this->viewBuilder()->layout('admin');
        $faqs = $this->paginate($this->Faqs);
        $this->set(compact('faqs'));
        $this->set('_serialize', ['faqs']);
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
    

    public function add() {
        //$this->viewBuilder()->layout('admin');
        
        $this->loadModel('SiteSettings');
        $data = $this->site_setting();
        if ($this->request->is('post')) {
            $arr_ext = array('jpg', 'jpeg', 'gif','png');
            if (!empty($this->request->data['site_logo']['name'])) {
                $file = $this->request->data['site_logo']; //put the data into a var for easy use
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $fileName = 'logo.' . $ext;
                if (in_array($ext, $arr_ext)) {
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'logo' .DS. $fileName);
                    if($data['site_logo'] != ""){
                        if( $data['site_logo'] != $fileName ){
                            $filePath = WWW_ROOT . 'logo' .DS.$data['site_logo'];
                            if (file_exists($filePath)) {
                                unlink($filePath);
                            }
                        }
                    }
                    $logo_name = $fileName;
                }
            } else {
                $logo_name = $data['site_logo'];
            }
      

            $sitesettings = TableRegistry::get('SiteSettings');
            $query = $sitesettings->query();
            
            if ( $query->update()->set(['site_logo' => $logo_name, 'site_favicon'=>$favicon_name ])->where(['id' => $data['id']])->execute() ) {
                $this->Flash->success(__('The Site Settings has been saved.'));
                return $this->redirect(['action' => 'logo']);
            } else {
                $this->Flash->error(__('The Site Settings could not be saved. Please, try again.'));
            }
        }

        $id = 1;
        $sitesettings = $this->SiteSettings->get($id);
        //$doctors = $this->paginate($this->Sitesettings);
        $this->set(compact('sitesettings'));
        $this->set('_serialize', ['sitesettings']);
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
            if ($this->Doctors->save($doctor)) {
                $this->Flash->success(__('Doctor detail has been updated.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Doctors detail could not be update. Please, try again.'));
            }
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
        $this->request->allowMethod(['post', 'delete']);
        $doctor = $this->Doctors->get($id);
        if ($this->Doctors->delete($doctor)) {
            $this->Flash->success(__('Doctors has been deleted.'));
        } else {
            $this->Flash->error(__('customer could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }


}
