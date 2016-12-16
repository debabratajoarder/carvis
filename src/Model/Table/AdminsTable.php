<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class AdminsTable extends Table {

    public function initialize(array $config) {
        
        
        /*
        $this->hasMany('Reviews', [
            'foreignKey' => 'service_provider_id',
            'dependent' => true,
        ]);

        
        $this->hasOne('Bankdetails', [
            'className' => 'Bankdetails',
            'foreignKey' => 'service_provider_id',
            'propertyName' => 'Bankdetails'
        ]);

        $this->hasOne('Packagedetails', [
            'className' => 'Packagedetails',
            'foreignKey' => 'id',
            'propertyName' => 'Packagedetails'
        ]);
        */

        //$this->belongsTo('Packagedetails', [
        //'className' => 'Packagedetails',
        //  'foreignKey' => 'id',
        //  'propertyName' => 'Packagedetails'
        // ]);
    }

}
