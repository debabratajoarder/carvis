<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

use Cake\I18n\FrozenDate;
use Cake\Database\Type; 
Type::build('date')->setLocaleFormat('yyyy-MM-dd');


/**
 * Runs Controller
 *
 * @property \App\Model\Table\RunsTable $Runs
 */
class NewsesController extends AppController {

    public function beforeFilter(Event $event) {
        if (!$this->request->session()->check('Auth.Admin')) {
            return $this->redirect(['controller' => 'Users', 'action' => 'index']
            );
        }
    }

    public function index() {
        //pr($this->request->session()->check('Auth.Admin')); pr($this->request->session()->read('Auth.Admin')); exit;

        $this->viewBuilder()->layout('admin');
        $news = $this->paginate($this->Newses);
        $this->set(compact('news'));
        $this->set('_serialize', ['news']);
    }

    /**
     * View method
     *
     * @param string|null $id Run id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $this->viewBuilder()->layout('admin');
        $news = $this->Newses->get($id, [ 'contain' => [] ]);

        $this->set('news', $news);
        $this->set('_serialize', ['news']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->viewBuilder()->layout('admin');
        $news = $this->Newses->newEntity();
        if ($this->request->is('post')) {
            
            //pr($this->request->data); //exit;
            $flag = true;
            if($this->request->data['title'] == ""){
                $this->Flash->error(__('Newses Title can not be null. Please, try again.')); $flag = false;
            }
            if($flag){
                if($this->request->data['sortdetail'] == ""){
                    $this->Flash->error(__('Newses Sort Detail can not be null. Please, try again.')); $flag = false;
                }
            }            
            
            if($flag){
                if($this->request->data['detail'] == ""){
                    $this->Flash->error(__('Newses Detail can not be null. Please, try again.')); $flag = false;
                }
            }

            if($flag){
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                if (!empty($this->request->data['image']['name'])) {
                    $file = $this->request->data['image']; //put the data into a var for easy use
                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    //if($category->image != "") { $fileName = $category->image; } else { $fileName = time() . "." . $ext; }  
                    $fileName = time() . "." . $ext;
                    if (in_array($ext, $arr_ext)) {
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'news_img' . DS . $fileName);
                        $this->request->data['img'] = $fileName;
                    } else {
                        $flag = false;
                        $this->Flash->error(__('Upload image only jpg,jpeg,png files.'));
                    }
                }                
            }             

            if($flag){
                $this->request->data['created'] = gmdate("Y-m-d h:i:s");
                $this->request->data['modified'] = gmdate("Y-m-d h:i:s");
                $news = $this->Newses->patchEntity($news, $this->request->data);
                if ($result = $this->Newses->save($news)) {
                    $record_id = $result->id;
                    if(!empty($this->request->data['category_id'])){
                        $this->loadModel('NewsCategories');
                        $newscategoriesTable = TableRegistry::get ('NewsCategories');
                        $oQuery = $newscategoriesTable->query();
                        foreach($this->request->data['category_id'] as $k => $v){
                            $data['news_id'] = $record_id;
                            $data['category_id'] = $v;
                            $oQuery->insert (['news_id','category_id'])->values ($data); // person array contains name and title
                        }
                        $oQuery->execute ();                        
                    }
                    $this->Flash->success(__('Newses has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('Newses could not be saved. Please, try again.'));
                }
            }
        }

        $this->loadModel('Treatments'); 
        $tableRegObj = TableRegistry::get('Treatments');
        $query = $tableRegObj->find('list', [ 'conditions' => ['is_active' => 1]]);
        $treatments = $query->all()->toArray();     
        
        $this->loadModel('Categories'); 
        $tableRegObj = TableRegistry::get('Categories');
        $query = $tableRegObj->find('list', [ 'conditions' => ['is_active' => 1]]);
        $category = $query->all()->toArray();        
        
        $treatments[0] = "Genaral";
        //pr($treatments); exit;
        
        $this->set(compact('news','treatments','category'));
        $this->set('_serialize', ['news','treatments','category']);
    }

    public function edit($id = null) {
        $this->viewBuilder()->layout('admin');
        $news = $this->Newses->get($id, ['contain' => ['NewsCategories']]);
        pr($news); exit;
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            //pr($news);
            //pr($this->request->data); exit;
            
            $flag = true;
            if($this->request->data['title'] == ""){
                $this->Flash->error(__('Newses Title can not be null. Please, try again.')); $flag = false;
            }
            
            if($flag){
                if($this->request->data['sortdetail'] == ""){
                    $this->Flash->error(__('Newses Sort Detail can not be null. Please, try again.')); $flag = false;
                }
            }            
            
            if($flag){
                if($this->request->data['detail'] == ""){
                    $this->Flash->error(__('Newses Detail can not be null. Please, try again.')); $flag = false;
                }
            }

            if($flag){
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                if (!empty($this->request->data['image']['name'])) {
                    $file = $this->request->data['image']; //put the data into a var for easy use
                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    
                    if ($news->img != "") {
                        $filePath = WWW_ROOT . 'news_img' . DS . $news->img;
                        if (file_exists($filePath)) {
                           $fileName = $news->img;
                        } else {
                           $fileName = time() . "." . $ext;
                        }
                    } else {
                        $fileName = time() . "." . $ext;
                    }
                    //if($news->image != "") { $fileName = $news->image; } else { $fileName = time() . "." . $ext; }
                    if (in_array($ext, $arr_ext)) {
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'news_img' . DS . $fileName);
                        $this->request->data['img'] = $fileName;
                    } else {
                        $flag = false;
                        $this->Flash->error(__('Upload image only jpg,jpeg,png files.'));
                        
                    }
                } else {
                    $this->request->data['img'] = $news->img;
                }                
            } 
            
            //pr($this->request->data);
            if($flag){         
                $this->request->data['created'] = gmdate("Y-m-d h:i:s");
                $this->request->data['modified'] = gmdate("Y-m-d h:i:s");
                //pr($this->request->data); exit;
                $newses = $this->Newses->patchEntity($news, $this->request->data);
                //pr($news);exit;
                if ($this->Newses->save($newses)) {
                        $this->loadModel('NewsCategories');
                        $this->NewsCategories->query()->delete()->where(['news_id' => $id])->execute();
                        if(!empty($this->request->data['category_id'])){
                            $newscategoriesTable = TableRegistry::get ('NewsCategories');
                            $oQuery = $newscategoriesTable->query();
                            foreach($this->request->data['category_id'] as $k => $v){
                                $data['news_id'] = $id;
                                $data['category_id'] = $v;
                                $oQuery->insert (['news_id','category_id'])->values ($data); // person array contains name and title
                            }
                            $oQuery->execute ();                            
                        }
                    $this->Flash->success(__('Newses has been updated.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('Newses could not be updated. Please, try again.'));
                }                
            }           

        }
        
        //echo $news->created->format('Y-m-d h:i:s A'); exit;
        
        //pr($news->toArray()); exit; 
        $this->loadModel('Treatments'); 
        $tableRegObj = TableRegistry::get('Treatments');
        $query = $tableRegObj->find('list', [ 'conditions' => ['is_active' => 1]]);
        $treatments = $query->all()->toArray();     
        
        $this->loadModel('Categories'); 
        $tableRegObj = TableRegistry::get('Categories');
        $query = $tableRegObj->find('list', [ 'conditions' => ['is_active' => 1]]);
        $category = $query->all()->toArray();       
        $treatments[0] = "Genaral";
        //pr($treatments); exit;
        //pr($treatments); exit;
        
        $this->set(compact('news','treatments','category'));
        $this->set('_serialize', ['news','treatments','category']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Run id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        //$this->request->allowMethod(['post', 'delete']);
        $news = $this->Newses->get($id);
        if ($this->Newses->delete($news)) {
            if ($news->img != "") {
                $filePath = WWW_ROOT . 'news_img' . DS . $news->img;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }            
            $this->Flash->success(__('The Newses has been deleted.'));
        } else {
            $this->Flash->error(__('The Newses could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
