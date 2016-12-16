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
class ContactsController extends AppController {

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

     
    public function index() {
        //pr($this->request->session()->check('Auth.Admin')); pr($this->request->session()->read('Auth.Admin')); exit;
			
        $this->viewBuilder()->layout('admin');
        $contacts = $this->paginate($this->Contacts);
        $this->set(compact('contacts'));
        $this->set('_serialize', ['contacts']);
    }

    /**
     * View method
     *
     * @param string|null $id Run id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $run = $this->Runs->get($id, [
            'contain' => ['Addresses', 'Orders']
        ]);

        $this->set('run', $run);
        $this->set('_serialize', ['run']);
    }

}
