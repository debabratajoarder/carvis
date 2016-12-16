<div class="choose-treatment-body">
    <div class="container">
        <div class="row">
            <?php //echo $this->element('sidebar');?>
            <div class="col-md-9">
                <h3> <?php echo $treatment['name']?> </h3>
                <div class="buy-treatment-body">
                    <div class="breadcrumb-area">
                        <div class="btn-group btn-breadcrumb">
                            <a href="#" class="btn btn-default breadcrumb-area-cart"><i class="glyphicon glyphicon-home"></i></a>
                            <a href="#" class="btn btn-default">Medical inquiry</a>
                            <a href="#" class="btn btn-default active">Select treatment</a>
                            <a href="#" class="btn btn-default">Checkout</a>
                        </div>
                    </div>
                    <div class="anti-malaria-area">
                        <div class="row">
                            <div class="col-md-12">
                                <h4> Choose treatment required </h4>
                                <div class="choose-treatment-table">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php echo $this->Form->create('', ['class' => 'form-horizontal', 'methode' => 'post']); ?>
                                            <table class="table">
                                                <thead class="border-none">
                                                    <tr>
                                                        <th width="5%" class="cart-color"><i class="fa fa-cart-plus" aria-hidden="true"></i></th>
                                                        <th>Treatment</th>
                                                        <th>Qty</th>
                                                        <th>Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($medicine as $mprice){ ?>
                                                    <tr>
                                                        <td colspan="4" class="antihistamine" style="border-top:none; border-bottom:none;"><b> <?php echo $mprice['Mediciine']['title']?> </b></td>
                                                    </tr>
                                                        <?php foreach($mprice['Pils'] as $mpils){ ?>
                                                        <?php
                                                            $chkVal = $order_id."|,|".$treatment['id']."|,|".$mpils['mid']."|,|".$mpils['id']."|,|".$mpils['title']."|,|".$mpils['quantity']."|,|".$mpils['cost'];
                                                            //$chkjson = json_encode($chkVal);
                                                        ?>
                                                        <tr>
                                                            
                                                            <?php if($update != ''){ ?>
                                                                <?php  if(in_array($mpils['id'], $inOrder)){ ?>
                                                                    <td width="5%" scope="row" style="border-top:none; border-bottom:none;"><input name="checkbox[]" onclick="addPrice(<?php echo $mpils['cost']?>,this)" checked="true" value="<?php echo $chkVal?>" type="checkbox"></td>
                                                                <?php } else { ?>
                                                                    <td width="5%" scope="row" style="border-top:none; border-bottom:none;"><input name="checkbox[]" onclick="addPrice(<?php echo $mpils['cost']?>,this)" value="<?php echo $chkVal?>" type="checkbox"></td>
                                                                <?php }  ?>
                                                            <?php } else { ?>
                                                                 <td width="5%" scope="row" style="border-top:none; border-bottom:none;"><input name="checkbox[]" onclick="addPrice(<?php echo $mpils['cost']?>,this)" value="<?php echo $chkVal?>" type="checkbox"></td>    
                                                            <?php } ?>

                                                            <?php /* if(in_array($mpils['id'], $inCart) ){ ?>
                                                            <td width="5%" scope="row" style="border-top:none; border-bottom:none;"><input name="checkbox[]" onclick="cartitem('<?php echo $treatment['id']?>','<?php echo $mprice['id']?>','<?php echo $mpils['id']?>','<?php echo $mpils['quantity']?>',<?php echo $mpils['cost']?>,this)" value="" checked="checked" type="checkbox"></td>
                                                            <?php } else { ?>
                                                            <td width="5%" scope="row" style="border-top:none; border-bottom:none;"><input name="checkbox[]" onclick="cartitem('<?php echo $treatment['id']?>','<?php echo $mprice['id']?>','<?php echo $mpils['id']?>','<?php echo $mpils['quantity']?>',<?php echo $mpils['cost']?>,this)" value="" type="checkbox"></td>
                                                            <?php } */ ?>
                                                            
                                                            <td style="border-top:none; border-bottom:none;">  <?php echo $mpils['title']?>
                                                                <!-- <p>You can select multiple items if required - scroll down to confirm items</p> -->
                                                            </td>
                                                            <td style="border-top:none; border-bottom:none;"><?php echo $mpils['quantity']?></td>
                                                            <td style="border-top:none; border-bottom:none;">£<?php echo sprintf('%0.2f', $mpils['cost'])?> </td>
                                                        </tr>
                                                        <?php } ?>                                                    
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <div class="choose-treatment-btn-area">
                                                <div class="next">
                                                    <div class="btn-group">
                                                        <button type="submit" class="btn btn-success">Confirm Item</button>
                                                        <button type="submit" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="cart-btn"><i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="please">
                                                    <p>Medicine cost: £<span id="totalamountcart"> <?php echo $totAmt;?>  </span></p>
                                                    <p>Prescription fee: £<span><?php echo sprintf('%0.2f', $SiteSettings['prescfee'])?></span></p>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <?php echo $this->Form->end();?>
                                            <div class="choose-treatment-btn-area">
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
                                                                    <tr>
                                                                        <td style="border-left:none" align="center">up to $10</td>
                                                                        <td style="border-right:none" align="center">$1.00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-left:none" align="center">up to $10</td>
                                                                        <td  style="border-right:none" align="center">$1.00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-left:none; border-bottom:none;" align="center">up to $10</td>
                                                                        <td  style="border-right:none; border-bottom:none;" align="center"> $1.00</td>
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
            </div>
        </div>
    </div>
</div>

<script>
function cartitem(qt,price){
    //alert(mid);alert(pid);alert(qt);alert(price);
    
    if($(th).is(':checked')){
            //document.getElementById("cartcounttop").innerHTML = res[0];
            document.getElementById("totalamountcart").innerHTML = (price);
    } else {
        //alert('unchk');
            //document.getElementById("cartcounttop").innerHTML = res[0];
            document.getElementById("totalamountcart").innerHTML = (price);
    }
}
        
function addPrice(price,th){
    var preVal = document.getElementById("totalamountcart").innerHTML;
    
    if($(th).is(':checked')){
            var newprice = parseFloat(price) + parseFloat(preVal);   

            
            document.getElementById("totalamountcart").innerHTML = (newprice.toFixed(2));
    } else {
            var newprice = parseFloat(preVal) - parseFloat(price);

            
            document.getElementById("totalamountcart").innerHTML = (newprice.toFixed(2));
    }
}


</script>