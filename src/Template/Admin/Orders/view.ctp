<!--PAGE CONTENT -->
<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h1 > Order Detail </h1>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
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
                                                <td><a href="#"> <?php echo $orderExist[0]->email ?> </a></td>
                                            </tr>
                                            <tr>
                                                <td><b>Patient Contact:</b></td>
                                                <td> <?php echo $orderExist[0]->contact ?> </td>
                                            </tr>
                                            <tr>
                                                <td><b>Patient Address:</b></td>
                                                <td> <?php echo $orderExist[0]->shipping_address ?> </td>
                                            </tr>
                                            <tr>
                                                <td><b>Patient City:</b></td>
                                                <td><a href="#"> <?php echo $orderExist[0]->shipping_city ?> </a></td>
                                            </tr>
                                            <tr>
                                                <td><b>Patient Country:</b></td>
                                                <td><a href="#"> <?php echo $orderExist[0]->shipping_country ?> </a></td>
                                            </tr>
                                             <tr>
                                                <td><b>Order Date:</b></td>
                                                <td> <?php echo date('d F Y', strtotime($orderExist[0]->date)); ?> </td>
                                            </tr>
                                            <!--
                                            <tr>
                                                <td>
                                                    <div class="detail-btn">
                                                        <div class="view-detail detail-btn-part">
                                            <?php if ($orderExist[0]->isverified == 1) { ?>
                                                                    <div class="view-detail detail-btn-part"><a href="javascript:void(0)" class="btn btn-success">Approved</a></div>
                                            <?php } if ($orderExist[0]->isverified == 2) { ?>
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

                        <?php if (!empty($presc)) { ?>
                            <header class="main-content-header">
                                <h2 class="my-orders"> Uploaded Prescription List </h2>
                            </header>
                            <div class="order-conteainer">
                                <div class="order-detail-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table">
                                                <?php foreach ($presc as $pFile) { ?>
                                                    <tr>
                                                        <td><b>Click To Download :</b></td>
                                                        <td>

                                                            <a href="<?php echo $this->request->webroot . 'prescription' . DS . $pFile->file; ?>" target="_blank" download >Prescription</a>
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

                        <?php foreach ($orderExist as $appOrd) { ?> 
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
                                                                    <?php foreach ($dt as $qdt) { ?>
                                                                        <?php if ($qdt->q != "termscondition") { ?>
                                                                            <?php if (!empty($qdt->a)) { ?>
                                                                                <tr>
                                                                                    <td scope="row"> <p><?php echo $qdt->q ?></p> </th>
                                                                                        <?php if (is_array($qdt->a)) { ?>
                                                                                        <td> 
                                                                                            <?php $fVal = "";
                                                                                            foreach ($qdt->a as $k => $v) {
                                                                                                $fVal = $fVal . ", " . $v;
                                                                                            } ?>
                                                                                        <?php echo ltrim($fVal, ","); ?>
                                                                                        </td>
                                                                                <?php } else { ?>
                                                                                        <td> <p> <?php echo $qdt->a ?></p> </td>
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
                                                                    <?php foreach ($appOrd['orderdetails'] as $appDet) { ?>
                                                                        <tr>
                                                                            <th scope="row"> <?php echo $appDet['medicine']['title'] ?> </th>
                                                                            <td> <?php echo $appDet['pil_name'] ?> </td>
                                                                            <td> <?php echo $appDet['pil_qty'] ?> </td>
                                                                            <td> £<?php echo sprintf('%0.2f', $appDet['pil_price']) ?> </td>
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

                                                            <?php if ($orderExist[0]->is_delivered == 1) { ?>
                                                                <div class="view-detail detail-btn-part"><a href="javascript:void(0)" class="btn btn-success">Delivered</a></div>
                                                            <?php } else { ?>
                                                                <?php if ($orderExist[0]->isverified == 1 && $orderExist[0]->is_reject == 0) { ?>
                                                                    <div class="view-detail detail-btn-part"><a href="javascript:void(0)" class="btn btn-success">Approved</a></div>
                                                                <?php } else if ($orderExist[0]->isverified == 0 && $orderExist[0]->is_reject == 1) { ?>
                                                                    <div class="view-detail detail-btn-part"><a href="javascript:void(0)" class="btn btn-success">Rejected</a></div>
                                                                <?php } else if ($orderExist[0]->is_delivered == 0 && $orderExist[0]->is_reject == 0 && $orderExist[0]->isverified == 0) { ?>
                                                                    <?php echo $this->Html->link('Approve Now', ['controller' => 'Orders', 'action' => 'approvenow', $orderExist[0]->transaction_id], ['class' => 'btn btn-success']); ?>
                                                                    <?php //echo $this->Html->link('Reject Now', ['controller' => 'Doctors', 'action' => 'rejectnow', $orderExist[0]->transaction_id], ['class' => 'btn btn-success']);  ?>
                                                                      <button class="btn btn-danger" onclick="rejectNow()" >Reject Now</button>
                                                                <?php } ?>                                         
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
                                        <input type="hidden" name="transid" value="<?php echo $orderExist[0]->transaction_id; ?>" >
                                        <input type="hidden" name="ftype" value="reject" >
                                        <div class="form-group">
                                            <label for="email">Reasion of Reject:</label>
                                            <input type="text" class="form-control" id="data" name="data" >
                                        </div>
                                        <button type="submit" class="btn btn-default">Submit</button>
                                        <?php echo $this->Form->end(); ?>                                      
                                    </div>
                                </div>
                            </div>
                        </div>   

                            <?php if ($orderExist[0]->verifiedby != "" && $orderExist[0]->verifiedbytype == "Doctor") { ?>
                            <div class="order-conteainer" id="rejectPrescd" style="display: block" >
                                <div class="order-detail-content">
                                    <div class="row">
                                        <div class="col-md-12">        
                                            <?php echo $this->Form->create('', ['class' => 'form-horizontal', 'id' => 'smsgprecdet_validate']); ?>
                                            <input type="hidden" name="transid" value="<?php echo $orderExist[0]->transaction_id; ?>" >
                                            <input type="hidden" name="ftype" value="msg" >
                                            <input type="hidden" name="fromid" value="<?php echo $user->id ?>" >
                                            <input type="hidden" name="toid" value="<?php echo $orderExist[0]->verifiedby; ?>" >
                                            <input type="hidden" name="pid" value="<?php echo $orderExist[0]->user_id; ?>" >
                                            <input type="hidden" name="type" value="d" >
                                            <input type="hidden" name="fromtype" value="admin" > 
                                            <input type="hidden" name="totype" value="doctor" >


                                            <div class="form-group">
                                                <label for="email">Message To Doctor:</label>
                                                <textarea class="form-control" id="msg" name="msg" rows="4" cols="50"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-default">Send Message</button>
                                            <?php echo $this->Form->end(); ?>                                      
                                        </div>
                                    </div>
                                </div>
                            </div>     
                            <?php } ?>

                        <div class="order-conteainer" id="rejectPrescp" style="display: block" >
                            <div class="order-detail-content">
                                <div class="row">
                                    <div class="col-md-12">        
                                        <?php echo $this->Form->create('', ['class' => 'form-horizontal', 'id' => 'smsgprecdet_validate']); ?>
                                        <input type="hidden" name="transid" value="<?php echo $orderExist[0]->transaction_id; ?>" >
                                        <input type="hidden" name="ftype" value="msg" >
                                        <input type="hidden" name="fromid" value="<?php echo $user->id ?>" >
                                        <input type="hidden" name="toid" value="<?php echo $orderExist[0]->user_id; ?>" >
                                        <input type="hidden" name="pid" value="<?php echo $orderExist[0]->user_id; ?>" >
                                        <input type="hidden" name="type" value="p" >
                                        <input type="hidden" name="fromtype" value="admin" > 
                                        <input type="hidden" name="totype" value="patient" >
                                        <div class="form-group">
                                            <label for="email">Message To Patient:</label>
                                            <textarea class="form-control" id="msg" name="msg" rows="4" cols="50"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-default">Send Message</button>
                                        <?php echo $this->Form->end(); ?>                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
<!--END PAGE CONTENT -->


<script>
    function rejectNow() {
        $('#rejectPresc').css('display', 'block');
    }
</script>