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
<div class="suppliers view large-9 medium-8 columns content">
    <h3><?= h($supplier->name) ?></h3>
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
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($supplier->address)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($supplier->products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Supplier Id') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Costprice') ?></th>
                <th><?= __('Weight') ?></th>
                <th><?= __('P1') ?></th>
                <th><?= __('P2') ?></th>
                <th><?= __('P3') ?></th>
                <th><?= __('P4') ?></th>
                <th><?= __('P5') ?></th>
                <th><?= __('Gst') ?></th>
                <th><?= __('Min Qty') ?></th>
                <th><?= __('Mon Avail') ?></th>
                <th><?= __('Tue Avail') ?></th>
                <th><?= __('Wed Avail') ?></th>
                <th><?= __('Thu Avail') ?></th>
                <th><?= __('Fri Avail') ?></th>
                <th><?= __('Sat Avail') ?></th>
                <th><?= __('Sun Avail') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($supplier->products as $products): ?>
            <tr>
                <td><?= h($products->id) ?></td>
                <td><?= h($products->supplier_id) ?></td>
                <td><?= h($products->description) ?></td>
                <td><?= h($products->costprice) ?></td>
                <td><?= h($products->weight) ?></td>
                <td><?= h($products->p1) ?></td>
                <td><?= h($products->p2) ?></td>
                <td><?= h($products->p3) ?></td>
                <td><?= h($products->p4) ?></td>
                <td><?= h($products->p5) ?></td>
                <td><?= h($products->gst) ?></td>
                <td><?= h($products->min_qty) ?></td>
                <td><?= h($products->mon_avail) ?></td>
                <td><?= h($products->tue_avail) ?></td>
                <td><?= h($products->wed_avail) ?></td>
                <td><?= h($products->thu_avail) ?></td>
                <td><?= h($products->fri_avail) ?></td>
                <td><?= h($products->sat_avail) ?></td>
                <td><?= h($products->sun_avail) ?></td>
                <td><?= h($products->created) ?></td>
                <td><?= h($products->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
