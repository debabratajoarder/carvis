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
class SlidersController extends AppController {

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
        $sliders = $this->paginate($this->Sliders);
        $this->set(compact('sliders'));
        $this->set('_serialize', ['sliders']);
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
        $slide = $this->Sliders->get($id);
        //$results = $customer->toArray(); pr($results); exit;
        $this->set('slide', $slide);
        $this->set('_serialize', ['slide']);
    }

    public function add() {
        //$this->viewBuilder()->layout('admin');
        $this->loadModel('Sliders');
        $sliders = $this->Sliders->newEntity();

        if ($this->request->is('post')) {
            $flag = true;
            $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
            if (!empty($this->request->data['file']['name'])) {
                $file = $this->request->data['file']; //put the data into a var for easy use
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $fileName = time() . "." . $ext;
                if (in_array($ext, $arr_ext)) {
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'home_slider' . DS . $fileName);
                    /*
                      if($data['file'] != ""){
                      if( $data['site_logo'] != $fileName ){
                      $filePath = WWW_ROOT . 'logo' .DS.$data['site_logo'];
                      if (file_exists($filePath)) {
                      unlink($filePath);
                      }
                      }
                      }
                     */
                    $file = $fileName;
                } else {
                    $flag = false;
                    $this->Flash->error(__('Upload home slider image only jpg,jpeg,png files.'));
                }
            } else {
                $flag = false;
                $this->Flash->error(__('Upload image For home slider.'));
            }

            if ($flag) {
                $this->request->data['file'] = $file;
                $sliders = $this->Sliders->patchEntity($sliders, $this->request->data);
                if ($this->Sliders->save($sliders)) {
                    $this->Flash->success(__('Home slider has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('Home slider could not be saved. Please, try again.'));
                }
            }
        }
        $this->set(compact('sliders'));
        $this->set('_serialize', ['sliders']);
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
        $sliders = $this->Sliders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            //pr($sliders);
            //pr($this->request->data); exit;

            $flag = true;
            $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
            if (!empty($this->request->data['file']['name'])) {
                $file = $this->request->data['file']; //put the data into a var for easy use
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $fileName = time() . "." . $ext;
                if (in_array($ext, $arr_ext)) {
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'home_slider' . DS . $fileName);

                    if ($sliders->file != "") {
                        if ($sliders->file != $fileName) {
                            $filePath = WWW_ROOT . 'home_slider' . DS . $sliders->file;
                            if (file_exists($filePath)) {
                                unlink($filePath);
                            }
                        }
                    }
                    $file = $fileName;
                } else {
                    $flag = false;
                    $this->Flash->error(__('Upload home slider image only jpg,jpeg,png files.'));
                }
            } else {
                $flag = false;
                $this->Flash->error(__('Upload image For home slider.'));
            }
            if ($flag) {
                $this->request->data['file'] = $file;
                $sliders = $this->Sliders->patchEntity($sliders, $this->request->data);
                if ($this->Sliders->save($sliders)) {
                    $this->Flash->success(__('Home slider has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('Home slider could not be saved. Please, try again.'));
                }
            }
        }
        $this->set(compact('sliders'));
        $this->set('_serialize', ['sliders']);
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
        $slider = $this->Sliders->get($id);

        //pr($slider); exit;
        if ($this->Sliders->delete($slider)) {
            if ($slider->file != "") {
                $filePath = WWW_ROOT . 'home_slider' . DS . $slider->file;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            $this->Flash->success(__('Home Sliders has been deleted.'));
        } else {
            $this->Flash->error(__('Home Sliders could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
