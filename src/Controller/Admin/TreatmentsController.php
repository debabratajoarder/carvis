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
class TreatmentsController extends AppController {

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
    
    
    
    public function checkqtype() {
        $this->viewBuilder()->layout('');
        $this->loadModel('Questions');
        $tableRegObj = TableRegistry::get('Questions');
        $q = $tableRegObj->find()->where(['id' => $this->request->data['id']])->first()->toArray();
        if($q['answer_type'] == 'y'){ echo 1; } else { echo 0; } exit;
        $this->render('');

    }    
    
    public function index() {
        
        $this->loadModel('Treatments');
        $this->viewBuilder()->layout('admin');
        
        
        $this->paginate = ['order' => [ 'name' => 'ASC']];
        
        $treatment = $this->paginate($this->Treatments,['limit' => 10, 'conditions' => ['Treatments.parent_id' => 0]]);
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
        return $this->redirect(['action' => 'index']);
        $this->viewBuilder()->layout('admin');
        $treatments = $this->Treatments->get($id);
        
        
        $this->loadModel('Medicines'); 
        $tableRegObj = TableRegistry::get('Medicines');
        $query = $tableRegObj->find('all', [ 'conditions' => ['is_active' => 1]]);
        $data = $query->all();
         
        
        foreach($data as $dt){
            $tableRegObj1 = TableRegistry::get('Medicines');
            $query1 = $tableRegObj1->query();
            $query1->update()->set(['meta_title' => $dt->title, 'meta_key' => $dt->title, 'meta_descriptiion' => $dt->title])->where(['id' => $dt->id])->execute();
            
            
        }
        
        
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

        $this->viewBuilder()->layout('admin');
        $treatment = $this->Treatments->newEntity();
        
        if ($this->request->is('post')) {
            
            //pr($this->request->data);  
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
            
            if($this->request->data['slug'] == ""){
                $this->Flash->error(__('Slug can not be null. Please, try again.')); $flag = false;
            }            
            
            if( $treatmenExist ){
                $this->Flash->error(__('Slug already Exist. Please, change some text to make it unique.')); $flag = false;
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
                    $this->Flash->error(__('Upload image For Treatment.'));
                }                
            }            
            
            if($flag){
                $this->request->data['image'] = $file;
                $treatment = $this->Treatments->patchEntity($treatment, $this->request->data);

                if ($result = $this->Treatments->save($treatment)) {
                    $record_id = $result->id;    

                    if(!empty($this->request->data['catid'])){
                        $this->loadModel('TreatmentCategories');
                        $trCategoriesTable = TableRegistry::get ('TreatmentCategories');
                        $oQuery = $trCategoriesTable->query();
                        foreach($this->request->data['catid'] as $k => $v){
                            $data['trid'] = $record_id;
                            $data['catid'] = $v;
                            $data['is_active'] = $v;
                            $oQuery->insert (['trid','catid','is_active'])->values ($data); // person array contains name and title
                        }
                        $oQuery->execute ();                        
                    }                    

                    $this->Flash->success(__('Treatments has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('Treatments could not be saved. Please, try again.'));
                }
            }
        } 
        
        $this->loadModel('Categories'); 
        $tableRegObj = TableRegistry::get('Categories');
        $query = $tableRegObj->find('list', [ 'conditions' => ['is_active' => 1]]);
        $category = $query->all()->toArray();        
        
        $this->set(compact('treatment','category'));
        $this->set('_serialize', ['treatment','category']);
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
        $treatment = $this->Treatments->get($id, [
            'contain' => ['TreatmentCategories']
        ]);
        //pr($treatment); exit;
        
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
            
            if($this->request->data['slug'] == ""){
                $this->Flash->error(__('Slug can not be null. Please, try again.')); $flag = false;
            }            
            
            if( $treatmenExist ){
                $this->Flash->error(__('Slug already Exist. Please, change some text to make it unique.')); $flag = false;
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
                        $this->loadModel('TreatmentCategories');
                        $this->TreatmentCategories->query()->delete()->where(['trid' => $id])->execute();
                        
                        
                        if(!empty($this->request->data['catid'])){
                            $this->loadModel('TreatmentCategories');
                            $trCategoriesTable = TableRegistry::get ('TreatmentCategories');
                            $oQuery = $trCategoriesTable->query();
                            foreach($this->request->data['catid'] as $k => $v){
                                $data['trid'] = $id;
                                $data['catid'] = $v;
                                $data['is_active'] = 1;
                                $oQuery->insert (['trid','catid','is_active'])->values ($data); // person array contains name and title
                            }
                            $oQuery->execute ();                        
                        }                        
                                          
                    $this->Flash->success(__('Treatments detail has been updated.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('Treatments detail could not be update. Please, try again.'));
                }
            }
        } 

        $this->loadModel('Categories'); 
        $tableRegObj = TableRegistry::get('Categories');
        $query = $tableRegObj->find('list', [ 'conditions' => ['is_active' => 1]]);
        $category = $query->all()->toArray();        
        
        $this->set(compact('treatment','category'));
        $this->set('_serialize', ['treatment','category']);        
        
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
        $treatment = $this->Treatments->get($id);
        if ($this->Treatments->delete($treatment)) {
            if ($treatment->image != "") {
                $filePath = WWW_ROOT . 'treatment_img' . DS . $treatment->image;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }            
            $this->Flash->success(__('Treatments has been deleted.'));
        } else {
            $this->Flash->error(__('Treatments could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function treatmentquestion( $id =null ) {

        $this->viewBuilder()->layout('admin');
        
        $this->loadModel('TreatmentQuestions'); 
        $treatmentquestions = $this->TreatmentQuestions->newEntity();        
        
        //$this->Medicines->recursive = 3; 
        $treatment = $this->Treatments->get($id,['contain' => ['TreatmentQuestions','TreatmentQuestions.Questions','TreatmentQuestions.Questions.QuestionCheckboxes']])->toArray();
        //pr($treatment); exit;

        if ($this->request->is(['patch', 'post', 'put'])) {
            
            //pr($this->request->data); //exit;
            
            $tableRegObj = TableRegistry::get('TreatmentQuestions');
            $queExist = $tableRegObj->find()->where(['qid' => $this->request->data['qid'], 'tid' => $this->request->data['tid']])->toArray();
            
            $flag = true;
            
            if ($this->request->data['qid'] == "") {
                $this->Flash->error(__('Please Select Question.')); $flag = false;
            }            
            
            if($flag) {
                if ($queExist) {
                    $this->Flash->error(__('Question already Exist With this Treatment. Please, choose another.')); $flag = false;
                }
            }
            
            if($flag) {
                $treatmentquestions = $this->TreatmentQuestions->patchEntity($treatmentquestions, $this->request->data);
                //pr($treatmentquestions); exit;
                if ($this->TreatmentQuestions->save($treatmentquestions)) {
                    $this->Flash->success(__('Question has been added.'));
                    return $this->redirect(['action' => 'treatmentquestion',$id]);
                } else {
                    $this->Flash->error(__('Question could not be added. Please, try again.'));
                }
            }            
        }
 
        $this->loadModel('TreatmentQuestions'); $tableRegObj = TableRegistry::get('TreatmentQuestions');
        $query = $tableRegObj->find('all', [ 'conditions' => ['tid' => $id]]); $questionlist = $query->all()->toArray();        

        $queExist = array(); foreach($questionlist as $qlist){ $queExist[] = $qlist->qid; }
      
        $this->loadModel('Questions'); $tableRegObj = TableRegistry::get('Questions');
        $query = $tableRegObj->find('list', [ 'conditions' => ['is_active' => 1]]); $questionlistdt = $query->all()->toArray();       

        $question = array(); foreach($questionlistdt as $k=>$v){ if (!in_array($k, $queExist)){ $question[$k] = $v; } }
        
        //pr($question); exit;
        
        $this->set(compact('treatment','treatmentquestions','question'));
        $this->set('_serialize', ['medicine','medicinequestion','question']);
        
    }     

    
    public function questiondelete($tid = null, $id = null) {
        
        $this->loadModel('TreatmentQuestions'); 
        $question = $this->TreatmentQuestions->get($id);
        if ($this->TreatmentQuestions->delete($question)) {
            $this->Flash->success(__('Question has been deleted.'));
        } else {
            $this->Flash->error(__('Question could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'treatmentquestion',$tid]);
        
    }
    
    public function questionstatus($tid = null, $id = null, $status = null) {
        
        $this->loadModel('TreatmentQuestions'); 
        $tableRegObj = TableRegistry::get('TreatmentQuestions');
        //$subquestionExist = $tableRegObj->find()->where(['id' => $sqid, 'qid' => $qid])->toArray();
        //echo $subquestionExist->
        //pr($subquestionExist[0]->toArray()); exit;
        $query = $tableRegObj->find('all', [ 'conditions' => ['id' => $id, 'tid' => $tid]]);
        $row = $query->first()->toArray();
        //pr($row); exit;
        if($row){
            $subquestion = TableRegistry::get('TreatmentQuestions');
            $query = $subquestion->query();
            if($status == 1){
                $query->update()->set(['is_active' => 1])->where(['id' => $id])->execute();
                $this->Flash->success(__('Treatment Questions has been activated.'));
            } else if($status == 0){
                $query->update()->set(['is_active' => 0])->where(['id' => $id])->execute(); 
                $this->Flash->success(__('Treatment Questions has been suspended.'));
            }
        } else {
            $this->Flash->error(__('Treatment Questions Not Found.'));
        }
        
        return $this->redirect(['action' => 'treatmentquestion',$tid]);
        
    }      
    

    public function treatmentfaq( $id =null ) {

        $this->viewBuilder()->layout('admin');
        
        $this->loadModel('TreatmentFaqs');
        $this->viewBuilder()->layout('admin');
        $data = $this->paginate($this->TreatmentFaqs,['limit' => 20, 'conditions' => [ 'treatment_id' => $id ]]);
        
        
        //$this->set('data', $this->Paginator->paginate($this->TreatmentFaqs, [ 'limit' => 20, 'order' => [ 'id' => 'DESC' ], 'conditions' => [ 'treatment_id' => $id ]]));
        
        $this->set(compact('data','id'));
        $this->set('_serialize', ['data']);
        
    }     

    public function treatmentfaqview($tid = null, $id = null) {

        $this->viewBuilder()->layout('admin');
        $this->loadModel('TreatmentFaqs');
        $faq = $this->TreatmentFaqs->get($id)->toarray();

        $treatments = $this->Treatments->get($faq['treatment_id'])->toarray();
        
        //echo "<pre>"; print_r($treatments); 
        //echo "<pre>"; print_r($faq); exit;
        
        $this->set('tid', $tid);
        $this->set('treatments', $treatments);
        $this->set('faq', $faq);
        $this->set('_serialize', ['treatments']);
    }    
    
    
    
    public function treatmentfaqadd( $id =null ) {

        $this->viewBuilder()->layout('admin');
        
        $this->loadModel('TreatmentFaqs'); 
        $treatmentfaq = $this->TreatmentFaqs->newEntity();        
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            //pr($this->request->data); exit; 
            
            $tableRegObj = TableRegistry::get('TreatmentFaqs');
            $queExist = $tableRegObj->find()->where(['question' => $this->request->data['question'], 'treatment_id' => $this->request->data['treatment_id']])->toArray();
            
            $flag = true;
            
            if ($this->request->data['question'] == "") {
                $this->Flash->error(__('FAQ Question Can not be null.')); $flag = false;
            }            

            if($flag) {
                if ($this->request->data['answer'] == "") {
                    $this->Flash->error(__('FAQ Answer Can not be null.')); $flag = false;
                }
            }            
            
            if($flag) {
                if ($queExist) {
                    $this->Flash->error(__('FAQ already Exist With this Treatment. Please, choose another.')); $flag = false;
                }
            }
            
            if($flag) {
                $treatmentfaq = $this->TreatmentFaqs->patchEntity($treatmentfaq, $this->request->data);
                if ($this->TreatmentFaqs->save($treatmentfaq)) {
                    $this->Flash->success(__('FAQ has been added.'));
                    return $this->redirect(['action' => 'treatmentfaq',$id]);
                } else {
                    $this->Flash->error(__('FAQ could not be added. Please, try again.'));
                }
            }            
        }
        $treatments = $this->Treatments->get($id)->toarray();
        
        //pr($treatments); exit;
        $this->set(compact('treatmentfaq','id','treatments'));
        $this->set('_serialize', ['treatmentfaq']);
        
    }  

    public function treatmentfaqedit($tid =null, $id =null ) {

        $this->viewBuilder()->layout('admin');
        $this->loadModel('TreatmentFaqs');
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            //pr($this->request->data); exit;

            $flag = true;
            
            if ($this->request->data['question'] == "") {
                $this->Flash->error(__('Please Enter Question.')); $flag = false;
            }            

            if ($this->request->data['answer'] == "") {
                $this->Flash->error(__('Please Enter Answer.')); $flag = false;
            }            
            
            if($flag) {
                $treatmentfaq = TableRegistry::get('TreatmentFaqs');
                $query = $treatmentfaq->query();
                $query->update()->set(['treatment_id' => $this->request->data['treatment_id'], 'question' => $this->request->data['question'], 'answer' => $this->request->data['answer']])->where(['id' => $this->request->data['id']])->execute();
                $this->Flash->success(__('FAQ has been edited.'));
                return $this->redirect(['action' => 'treatmentfaq', $tid]);
            }            
        }
 
         
        
        $treatmentfaqs = $this->TreatmentFaqs->get($id,['contain' => ['Treatments']])->toArray();
        //pr($treatmentfaqs); exit;

        $this->set(compact('treatmentfaqs'));
        $this->set('_serialize', ['treatmentfaqs']);
        
    }     
    
    public function treatmentfaqdelete($tid = null, $id = null) {
        
        $this->loadModel('TreatmentFaqs'); 
        $question = $this->TreatmentFaqs->get($id);
        if ($this->TreatmentFaqs->delete($question)) {
            $this->Flash->success(__('FAQ has been deleted.'));
        } else {
            $this->Flash->error(__('FAQ could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'treatmentfaq', $tid]);
        
    }
    

    public function treatmentfaqstatus($tid = null, $id = null, $status = null) {
        
        $this->loadModel('TreatmentQuestions'); 
        $tableRegObj = TableRegistry::get('TreatmentQuestions');
        //$subquestionExist = $tableRegObj->find()->where(['id' => $sqid, 'qid' => $qid])->toArray();
        //echo $subquestionExist->
        //pr($subquestionExist[0]->toArray()); exit;
        $query = $tableRegObj->find('all', [ 'conditions' => ['id' => $id, 'tid' => $tid]]);
        $row = $query->first()->toArray();
        //pr($row); exit;
        if($row){
            $subquestion = TableRegistry::get('TreatmentQuestions');
            $query = $subquestion->query();
            if($status == 1){
                $query->update()->set(['is_active' => 1])->where(['id' => $id])->execute();
                $this->Flash->success(__('Treatment Questions has been activated.'));
            } else if($status == 0){
                $query->update()->set(['is_active' => 0])->where(['id' => $id])->execute(); 
                $this->Flash->success(__('Treatment Questions has been suspended.'));
            }
        } else {
            $this->Flash->error(__('Treatment Questions Not Found.'));
        }
        
        return $this->redirect(['action' => 'treatmentquestion',$tid]);
        
    }      
    
    
    
    
    
    
}