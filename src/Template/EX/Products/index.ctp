<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orderdetails'), ['controller' => 'Orderdetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Orderdetail'), ['controller' => 'Orderdetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="products index large-9 medium-8 columns content">
    <h3><?= __('Products') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('supplier_id') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('costprice') ?></th>
                <th><?= $this->Paginator->sort('weight') ?></th>
                <th><?= $this->Paginator->sort('p1') ?></th>
                <th><?= $this->Paginator->sort('p2') ?></th>
                <th><?= $this->Paginator->sort('p3') ?></th>
                <th><?= $this->Paginator->sort('p4') ?></th>
                <th><?= $this->Paginator->sort('p5') ?></th>
                <th><?= $this->Paginator->sort('gst') ?></th>
                <th><?= $this->Paginator->sort('min_qty') ?></th>
                <th><?= $this->Paginator->sort('mon_avail') ?></th>
                <th><?= $this->Paginator->sort('tue_avail') ?></th>
                <th><?= $this->Paginator->sort('wed_avail') ?></th>
                <th><?= $this->Paginator->sort('thu_avail') ?></th>
                <th><?= $this->Paginator->sort('fri_avail') ?></th>
                <th><?= $this->Paginator->sort('sat_avail') ?></th>
                <th><?= $this->Paginator->sort('sun_avail') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $this->Number->format($product->id) ?></td>
                <td><?= $product->has('supplier') ? $this->Html->link($product->supplier->name, ['controller' => 'Suppliers', 'action' => 'view', $product->supplier->id]) : '' ?></td>
                <td><?= h($product->description) ?></td>
                <td><?= $this->Number->format($product->costprice) ?></td>
                <td><?= h($product->weight) ?></td>
                <td><?= $this->Number->format($product->p1) ?></td>
                <td><?= $this->Number->format($product->p2) ?></td>
                <td><?= $this->Number->format($product->p3) ?></td>
                <td><?= $this->Number->format($product->p4) ?></td>
                <td><?= $this->Number->format($product->p5) ?></td>
                <td><?= h($product->gst) ?></td>
                <td><?= h($product->min_qty) ?></td>
                <td><?= h($product->mon_avail) ?></td>
                <td><?= h($product->tue_avail) ?></td>
                <td><?= h($product->wed_avail) ?></td>
                <td><?= h($product->thu_avail) ?></td>
                <td><?= h($product->fri_avail) ?></td>
                <td><?= h($product->sat_avail) ?></td>
                <td><?= h($product->sun_avail) ?></td>
                <td><?= h($product->created) ?></td>
                <td><?= h($product->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
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
