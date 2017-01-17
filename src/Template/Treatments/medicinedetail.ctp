<div class="bordered-block" style="margin-top: 30px;">
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="block-left">
                <h1> <?php echo $medicine['title']; ?> </h1>
                <p> <?php echo $medicine['note']; ?> </p>
                <!--<ul class="list-part">
                    <li><i class="fa fa-chevron-right" aria-hidden="true"></i>
                        Fast acting orodispersible tablets available</li>
                    <li><i class="fa fa-chevron-right" aria-hidden="true"></i>
                        Lasts for 12 hours</li>
                </ul>-->
                <a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "treatmentdetail", $medicine['Treatments']['slug'],'medical-information']); ?>" >
                <button type="button" class="btn btn-primary btn-plus">Start order<span class="btn-pill"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </span></button>
                </a>
                <?php
                    if(!empty($review)){
                        $reviewcount = count($review);
                        $totRev = 0;
                        foreach($review as $rev){ $totRev = $totRev + $rev->rate; }
                        $rev = round($totRev/$reviewcount);
                    } else {
                        $reviewcount = 0;
                        $rev = 0;
                    }
                ?>
                <p class="fivestar-rating">
                    <span id="rateStarFirst" style="color:#ff6624; font-size: 15px;"></span> <a href="#"><?php echo $reviewcount; ?> reviews</a> 
                </p>
                
                
                <script>
                    $(document).ready(function(){
                    $("#rateStarFirst").raty({score:'<?php echo $rev ?>',readOnly:true, halfShow : true});   
                }); 
                </script>                
                
                
                
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="block-right">
                <a href="#"><i class="fa fa-search"></i></a>		
                <?php $filePath = WWW_ROOT . 'medicine_img' . DS . $medicine['image']; ?>
                <?php if ($medicine['image'] != "" && file_exists($filePath)) { ?>
                         <img src="<?php echo $this->Url->build('/medicine_img/' . $medicine['image']); ?>" />
                <?php } else { ?>
                    <img src="<?php echo $this->Url->build('/', true); ?>images/right-img.jpg">
                <?php } ?>                
            </div>
        </div>
    </div>
</div>
<div class="buyonline">
    <div class="row">
        <div class="col-md-12">
            <!--<h2>How to buy online</h2>
            <ol>
                <li>Read <a href="#">medical information</a> about erectile dysfunction</li>
                <li>Answer <a href="#">medical questions</a> to check for eligibility</li>
                <li>Reviewed by doctors - posted from NHS pharmacy</li>
            </ol>-->
        </div>
    </div>
    <!--
    <div class="levitar-mg">
        <div class="levitar-left"><h2>Fast acting Levitra 10mg Orodispersible</h2>
            <p>Dispersible Vardenafil, which dissolves in the mouth and is known as Vivanza or Staxyn in some countries, is only licensed and legally available in the UK as Levitra orodispersible.</p></div>
        <div class="levitar-right"><img src="<?php echo $this->Url->build('/', true); ?>images/levitra-10mg-orodispersible.jpg"></div>
        <div class="clearfix"></div>
    </div>
    -->
    <p><?php //echo $medicine['warning']; ?></p>
</div>
<!--
<div class="treatments-prices-banner">
    <div class="row">
        <div class="col-md-6">
            <div class="treatments-banner-content">
                <h1>Erectile dysfunction</h1>
                <p>Erectile dysfunction (also known as impotence) is a very common condition, which affects the majority of men at some point in their lives. Up to 50% of men aged 40 - 70 and up to 70% of men over the age of 70 suffer from erectile dysfunction to some extent. </p>
                <button type="button" class="btn btn-primary">Read More</button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="treatments-prices-pic">
                <img src="<?php echo $this->Url->build('/', true); ?>images/treatment-banner.jpg" alt=""/> 
            </div>
        </div>
    </div>
