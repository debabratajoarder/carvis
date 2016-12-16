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
class SiteSettingsController extends AppController {

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

    public function logo() {
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

            if (!empty($this->request->data['site_favicon']['name'])) {
                $file1 = $this->request->data['site_favicon']; //put the data into a var for easy use
                $ext1 = substr(strtolower(strrchr($file1['name'], '.')), 1); //get the extension
                $fileName1 = 'favicon.' . $ext1;
                if (in_array($ext, $arr_ext)) {
                    move_uploaded_file($file1['tmp_name'], WWW_ROOT . 'logo' .DS. $fileName1);
                    if($data['site_favicon'] != ""){
                        if( $data['site_favicon'] != $fileName1 ){
                            $filePath1 = WWW_ROOT . 'logo' .DS.$data['site_favicon'];
                            if (file_exists($filePath1)) {
                                unlink($filePath1);
                            }
                        }
                    }
                    $favicon_name = $fileName1;
                }
            } else {
                $favicon_name = $data['site_favicon'];
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
    
    
    public function video() {
        //$this->viewBuilder()->layout('admin');
        
        $this->loadModel('SiteSettings');
        $data = $this->site_setting();
        if ($this->request->is('post')) {
            $arr_ext = array('mp4', 'MP4');
            if (!empty($this->request->data['site_video']['name'])) {
                $file = $this->request->data['site_video']; //put the data into a var for easy use
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $fileName = 'site_video.' . $ext;
                if (in_array($ext, $arr_ext)) {
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'video' .DS. $fileName);
                    if($data['video'] != ""){
                        if( $data['video'] != $fileName ){
                            $filePath = WWW_ROOT . 'logo' .DS.$data['site_video'];
                            if (file_exists($filePath)) {
                                unlink($filePath);
                            }
                        }
                    }
                    $vid_name = $fileName;
                }
            } else {
                $vid_name = $data['video'];
            }

            $sitesettings = TableRegistry::get('SiteSettings');
            $query = $sitesettings->query();
            
            if ( $query->update()->set(['video' => $vid_name])->where(['id' => $data['id']])->execute() ) {
                $this->Flash->success(__('The Video has been saved.'));
                return $this->redirect(['action' => 'video']);
            } else {
                $this->Flash->error(__('The Video could not be saved. Please, try again.'));
            }
        }

        $id = 1;
        $sitesettings = $this->SiteSettings->get($id);
        //$doctors = $this->paginate($this->Sitesettings);
        $this->set(compact('sitesettings'));
        $this->set('_serialize', ['sitesettings']);
    }    
    
    public function sitemap() {
        //$this->viewBuilder()->layout('admin');
        
        $this->loadModel('SiteSettings');
        $data = $this->site_setting();
        if ($this->request->is('post')) {
            pr($this->request->data); exit;
            $arr_ext = array('xml');
            if (!empty($this->request->data['site_map']['name'])) {
                $file = $this->request->data['site_map']; //put the data into a var for easy use
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $fileName = 'sitemap.xml';
                if (in_array($ext, $arr_ext)) {
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'logo' .DS. $fileName);
                    if($data['site_map'] != ""){
                        if( $data['site_map'] != $fileName ){
                            $filePath = WWW_ROOT . 'logo' .DS.$data['site_map'];
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

            if (!empty($this->request->data['site_favicon']['name'])) {
                $file1 = $this->request->data['site_favicon']; //put the data into a var for easy use
                $ext1 = substr(strtolower(strrchr($file1['name'], '.')), 1); //get the extension
                $fileName1 = 'favicon.' . $ext1;
                if (in_array($ext, $arr_ext)) {
                    move_uploaded_file($file1['tmp_name'], WWW_ROOT . 'logo' .DS. $fileName1);
                    if($data['site_favicon'] != ""){
                        if( $data['site_favicon'] != $fileName1 ){
                            $filePath1 = WWW_ROOT . 'logo' .DS.$data['site_favicon'];
                            if (file_exists($filePath1)) {
                                unlink($filePath1);
                            }
                        }
                    }
                    $favicon_name = $fileName1;
                }
            } else {
                $favicon_name = $data['site_favicon'];
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
    
    public function sitedetail($id = null) {

        $this->loadModel('SiteSettings');
        $data = $this->site_setting();
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            //pr($this->request->data); exit;
            
            $dt['site_title'] = $this->request->data['site_title'];
            $dt['paypal_email'] = $this->request->data['paypal_email'];
            $dt['contact_email'] = $this->request->data['contact_email'];
            $dt['contact_fax'] = $this->request->data['contact_fax'];
            $dt['contact_phone'] = $this->request->data['contact_phone'];
            /*
            $dt['twitter_url'] = $this->request->data['twitter_url'];
            $dt['linkedIn_url'] = $this->request->data['linkedIn_url'];
            $dt['facebook_url'] = $this->request->data['facebook_url'];
            $dt['gplus_url'] = $this->request->data['gplus_url'];
            $dt['youtube_url'] = $this->request->data['youtube_url'];
            $dt['google_analytics'] = $this->request->data['google_analytics']; 
            */
            
            $sitesettings = TableRegistry::get('SiteSettings');
            $query = $sitesettings->query();
            
            if ( $query->update()->set($dt)->where(['id' => $data['id']])->execute() ) {
                $this->Flash->success(__('Site Settings detail has been updated.'));
                return $this->redirect(['action' => 'sitedetail']);
            } else {
                $this->Flash->error(__('Site Settings detail could not be update. Please, try again.'));
            }            
        }
        
        $id = 1;
        $sitesettings = $this->SiteSettings->get($id);
        //$doctors = $this->paginate($this->Sitesettings);
        $this->set(compact('sitesettings'));
        $this->set('_serialize', ['sitesettings']);
    }    
    
    
    public function siteseo($id = null) {

        $this->loadModel('SiteSettings');
        $data = $this->site_setting();
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            //pr($this->request->data); exit;
            
            $dt['site_meta_title']          = $this->request->data['site_meta_title'];
            $dt['site_meta_key']            = $this->request->data['site_meta_key'];
            $dt['site_meta_description']    = $this->request->data['site_meta_description'];
            $dt['google_analytics']         = $this->request->data['google_analytics'];
            $sitesettings = TableRegistry::get('SiteSettings');
            $query = $sitesettings->query();
            
            if ( $query->update()->set($dt)->where(['id' => $data['id']])->execute() ) {
                $this->Flash->success(__('Site Settings detail has been updated.'));
                return $this->redirect(['action' => 'siteseo']);
            } else {
                $this->Flash->error(__('Site Settings detail could not be update. Please, try again.'));
            }            
            
        }
        
        $id = 1;
        $sitesettings = $this->SiteSettings->get($id);
        //$doctors = $this->paginate($this->Sitesettings);
        $this->set(compact('sitesettings'));
        $this->set('_serialize', ['sitesettings']);
    }     
    
    
    public function siteprescriptionfee($id = null) {

        $this->loadModel('SiteSettings');
        $id = 1;
        $data = $this->site_setting();
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            //pr($this->request->data); exit;
            
            $dt['prescfee']          = $this->request->data['prescfee'];
            $dt['prescription_fee']  = $this->request->data['prescription_fee'];
            $sitesettings = TableRegistry::get('SiteSettings');
            $query = $sitesettings->query();
            
            if ( $query->update()->set($dt)->where(['id' => $data['id']])->execute() ) {
                $this->Flash->success(__('Prescribtion Settings has been updated.'));
                return $this->redirect(['action' => 'siteprescriptionfee']);
            } else {
                $this->Flash->error(__('Prescribtion Settings detail could not be update. Please, try again.'));
            }            
            
        }
        
        
        $sitesettings = $this->SiteSettings->get($id);
        //$doctors = $this->paginate($this->Sitesettings);
        $this->set(compact('sitesettings'));
        $this->set('_serialize', ['sitesettings']);
    }     
    
    
    public function sitedeliverycharges($id = null) {

        $this->loadModel('SiteSettings');
        $id = 1;
        $data = $this->site_setting();
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            //pr($this->request->data); exit;
            
            $dt['deliverycharges']          = $this->request->data['deliverycharges'];
            $sitesettings = TableRegistry::get('SiteSettings');
            $query = $sitesettings->query();
            if ( $query->update()->set($dt)->where(['id' => $data['id']])->execute() ) {

                //$this->loadModel('Deliverycharges');
                //$this->Deliverycharges->query()->delete()->where(['is_active' => 1])->execute();
                
                $deliverycharge = TableRegistry::get('Deliverycharges');               
                foreach($this->request->data['name'] as $k=>$v){
                    $dtdc['value'] = $this->request->data['value'][$k];
                    $query = $deliverycharge->query();
                    $query->update()->set($dtdc)->where(['name' => $v])->execute();
                }

                $this->Flash->success(__('Delivery Settings has been updated.'));
                return $this->redirect(['action' => 'sitedeliverycharges']);
            } else {
                $this->Flash->error(__('Delivery Settings detail could not be update. Please, try again.'));
            }            
            
        }
        
        
        $sitesettings = $this->SiteSettings->get($id);
        
        
        $tableRegObj = TableRegistry::get('Deliverycharges');
        $deliverycharge = $tableRegObj->find()->where(['is_active' => 1])->toArray();
        
        //pr($deliverycharge); exit;
        
        //$doctors = $this->paginate($this->Sitesettings);
        $this->set(compact('sitesettings','deliverycharge'));
        $this->set('_serialize', ['sitesettings']);
    }     
    
    
    
    
    public function sitesociials($id = null) {

        $this->loadModel('SiteSettings');
        $data = $this->site_setting();
        if ($this->request->is(['patch', 'post', 'put'])) {
            //pr($this->request->data); exit;
            
            $dt['twitter_url'] = $this->request->data['twitter_url'];
            $dt['linkedIn_url'] = $this->request->data['linkedIn_url'];
            $dt['facebook_url'] = $this->request->data['facebook_url'];
            $dt['gplus_url'] = $this->request->data['gplus_url'];
            $dt['youtube_url'] = $this->request->data['youtube_url'];
                        
            $sitesettings = TableRegistry::get('SiteSettings');
            $query = $sitesettings->query();
            
            if ( $query->update()->set($dt)->where(['id' => $data['id']])->execute() ) {
                $this->Flash->success(__('Site Settings detail has been updated.'));
                return $this->redirect(['action' => 'sitesociials']);
            } else {
                $this->Flash->error(__('Site Settings detail could not be update. Please, try again.'));
            }            
        }
        
        $id = 1;
        $sitesettings = $this->SiteSettings->get($id);
        //$doctors = $this->paginate($this->Sitesettings);
        $this->set(compact('sitesettings'));
        $this->set('_serialize', ['sitesettings']);
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

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->viewBuilder()->layout('admin');
        $doctor = $this->Doctors->newEntity();
        if ($this->request->is('post')) {
            $doctors = $this->Doctors->patchEntity($doctor, $this->request->data);
            if ($this->Doctors->save($doctors)) {
                $this->Flash->success(__('The Doctor has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Doctor could not be saved. Please, try again.'));
            }
        }
        //$grprority = array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5');
        $this->set(compact('doctor'));
        $this->set('_serialize', ['doctor']);
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

    public function addresslist($id = null) {
        $this->viewBuilder()->layout('admin');
        //echo $id; exit;
        //$this->loadModel('Addrs'); $addr = $this->Addrs->find()->where(['customer_id' => $id]);
        //$adresses = TableRegistry::get('Adresses'); $adresses->find('all');

        $address = $this->Customers->Addresses->find()->contain(['Runs', 'Customers'])->where(['customer_id' => $id]);


        //$results = $address->toArray(); pr($results); exit;
        $address = $this->paginate($address);
        //$results = $address->toArray();
        //echo $id; pr($results); exit;

        $this->set(compact('address'));
        $this->set('_serialize', ['address']);
    }

}
