<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $customer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Templates'), ['controller' => 'Templates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Template'), ['controller' => 'Templates', 'action' => 'add']) ?></li>
    </ul>
</nav>-->
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
							    <?= $this->Form->create($customer) ?>
							    <fieldset>
							        <legend><?= __('Edit Customer') ?></legend>
							        <?php
							            echo '<div class="form-group">'.$this->Form->input('name', array('class'=>'form-control')).'</div>';
							            echo '<div class="form-group">'.$this->Form->input('phone', array('class'=>'form-control')).'</div>';
							            echo '<div class="form-group">'.$this->Form->input('email', array('class'=>'form-control')).'</div>';
							            echo '<div class="form-group">'.$this->Form->input('group_priority', array('empty' => 'Choose Group Priority', 'label'=>'Group Priority', 'type'=>'select', 
										'class'=>'form-control', 'options'=>$grprority)).'</div>';
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