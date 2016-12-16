<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $run->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $run->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Runs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
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
                                <?= $this->Form->create($run) ?>
                                <fieldset>
                                    <legend><?= __('Edit Run') ?></legend>
                                    <?php
                                        echo '<div class="form-group">'.$this->Form->input('run_name', array('class'=>'form-control')).'</div>';
                                        echo '<div class="form-group">'.$this->Form->input('run_no', array('class'=>'form-control')).'</div>';
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
