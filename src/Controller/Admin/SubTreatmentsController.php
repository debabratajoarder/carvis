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
class SubTreatmentsController extends AppController {

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
        $this->loadModel('Treatments');
        $this->viewBuilder()->layout('admin');
        $treatment = $this->paginate($this->Treatments,['limit' => 10, 'conditions' => ['Treatments.parent_id !=' => 0]]);

        //pr($treatment); exit;
        
        //$query = $this->Treatments->find('all')->where(['parent_id !=' => 0]);
        //$this->set('treatment', $this->paginate($query));
        
        $this->set(compact('treatment'));
        $this->set('_serialize', ['treatment']);
    }

    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $this->loadModel('Treatments');
        $this->viewBuilder()->layout('admin');
        $treatments = $this->Treatments->get($id);

        //$results = $customer->toArray(); pr($results); exit;

        $this->set('treatments', $treatments);
        $this->set('_serialize', ['treatments']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->loadModel('Treatments');
        $this->viewBuilder()->layout('admin');
        $treatment = $this->Treatments->newEntity();
        
        if ($this->request->is('post')) {
            
            //pr($this->request->data); exit;
            //$treatmenExist = $this->Treatments->find()->where(['slug' => $this->request->data['slug']]) ;
            
            $tableRegObj = TableRegistry::get('Treatments');
            $treatmenExist = $tableRegObj
                            ->find()
                            ->where(['slug' => $this->request->data['slug']])->toArray();
            
            
            //pr($treatmenExist); exit;
            //pr($this->request->data); exit;
            
            $flag = true;
            
            if($this->request->data['name'] == ""){
                $this->Flash->error(__('Name can not be null. Please, try again.')); $flag = false;
            }            
            if($flag){
                if($this->request->data['slug'] == ""){
                    $this->Flash->error(__('Slug can not be null. Please, try again.')); $flag = false;
                }            
            }
            
            if($flag){
                if($this->request->data['parent_id'] == ""){
                    $this->Flash->error(__('Please Choose Parent Treatment. Please, try again.')); $flag = false;
                }                 
            }
            
            if($flag){
                if( $treatmenExist ){
                    $this->Flash->error(__('Slug already Exist. Please, change some text to make it unique.')); $flag = false;
                } 
            }

            if($flag){
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                if (!empty($this->request->data['image']['name'])) {
                    $file = $this->request->data['image']; //put the data into a var for easy use
                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    $fileName = time() . "." . $ext;
                    if (in_array($ext, $arr_ext)) {
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'treatment_img' . DS . $fileName);
                        $file = $fileName;
                    } else {
                        $flag = false;
                        $this->Flash->error(__('Upload image only jpg,jpeg,png files.'));
                    }
                } else {
                    $flag = false;
                    $this->Flash->error(__('Upload image For Sub Treatment.'));
                }                
            }            
            
            if($flag){
                
                $this->request->data['image'] = $file;
                $treatment = $this->Treatments->patchEntity($treatment, $this->request->data);

                if ($this->Treatments->save($treatment)) {
                    $this->Flash->success(__('Sub Treatments has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('Sub Treatments could not be saved. Please, try again.'));
                }
            }
        } 
        
        $tableRegObj = TableRegistry::get('Treatments');
        $query = $tableRegObj->find('list', [ 'conditions' => ['is_active' => 1,'parent_id' => 0]]);
        $treatmentlist = $query->all()->toArray();         
        
        
        $this->loadModel('Categories'); 
        $tableRegObj = TableRegistry::get('Categories');
        $query = $tableRegObj->find('list', [ 'conditions' => ['is_active' => 1]]);
        $category = $query->all()->toArray();        
        
        $this->set(compact('treatment','treatmentlist','category'));
        $this->set('_serialize', ['treatment','treatmentlist','category']);        
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $this->loadModel('Treatments');
        $this->viewBuilder()->layout('admin');
        $treatment = $this->Treatments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            
            //pr($this->request->data); exit;
            
             $tableRegObj = TableRegistry::get('Treatments');
             $treatmenExist = $tableRegObj
                            ->find()
                            ->where(['slug' => $this->request->data['slug'],'id !='=> $id])->toArray();
            
            
            
            //pr($getAllResults); exit;
            //pr($this->request->data); exit;
            
            $flag = true;
            
            if($this->request->data['name'] == ""){
                $this->Flash->error(__('Name can not be null. Please, try again.')); $flag = false;
            }    
            
            if($flag){
                if($this->request->data['slug'] == ""){
                    $this->Flash->error(__('Slug can not be null. Please, try again.')); $flag = false;
                }  
            }
            
            if($flag){
                if($this->request->data['parent_id'] == ""){
                    $this->Flash->error(__('Please Choose Parent Treatment. Please, try again.')); $flag = false;
                }                 
            }            
            
            if($flag){
                if( $treatmenExist ){
                    $this->Flash->error(__('Slug already Exist. Please, change some text to make it unique.')); $flag = false;
                } 
            }
            
            if($flag){
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                if (!empty($this->request->data['image']['name'])) {
                    $file = $this->request->data['image']; //put the data into a var for easy use
                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    $fileName = time() . "." . $ext;
                    if (in_array($ext, $arr_ext)) {
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'treatment_img' . DS . $fileName);
                        $file = $fileName;
                        if ($treatment->image != $fileName) {
                            $filePath = WWW_ROOT . 'treatment_img' . DS . $treatment->image;
                            if (file_exists($filePath)) {
                                unlink($filePath);
                            }
                        }                         
                    } else {
                        $flag = false;
                        $this->Flash->error(__('Upload image only jpg,jpeg,png files.'));
                    }
                } else {
                    $file = $treatment->image;
                }                
            }             

            if($flag){
                $this->request->data['image'] = $file;
                $treatment = $this->Treatments->patchEntity($treatment, $this->request->data);
                if ($this->Treatments->save($treatment)) {
                    $this->Flash->success(__('Sub Treatments detail has been updated.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('Sub Treatments detail could not be update. Please, try again.'));
                }
            }
        } 

        
        $tableRegObj = TableRegistry::get('Treatments');
        $query = $tableRegObj->find('list', [ 'conditions' => ['is_active' => 1,'parent_id' => 0]]);
        $treatmentlist = $query->all()->toArray();         
        
        $this->loadModel('Categories'); 
        $tableRegObj = TableRegistry::get('Categories');
        $query = $tableRegObj->find('list', [ 'conditions' => ['is_active' => 1]]);
        $category = $query->all()->toArray();        
        
        $this->set(compact('treatment','treatmentlist','category'));
        $this->set('_serialize', ['treatment','treatmentlist','category']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    
    public function delete($id = null) {
        $this->loadModel('Treatments');
        //$this->request->allowMethod(['post', 'delete']);
        $treatment = $this->Treatments->get($id);
        if ($this->Treatments->delete($treatment)) {
            if ($treatment->image != "") {
                $filePath = WWW_ROOT . 'treatment_img' . DS . $treatment->image;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }            
            $this->Flash->success(__('Sub Treatments has been deleted.'));
        } else {
            $this->Flash->error(__('Sub Treatments could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }    
    
    

}
