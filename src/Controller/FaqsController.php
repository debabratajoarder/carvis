<?php

namespace App\Controller;

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
class FaqsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['index','treatmentfaq']); 
    }     
    
    
    public function beforeFilter(Event $event) {

    }

    public function index() {
        //pr($this->request->session()->check('Auth.Admin')); pr($this->request->session()->read('Auth.Admin')); exit;

        $this->viewBuilder()->layout('default');
        $faqs = $this->Faqs->find()->where(['Faqs.cat' => 'general','Faqs.is_active' => 1])->toArray();

        $this->loadModel('Treatments');
        $this->loadModel('TreatmentFaqs');
        $data = $this->Treatments->find()
                ->hydrate(false)
                ->select(['Treatments.id', 'Treatments.name', 'Treatments.slug'])
                ->where(['Treatments.is_active' => 1])->all()->toArray();        
        $trFaqList = array();
        $ik = 0;
        foreach($data as $trList){
            
            $dataList = $this->TreatmentFaqs->find()->hydrate(false)->where(['TreatmentFaqs.treatment_id' => $trList['id'], 'TreatmentFaqs.is_active' => 1])->all()->toArray();             
            if(!empty($dataList)){
                
                $trFaqList[$ik]['Treatment'] = $trList;
                $trFaqList[$ik]['Faq'] = $dataList;
                $ik ++ ;
                
            }
        }

        $this->set(compact('faqs','trFaqList'));
        $this->set('_serialize', ['faqs','trFaqList']);
    }
    
    
    public function treatmentfaq($slug = null) {

        $this->viewBuilder()->layout('default');

        $this->loadModel('Treatments');
        $this->loadModel('TreatmentFaqs');
        $data = $this->Treatments->find()
                ->hydrate(false)
                ->select(['Treatments.id', 'Treatments.name', 'Treatments.slug'])
                ->where(['Treatments.slug' => $slug])->first(); 

        $dataList = $this->TreatmentFaqs->find()->hydrate(false)->where(['TreatmentFaqs.treatment_id' => $data['id'], 'TreatmentFaqs.is_active' => 1])->all()->toArray();             
        //pr($data); pr($dataList); exit;

        $this->set(compact('data','dataList'));
        $this->set('_serialize', ['data','dataList']);
    }

}
