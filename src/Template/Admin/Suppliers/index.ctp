<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['action' => 'add']) ?></li>
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
<div class="table-responsive">
    <h3><?= __('Suppliers') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('pin') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('phone') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <!--<th><?= $this->Paginator->sort('Product') ?></th>-->
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($suppliers as $supplier): ?>
            
            <tr>
                <td><?= $this->Number->format($supplier->id) ?></td>
                <td><?= h($supplier->pin) ?></td>
                <td><?= h($supplier->name) ?></td>
                <td><?= h($supplier->phone) ?></td>
                <td><?= h($supplier->email) ?></td>
				<!--<td>
				<?= $this->Html->link(__('List'), ['action' => 'productlist', $supplier->id, $supplier->name]) ?>
                <?= $this->Html->link(__('Add Products'), ['controller' => 'Products','action' => 'add', $supplier->id, $supplier->name]) ?>
             </td>-->
             
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $supplier->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $supplier->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]) ?>
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

