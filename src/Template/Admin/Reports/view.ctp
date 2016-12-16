<style>
	.container {
		width:1000px;
		margin: 0 auto;
	}
	.vertical-table th {
		border-bottom:2px solid #000;
	}
	table {
		margin-bottom: 30px;
	}
	.listing tr:nth-child(odd) {
		background: #f0f0f0;
	}
	.vertical-table {
		margin-bottom:0;
	}
	.vertical-table, table {
		width:100%;
		border-collapse:collapse;
	}
	.vertical-table td, table td {
		text-align: left;
		line-height:30px;
		padding:0 10px;
	}
	.vertical-table th, table th {
		text-align: left;
		line-height:30px;
		padding:0 10px;
	}
	.heading {
		text-align:center;
		display:inline-block;
		vertical-align: top;
		width:100%;
		line-height:35px;
	}
	.heading img {
		display:inline-block;
		vertical-align: top;
	}
</style>


<div id="content">
    <div class="inner">
    	<div class="container">
      <div class="row">
        <div class="col-lg-12">
         
        </div>
      </div>
      <hr />
       <div class="table-responsive">
            <div class="runs view large-9 medium-8 columns content">
            	<button onclick="myFunction()">Print this page</button>
				<script> function myFunction() { window.print(); } </script>
            	
            	
            	
            	<h1 class="heading"><?php echo $this->Html->image('admin/unnamed.png', ['alt' => 'logo', 'height' => 50, 'width' => 50]); ?> Busybeebakery</h1>
            	
			    <h3>Detail of <?= h($runDetail->toArray()[0]->run_name) ?></h3>
			    <table>

			        <tr>
			            <th><?= __('Delivery Date') ?></th>
			            <td><?= h(date("Y-m-d", $date)) ?></td>
			        </tr>
			        <tr>
			            <th><?= __('Printed') ?></th>
			            <td><?= h(date('Y-m-d H:i:s')) ?></td>
			        </tr>
			    </table>
            </div>
        </div>


	   <?php foreach($ordList as $ordDet){ ?>
       <div class="table-responsive">
            <div class="runs view large-9 medium-8 columns content">
			    <table class="vertical-table">
			        <tr>
			            <th>Group : <?= h($ordDet['group_priority']) ?></th>
			            <th>Customer :<?= h($ordDet['customer_name']) ?></th>
			            <th>Address : <?= h($ordDet['address_name']) ?></th>
			            <th>Order No : <?= h($ordDet['ordno']) ?></th>
			        </tr>
			    </table>
            </div>
        </div>

        <div class="table-responsive">
            <div class="runs view large-9 medium-8 columns content">
        <?php if(!empty($ordDet['orderDetail'])): ?>
        <table cellpadding="0" cellspacing="0" class="listing">
            <tr>
                <th><?= __('Item Code') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Quantity') ?></th>
                <!--<th class="actions"><?= __('Actions') ?></th>-->
            </tr>
            <?php $total_qty = 0; ?>
            <?php foreach ($ordDet['orderDetail'] as $orderdetails): ?>
            <tr>
                <td><?= h($orderdetails['item_code']) ?></td>
                <td><?= h($orderdetails['product_name']) ?></td>
                <td><?= h($orderdetails['product_qty']) ?></td>
            </tr>
 
            
            <?php $total_qty = $total_qty + $orderdetails['product_qty']; ?>
            <?php endforeach; ?>
            
            <tr>
                <td></td>
                <td>Total Qty : </td>
                <td><strong><?= h($total_qty) ?></strong></td>
            </tr>            
            
            
        </table>
        <?php endif; ?>
            </div>
        </div>  
        <?php } ?>  
        
       </div>
</div>
</div>



