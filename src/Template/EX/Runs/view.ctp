<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Run'), ['action' => 'edit', $run->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Run'), ['action' => 'delete', $run->id], ['confirm' => __('Are you sure you want to delete # {0}?', $run->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Runs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Run'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="runs view large-9 medium-8 columns content">
    <h3><?= h($run->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Run Name') ?></th>
            <td><?= h($run->run_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Run No') ?></th>
            <td><?= h($run->run_no) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($run->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($run->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($run->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Addresses') ?></h4>
        <?php if (!empty($run->addresses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Run Id') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($run->addresses as $addresses): ?>
            <tr>
                <td><?= h($addresses->id) ?></td>
                <td><?= h($addresses->customer_id) ?></td>
                <td><?= h($addresses->run_id) ?></td>
                <td><?= h($addresses->address) ?></td>
                <td><?= h($addresses->created) ?></td>
                <td><?= h($addresses->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Addresses', 'action' => 'view', $addresses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Addresses', 'action' => 'edit', $addresses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Addresses', 'action' => 'delete', $addresses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addresses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Orders') ?></h4>
        <?php if (!empty($run->orders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Customer Name') ?></th>
                <th><?= __('Address Id') ?></th>
                <th><?= __('Address Name') ?></th>
                <th><?= __('Run Id') ?></th>
                <th><?= __('Run Name') ?></th>
                <th><?= __('Order Date') ?></th>
                <th><?= __('Delivery Date') ?></th>
                <th><?= __('Comment') ?></th>
                <th><?= __('Payment Status') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($run->orders as $orders): ?>
            <tr>
                <td><?= h($orders->id) ?></td>
                <td><?= h($orders->customer_id) ?></td>
                <td><?= h($orders->customer_name) ?></td>
                <td><?= h($orders->address_id) ?></td>
                <td><?= h($orders->address_name) ?></td>
                <td><?= h($orders->run_id) ?></td>
                <td><?= h($orders->run_name) ?></td>
                <td><?= h($orders->order_date) ?></td>
                <td><?= h($orders->delivery_date) ?></td>
                <td><?= h($orders->comment) ?></td>
                <td><?= h($orders->payment_status) ?></td>
                <td><?= h($orders->created) ?></td>
                <td><?= h($orders->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
