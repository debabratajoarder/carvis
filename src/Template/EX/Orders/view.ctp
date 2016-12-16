<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Runs'), ['controller' => 'Runs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Run'), ['controller' => 'Runs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orderdetails'), ['controller' => 'Orderdetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orderdetail'), ['controller' => 'Orderdetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orders view large-9 medium-8 columns content">
    <h3><?= h($order->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $order->has('customer') ? $this->Html->link($order->customer->name, ['controller' => 'Customers', 'action' => 'view', $order->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Customer Name') ?></th>
            <td><?= h($order->customer_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= $order->has('address') ? $this->Html->link($order->address->id, ['controller' => 'Addresses', 'action' => 'view', $order->address->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Address Name') ?></th>
            <td><?= h($order->address_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Run') ?></th>
            <td><?= $order->has('run') ? $this->Html->link($order->run->id, ['controller' => 'Runs', 'action' => 'view', $order->run->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Run Name') ?></th>
            <td><?= h($order->run_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Payment Status') ?></th>
            <td><?= h($order->payment_status) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($order->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Order Date') ?></th>
            <td><?= h($order->order_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Delivery Date') ?></th>
            <td><?= h($order->delivery_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($order->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($order->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($order->comment)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Orderdetails') ?></h4>
        <?php if (!empty($order->orderdetails)): ?>
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
            <?php foreach ($order->orderdetails as $orderdetails): ?>
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
