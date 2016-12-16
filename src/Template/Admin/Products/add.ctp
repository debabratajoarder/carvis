<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orderdetails'), ['controller' => 'Orderdetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Orderdetail'), ['controller' => 'Orderdetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
-->

<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
         
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                  <div class="box">
                    <div id="collapseOne" class="accordion-body collapse in body">
                        <div class="col-sm-6">
                            <div class="row">
							    <?= $this->Form->create($product) ?>
							    <fieldset>
							        <legend><?= __('Add Address') ?></legend>
							        <?php
							            echo '<div class="form-group">'.$this->Form->select('supplier_id', $suppliers, ['empty' => 'Choose Supplier', 'class'=>'form-control']).'</div>';
										echo '<div class="form-group">'.$this->Form->input('item_code', array('class'=>'form-control')).'</div>';
										echo '<div class="form-group">'.$this->Form->input('description', array('class'=>'form-control')).'</div>';
										echo '<div class="form-group">'.$this->Form->input('costprice', array('class'=>'form-control')).'</div>';
										echo '<div class="form-group">'.$this->Form->input('weight', array('class'=>'form-control')).'</div>';
										echo '<div class="form-group">'.$this->Form->input('p1', array('class'=>'form-control')).'</div>';
										echo '<div class="form-group">'.$this->Form->input('p2', array('class'=>'form-control')).'</div>';
										echo '<div class="form-group">'.$this->Form->input('p3', array('class'=>'form-control')).'</div>';
										echo '<div class="form-group">'.$this->Form->input('p4', array('class'=>'form-control')).'</div>';
										echo '<div class="form-group">'.$this->Form->input('p5', array('class'=>'form-control')).'</div>';
										
										
										echo '<div class="form-group">'.$this->Form->input('gst', array('empty' => 'Choose Status', 'label'=>'GST', 'type'=>'select', 
										'class'=>'form-control', 'options'=>$yesNoCond)).'</div>';
										
										echo '<div class="form-group">'.$this->Form->input('min_qty', array('empty' => 'Choose Status', 'label'=>'MIN QTY', 'type'=>'select', 
										'class'=>'form-control', 'options'=>$yesNoCond)).'</div>';										
										
										echo '<div class="form-group">'.$this->Form->input('mon_avail', array('empty' => 'Choose Status', 'label'=>'MON Availabel', 'type'=>'select', 
										'class'=>'form-control', 'options'=>$yesNoCond)).'</div>';										
										
										echo '<div class="form-group">'.$this->Form->input('tue_avail', array('empty' => 'Choose Status', 'label'=>'Tue Availabel', 'type'=>'select', 
										'class'=>'form-control', 'options'=>$yesNoCond)).'</div>';										
										
										echo '<div class="form-group">'.$this->Form->input('wed_avail', array('empty' => 'Choose Status', 'label'=>'Wed Availabel', 'type'=>'select', 
										'class'=>'form-control', 'options'=>$yesNoCond)).'</div>';
										
										echo '<div class="form-group">'.$this->Form->input('thu_avail', array('empty' => 'Choose Status', 'label'=>'Thu Availabel', 'type'=>'select', 
										'class'=>'form-control', 'options'=>$yesNoCond)).'</div>';										
										
										echo '<div class="form-group">'.$this->Form->input('fri_avail', array('empty' => 'Choose Status', 'label'=>'Fri Availabel', 'type'=>'select', 
										'class'=>'form-control', 'options'=>$yesNoCond)).'</div>';
										
										echo '<div class="form-group">'.$this->Form->input('sat_avail', array('empty' => 'Choose Status', 'label'=>'Sat Availabel', 'type'=>'select', 
										'class'=>'form-control', 'options'=>$yesNoCond)).'</div>';										
										
										echo '<div class="form-group">'.$this->Form->input('sun_avail', array('empty' => 'Choose Status', 'label'=>'Sun Availabel', 'type'=>'select', 
										'class'=>'form-control', 'options'=>$yesNoCond)).'</div>';
										
										//echo '<div class="form-group">'.$this->Form->select('field',$customers,['empty' => 'Choose Customer', 'class'=>'form-control']).'</div>';
							        ?>
							    </fieldset>
							    <?= $this->Form->button(__('Submit')) ?>
							    <?= $this->Form->end() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





