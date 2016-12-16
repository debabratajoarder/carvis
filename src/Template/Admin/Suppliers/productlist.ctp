<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Templates'), ['controller' => 'Templates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Template'), ['controller' => 'Templates', 'action' => 'add']) ?></li>
    </ul>
</nav>-->
<?php $namesuplier = $product->toArray()[0]->supplier->name; ?>
<div id="content">
    <div class="inner">
      <div class="row">
        <div class="col-lg-12">
         
        </div>
      </div>
      <hr />
<div class="table-responsive">
    <h3><?= __('Product List of ').$product->toArray()[0]->supplier->name ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('costprice') ?></th>
                <th><?= $this->Paginator->sort('weight') ?></th>
                
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($product as $prod): ?>
            <tr>
                <td><?= $this->Number->format($prod->id) ?></td>
                <td><?= h($prod->description) ?></td>
                <td><?= h($prod->costprice) ?></td>
                <td><?= h($prod->weight) ?></td>
                <td class="actions">
				    <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $prod->id, $prod->supplier_id]) ?>
				    
				    <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', 
				    $prod->id, $prod->supplier_id, $namesuplier]) ?>
				    
				    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $prod->id, 
				    $prod->supplier_id, $namesuplier], ['confirm' => __('Are you sure you want to delete # {0}?', $prod->id)]) ?>
				    
                </td>                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
</div>
