<div id="content">
    <div class="inner">
      <div class="row">
        <div class="col-lg-12">
         
        </div>
      </div>
      <hr />
<div class="table-responsive">
    <h3><?= __('Reports') ?></h3> 
    
    
        <div class="row">
            <div class="col-lg-12">
                  <div class="box">
                    <div id="collapseOne" class="accordion-body collapse in body">
                        <div class="col-sm-6">
					    <div class="row">
						    <form method="post" accept-charset="utf-8" action="/dev1/bakery/admin/reports/index">
						    <fieldset>
						        <legend><?= __('Search Reports') ?></legend>
						        
								<div class="form-group">
									<div class="input">
										<label>Run</label>
										<select data-placeholder="Choose Customer" name="run_id" id="run_id" required="required" 
										class="form-control chzn-select">
										<option value="">Choose Runs</option>
										<?php foreach($runs as $runsVal){?>
											<?php if(isset($this->request->data['run_id']) && $this->request->data['run_id'] == $runsVal->run_id){?>
											<option value="<?=$runsVal->run_id?>" selected ><?=$runsVal->run_name?></option>
											<?php } else { ?>
											<option value="<?=$runsVal->run_id?>"><?=$runsVal->run_name?></option>	
											<?php } ?>
										<?php } ?>
										</select>
									</div>
								</div>						        
						        
								<div class="form-group">
									<div class="input">
										<label>Date</label>
										<!--
										<select data-placeholder="Choose Customer" name="delivery_date" id="delivery_date" required="required" 
										class="form-control chzn-select">
										<option value="">Choose Delivery Date</option>
										<?php foreach($dates as $dateVal){?>
											<option value="<?=$dateVal->delivery_date?>"><?=$dateVal->delivery_date?></option>
										<?php } ?>
										</select>
									    -->
									    
									    <?php if(isset($this->request->data['delivery_date'])){?>
										<input type="text" class="form-control" value="<?=$this->request->data['delivery_date']?>" name="delivery_date" id="dp1" />
										<?php } else { ?>
										<input type="text" class="form-control" value="<?=date('m-d-Y')?>" name="delivery_date" id="dp1" />	
										<?php } ?>
										
									</div>
								</div>						        
						        
						        
						        <?php
						            //echo '<div class="form-group">'.$this->Form->input('name', array('class'=>'form-control')).'</div>';
						            //echo '<div class="form-group">'.$this->Form->input('phone', array('class'=>'form-control')).'</div>';

						        ?>
						    </fieldset>
						    <?= $this->Form->button(__('Search')) ?>
						    <?= $this->Form->end() ?>
					    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    
    
    <!--
    <span style="float:right;"><a href="javascript:window.print()" type="button" class="btn">PRINT</a></span>
	<button onclick="myFunction()">Print this page</button>
	<script> function myFunction() { window.print(); } </script>
    -->
    
    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <!--<th><?= $this->Paginator->sort('customer_id') ?></th>-->
                <th><?= $this->Paginator->sort('address_name') ?></th>
                <th><?= $this->Paginator->sort('run_name') ?></th>
                <th><?= $this->Paginator->sort('order_date') ?></th>
                <th><?= $this->Paginator->sort('delivery_date') ?></th>
                <!--<th><?= $this->Paginator->sort('payment_status') ?></th>-->
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($order as $order): ?>
            <tr>
                <td><?= $this->Number->format($order->id) ?></td>
                <!--<td><?= $order->has('customer') ? $this->Html->link($order->customer->name, ['controller' => 'Customers', 'action' => 'view', $order->customer->id]) : '' ?></td> -->
                <td><?= h($order->address_name) ?></td>
                <td><?= h($order->run_name) ?></td>
                <td><?= h($order->order_date) ?></td>
                <td><?= h(date("Y-m-d", strtotime($order->delivery_date))) ?></td>
                
                
                
                <!--<td><?= h($order->payment_status) ?></td>-->
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $order->run_id, strtotime($order->delivery_date)], array('target' => '_blank')) ?>
                    <!--<?= $this->Html->link(__('Status'), ['action' => 'status', $order->id]) ?>-->
                    <!--<?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->id]) ?>-->
                    <!--<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?>-->
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





