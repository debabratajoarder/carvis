<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Mailer\Email;
use Cake\Routing\Router;

use Cake\I18n\FrozenDate;
use Cake\Database\Type; 
Type::build('date')->setLocaleFormat('yyyy-MM-dd');


class UsersController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['index']);
     }   
    
    public $uses = array('User', 'Admin');

    public function index() {
        //$this->layout = 'adminlogin';
        $this->viewBuilder()->layout('adminlogin');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            //if ($user['type'] == 'superadmin') { }
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error('Your username or password is incorrect.');
            }
        }
    }

    public function login() {
        //$this->layout = 'admin';
        $this->viewBuilder()->layout('admin');
    }

    public function home() {
        /*
          echo "hello";
          pr($this->Auth->user('id'));
          pr($this->Auth->user('type'));
         */

        /* 
          pj($this->request->session()->check('Auth.Admin'));
          pj($this->request->session()->read('Auth.Admin'));
          pr($this->request->session()->check('Auth.Admin'));
          pr($this->request->session()->read('Auth.Admin'));
          exit;
         */

        $this->viewBuilder()->layout('admin');
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function settings() {
        $this->viewBuilder()->layout('admin');
        $users = TableRegistry::get('Users');
        $user = $users->get($this->Auth->user('id'));
        if (!empty($this->request->data)) {
            $user->username = $this->request->data['username'];
            if ($this->request->data['admin_password'] != "") {
                $user->password = $this->request->data['admin_password'];
            }
            $user->email = $this->request->data['email'];
            $users->save($user);
            $this->Flash->success('Your details has been saved.', ['key' => 'success']);
            //if($this->Users->save($this->request->data)) {
            ///echo "hello";
            //}
        }
        //
        //$user = $this->Users->get($this->Auth->user('id'));//$users->get($this->Auth->user('id'));
        //pr($user->password);
        //pr($user['username']);
        $this->set('user', $user);
    }
    
    
    
    //User Type Patient

    public function listuser() {
        $this->viewBuilder()->layout('admin');
        //$user = $this->Users->find();
        $this->paginate = ['conditions' => ['Users.utype' => 1]];
        $user = $this->paginate($this->Users);
        //pr($user->toArray());
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
 
    }

    public function add() {
        $this->viewBuilder()->layout('admin');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {

            $flag = true;
            //echo $this->generateRandomString(); exit;
            $tableRegObj = TableRegistry::get('Users');
            $userExist = $tableRegObj->find()->where(['email' => $this->request->data['email']])->toArray();

            if($this->request->data['first_name'] == ""){
                $this->Flash->error(__('First Name can not be null. Please, try again.')); $flag = false;
            }
            
            if($flag){
                if($this->request->data['last_name'] == ""){
                    $this->Flash->error(__('Last Name can not be null. Please, try again.')); $flag = false;
                }            
            }
            
            if($flag){
                if($this->request->data['email'] == ""){
                    $this->Flash->error(__('Last Name can not be null. Please, try again.')); $flag = false;
                }            
            }            
            
            if($flag){
                if($userExist){
                    $flag = false;
                    $this->Flash->error(__('Email Already Registered, try with another.'));
                }  
            }            

            if($flag){
                if($this->request->data['phone'] == ""){
                    $this->Flash->error(__('Phone can not be null. Please, try again.')); $flag = false;
                }            
            }            
            
            if($flag){
                if($this->request->data['password'] == ""){
                    $this->Flash->error(__('password can not be null. Please, try again.')); $flag = false;
                }            
            }            

            if($flag){
                $fullname = $this->request->data['first_name']. " ". $this->request->data['last_name'];
                $themail = $this->request->data['email'];
                
                $pass = $this->request->data['password'];
                $this->request->data['ptxt'] = base64_encode($this->request->data['password']);           
                $this->request->data['created'] = gmdate("Y-m-d h:i:s");
                $this->request->data['modified'] = gmdate("Y-m-d h:i:s");                
                
                $user = $this->Users->patchEntity($user, $this->request->data);
                if ($rs = $this->Users->save($user)) {
                    
                    $unique_id = $this->generateRandomString();
                    $unique_id = $unique_id.$rs->id;
                    
                    $subquestion = TableRegistry::get('Users');
                    $query = $subquestion->query();
                    $query->update()->set(['unique_id' => $unique_id])->where(['id' => $rs->id])->execute();

                    $unique_id = $this->generateRandomString();
                    $unique_id = $unique_id.$rs->id;

                    $userdt = TableRegistry::get('Users');
                    $query = $userdt->query();
                    $query->update()->set(['unique_id' => $unique_id])->where(['id' => $rs->id])->execute();

                    $etRegObj = TableRegistry::get('EmailTemplates');
                    $emailTemp = $etRegObj->find()->where(['id' => 5])->first()->toArray(); 

                    $mail_To = $themail;
                    //$mail_CC = '';
                    $mail_subject = $emailTemp['subject'];
                    $url = Router::url('/', true);
                    $link = $url.'users/signin';
                    
                    $mail_body = str_replace(array('[NAME]', '[LINK]', '[EMAIL]', '[PASS]'), array($fullname, $link, $mail_To, $pass), $emailTemp['content']);
                    //echo $mail_body; //exit;

                    $email = new Email('default');
                    $email->emailFormat('html')->from(['info@ascotpharmacy.com' => 'Ascot Pharmacy'])
                                                ->to($mail_To)
                                                ->subject($mail_subject)
                                                ->send($mail_body);                

                    $this->Flash->success('Patient added.', ['key' => 'success']);

                    //pr($this->request->data); pr($user); exit;
                    $this->redirect(['action' => 'listuser']);
                }
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function edituser($id = null) {
        $this->viewBuilder()->layout('admin');
        $user = $this->Users->get($id);
        if ($this->request->is(['post', 'put'])) {
            //pr($this->request->data); exit;
            $flag = true;
            if($this->request->data['first_name'] == ""){
                $this->Flash->error(__('First Name can not be null. Please, try again.')); $flag = false;
            }
            
            if($this->request->data['last_name'] == ""){
                $this->Flash->error(__('Last Name can not be null. Please, try again.')); $flag = false;
            }            
            
            if($this->request->data['phone'] == ""){
                $this->Flash->error(__('Phone can not be null. Please, try again.')); $flag = false;
            }            
            
            if($this->request->data['epassword'] != ""){
                $this->request->data['password'] = $this->request->data['epassword'];
                $this->request->data['ptxt'] = base64_encode($this->request->data['epassword']);
            }

            if($flag){
                $this->request->data['modified'] = gmdate("Y-m-d h:i:s");
                $user = $this->Users->patchEntity($user, $this->request->data);
                
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Patient has been edited successfully.'));
                    return $this->redirect(['action' => 'listuser']);
                } else {
                    $this->Flash->error(__('Patient could not be edit. Please, try again.'));
                    return $this->redirect(['action' => 'listuser']);
                }
            } else {
                return $this->redirect(['action' => 'listuser']);
            }           
        }
        
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function userdelete($id = null) {
        //$this->request->allowMethod(['post', 'delete']);
        $users = $this->Users->get($id);
        if ($this->Users->delete($users)) {
            $this->Flash->success(__('Patient has been deleted.'));
        } else {
            $this->Flash->error(__('Patient could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'listuser']);
    }    
    
    public function userview($id = null) {

        $this->viewBuilder()->layout('admin');
        $users = $this->Users->get($id);

        //$results = $customer->toArray(); 
        //pr($users); exit;

        $this->set('users', $users);
        $this->set('_serialize', ['users']);
    }    
    
    
    
    //User Type Doctor
    
    
    public function listdoctorall() {
        echo "ee"; exit;
        $session = $this->request->session();
        $session->write('searchadmdovtor', '');
        
        //$this->redirect(['action' => 'listdoctor']);
    }    
    
    
    
                    
    public function listdoctor( $triger = null ) {
        $this->viewBuilder()->layout('admin');
        //$user = $this->Users->find();
        
        $session = $this->request->session();
        if($triger == 'all' ){ 
            unset($this->request->data['searchheadadm']); 
            $session->write('data', ''); 
            $session->delete('data');  
            $this->redirect(['action' => 'listdoctor']);
        }
        
        //pr($this->request->data); echo $xx = $session->read('searchadmdovtor'); exit;

        if (!empty($this->request->data) || !empty($session->read('data'))) {
            //pr($this->request->data); exit;
            if (!empty($this->request->data)) {
                $session->write('data', $this->request->data['searchheadadm']);
            } else {
                $this->request->data['searchheadadm'] = $session->read('data'); 
            }
            $searcData = $this->request->data['searchheadadm'];
            //pr($this->request->data); exit;
            $query = $this->Users->find();
            if ($this->request->data['searchheadadm']) {
                $searchheadadm = $this->request->data['searchheadadm'];
                $query->where(['first_name LIKE' => '%' . $searchheadadm . '%', 'Users.utype' => 2]);
                $query->orWhere(['last_name LIKE' => '%' . $searchheadadm . '%', 'Users.utype' => 2]);
                $this->set(compact('searchheadadm'));
                $this->set('user', $this->paginate($query, ['order' => [ 'id' => 'DESC']]));
                $this->set('_serialize', ['user']);               
            } else {
                $this->paginate = ['conditions' => ['Users.utype' => 2], 'order' => [ 'id' => 'DESC']];
                $user = $this->paginate($this->Users);
                //pr($user->toArray());
                $this->set(compact('user'));
                $this->set('_serialize', ['user']); 
            }
        } else {
            $this->paginate = ['conditions' => ['Users.utype' => 2], 'order' => [ 'id' => 'DESC']];
            $user = $this->paginate($this->Users);
            //pr($user->toArray());
            $this->set(compact('user'));
            $this->set('_serialize', ['user']);            
        }        

    }

    public function adddoctor() {
        $this->viewBuilder()->layout('admin');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            //pr($this->request->data); exit;
            $flag = true;
            //echo $this->generateRandomString(); exit;
            $tableRegObj = TableRegistry::get('Users');
            $userExist = $tableRegObj->find()->where(['email' => $this->request->data['email']])->toArray();

            if($this->request->data['first_name'] == ""){
                $this->Flash->error(__('First Name can not be null. Please, try again.')); $flag = false;
            }
            
            if($flag){
                if($this->request->data['last_name'] == ""){
                    $this->Flash->error(__('Last Name can not be null. Please, try again.')); $flag = false;
                }            
            }
            
            if($flag){
                if($this->request->data['email'] == ""){
                    $this->Flash->error(__('Last Name can not be null. Please, try again.')); $flag = false;
                }            
            }            
            
            if($flag){
                if($userExist){
                    $flag = false;
                    $this->Flash->error(__('Email Already Registered, try with another.'));
                }  
            }            

            if($flag){
                if($this->request->data['phone'] == ""){
                    $this->Flash->error(__('Phone can not be null. Please, try again.')); $flag = false;
                }            
            }            
            
            if($flag){
                if($this->request->data['password'] == ""){
                    $this->Flash->error(__('password can not be null. Please, try again.')); $flag = false;
                }            
            }            
            $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
            if (!empty($this->request->data['image']['name'])) {
                $file = $this->request->data['image']; //put the data into a var for easy use
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $fileName = time() . "." . $ext;
                if (in_array($ext, $arr_ext)) {
                    
                    if ($user->pimg != "" && $user->pimg != $fileName ) {
                        $filePathDel = WWW_ROOT . 'user_img' . DS . $user->pimg;
                        if (file_exists($filePathDel)) {
                            unlink($filePathDel);
                        }
                    }                     
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'user_img' . DS . $fileName);
                    $file = $fileName;
                    $this->request->data['pimg'] = $fileName;
                } else {
                    $flag = false;
                    $this->Flash->error(__('Upload image only jpg,jpeg,png files.'));
                }
            } else {
                $flag = false;
                $this->Flash->error(__('Upload image For Treatment.'));
            }                
            

            
            if($flag){
                $fullname = $this->request->data['first_name']. " ". $this->request->data['last_name'];
                $themail = $this->request->data['email'];
                $pass = $this->request->data['password'];
                $this->request->data['ptxt'] = base64_encode($this->request->data['password']);           
                $this->request->data['created'] = gmdate("Y-m-d h:i:s");
                $this->request->data['modified'] = gmdate("Y-m-d h:i:s");                
                
                $user = $this->Users->patchEntity($user, $this->request->data);
                if ($rs = $this->Users->save($user)) {
                    
                    $unique_id = $this->generateRandomString();
                    $unique_id = $unique_id.$rs->id;
                    
                    $subquestion = TableRegistry::get('Users');
                    $query = $subquestion->query();
                    $query->update()->set(['unique_id' => $unique_id])->where(['id' => $rs->id])->execute();

                    $unique_id = $this->generateRandomString();
                    $unique_id = $unique_id.$rs->id;

                    $userdt = TableRegistry::get('Users');
                    $query = $userdt->query();
                    $query->update()->set(['unique_id' => $unique_id])->where(['id' => $rs->id])->execute();

                    $etRegObj = TableRegistry::get('EmailTemplates');
                    $emailTemp = $etRegObj->find()->where(['id' => 4])->first()->toArray(); 

                    $mail_To = $themail;
                    //$mail_CC = '';
                    $mail_subject = $emailTemp['subject'];
                    $url = Router::url('/', true);
                    $link = $url.'users/signin';

                    $mail_body = str_replace(array('[NAME]', '[LINK]', '[EMAIL]', '[PASS]'), array($fullname, $link, $mail_To, $pass), $emailTemp['content']);
                    //echo $mail_body; //exit;

                    $email = new Email('default');
                    $email->emailFormat('html')->from(['info@ascotpharmacy.com' => 'Ascot Pharmacy'])
                                                ->to($mail_To)
                                                ->subject($mail_subject)
                                                ->send($mail_body);                

                    //pr($this->request->data); pr($userExist); exit; 
                    $this->Flash->success('Doctors added successfully.', ['key' => 'success']);

                    //pr($this->request->data); pr($user); exit;
                    $this->redirect(['action' => 'listdoctor']);                    
                }
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function editdoctor($id = null) {
        $this->viewBuilder()->layout('admin');
        $user = $this->Users->get($id);
        if ($this->request->is(['post', 'put'])) {
            
            //pr($user); exit; pr($this->request->data); exit;
            
            $flag = true;
            if($this->request->data['first_name'] == ""){
                $this->Flash->error(__('First Name can not be null. Please, try again.')); $flag = false;
            }
            
            if($this->request->data['last_name'] == ""){
                $this->Flash->error(__('Last Name can not be null. Please, try again.')); $flag = false;
            }            
            
            if($this->request->data['phone'] == ""){
                $this->Flash->error(__('Phone can not be null. Please, try again.')); $flag = false;
            }            
            
            if($this->request->data['epassword'] != ""){
                $this->request->data['password'] = $this->request->data['epassword'];
                $this->request->data['ptxt'] = base64_encode($this->request->data['epassword']);
            }
            
            $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
            if (!empty($this->request->data['image']['name'])) {
                $file = $this->request->data['image']; //put the data into a var for easy use
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $fileName = time() . "." . $ext;
                if (in_array($ext, $arr_ext)) {
                    
                    if ($user->pimg != "" && $user->pimg != $fileName ) {
                        $filePathDel = WWW_ROOT . 'user_img' . DS . $user->pimg;
                        if (file_exists($filePathDel)) {
                            unlink($filePathDel);
                        }
                    }                     
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'user_img' . DS . $fileName);
                    $file = $fileName;
                    $this->request->data['pimg'] = $fileName;
                } else {
                    $flag = false;
                    $this->Flash->error(__('Upload image only jpg,jpeg,png files.'));
                }
            } else {
                $this->request->data['pimg'] = $user->pimg;
            }             
            
            
            

            if($flag){
                
                //$this->request->data['ptxt'] = base64_encode($this->request->data['password']);
                $this->request->data['modified'] = gmdate("Y-m-d h:i:s");
                $user = $this->Users->patchEntity($user, $this->request->data);
                
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Doctor has been edited successfully.'));
                    return $this->redirect(['action' => 'listdoctor']);
                } else {
                    $this->Flash->error(__('Doctor could not be edit. Please, try again.'));
                    //return $this->redirect(['action' => 'listuser']);
                }
            } else {
                $this->Flash->error(__('Doctor could not be edit. Please, try again.'));
            }           
        }
        
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function doctordelete($id = null) {
        //$this->request->allowMethod(['post', 'delete']);
        $users = $this->Users->get($id);
        if ($this->Users->delete($users)) {
            $this->Flash->success(__('Patient has been deleted.'));
        } else {
            $this->Flash->error(__('Patient could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'listuser']);
    }    
    
    public function doctorview($id = null) {

        $this->viewBuilder()->layout('admin');
        $users = $this->Users->get($id);

        //$results = $customer->toArray(); 
        //pr($users); exit;

        $this->set('users', $users);
        $this->set('_serialize', ['users']);
    }    
    
    
    
    public function docstatus($id = null, $status = null) {
        //echo $id; echo "--"; echo $status; //exit;
        $this->loadModel('Users'); 
        $tableRegObj = TableRegistry::get('Users');
        $query = $tableRegObj->find('all', [ 'conditions' => ['id' => $id]]);
        $row = $query->first()->toArray();
        //pr($row); exit;
        if($row){
            $subquestion = TableRegistry::get('Users');
            $query = $subquestion->query();
            if($status == 1){
                $query->update()->set(['is_active' => 1])->where(['id' => $id])->execute();
                $this->Flash->success(__('Doctor has been activated.'));
            } else if($status == 0){
                $query->update()->set(['is_active' => 0])->where(['id' => $id])->execute(); 
                $this->Flash->success(__('Doctor has been suspended.'));
            }
        } else {
            $this->Flash->error(__('Doctor Not Found.'));
        }        
        return $this->redirect(['action' => 'listdoctor']);
    }     
    
    public function userstatus($id = null, $status = null) {
        //echo $id; echo "--"; echo $status; //exit;
        $this->loadModel('Users'); 
        $tableRegObj = TableRegistry::get('Users');
        $query = $tableRegObj->find('all', [ 'conditions' => ['id' => $id]]);
        $row = $query->first()->toArray();
        //pr($row); exit;
        if($row){
            $subquestion = TableRegistry::get('Users');
            $query = $subquestion->query();
            if($status == 1){
                $query->update()->set(['is_active' => 1])->where(['id' => $id])->execute();
                $this->Flash->success(__('Patient has been activated.'));
            } else if($status == 0){
                $query->update()->set(['is_active' => 0])->where(['id' => $id])->execute(); 
                $this->Flash->success(__('Patient has been suspended.'));
            }
        } else {
            $this->Flash->error(__('Patient Not Found.'));
        }        
        return $this->redirect(['action' => 'listuser']); 
    }
    
}
