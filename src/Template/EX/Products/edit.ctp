<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $product->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orderdetails'), ['controller' => 'Orderdetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Orderdetail'), ['controller' => 'Orderdetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('Edit Product') ?></legend>
        <?php
            echo $this->Form->input('supplier_id', ['options' => $suppliers, 'empty' => true]);
            echo $this->Form->input('description');
            echo $this->Form->input('costprice');
            echo $this->Form->input('weight');
            echo $this->Form->input('p1');
            echo $this->Form->input('p2');
            echo $this->Form->input('p3');
            echo $this->Form->input('p4');
            echo $this->Form->input('p5');
            echo $this->Form->input('gst');
            echo $this->Form->input('min_qty');
            echo $this->Form->input('mon_avail');
            echo $this->Form->input('tue_avail');
            echo $this->Form->input('wed_avail');
            echo $this->Form->input('thu_avail');
            echo $this->Form->input('fri_avail');
            echo $this->Form->input('sat_avail');
            echo $this->Form->input('sun_avail');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
