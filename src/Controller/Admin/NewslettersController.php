<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

use Cake\I18n\FrozenDate;
use Cake\Database\Type; 
Type::build('date')->setLocaleFormat('yyyy-MM-dd');

/** 
 * Runs Controller
 *
 * @property \App\Model\Table\RunsTable $Runs
 */
class NewslettersController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function beforeFilter(Event $event) {
        if (!$this->request->session()->check('Auth.Admin')) {
            return $this->redirect(['controller' => 'Users', 'action' => 'index']
            );
        }
    }

    public function index() {
        //pr($this->request->session()->check('Auth.Admin')); pr($this->request->session()->read('Auth.Admin')); exit;

        $this->viewBuilder()->layout('admin');
        $newsletter = $this->paginate($this->Newsletters);
        $this->set(compact('newsletter'));
        $this->set('_serialize', ['newsletter']);
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
        $newsletter = $this->Newsletters->get($id, [ 'contain' => [] ]);

        $this->set('newsletter', $newsletter);
        $this->set('_serialize', ['newsletter']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->viewBuilder()->layout('admin');
        $newsletter = $this->Newsletters->newEntity();
        if ($this->request->is('post')) {
            
            //echo "<pre>"; print_r($this->request->data); exit;
            
            $flag = true;
            if($this->request->data['title'] == ""){
                $this->Flash->error(__('Newsletter Title can not be null. Please, try again.')); $flag = false;
            }
            
            if($this->request->data['detail'] == ""){
                $this->Flash->error(__('Newsletter Detail can not be null. Please, try again.')); $flag = false;
            }

            if($flag){
                $newsletter = $this->Newsletters->patchEntity($newsletter, $this->request->data);
                if ($this->Newsletters->save($newsletter)) {
                    $this->Flash->success(__('Newsletter has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('Newsletter could not be saved. Please, try again.'));
                }
            }
        }
        $this->set(compact('newsletter'));
        $this->set('_serialize', ['newsletter']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Run id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $this->viewBuilder()->layout('admin');
        $newsletter = $this->Newsletters->get($id, [ 'contain' => [] ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            
            $flag = true;
            if($this->request->data['title'] == ""){
                $this->Flash->error(__('Newsletter title can not be null. Please, try again.')); $flag = false;
            }
            
            if($this->request->data['detail'] == ""){
                $this->Flash->error(__('Newsletter detail can not be null. Please, try again.')); $flag = false;
            }
            //pr($this->request->data);
            if($flag){         
                //$this->request->data['created'] = gmdate("Y-m-d h:i:s A");
                //$this->request->data['modified'] = gmdate("Y-m-d h:i:s A");
                //pr($this->request->data); exit;
                $newsletter = $this->Newsletters->patchEntity($newsletter, $this->request->data);
                //pr($news);exit;
                if ($this->Newsletters->save($newsletter)) {
                    $this->Flash->success(__('Newsletter has been updated.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('Newsletter could not be updated. Please, try again.'));
                }                
            }           

        }
        
        //echo $news->created->format('Y-m-d h:i:s A'); exit;
        
        //pr($news->toArray()); exit; 
        $this->set(compact('newsletter'));
        $this->set('_serialize', ['newsletter']);
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
        $newsletter = $this->Newsletters->get($id);
        if ($this->Newsletters->delete($newsletter)) {
            $this->Flash->success(__('Newsletter has been deleted.'));
        } else {
            $this->Flash->error(__('Newsletter could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
