<?php echo $this->element('usermenu'); ?>
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
                            <td> <?php echo date('d F Y h:i:s A', strtotime($orderExist[0]->date));?> </td>
                        </tr>
                        
                        <tr>
                            <td><b>Status :</b></td>
                            <td> 
                                <?php if( $orderExist[0]->isverified == 0 && $orderExist[0]->is_reject == 0 && $orderExist[0]->is_delivered == 0 ){ ?>
                                    <a href="javascript:void(0)" style="color: crimson" > Not Approved</a>                                       
                                <?php } else if( $orderExist[0]->isverified == 1 && $orderExist[0]->is_reject == 0 && $orderExist[0]->is_delivered == 0 ){ ?>
                                    <a href="javascript:void(0)" style="color: green" >Approved</a>
                                <?php } else if($orderExist[0]->isverified == 0 && $orderExist[0]->is_reject == 1 && $orderExist[0]->is_delivered == 0){ ?>
                                    <a href="javascript:void(0)" style="color: red">Rejected</a>                                      
                                <?php } else if( $orderExist[0]->isverified == 1 && $orderExist[0]->is_reject == 0 && $orderExist[0]->is_delivered == 1 ){ ?>
                                <a href="javascript:void(0)" style="color: chartreuse"> Delivered </a>
                                <?php } ?>                            
                            </td>
                        </tr>                        
                        <?php if($orderExist[0]->is_delivered == 0 && $orderExist[0]->is_reject == 0){ ?>
                        <tr>
                            <td><b>Action : </b></td>
                            <td> 
                            <?php echo $this->Html->link('Cancel Order', ['controller' => 'Users', 'action' => 'cancelnow', $orderExist[0]->transaction_id], ['class' => 'btn btn-danger']); ?>
                            </td>
                        </tr>                        
                        <?php } ?>
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
                                    <div class="patient-detail detail-btn-part" style="width: 80px"><button class="btn btn-info" onclick="javascript:history.back()" >Go Back</button></div>
                                    <div class="patient-detail detail-btn-part">                                        
                                        <?php if($orderExist[0]->is_delivered == 0 && $orderExist[0]->is_reject == 0){ ?>
                                            <?php echo $this->Html->link('Cancel Order', ['controller' => 'Users', 'action' => 'cancelnow', $orderExist[0]->transaction_id], ['class' => 'btn btn-danger']); ?>
                                        <?php } ?>                                       
                                    </div>
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
    <div class="order-conteainer" id="rejectPresc" style="display: block" >
        <div class="order-detail-content">
            <div class="row">
                <div class="col-md-12">        
                    <?php echo $this->Form->create('', ['class' => 'form-horizontal', 'id' => 'smsgprecdet_validate']); ?>
                      <input type="hidden" name="transid" value="<?php echo $orderExist[0]->transaction_id;?>" >
                      <input type="hidden" name="ftype" value="msg" >
                      <input type="hidden" name="fromid" value="<?php echo $user->id ?>" >
                      <input type="hidden" name="toid" value="1" >
                      <input type="hidden" name="pid" value="<?php echo $orderExist[0]->user_id;?>" >
                      <input type="hidden" name="type" value="p" >
                      <input type="hidden" name="fromtype" value="patient" >
                      <input type="hidden" name="totype" value="admin" >
                      <div class="form-group">
                        <label for="email">Send Message To Customer Service :</label>
                        <textarea class="form-control" id="msg" name="msg" rows="4" cols="50"></textarea>
                      </div>
                      <button type="submit" class="btn btn-default">Send Message</button>
                    <?php echo $this->Form->end();?>                                      
                </div>
            </div>
        </div>
    </div>    
    <?php if($orderExist[0]->is_review != 1 ){ ?>
    <div class="order-conteainer" id="rejectPresc" style="display: block" >
        <div class="order-detail-content">
            <div class="row">
                <div class="col-md-12">        
                    <?php echo $this->Form->create('', ['class' => 'form-horizontal', 'id' => 'smsgprecdet_validate']); ?>
                      <input type="hidden" name="rate" id="rate" >
                      <input type="hidden" name="ftype" value="review" >
                      <input type="hidden" name="trans_id" value="<?php echo $transaction['id']?>" >
                      <input type="hidden" name="fromid" value="<?php echo $user->id ?>" >
                      <input type="hidden" name="txnid" value="<?php echo $orderExist[0]->transaction_id;?>" >
                      <input type="hidden" name="medicines" value="<?php echo $revMedicine;?>" >
                      <div class="form-group">
                        <label for="email"> Submit Review : </label>
                        <textarea class="form-control" id="review" name="review" rows="4" cols="50"></textarea>
                      </div>
                      
                      <div class="form-group">
                        <ul>
                            <li><span id="ratestar"></span> </li>
                        </ul>
                      </div>
                      
                      <button type="submit" class="btn btn-default"> Submit Review </button>
                    <?php echo $this->Form->end();?>                                      
                </div>
            </div>
        </div>
    </div>    
    <?php } ?>
    <?php if(!empty($review)){ ?>
    <div class="top-reviews">
        <div class="review-avatar"></div>
        <div class="review-text"><p> <?php echo $review['review'] ?>
                <span class="date"> <?php echo date('d F Y', strtotime($review['date']));?> </span>
                <span id="rateStarFirst" style="color:#ff6624; font-size: 25px;"></span>
            </p></div>
        <div class="clearfix"></div>
    </div>    
    <?php } ?>
    
    
    
    <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "signout"]); ?>">
        <button type="button" class="btn btn-info btn-logout">Logout <i class="fa fa-lock"></i> </button>
    </a>
</div>
<script>
    $(document).ready(function(){
    <?php if(!empty($review)){ ?>
    $("#rateStarFirst").raty({score:'<?php echo $review['rate'] ?>',readOnly:true, halfShow : true});
    <?php } ?>
    $("#ratestar").raty({
        score:'0',  
        halfShow : true,
        click: function(score, evt) {
           $("#rate").attr("value",score);  
           calculate_rating();
        }        
    });     
}); 
</script>