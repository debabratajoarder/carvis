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

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

use Cake\I18n\FrozenDate;
use Cake\Database\Type; 
Type::build('date')->setLocaleFormat('yyyy-MM-dd');



/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['display','index','home','search','checkout','checklogin']); 
    }     
    
    
    
    public function display() {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    public function index() {
        $this->layout = '';

        //echo "<h1>This Site is under Development.<h1/>"; exit;
    }

    public function home() {
        
        
        
        $this->loadModel('Users');
        $query = $this->Users->find()->where(['Users.is_active' => 1,'Users.pimg !=' => ''])->order(['Users.id' => 'DESC'])->limit(4);
        $doctor = $query->all();
        
        $this->loadModel('Categories');
        $query1 = $this->Categories->find()
                                    ->hydrate(false)
                                    ->where(['id IN' => array(1,2,3,4)])
                                    ->contain(['TreatmentCategories.Treatments' => function($q) {
                                        return $q->select(['Treatments.id', 'Treatments.name', 'Treatments.slug', 'Treatments.category_id']);
                                    }])
                                    ->order(['id' => 'ASC']);
        $category = $query1->all();
        
        $this->loadModel('Treatments');
        $query2 = $this->Treatments->find()
                                   ->where(['Treatments.is_active' => 1,'Treatments.image !=' => ''])
                                   ->select(['Treatments.id', 'Treatments.name', 'Treatments.slug', 'Treatments.image'])
                                   ->order(['Treatments.id' => 'DESC'])
                                   ->contain(['Medicines' => function($q) {
                                        return $q->select(['Medicines.id', 'Medicines.title', 'Medicines.slug', 'Medicines.treatment_id']);
                                    }])
                                   ->limit(8);
        $treatments = $query2->all();
        
        
        $this->loadModel('Reviews');
        $this->loadModel('Users');
        
        $query3 = $this->Reviews->find()
                                   ->where(['Reviews.is_active' => 1])
                                   ->order(['Reviews.id' => 'DESC'])
                                   ->contain(['Users' => function($q) {
                                        return $q->select(['Users.id', 'Users.first_name', 'Users.last_name', 'Users.city']);
                                    }])
                                   ->limit(2);
        $review = $query3->all()->toArray();        
        //pr($review); exit;
        
        
        $this->loadModel('Newses');
        $query4 = $this->Newses->find()
                                   ->where(['Newses.is_active' => 1])
                                   ->order(['Newses.id' => 'DESC'])->limit(3);;
        $news = $query4->all()->toArray();        
        //pr($news); exit;
        //pr($treatments); pr($category); pr($doctor); exit;
        //pr($doctor); exit;
        
        $this->set(compact('treatments', 'category', 'doctor','review','news'));
        
        
        
        /*
          pj($this->request->session()->check('Auth.User'));
          pj($this->request->session()->read('Auth.User'));
          pr($this->request->session()->check('Auth.User'));
          pr($this->request->session()->read('Auth.User'));

          echo "qq"; exit;
         */

        //$this->layout = 'default';
        //$this->Flash->success(__('Patient has been deleted.'));
        //$this->Flash->error(__('Patient could not be deleted. Please, try again.'));
    }

    public function search() {
        $this->viewBuilder()->layout('default');

        //echo "<h1>This Site is under Development.<h1/>"; exit;
    }    
    
    
    public function checkout() {
        $this->viewBuilder()->layout('default');

        //echo "<h1>This Site is under Development.<h1/>"; exit;
    } 
    
    
        public function checklogin() {
        $this->viewBuilder()->layout('default');

        //echo "<h1>This Site is under Development.<h1/>"; exit;
    } 
    
}
