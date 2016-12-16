<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

use Cake\I18n\FrozenDate;
use Cake\Database\Type; 
Type::build('date')->setLocaleFormat('yyyy-MM-dd');

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 */
class CategoriesController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['index', 'view','edit','chstatus']); 
    }

    public $uses = array('User', 'Admin');    
    
    
    
    
    
    
    
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
       
        $this->loadModel('Categories');
        $this->viewBuilder()->layout('admin');
        $category = $this->paginate($this->Categories,['limit' => 10]);
        $this->set(compact('category'));
        $this->set('_serialize', ['category']); 

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
        $category = $this->Categories->get($id);
        //pr($category); exit;
        //$results = $customer->toArray(); pr($results); exit;

        $this->set('category', $category);
        $this->set('_serialize', ['category']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {

        //$this->viewBuilder()->layout('admin');
        $category = $this->Categories->get($id, [ 'contain' => [] ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            
            //pr($this->request->data); exit;
            
             $tableRegObj = TableRegistry::get('Categories');
             $slugExist = $tableRegObj
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
                if( $slugExist ){
                    $this->Flash->error(__('Slug already Exist. Please, change some text to make it unique.')); $flag = false;
                }      
            }
            
            if($flag){
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                if (!empty($this->request->data['image']['name'])) {
                    $file = $this->request->data['image']; //put the data into a var for easy use
                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    
                    if($category->image != "") { $fileName = $category->image; } else { $fileName = time() . "." . $ext; }  
                    
                    if (in_array($ext, $arr_ext)) {
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'category_img' . DS . $fileName);
                        $this->request->data['image'] = $fileName;
                    } else {
                        $flag = false;
                        $this->Flash->error(__('Upload image only jpg,jpeg,png files.'));
                        
                    }
                } else {
                    $this->request->data['image'] = $category->image;
                }                
            }             
            
            
            
            
            
            if($flag){
                $category = $this->Categories->patchEntity($category, $this->request->data);
                if ($this->Categories->save($category)) {
                    $this->Flash->success(__('Category detail has been updated.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('Category detail could not be update. Please, try again.'));
                }
            }
        } 

        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }

    public function chstatus($id = null, $status = null) {
        
        $this->loadModel('Categories'); 
        $tableRegObj = TableRegistry::get('Categories');
        $query = $tableRegObj->find('all', [ 'conditions' => ['id' => $id]]);
        $row = $query->first()->toArray();
        //pr($row); exit;
        if($row){
            $subquestion = TableRegistry::get('Categories');
            $query = $subquestion->query();
            if($status == 1){
                $query->update()->set(['is_active' => 1])->where(['id' => $id])->execute();
                $this->Flash->success(__('Category Questions has been activated.'));
            } else if($status == 0){
                $query->update()->set(['is_active' => 0])->where(['id' => $id])->execute(); 
                $this->Flash->success(__('Category Questions has been suspended.'));
            }
        } else {
            $this->Flash->error(__('Category Questions Not Found.'));
        }
        
        return $this->redirect(['action' => 'index']);
        
    }   

}
