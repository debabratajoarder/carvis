<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Supplier'), ['action' => 'edit', $supplier->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Supplier'), ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
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
       <div class="table-responsive">
            <div class="runs view large-9 medium-8 columns content">
			    <h3>Detail of <?= h($supplier->name) ?></h3>
				    <table class="vertical-table">
				        <tr>
				            <th><?= __('Pin') ?></th>
				            <td><?= h($supplier->pin) ?></td>
				        </tr>
				        <tr>
				            <th><?= __('Name') ?></th>
				            <td><?= h($supplier->name) ?></td>
				        </tr>
				        <tr>
				            <th><?= __('Phone') ?></th>
				            <td><?= h($supplier->phone) ?></td>
				        </tr>
				        <tr>
				            <th><?= __('Email') ?></th>
				            <td><?= h($supplier->email) ?></td>
				        </tr>
				        <tr>
				            <th><?= __('Id') ?></th>
				            <td><?= $this->Number->format($supplier->id) ?></td>
				        </tr>
				        <tr>
				            <th><?= __('Created') ?></th>
				            <td><?= h($supplier->created) ?></td>
				        </tr>
				        <tr>
				            <th><?= __('Modified') ?></th>
				            <td><?= h($supplier->modified) ?></td>
				        </tr>
				    </table>
            </div>
        </div>
       
       <div class="table-responsive">
            <div class="runs view large-9 medium-8 columns content">
		        <h4><?= __('Address') ?></h4>
		        <?= $this->Text->autoParagraph(h($supplier->address)); ?>
            </div>
        </div>       
                
</div>
</div>