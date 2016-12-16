<?php echo $this->element('usermenu'); ?>
<div class="my-order-tab">
    <header class="main-content-header">
        <h2 class="my-orders">My New Oders</h2>
    </header>
    <div class="order-conteainer">
        <?php if(!empty($orders)){ ?>
        <?php $i = 1; foreach($orders as $trord){ ?>
        <div class="order-body-content">
            <div class="row">
                <!--
                <div class="col-md-2 col-sm-2">
                    <div class="order-list-pic">
                        <img src="<?php echo $this->Url->build('/', true); ?>images/order-pic-a.jpg" class="lowerprice">
                        
                    </div>
                </div>
                -->
                <div class="col-md-12 col-sm-8">
                    <div class="order-list-content table-responsive">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><b>Sl No</b></th>
                                            <th><b>Transaction No</b></th>
                                            <th><b>Order Date</b></th>
                                            <th><b>Status</b></th>
                                            <th><b>Amount</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th><?php echo $i; ?></th>
                                            <th scope="row"><?php echo $trord['transaction_id']?></th>
                                            <td><?php echo date_format($trord['date'],"d F Y h:i:s A");    ?></td>
                                            <td> Pending Approval </td>
                                            <td>£ <?php echo sprintf('%0.2f', $trord['amt'])?></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                    <div class="view-detail">
                        <!-- <a href="" class="btn btn-primary">View Details</a> -->
                        <?php echo $this->Html->link('View Details', ['controller' => 'Users', 'action' => 'prescriptiondetail', $trord['transaction_id']], ['class' => 'btn btn-info']); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php $i++; } ?>
        <?php } else { ?>
        <div class="order-body-content">
            <div class="row">
                <!--
                <div class="col-md-2 col-sm-2">
                    <div class="order-list-pic">
                        <img src="<?php echo $this->Url->build('/', true); ?>images/order-pic-a.jpg" class="lowerprice">
                    </div>
                </div>
                -->
                <div class="col-md-12 col-sm-8">
                    <div class="order-list-content table-responsive">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>No List Found </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                    <div class="view-detail">
                    </div>
                </div>
            </div>
        </div>       
        <?php } ?>
    </div>
    <div class="pagination-area">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php echo $this->Paginator->first(__('<< First', true), array('class' => 'number-first')); ?>
                <?php echo $this->Paginator->numbers(array('class' => 'numbers', 'first' => false, 'last' => false)); ?>
                <?php echo $this->Paginator->last(__('>> Last', true), array('class' => 'number-end')); ?> 
            </ul>
        </nav>
    </div>
</div>