</div>
-->
<div class="treatments-body-aarea">
    <div class="row">
        <div class="col-md-12">
                <div class="detail-accordion">
                    <h2>Prices</h2>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#price-collapse" aria-expanded="true" aria-controls="price-collapse" class="collapsed">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        Price List
                                    </h4>
                                </div>
                            </a>
                            <div id="price-collapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne"  aria-expanded="true"> 
                                <div class="panel-body">
                                    <div class="tab-pane active" id="1">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Pills </th>
                                                        <th>Quantity</th>
                                                        <th>Cost</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <?php if(!empty($medicine['pils'])){?>
                                                    <?php foreach($medicine['pils'] as $pilList){?>
                                                    <tr>
                                                        <td><?php echo $pilList['title']?></td>
                                                        <td><?php echo $pilList['quantity']?> tablets </td>
                                                        <td>£<?php echo $pilList['cost']?></td>
                                                    </tr>
                                                    <?php } ?>
                                                    <?php } else { ?>
                                                    <tr>
                                                        <td colspan="3"> No Pils Exist With This Medicine </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                    
                                                    <tr>
                                                        <td colspan="3">Compare prices: Medicinesbymailbox prices are 25%-50% lower cost than other online clinics.</td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#site-collapse" aria-expanded="false" aria-controls="site-collapse">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        Site Fee
                                    </h4>
                                </div></a>
                            <div id="site-collapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <div class="tab-pane active" id="2">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="border-box-n">
                                                    <h2>Prescription fees</h2>
                                                    <p>Medicinesbymailbox supplies medicine on prescription and charges a small prescription fee based on the order value of each prescription.Prescriptions are issued by our doctors online and sent electronically to our pharmacy.If you have your own private paper prescription please post to our pharmacy (details).Ascot Pharmacy prices are 25%&ndash;50% lower than other UK online clinics.</p>                                            </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Order value</th>
                                                                <th>Prescription fee
                                                            </th></tr>
                                                        </thead>
                                                        <tbody><tr>
                                                            <td> Any Order Value</td>
                                                            <td>£<?php echo sprintf('%0.2f', $SiteSettings['prescfee'])?></td>
                                                        </tr>
                                                    </tbody></table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#parallel-collapse" aria-expanded="false" aria-controls="parallel-collapse">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        Parallel Prices
    
                                    </h4>
                                </div></a>
                            <div id="parallel-collapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <div class="tab-pane " id="3">
                                        <div class="table-responsive" style="overflow-x: scroll">
                                           <table class="table table-bordered table-hover">
                                               <thead>
                                                   <tr>
                                                       <th>Items</th>
                                                       <th>Medicinesbymailbox</th>
                                                       <th>Dr. Fox</th>
                                                       <th>Pharmacy2U</th>
                                                       <th>Superdrug</th>
                                                       <th>Express Pharmacy</th>
                                                       <th>Lloyds</th>
                                                       <th>Med Express</th>
                                                   </tr>
                                               </thead>
                                               <tbody>                                                                                                                                                         <?php if(!empty($medicine['pils'])){?>
                                                         <?php foreach($medicine['pils'] as $pilList){?>
                                                         <?php if(!empty($pil->pilprices)){ ?>
                                                         <tr>
                                                             <td><?php echo $pilList['title']?></td>
                                                             <td class="drfoxtd">£<?php echo $pilList['cost']?></td>
                                                             <td>£ <?php echo sprintf('%0.2f', $pilList['pilprices'][0]['drfox']);?> </td>
                                                             <td>£ <?php echo sprintf('%0.2f', $pilList['pilprices'][0]['pharmacy2u']);?> </td>
                                                             <td>£ <?php echo sprintf('%0.2f', $pilList['pilprices'][0]['superdrug']);?> </td>
<!--                                                             <td>£ <?php echo sprintf('%0.2f', $pilList['pilprices'][0]['expresspharmacy']);?> </td>
                                                             <td>£ <?php echo sprintf('%0.2f', $pilList['pilprices'][0]['lloyds']);?> </td>
                                                             <td>£ <?php echo sprintf('%0.2f', $pilList['pilprices'][0]['medexpress']);?> </td>-->
                                                         </tr> 
                                                         <?php } else { ?>
                                                             <td><?php echo $pilList['title']?></td>
                                                             <td class="drfoxtd">£<?php echo $pilList['cost']?></td>
                                                             <td style="text-align: center;"> NA </td>
                                                             <td style="text-align: center;"> NA </td>
                                                             <td style="text-align: center;"> NA </td>
                                                             <td style="text-align: center;"> NA </td>
                                                             <td style="text-align: center;"> NA </td>
                                                             <td style="text-align: center;"> NA </td>
                                                         </tr>                                    

                                                         <?php } ?>
                                                         <?php } ?>
                                                         <?php } else { ?>
                                                         <tr>
                                                             <td colspan="5"> No Pils Exist With This Medicine </td>
                                                         </tr>
                                                         <?php } ?> 
                                               </tbody>
                                               <tfoot>
                                                   <tr>
                                                       <td colspan="6"><!--Comparative costs of Trimethoprim 200mg x 6 from UK online clinics (13 September 2016) - qualifying notes-->
                                                           *Medicinesbymailbox adds a small prescription fee not included in table above.</td>
                                                   </tr>
                                               </tfoot>
                                           </table>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#shipment-collapse" aria-expanded="false" aria-controls="shipment-collapse">
                                <div class="panel-heading" role="tab" id="headingFour">
                                    <h4 class="panel-title">
                                        Shipment
    
                                    </h4>
                                </div></a>
                            <div id="shipment-collapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                <div class="panel-body">
                                    <div class="tab-pane border-box-n active" id="4">
                                        <h3>Delivery charges</h3>
                                        <p> UK delivery £2.90 per consultation via Royal Mail 24 Signed For (1-4 working days).</p>
    <p>Standard international delivery £5.90 flat rate via Royal Mail International Tracked &amp; Signed (2-5 working days).</p>
    <p>Express international delivery £32.00 flat rate via DHL Express (2-8 days depending on destination, with tracking in transit). </p> 
                                        <ul class="link-list">
                                            <li>
                                                <a href="/pharma/contents/index/delivery" class="left">More details</a>                                        </li>
<!--                                            <li>
                                                <a class="left ml_25" href="javascript:void(0)">Discreet</a>
                                            </li>-->
                                            <li>
                                                <a href="/pharma/contents/index/return-and-refunds" class="left ml_25">Refunds</a>                                        </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
</div>
<div class="treatments-mid-body">
    <div class="row">
        <div class="col-md-12">
            <?php echo $medicine['description']; ?>           
        </div>
    </div>
</div>