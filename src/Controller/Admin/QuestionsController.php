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
class QuestionsController extends AppController {

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
        $question = $this->paginate($this->Questions);
        $this->set(compact('question'));
        $this->set('_serialize', ['question']);
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
        $questions = $this->Questions->get($id,['contain' => ['QuestionCheckboxes']])->toarray();
        
        //pr($questions); exit;
        //$results = $customer->toArray(); pr($results); exit;
        $this->set('questions', $questions);
        $this->set('_serialize', ['questions']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {

        $this->viewBuilder()->layout('admin');
        $question = $this->Questions->newEntity();
        if ($this->request->is('post')) {
            $tableRegObj = TableRegistry::get('Questions');
            $questionExist = $tableRegObj->find()->where(['question' => $this->request->data['question']])->toArray();
            $flag = true;

            if ($this->request->data['question'] == "") {
                $this->Flash->error(__('Quetion can not be null. Please, try again.')); $flag = false;
            }
            /*
            if($flag){
                if ($this->request->data['answer'] == "") {
                    $this->Flash->error(__('Answer can not be null. Please, try again.')); $flag = false;
                }                
            }
            */
            
            if($flag){
                if ($this->request->data['answer_type'] == "") {
                    $this->Flash->error(__('Answer Type can not be null. Please, try again.')); $flag = false;
                }               
            }            

            if ($questionExist) {
                $this->Flash->error(__('Quetion already Exist. Please, change some text to make it unique.')); $flag = false;
            }
            if ($flag) {
                $question = $this->Questions->patchEntity($question, $this->request->data);

                if ($this->Questions->save($question)) {
                    $this->Flash->success(__('Questions has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('Questions could not be saved. Please, try again.'));
                }
            }
        }
        $this->set(compact('question'));
        $this->set('_serialize', ['question']);
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
        $question = $this->Questions->get($id,['contain' => []]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            //pr($this->request->data); exit;
            
            
            $tableRegObj = TableRegistry::get('Questions');
            $questionExist = $tableRegObj->find()->where(['question' => $this->request->data['question'], 'id !=' => $id])->toArray();
            $flag = true;
            if ($this->request->data['question'] == "") {
                $this->Flash->error(__('Quetion can not be null. Please, try again.')); $flag = false;
            }
            /*
            if($flag){
                if ($this->request->data['answer'] == "") {
                    $this->Flash->error(__('Answer can not be null. Please, try again.')); $flag = false;
                }                
            }
            */
            if($flag){
                if ($this->request->data['answer_type'] == "") {
                    $this->Flash->error(__('Answer Type can not be null. Please, try again.')); $flag = false;
                }               
            }  
            
            if ($questionExist) {
                $this->Flash->error(__('Quetion already Exist. Please, change some text to make it unique.')); $flag = false;
            }
            if ($flag) {
                $question = $this->Questions->patchEntity($question, $this->request->data);
                if ($this->Questions->save($question)) {
                    $this->Flash->success(__('Questions has been updated.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('Questions could not be updated. Please, try again.'));
                }
            }            
        }

        $this->set(compact('question'));
        $this->set('_serialize', ['question']);
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
        $question = $this->Questions->get($id);
        if ($this->Questions->delete($question)) {
            $this->loadModel('QuestionCheckboxes');
            $this->QuestionCheckboxes->query()->delete()->where(['qid' => $id])->execute();
            
            $this->loadModel('MedicineQuestions');
            $this->MedicineQuestions->query()->delete()->where(['qid' => $id])->execute();            

            $this->Flash->success(__('Questions has been deleted.'));
        } else {
            $this->Flash->error(__('Questions could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    
    public function subquestion( $id =null ) {

        $this->viewBuilder()->layout('admin');
        
        $this->loadModel('QuestionCheckboxes'); 
        $subquestion = $this->QuestionCheckboxes->newEntity();
        
        $question = $this->Questions->get($id,['contain' => ['QuestionCheckboxes']]);
        //pr($question->toArray()); exit;
        
        if($question->answer_type != 'c'){
            $this->Flash->error(__('Quetion have no permission to add sub question.'));
            return $this->redirect(['action' => 'index']);
        }
        
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            //pr($this->request->data); exit;
            
            $tableRegObj = TableRegistry::get('QuestionCheckboxes');
            $subquestionExist = $tableRegObj->find()->where(['title' => $this->request->data['title'], 'qid' => $this->request->data['qid']])->toArray();
            $flag = true;
            if ($this->request->data['title'] == "") {
                $this->Flash->error(__('Sub Quetion Title can not be null. Please, try again.')); $flag = false;
            }
            if ($subquestionExist) {
                $this->Flash->error(__('Sub Quetion Title already Exist. Please, change some text to make it unique.')); $flag = false;
            }
            if ($flag) {
                $subquestion = $this->QuestionCheckboxes->patchEntity($subquestion, $this->request->data);
                if ($this->QuestionCheckboxes->save($subquestion)) {
                    $this->Flash->success(__('Questions has been updated.'));
                    return $this->redirect(['action' => 'subquestion',$id]);
                } else {
                    $this->Flash->error(__('Questions could not be updated. Please, try again.'));
                    
                }
            }            
        }

        $this->set(compact('question','subquestion'));
        $this->set('_serialize', ['question','subquestion']);
        
    }    
    
    
    public function subqdelete($qid = null, $sqid = null) {
        
        $this->loadModel('QuestionCheckboxes'); 
        $subquestion = $this->QuestionCheckboxes->get($sqid);
        if ($this->QuestionCheckboxes->delete($subquestion)) {
            $this->Flash->success(__('Sub Question has been deleted.'));
        } else {
            $this->Flash->error(__('Sub Question could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'subquestion',$qid]);
        
    }
    
    public function subqstatus($qid = null, $sqid = null, $status = null) {
        
        $this->loadModel('QuestionCheckboxes'); 
        $tableRegObj = TableRegistry::get('QuestionCheckboxes');
        //$subquestionExist = $tableRegObj->find()->where(['id' => $sqid, 'qid' => $qid])->toArray();
        //echo $subquestionExist->
        //pr($subquestionExist[0]->toArray()); exit;
        $query = $tableRegObj->find('all', [ 'conditions' => ['id' => $sqid, 'qid' => $qid]]);
        $row = $query->first()->toArray();
        //pr($row); exit;
        if($row){
            $subquestion = TableRegistry::get('QuestionCheckboxes');
            $query = $subquestion->query();
            if($status == 1){
                $query->update()->set(['is_active' => 1])->where(['id' => $sqid])->execute();
                $this->Flash->success(__('Sub Question has been activated.'));
            } else if($status == 0){
                $query->update()->set(['is_active' => 0])->where(['id' => $sqid])->execute(); 
                $this->Flash->success(__('Sub Question has been suspended.'));
            }
        } else {
            $this->Flash->error(__('Sub Question Not Found.'));
        }
        
        return $this->redirect(['action' => 'subquestion',$qid]);
        
    }    
    
    
    
    public function qstatus($id = null, $status = null) {
        //echo $id; echo "--"; echo $status; //exit;
        $this->loadModel('Questions'); 
        $tableRegObj = TableRegistry::get('Questions');
        $query = $tableRegObj->find('all', [ 'conditions' => ['id' => $id]]);
        $row = $query->first()->toArray();
        //pr($row); exit;
        if($row){
            $subquestion = TableRegistry::get('Questions');
            $query = $subquestion->query();
            if($status == 1){
                $query->update()->set(['is_active' => 1])->where(['id' => $id])->execute();
                $this->Flash->success(__('Questions has been activated.'));
            } else if($status == 0){
                $query->update()->set(['is_active' => 0])->where(['id' => $id])->execute(); 
                $this->Flash->success(__('Questions has been suspended.'));
            }
        } else {
            $this->Flash->error(__('Medicine Questions Not Found.'));
        }        
        return $this->redirect(['action' => 'index']);
    }     
    
    
    
    
}
