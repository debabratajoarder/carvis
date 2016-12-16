<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $supplier->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
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
							    <?= $this->Form->create($supplier) ?>
							    <fieldset>
							        <legend><?= __('Edit Supplier') ?></legend>
							        <?php
							            echo '<div class="form-group">'.$this->Form->input('pin', array('class'=>'form-control')).'</div>';
										 echo '<div class="form-group">'.$this->Form->input('name', array('class'=>'form-control')).'</div>';
							            echo '<div class="form-group">'.$this->Form->input('phone', array('class'=>'form-control')).'</div>';
							            echo '<div class="form-group">'.$this->Form->input('email', array('class'=>'form-control')).'</div>';
							            echo '<div class="form-group">'.$this->Form->input('address', array('class'=>'form-control')).'</div>';
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