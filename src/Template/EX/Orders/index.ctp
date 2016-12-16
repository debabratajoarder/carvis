<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Runs'), ['controller' => 'Runs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Run'), ['controller' => 'Runs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orderdetails'), ['controller' => 'Orderdetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Orderdetail'), ['controller' => 'Orderdetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orders index large-9 medium-8 columns content">
    <h3><?= __('Orders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('customer_name') ?></th>
                <th><?= $this->Paginator->sort('address_id') ?></th>
                <th><?= $this->Paginator->sort('address_name') ?></th>
                <th><?= $this->Paginator->sort('run_id') ?></th>
                <th><?= $this->Paginator->sort('run_name') ?></th>
                <th><?= $this->Paginator->sort('order_date') ?></th>
                <th><?= $this->Paginator->sort('delivery_date') ?></th>
                <th><?= $this->Paginator->sort('payment_status') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $this->Number->format($order->id) ?></td>
                <td><?= $order->has('customer') ? $this->Html->link($order->customer->name, ['controller' => 'Customers', 'action' => 'view', $order->customer->id]) : '' ?></td>
                <td><?= h($order->customer_name) ?></td>
                <td><?= $order->has('address') ? $this->Html->link($order->address->id, ['controller' => 'Addresses', 'action' => 'view', $order->address->id]) : '' ?></td>
                <td><?= h($order->address_name) ?></td>
                <td><?= $order->has('run') ? $this->Html->link($order->run->id, ['controller' => 'Runs', 'action' => 'view', $order->run->id]) : '' ?></td>
                <td><?= h($order->run_name) ?></td>
                <td><?= h($order->order_date) ?></td>
                <td><?= h($order->delivery_date) ?></td>
                <td><?= h($order->payment_status) ?></td>
                <td><?= h($order->created) ?></td>
                <td><?= h($order->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $order->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?>
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
