<?php //pr($cartData); exit; ?>
<h3>Confirm Order</h3>
<div class="buy-treatment-body">
    <div class="breadcrumb-area">
        <div class="btn-group btn-breadcrumb">
            <a href="#" class="btn btn-default breadcrumb-area-cart"><i class="glyphicon glyphicon-home"></i></a>
            <a href="#" class="btn btn-default">Medical inquiry</a>
            <a href="#" class="btn btn-default">Select treatment</a>
            <a href="#" class="btn btn-default">Checkout</a>
        </div>
    </div>
    <div class="anti-malaria-area">
        <div class="row">
            <div class="col-md-12">
                <h4> Confirm Your Order And Delivery Method </h4>
                <div class="choose-treatment-table">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if(!empty($cart)){ 
                                $totCost = 0;
                                foreach($cartData as $cartdt){?>
                            <table class="table">
                                <?php //pr($cartValDet); ?>
                                <tbody>
                                    <tr>
                                        <td colspan="4" class="antihistamine" style="border-top:none; border-bottom:none;"><b> <?php echo $cartdt->treatment['name'];?> </b></td>
                                    </tr>
                                    <?php if(!empty($cartdt->orderdetails)){?>
                                        <?php $subcost = 0; foreach($cartdt->orderdetails as $cartVal){ ?>
                                        <tr>
                                            <td class="desc" style="border-top:none; border-bottom:none;"><b><?php echo $cartVal->pil_name;?></b> x <?php echo $cartVal->pil_qty?> tablets</td>
                                            <td class="price" style="border-top:none; border-bottom:none;">£<?php echo sprintf('%0.2f', $cartVal->pil_price)?></td>
                                            <td class="remove" style="border-top:none; border-bottom:none;">
                                                <a href="<?php echo $this->Url->build(['controller' => 'Treatments', 'action' => 'deletecartdetail', $cartVal->id]); ?>" >
                                                    <i class="fa fa-times red" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>                                      
                                        <?php $subcost = $subcost + $cartVal->pil_price; } ?>
                                    <?php } else { $subcost = 0; ?>
                                        <tr>
                                            <td style="border-top:none; border-bottom:none;"><b>No Item In This Prescription</b></td>
                                            <td style="border-top:none; border-bottom:none;">£ 0.00</td>
                                        </tr>                                        
                                    <?php } ?>
                                    <?php if(!empty($cartdt->orderdetails)){?>
                                        <tr>
                                            <td class="desc"><b>Online prescription fee</b></td>
                                            <td class="price">£<?php echo sprintf('%0.2f', $cartdt->prescription_fee)?></td>
                                        </tr>                                        
                                    <?php } ?>                                        
                                </tbody>
                            </table>
                            <div class="choose-treatment-btn-area">
                                <a href="<?php echo $this->Url->build(['controller' => 'Treatments', 'action' => 'treatmentprice', $cartdt->treatment['slug'], base64_encode($cartdt->id),'update']); ?>" >
                                    <button type="button" class="btn btn-default"> <i class="fa fa-plus green" aria-hidden="true"></i> continue Shoping  </button>
                                </a>                                
                                
                                <a href="<?php echo $this->Url->build(['controller' => 'Treatments', 'action' => 'deletecart', base64_encode($cartdt->id)]); ?>" >
                                    <button type="button" class="btn btn-default"> <i class="fa fa-times red" aria-hidden="true"></i> Remove? </button>
                                </a>
                            </div>
                            <?php $totCost = $subcost + $totCost + $cartdt->prescription_fee; } } ?>
                            
                            <?php //$totCost = $totCost + $SiteSettings['prescfee']; ?>
                            <div class="delivery">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="delivery-area">
                                            <p><b>Delivery:</b></p>
                                            <div class="delivery-select">
                                                <select id="select" name="delivery_type" onchange="changeDeliveryCharge(this.value)" class="delivery_type">
                                                    <?php foreach($delcharg as $dcharg){ ?>
                                                    <option value="<?php echo $dcharg->value ?>"><?php echo $dcharg->name ?> - &pound;<?php echo sprintf('%0.2f', $dcharg->value)?></option>
                                                    <?php } ?>
<!--                                                    <option value="2.90">UK standard - &pound;2.90</option>
                                                    <option value="5.90">Europe standard - &pound;5.90</option>
                                                    <option value="32.00">Europe express - &pound;32.00</option>-->
                                                </select>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 no-padding">
                                        <div class="delivery-right">
                                            <p>Delivery: £ <span id="changeDeliveryChargeAmt">2.92</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-md-offset-9">
                                    <div class="total-cost">Total cost: £ <span id="totAmtSp"><?php echo sprintf('%0.2f', $totCost + 2.90)?> </span></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="cnfrm-ordr">
                                        <div class="btn-group">
                                            
                                            <?php if($is_login != 1){ ?>
                                            <p style="color: red" class="text-right"> You are not loged in yet. Please login to buy. </p>
                                                <!--
                                                <button type="button" class="btn btn-success">Confirm Order</button>
                                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="cart-btn"><i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                    </span>
                                                </button>  -->                                          
                                                <a style="float: right" href="<?php echo $this->Url->build(["controller" => "Users", "action" => "signin", 'cart']); ?>"> 
                                                    <button style="margin-left: 8px" type="button" class="btn btn-success">Login</button> </a>                                              
                                            <?php } else { ?>
                                            <!-- <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "checkout"]); ?>"> -->
                                                <button type="button" onclick="goToCheckout('changeDeliveryChargeAmt')" class="btn btn-success">Confirm Order</button>
                                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="cart-btn"><i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                </span>
                                            </button>
                                            <!-- </a> -->
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="choose-treatment-btn-area">
                                <p class="left"><b>Order other medicines</b></p>
                                <p class="text-right">Next: Confirm order, enter your details and pay</p>
                            </div>
                            <div class="choose-treatment-btn-area">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="prescription-fees">
                                            <h4>Prescription fees</h4>
                                            <?php echo $SiteSettings['prescription_fee']?>
                                        </div>
                                    </div>
                                    <!--
                                    <div class="col-md-6">
                                        <div class="prescription-table">
                                            <table class="table table-bordered" bordercolor="e4e4e4">
                                                <thead bgcolor="#c8c8c8">
                                                    <tr>
                                                        <th style="border-left:none; text-align:center;">Order Value</th>
                                                        <th style="border-right:none; text-align:center;">Prescription Fee</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="border-left:none" align="center"> Any Order Value </td>
                                                        <td style="border-right:none" align="center"> £<?php echo sprintf('%0.2f', $SiteSettings['prescfee'])?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    function changeDeliveryCharge(val){
        var newprice = parseFloat('<?php echo $totCost ?>') + parseFloat(val); 
        $('#changeDeliveryChargeAmt').html(val);
        $('#totAmtSp').html(newprice.toFixed(2));
    }

    function goToCheckout (id){
        var decharge = document.getElementById(id).innerHTML;
        if(parseFloat(decharge) == '2.92'){ var sl = 1; }
        if(parseFloat(decharge) == '5.93'){ var sl = 2; }
        if(parseFloat(decharge) == '32.45'){ var sl = 3; }
        window.location = "<?php echo $this->Url->build('/'); ?>users/checkout/" + sl;
    }


</script>