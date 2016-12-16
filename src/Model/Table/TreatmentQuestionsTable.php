<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class TreatmentQuestionsTable extends Table {

    public function initialize(array $config) {

        $this->table('treatment_questions');
        $this->primaryKey('id');

        $this->belongsTo('Treatment', ['className' => 'Treatments', 'foreignKey' => 'mid', 'propertyName' => 'Treatments']);
        $this->belongsTo('Questions', ['className' => 'Questions', 'foreignKey' => 'qid', 'propertyName' => 'Questions']);
    }

}
