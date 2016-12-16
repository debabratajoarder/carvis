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
class MedicinesController extends AppController {

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
        $medicines = $this->paginate($this->Medicines);
        $this->set(compact('medicines'));
        $this->set('_serialize', ['medicines']);
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
        $medicines = $this->Medicines->get($id,['contain' => ['Treatment','Pils','Pils.Treatments']])->toArray();
        //pr($medicines); exit;
        //$results = $customer->toArray(); pr($results); exit;
        $this->set('medicines', $medicines);
        $this->set('_serialize', ['medicines']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {

        $this->viewBuilder()->layout('admin');
        $medicine = $this->Medicines->newEntity();
        
        if ($this->request->is('post')) {
            
            $tableRegObj = TableRegistry::get('Medicines');
            $mediciineExiist = $tableRegObj->find()->where(['title' => $this->request->data['title']])->toArray();
            $mediciineSlugExiist = $tableRegObj->find()->where(['slug' => $this->request->data['slug']])->toArray();
            $flag = true;
            //pr($mediciineExiist); 
            //pr($this->request->data); exit;
            if ($this->request->data['title'] == "") {
                $this->Flash->error(__('Title can not be null. Please, try again.')); $flag = false;
            }

            if($flag){
                if ($this->request->data['slug'] == "") {
                    $this->Flash->error(__('Slug Type can not be null. Please, try again.')); $flag = false;
                }
            }
            
            if($flag){
                if ($this->request->data['description'] == "") {
                    $this->Flash->error(__('Description can not be null. Please, try again.')); $flag = false;
                }
            }            
            
            if($flag){
                if ($mediciineExiist) {
                    $this->Flash->error(__('Medicine title already Exist. Please, try with another.')); $flag = false;
                }
            }
            if($flag){
                if ($mediciineSlugExiist) {
                    $this->Flash->error(__('Medicine slug already Exist. Please, try with another.')); $flag = false;
                }            
            }
            
            if($flag){
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                if (!empty($this->request->data['image']['name'])) {
                    $file = $this->request->data['image']; //put the data into a var for easy use
                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    $fileName = time() . "." . $ext;
                    if (in_array($ext, $arr_ext)) {
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'medicine_img' . DS . $fileName);
                        $file = $fileName;
                    } else {
                        $flag = false;
                        $this->Flash->error(__('Upload image only jpg,jpeg,png files.'));
                    }
                } else {
                    $flag = false;
                    $this->Flash->error(__('Upload image For Medicine.'));
                }                
            }          

            if($flag){
                $this->request->data['image'] = $file;
                $medicine = $this->Medicines->patchEntity($medicine, $this->request->data);
                if ($this->Medicines->save($medicine)) {
                    $this->Flash->success(__('Medicine has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('Medicine could not be saved. Please, try again.'));
                }
            }
        }
        
        $tableRegObj = TableRegistry::get('Treatments');
        $query = $tableRegObj->find('list', [ 'conditions' => ['is_active' => 1]]);
        $treatmentlist = $query->all()->toArray();         
                
        $this->set(compact('medicine','treatmentlist'));
        $this->set('_serialize', ['medicine','treatmentlist']);
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
        $medicine = $this->Medicines->get($id,['contain' => ['Treatment']]);
        //pr($medicine); exit;
        if ($this->request->is(['patch', 'post', 'put'])) {
            //pr($this->request->data); exit;
            $tableRegObj = TableRegistry::get('Medicines');
            
            $mediciineExiist = $tableRegObj->find()->where(['title' => $this->request->data['title'], 'id !=' => $id])->toArray();
            
            $mediciineSlugExiist = $tableRegObj->find()->where(['slug' => $this->request->data['slug'], 'id !=' => $id])->toArray();
            $flag = true;
            
            //pr($medicine); pr($this->request->data); exit;
            if ($this->request->data['title'] == "") {
                $this->Flash->error(__('Title can not be null. Please, try again.')); $flag = false;
            }

            if($flag){
                if ($this->request->data['slug'] == "") {
                    $this->Flash->error(__('Slug Type can not be null. Please, try again.')); $flag = false;
                }
            }
            
            if($flag){
                if ($this->request->data['description'] == "") {
                    $this->Flash->error(__('Description can not be null. Please, try again.')); $flag = false;
                }
            }            
            
            if($flag){
                if ($mediciineExiist) {
                    $this->Flash->error(__('Medicine title already Exist. Please, try with another.')); $flag = false;
                }
            }
            if($flag){
                if ($mediciineSlugExiist) {
                    $this->Flash->error(__('Medicine slug already Exist. Please, try with another.')); $flag = false;
                }            
            }
            
            if($flag){
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                if (!empty($this->request->data['image']['name'])) {
                    $file = $this->request->data['image']; //put the data into a var for easy use
                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    $fileName = time() . "." . $ext;
                    if (in_array($ext, $arr_ext)) {
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'medicine_img' . DS . $fileName);
                        $file = $fileName;
                        if ($medicine->image != $fileName) {
                            $filePath = WWW_ROOT . 'medicine_img' . DS . $medicine->image;
                            if (file_exists($filePath)) {
                                unlink($filePath);
                            }
                        }                        
                    } else {
                        $flag = false;
                        $this->Flash->error(__('Upload image only jpg,jpeg,png files.'));
                    }
                } else {
                    $file = $medicine->image;
                }                
            }          

            if($flag){
                $this->request->data['image'] = $file;
                $medicine = $this->Medicines->patchEntity($medicine, $this->request->data);
                if ($this->Medicines->save($medicine)) {
                    
                    
                    $tableRegObj = TableRegistry::get('Pils');
                    $pils = $tableRegObj->find()->where(['mid' => $medicine->id])->all();

                    foreach($pils as $pil){
                        $data = TableRegistry::get('Pils');
                        $query = $data->query();
                        $query->update()->set(['tid' => $medicine->Treatments->id])->where(['id' => $pil->id])->execute();
                    }

                    $this->Flash->success(__('Medicine has been updated.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('Medicine could not be update. Please, try again.'));
                }
            }
        }

        $tableRegObj = TableRegistry::get('Treatments');
        $query = $tableRegObj->find('list', [ 'conditions' => ['is_active' => 1]]);
        $treatmentlist = $query->all()->toArray();         
                
        $this->set(compact('medicine','treatmentlist'));
        $this->set('_serialize', ['medicine','treatmentlist']);        
        
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
        $medicine = $this->Medicines->get($id);
        //pr($medicine); exit;
        if ($this->Medicines->delete($medicine)) {
            $this->loadModel('Pils');
            $this->Pils->query()->delete()->where(['mid' => $id])->execute();

            $this->loadModel('MedicineQuestions');
            $this->MedicineQuestions->query()->delete()->where(['mid' => $id])->execute();            
            
            
            if ($medicine->image != "") {
                $filePath = WWW_ROOT . 'medicine_img' . DS . $medicine->image;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }            
            $this->Flash->success(__('Medicine has been deleted.'));
        } else {
            $this->Flash->error(__('Medicine could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    
    public function medicinepils( $id =null ) {

        $this->viewBuilder()->layout('admin');
        
        $this->loadModel('Pils'); 
        $pil = $this->Pils->newEntity();
        //$this->Medicines->recursive = 3; 
        $medicine = $this->Medicines->get($id,['contain' => ['Pils','Pils.Treatments']]);
        //pr($medicine->toArray()); exit;
        

        if ($this->request->is(['patch', 'post', 'put'])) {
            
            //pr($this->request->data); exit;
            
            $tableRegObj = TableRegistry::get('Pils');
            $pilExist = $tableRegObj->find()->where(['title' => $this->request->data['title'], 'tid' => $this->request->data['tid'], 'mid' => $this->request->data['mid']])->toArray();
            $flag = true;
            if ($this->request->data['title'] == "") {
                $this->Flash->error(__('Pil Title can not be null.')); $flag = false;
            }
            
            if($flag) {
                if ($this->request->data['cost'] == "") {
                    $this->Flash->error(__('Pil Cost can not be null.')); $flag = false;
                }
            }            
            
            if($flag) {
                if ($this->request->data['quantity'] == "") {
                    $this->Flash->error(__('Pil Quantity can not be null.')); $flag = false;
                }
            }            
            
            if($flag) {
                if ($this->request->data['description'] == "") {
                    $this->Flash->error(__('Pil Describtion can not be null.')); $flag = false;
                }
            }
            
            if($flag) {
                if ($pilExist) {
                    $this->Flash->error(__('Pil Title Title already Exist. Please, change some text to make it unique.')); $flag = false;
                }
            }
            
            if($flag) {
                $pil = $this->Pils->patchEntity($pil, $this->request->data);
                if ($this->Pils->save($pil)) {
                    $this->Flash->success(__('Pil has been updated.'));
                    return $this->redirect(['action' => 'medicinepils',$id]);
                } else {
                    $this->Flash->error(__('Pil could not be updated. Please, try again.'));
                }
            }            
        }

        
        $this->loadModel('Treatments'); 
        $tableRegObj = TableRegistry::get('Treatments');
        $query = $tableRegObj->find('list', [ 'conditions' => ['is_active' => 1]]);
        $treatment = $query->all()->toArray();       
        
        //pr($treatment); exit;
        
        $this->set(compact('medicine','pil','treatment'));
        $this->set('_serialize', ['medicine','pil','treatment']);
        
    }    
    
    public function addmedicinepils( $id =null ) {

        $this->viewBuilder()->layout('admin');
        
        $this->loadModel('Pils'); 
        $pil = $this->Pils->newEntity();
        //$this->Medicines->recursive = 3; 
        $medicine = $this->Medicines->get($id,['contain' => ['Treatment','Pils','Pils.Treatments']]);
        //pr($medicine->toArray()); exit;

        if ($this->request->is(['patch', 'post', 'put'])) {

            $tableRegObj = TableRegistry::get('Pils');
            $pilExist = $tableRegObj->find()->where(['title' => $this->request->data['title'], 'tid' => $this->request->data['tid'], 'mid' => $this->request->data['mid']])->toArray();
            $flag = true;
            if ($this->request->data['title'] == "") {
                $this->Flash->error(__('Pil Title can not be null.')); $flag = false;
            }
            
            if($flag) {
                if ($this->request->data['cost'] == "") {
                    $this->Flash->error(__('Pil Cost can not be null.')); $flag = false;
                }
            }            
            
            if($flag) {
                if ($this->request->data['quantity'] == "") {
                    $this->Flash->error(__('Pil Quantity can not be null.')); $flag = false;
                }
            }            
            
            /*
            if($flag) {
                if ($this->request->data['description'] == "") {
                    $this->Flash->error(__('Pil Describtion can not be null.')); $flag = false;
                }
            }
            */
            if($flag) {
                if ($pilExist) {
                    $this->Flash->error(__('Pil Title Title already Exist. Please, change some text to make it unique.')); $flag = false;
                }
            }

            if($flag) {
                $pil = $this->Pils->patchEntity($pil, $this->request->data);
                if ($result = $this->Pils->save($pil)) {
                    
                    $record_id = $result->id;

                    $pilpricesTable = TableRegistry::get('Pilprices');
                    $pilprices = $pilpricesTable->newEntity();
                            
                    $pilprices->pilid = $record_id;        
                    $pilprices->ascotpharmacy = $this->request->data['cost'];
                    $pilprices->drfox = $this->request->data['drfox'];
                    $pilprices->pharmacy2u = $this->request->data['pharmacy2u'];
                    $pilprices->superdrug = $this->request->data['superdrug'];
                    $pilprices->expresspharmacy = $this->request->data['expresspharmacy'];
                    $pilprices->lloyds = $this->request->data['lloyds'];
                    $pilprices->medexpress = $this->request->data['medexpress'];

                    if ($pilpricesTable->save($pilprices)) {
                        $pilprice = $pilprices->id;
                    } 

                    $this->Flash->success(__('Pil has been updated.'));
                    return $this->redirect(['action' => 'medicinepils',$id]);
                } else {
                    $this->Flash->error(__('Pil could not be added. Please, try again.'));
                }
            }            
        }
        
        $this->loadModel('Treatments'); 
        $tableRegObj = TableRegistry::get('Treatments');
        $query = $tableRegObj->find('list', [ 'conditions' => ['is_active' => 1]]);
        $treatment = $query->all()->toArray();       
        
        //pr($treatment); exit;
        
        $this->set(compact('medicine','pil','treatment'));
        $this->set('_serialize', ['medicine','pil','treatment']);
        
    }      

    public function pilsedit( $mid =null, $pid =null ) {

        $this->viewBuilder()->layout('admin');
        
        $this->loadModel('Pils'); 
        $this->loadModel('Pilprices'); 
        $this->loadModel('Medicines'); 
        
        $medicine = $this->Medicines->get($mid,['contain' => ['Treatment']]);
        $pil = $this->Pils->get($pid,['contain' => ['Pilprices']]);
        if(!empty($pil->pilprices)){
            $pilpriceid =  $pil->pilprices[0]->id;
        }
        

        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $tableRegObj = TableRegistry::get('Pils');
            $pilExist = $tableRegObj->find()->where(['title' => $this->request->data['title'], 'id !=' => $this->request->data['id'], 'tid' => $this->request->data['tid'], 'mid' => $this->request->data['mid']])->toArray();
            $flag = true;
            if ($this->request->data['title'] == "") {
                $this->Flash->error(__('Pil Title can not be null.')); $flag = false;
            }
            
            if($flag) {
                if ($this->request->data['cost'] == "") {
                    $this->Flash->error(__('Pil Cost can not be null.')); $flag = false;
                }
            }            
            
            if($flag) {
                if ($this->request->data['quantity'] == "") {
                    $this->Flash->error(__('Pil Quantity can not be null.')); $flag = false;
                }
            }            
            
            /*
            if($flag) {
                if ($this->request->data['description'] == "") {
                    $this->Flash->error(__('Pil Describtion can not be null.')); $flag = false;
                }
            } */
            
            if($flag) {
                if ($pilExist) {
                    $this->Flash->error(__('Pil Title Title already Exist. Please, change some text to make it unique.')); $flag = false;
                }
            }

            if($flag) {

                $pil = $this->Pils->patchEntity($pil, $this->request->data);
                if ($result = $this->Pils->save($pil)) {
                    
                    if(!empty($pil->pilprices)){
                    
                        $record_id = $pil->id;
                        $idarr = $pil->pilprices[0];
                        $iid = $idarr->id;
                        $pilprices['pilid'] = $record_id;        
                        $pilprices['ascotpharmacy'] = $this->request->data['cost'];
                        $pilprices['drfox'] = $this->request->data['drfox'];
                        $pilprices['pharmacy2u'] = $this->request->data['pharmacy2u'];
                        $pilprices['superdrug'] = $this->request->data['superdrug'];
                        $pilprices['expresspharmacy'] = $this->request->data['expresspharmacy'];
                        $pilprices['lloyds'] = $this->request->data['lloyds'];
                        $pilprices['medexpress'] = $this->request->data['medexpress'];                    

                        $pilpricesTable = TableRegistry::get('Pilprices');
                        $query = $pilpricesTable->query();
                        $query->update()->set($pilprices)->where(['id' => $pilpriceid])->execute();
                    } else {
                        
                        $record_id = $pil->id;

                        $pilpricesTable = TableRegistry::get('Pilprices');
                        $pilprices = $pilpricesTable->newEntity();

                        $pilprices->pilid = $record_id;        
                        $pilprices->ascotpharmacy = $this->request->data['cost'];
                        $pilprices->drfox = $this->request->data['drfox'];
                        $pilprices->pharmacy2u = $this->request->data['pharmacy2u'];
                        $pilprices->superdrug = $this->request->data['superdrug'];
                        $pilprices->expresspharmacy = $this->request->data['expresspharmacy'];
                        $pilprices->lloyds = $this->request->data['lloyds'];
                        $pilprices->medexpress = $this->request->data['medexpress'];

                        if ($pilpricesTable->save($pilprices)) {
                            $pilprice = $pilprices->id;
                        }                         
                        
                    }

                    $this->Flash->success(__('Pil has been updated.'));
                    return $this->redirect(['action' => 'medicinepils',$mid]);
                } else {
                    $this->Flash->error(__('Pil could not be updated. Please, try again.'));
                }
            }            
        }
        
        $this->set(compact('medicine','pil'));
        $this->set('_serialize', ['medicine','pil']);
        
    }     
    
    public function pildelete($mid = null, $id = null) {
        
        $this->loadModel('Pils'); 
        $pil = $this->Pils->get($id);
        if ($this->Pils->delete($pil)) {
            $this->Flash->success(__('Pils has been deleted.'));
        } else {
            $this->Flash->error(__('Pils could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'medicinepils',$mid]);
        
    }
    
    public function pilstatus($mid = null, $id = null, $status = null) {
        
        $this->loadModel('Pils'); 
        $tableRegObj = TableRegistry::get('Pils');
        //$subquestionExist = $tableRegObj->find()->where(['id' => $sqid, 'qid' => $qid])->toArray();
        //echo $subquestionExist->
        //pr($subquestionExist[0]->toArray()); exit;
        $query = $tableRegObj->find('all', [ 'conditions' => ['id' => $id, 'mid' => $mid]]);
        $row = $query->first()->toArray();
        //pr($row); exit;
        if($row){
            $subquestion = TableRegistry::get('Pils');
            $query = $subquestion->query();
            if($status == 1){
                $query->update()->set(['is_active' => 1])->where(['id' => $id])->execute();
                $this->Flash->success(__('Pils has been activated.'));
            } else if($status == 0){
                $query->update()->set(['is_active' => 0])->where(['id' => $id])->execute(); 
                $this->Flash->success(__('Pils has been suspended.'));
            }
        } else {
            $this->Flash->error(__('Pils Not Found.'));
        }
        
        return $this->redirect(['action' => 'medicinepils',$mid]);
        
    }    
    
    public function medicinequestion( $id =null ) {

        $this->viewBuilder()->layout('admin');
        
        $this->loadModel('MedicineQuestions'); 
        $medicinequestion = $this->MedicineQuestions->newEntity();        
        
        //$this->Medicines->recursive = 3; 
        $medicine = $this->Medicines->get($id,['contain' => ['Pils','Pils.Treatments','MedicineQuestions','MedicineQuestions.Question','MedicineQuestions.Question.QuestionCheckboxes']])->toArray();
        

        if ($this->request->is(['patch', 'post', 'put'])) {
            
            //pr($this->request->data); exit;
            
            $tableRegObj = TableRegistry::get('MedicineQuestions');
            $queExist = $tableRegObj->find()->where(['qid' => $this->request->data['qid'], 'mid' => $this->request->data['mid']])->toArray();
            
            $flag = true;
            
            if ($this->request->data['qid'] == "") {
                $this->Flash->error(__('Please Select Question.')); $flag = false;
            }            
            
            if($flag) {
                if ($queExist) {
                    $this->Flash->error(__('Question already Exist With this Medicine. Please, choose another.')); $flag = false;
                }
            }
            
            if($flag) {
                $medicinequestion = $this->MedicineQuestions->patchEntity($medicinequestion, $this->request->data);
                if ($this->MedicineQuestions->save($medicinequestion)) {
                    $this->Flash->success(__('Question has been added.'));
                    return $this->redirect(['action' => 'medicinequestion',$id]);
                } else {
                    $this->Flash->error(__('Question could not be added. Please, try again.'));
                }
            }            
        }

        $this->loadModel('MedicineQuestions'); $tableRegObj = TableRegistry::get('MedicineQuestions');
        $query = $tableRegObj->find('all', [ 'conditions' => ['mid' => $id]]); $questionlist = $query->all()->toArray();        

        $queExist = array(); foreach($questionlist as $qlist){ $queExist[] = $qlist->qid; }
      
        $this->loadModel('Questions'); $tableRegObj = TableRegistry::get('Questions');
        $query = $tableRegObj->find('list', [ 'conditions' => ['is_active' => 1]]); $questionlistdt = $query->all()->toArray();       

        $question = array(); foreach($questionlistdt as $k=>$v){ if (!in_array($k, $queExist)){ $question[$k] = $v; } }
        
        //pr($medicine); exit;
        
        $this->set(compact('medicine','medicinequestion','question'));
        $this->set('_serialize', ['medicine','medicinequestion','question']);
        
    }     

    
    public function questiondelete($mid = null, $id = null) {
        
        $this->loadModel('MedicineQuestions'); 
        $question = $this->MedicineQuestions->get($id);
        if ($this->MedicineQuestions->delete($question)) {
            $this->Flash->success(__('Question has been deleted.'));
        } else {
            $this->Flash->error(__('Question could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'medicinequestion',$mid]);
        
    }
    
    public function questionstatus($mid = null, $id = null, $status = null) {
        
        $this->loadModel('MedicineQuestions'); 
        $tableRegObj = TableRegistry::get('MedicineQuestions');
        //$subquestionExist = $tableRegObj->find()->where(['id' => $sqid, 'qid' => $qid])->toArray();
        //echo $subquestionExist->
        //pr($subquestionExist[0]->toArray()); exit;
        $query = $tableRegObj->find('all', [ 'conditions' => ['id' => $id, 'mid' => $mid]]);
        $row = $query->first()->toArray();
        //pr($row); exit;
        if($row){
            $subquestion = TableRegistry::get('MedicineQuestions');
            $query = $subquestion->query();
            if($status == 1){
                $query->update()->set(['is_active' => 1])->where(['id' => $id])->execute();
                $this->Flash->success(__('Medicine Questions has been activated.'));
            } else if($status == 0){
                $query->update()->set(['is_active' => 0])->where(['id' => $id])->execute(); 
                $this->Flash->success(__('Medicine Questions has been suspended.'));
            }
        } else {
            $this->Flash->error(__('Medicine Questions Not Found.'));
        }
        
        return $this->redirect(['action' => 'medicinequestion',$mid]);
        
    }     
    
    
    
}
