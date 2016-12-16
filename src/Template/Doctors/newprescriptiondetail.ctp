<div class="my-order-tab">
    <header class="main-content-header">
        <h2 class="my-orders"> New Prescription Detail </h2>
    </header>
    <div class="order-conteainer">
        <div class="order-detail-content">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <tr>
                            <td><b>Patient Name:</b></td>
                            <td> <?php echo $orderExist[0]->name ?> </td>
                        </tr>
                        <tr>
                            <td><b>Patient Email:</b></td>
                            <td><a href="#"> <?php echo $orderExist[0]->email?> </a></td>
                        </tr>
                        <tr>
                            <td><b>Patient Contact:</b></td>
                            <td> <?php echo $orderExist[0]->contact ?> </td>
                        </tr>
                        <tr>
                            <td><b>Order Date:</b></td>
                            <td> <?php echo date('d F Y', strtotime($orderExist[0]->date));?> </td>
                        </tr>
                        <!--
                        <tr>
                            <td>
                                <div class="detail-btn">
                                    <div class="view-detail detail-btn-part">
                                        <?php if($orderExist[0]->isverified == 1){ ?>
                                            <div class="view-detail detail-btn-part"><a href="javascript:void(0)" class="btn btn-success">Approved</a></div>
                                        <?php } if($orderExist[0]->isverified == 2){ ?>
                                            <div class="view-detail detail-btn-part"><a href="javascript:void(0)" class="btn btn-success">Rejected</a></div>                                        
                                        <?php } else { ?>
                                        <?php echo $this->Html->link('Approve Now', ['controller' => 'Doctors', 'action' => 'approvenow', $orderExist[0]->transaction_id], ['class' => 'btn btn-success']); ?>
                                        <?php echo $this->Html->link('Reject Now', ['controller' => 'Doctors', 'action' => 'rejectnow', $orderExist[0]->transaction_id], ['class' => 'btn btn-success']); ?>
                                        <?php } ?>                                        
                                    </div>
                                    <div class="patient-detail detail-btn-part"><a href="javascript:history.back()" class="btn btn-primary"> Go Back </a></div>
                                    <div class="clearfix"></div>
                                </div>
                            </td>
                            <td><b></b></td>
                        </tr>
                        -->
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <?php if(!empty($presc)){ ?>
    <header class="main-content-header">
        <h2 class="my-orders"> Uploaded Prescription List </h2>
    </header>
    <div class="order-conteainer">
        <div class="order-detail-content">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <?php foreach($presc as $pFile){ ?>
                        <tr>
                            <td><b>Click To Download :</b></td>
                            <td>

                                <a href="<?php echo $this->request->webroot . 'prescription' . DS . $pFile->file ; ?>" target="_blank" download >Prescription</a>
                                <?php //echo  $this->response->file('prescription' . DS . $pFile->file, array('download' => true, 'name' => 'Download')); ?>
                            </td>
                        </tr>
                        <?php } ?>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>   
    <?php } ?>
    
<?php foreach($orderExist as $appOrd){ ?> 
<div class="my-order-tab">
    <header class="main-content-header">
        <h2 class="my-orders">  <?php echo $appOrd['treatment']['name'] ?></h2>
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
                                            <th><p>Treatment Questions</p></th>
                                            <th><p>Answer</p></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $dt = json_decode($appOrd['question']); ?>
                                        <?php foreach($dt as $qdt){ ?>
                                            <?php if($qdt->q != "termscondition"){ ?>
                                            <?php if(!empty($qdt->a)){ ?>
                                            <tr>
                                                <td scope="row"> <p><?php echo $qdt->q?></p> </th>
                                                <?php if(is_array($qdt->a)){ ?>
                                                        <td> 
                                                        <?php $fVal = ""; foreach($qdt->a as $k=>$v){  $fVal = $fVal.", ".$v;  } ?>
                                                            <?php echo ltrim($fVal,","); ?>
                                                        </td>
                                                    <?php } else { ?>
                                                        <td> <p> <?php echo $qdt->a?></p> </td>
                                                    <?php } ?>
                                            </tr>
                                            <?php } } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
           
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="order-list-content table-responsive">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><b>Medicine</b></th>
                                            <th><b>Pill Name</b></th>
                                            <th><b>Qty</b></th>
                                            <th><b>Price</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($appOrd['orderdetails'] as $appDet){ ?>
                                        <tr>
                                            <th scope="row"> <?php echo $appDet['medicine']['title'] ?> </th>
                                            <td> <?php echo $appDet['pil_name'] ?> </td>
                                            <td> <?php echo $appDet['pil_qty'] ?> </td>
                                            <td> £<?php echo sprintf('%0.2f', $appDet['pil_price'])?> </td>
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
    </div>
</div>    
<?php } ?>    
    <div class="order-conteainer">
        <div class="order-detail-content">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <tr>
                            <td>
                                <div class="detail-btn">
                                    <div class="view-detail detail-btn-part">
                                        <?php if($orderExist[0]->isverified == 1){ ?>
                                            <div class="view-detail detail-btn-part"><a href="javascript:void(0)" class="btn btn-success">Approved</a></div>
                                        <?php } else if($orderExist[0]->isverified == 2){ ?>
                                            <div class="view-detail detail-btn-part"><a href="javascript:void(0)" class="btn btn-success">Rejected</a></div>                                        
                                        <?php } else { ?>
                                        <?php echo $this->Html->link('Approve Now', ['controller' => 'Doctors', 'action' => 'approvenow', $orderExist[0]->transaction_id], ['class' => 'btn btn-success']); ?>
                                        <?php //echo $this->Html->link('Reject Now', ['controller' => 'Doctors', 'action' => 'rejectnow', $orderExist[0]->transaction_id], ['class' => 'btn btn-success']); ?>
                                            <button class="btn btn-danger" onclick="rejectNow()" >Reject Now</button>
                                        <?php } ?> 
                                    </div>
                                    <div class="patient-detail detail-btn-part"><a href="javascript:history.back()" class="btn btn-primary"> Go Back </a></div>
                                    <div class="clearfix"></div>
                                </div>
                            </td>
                            <td><b></b></td>
                        </tr>                        
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="order-conteainer" id="rejectPresc" style="display: none" >
        <div class="order-detail-content">
            <div class="row">
                <div class="col-md-12">

                                        
                    <?php echo $this->Form->create('', ['class' => 'form-horizontal', 'id' => 'reject_validate']); ?>
                      <input type="hidden" name="transid" value="<?php echo $orderExist[0]->transaction_id;?>" > 
                      <div class="form-group">
                        <label for="email">Reasion of Reject:</label>
                        <input type="text" class="form-control" id="data" name="data" >
                      </div>
                      <button type="submit" class="btn btn-default">Submit</button>
                    <?php echo $this->Form->end();?>                                      
                                        
     
                </div>
            </div>
        </div>
    </div>       
        <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "signout"]); ?>">
            <button type="button" class="btn btn-info btn-logout">Logout <i class="fa fa-lock"></i> </button>
        </a>
</div>

<script>
    function rejectNow(){
        $('#rejectPresc').css('display','block');
    }

</script>