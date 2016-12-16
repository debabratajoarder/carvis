<?php echo $this->element('doctorhead'); ?>
<?php //echo date('d F Y', strtotime($user->created)); ?>
<div class="my-order-tab">
    <header class="main-content-header">
        <h2 class="my-orders">Approved Prescriptions </h2>   
    </header>
    <div class="order-conteainer">
        <div class="order-body-content">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="order-list-content table-responsive">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><b>Sl No</b></th>
                                            <!-- <th><b>Txn No</b></th> -->
                                            <th><b>Order From</b></th>
                                            <th><b>Order Date</b></th>
                                            <th><b>Status</b></th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($trans)){ ?>
                                        <?php $ik = 1; foreach($trans as $tran){ ?>
                                        <tr>
                                            <th scope="row"><?php echo $ik?></th>
                                            <!-- <td><?php echo $tran['tid'];?></td> -->
                                            <td><?php echo $tran['name'];?></td>
                                            <td><?php echo date('d F Y h:i:s A', strtotime($tran['date'])); ?></td>
                                            <td>Approved <?php echo $tran['delivery'] == 0 ? 'Not Delivered': 'Delivered'; ?></td>
                                            <td> 
                                                <div class="detail-btn">
                                                    <div class="detail-edit">
                                                        <?php echo $this->Html->link('View', ['controller' => 'Doctors', 'action' => 'prescriptiondetail', $tran->transaction_id], ['class' => 'btn btn-info']); ?>
                                                    </div>                                                                                  
                                                    <div class="clearfix"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $ik++; } ?>
                                        <?php } else { ?>
                                        <tr>
                                            <th scope="row" colspan="5">No Prescription approved</th>
                                        </tr>                                        
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pagination-area">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php echo $this->Paginator->first(__('<< First', true), array('class' => 'number-first')); ?>
                    <?php echo $this->Paginator->numbers(array('class' => 'numbers', 'first' => false, 'last' => false)); ?>
                    <?php echo $this->Paginator->last(__('Last >>', true), array('class' => 'number-end')); ?> 
                </ul>
            </nav>
        </div>
    </div>
        <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "signout"]); ?>">
            <button type="button" class="btn btn-info btn-logout">Logout <i class="fa fa-lock"></i> </button>
        </a>
</div>