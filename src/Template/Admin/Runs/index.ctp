<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Run'), ['action' => 'add']) ?></li>
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
<div class="table-responsive">
    <h3><?= __('Runs List') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('run_name') ?></th>
                <th><?= $this->Paginator->sort('run_no') ?></th>
                <!--<th><?= $this->Paginator->sort('created') ?></th>-->
                <!--<th><?= $this->Paginator->sort('modified') ?></th>-->
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($runs as $run): ?>
            <tr>
                <td><?= $this->Number->format($run->id) ?></td>
                <td><?= h($run->run_name) ?></td>
                <td><?= h($run->run_no) ?></td>
                <!--<td><?= h($run->created) ?></td>-->
                <!--<td><?= h($run->modified) ?></td>-->
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $run->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $run->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $run->id], ['confirm' => __('Are you sure you want to delete # {0}?', $run->id)]) ?>
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
</div>

