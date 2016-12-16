<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orderdetails'), ['controller' => 'Orderdetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orderdetail'), ['controller' => 'Orderdetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Supplier') ?></th>
            <td><?= $product->has('supplier') ? $this->Html->link($product->supplier->name, ['controller' => 'Suppliers', 'action' => 'view', $product->supplier->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($product->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Weight') ?></th>
            <td><?= h($product->weight) ?></td>
        </tr>
        <tr>
            <th><?= __('Gst') ?></th>
            <td><?= h($product->gst) ?></td>
        </tr>
        <tr>
            <th><?= __('Min Qty') ?></th>
            <td><?= h($product->min_qty) ?></td>
        </tr>
        <tr>
            <th><?= __('Mon Avail') ?></th>
            <td><?= h($product->mon_avail) ?></td>
        </tr>
        <tr>
            <th><?= __('Tue Avail') ?></th>
            <td><?= h($product->tue_avail) ?></td>
        </tr>
        <tr>
            <th><?= __('Wed Avail') ?></th>
            <td><?= h($product->wed_avail) ?></td>
        </tr>
        <tr>
            <th><?= __('Thu Avail') ?></th>
            <td><?= h($product->thu_avail) ?></td>
        </tr>
        <tr>
            <th><?= __('Fri Avail') ?></th>
            <td><?= h($product->fri_avail) ?></td>
        </tr>
        <tr>
            <th><?= __('Sat Avail') ?></th>
            <td><?= h($product->sat_avail) ?></td>
        </tr>
        <tr>
            <th><?= __('Sun Avail') ?></th>
            <td><?= h($product->sun_avail) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Costprice') ?></th>
            <td><?= $this->Number->format($product->costprice) ?></td>
        </tr>
        <tr>
            <th><?= __('P1') ?></th>
            <td><?= $this->Number->format($product->p1) ?></td>
        </tr>
        <tr>
            <th><?= __('P2') ?></th>
            <td><?= $this->Number->format($product->p2) ?></td>
        </tr>
        <tr>
            <th><?= __('P3') ?></th>
            <td><?= $this->Number->format($product->p3) ?></td>
        </tr>
        <tr>
            <th><?= __('P4') ?></th>
            <td><?= $this->Number->format($product->p4) ?></td>
        </tr>
        <tr>
            <th><?= __('P5') ?></th>
            <td><?= $this->Number->format($product->p5) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($product->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($product->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Orderdetails') ?></h4>
        <?php if (!empty($product->orderdetails)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Order Id') ?></th>
                <th><?= __('Product Id') ?></th>
                <th><?= __('Product Name') ?></th>
                <th><?= __('Product Price') ?></th>
                <th><?= __('Product Qty') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->orderdetails as $orderdetails): ?>
            <tr>
                <td><?= h($orderdetails->id) ?></td>
                <td><?= h($orderdetails->order_id) ?></td>
                <td><?= h($orderdetails->product_id) ?></td>
                <td><?= h($orderdetails->product_name) ?></td>
                <td><?= h($orderdetails->product_price) ?></td>
                <td><?= h($orderdetails->product_qty) ?></td>
                <td><?= h($orderdetails->created) ?></td>
                <td><?= h($orderdetails->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Orderdetails', 'action' => 'view', $orderdetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Orderdetails', 'action' => 'edit', $orderdetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orderdetails', 'action' => 'delete', $orderdetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderdetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
