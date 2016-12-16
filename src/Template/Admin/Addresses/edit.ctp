<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $address->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $address->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Runs'), ['controller' => 'Runs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Run'), ['controller' => 'Runs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
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
							    <?= $this->Form->create($address) ?>
							    <fieldset>
							        <legend><?= __('Edit Address') ?></legend>
							        <?php
							            //echo '<div class="form-group">'.$this->Form->input('customer_id', array('class'=>'form-control'), ['options' => $customers, 'empty' => false]).'</div>';
							            //echo '<div class="form-group">'.$this->Form->input('run_id', array('class'=>'form-control'), ['options' => $runs, 'multiple' => false, 'empty' => false]).'</div>';
							            echo '<div class="form-group">'.$this->Form->select('customer_id',$customers,['empty' => 'Choose Customer', 'disabled' => 'disabled', 'class'=>'form-control']).'</div>';
										echo '<div class="form-group">'.$this->Form->select('run_id',$runs,['empty' => 'Choose Runs', 'class'=>'form-control']).'</div>';
							            echo '<div class="form-group">'.$this->Form->input('address', array('class'=>'form-control')).'</div>';
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