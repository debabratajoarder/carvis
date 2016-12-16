<div class="bordered-block">
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
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#price-collapse" aria-expanded="false" aria-controls="price-collapse" class="collapsed">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        Price List
                                    </h4>
                                </div>
                            </a>
                            <div id="price-collapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" style="height: 0px;" aria-expanded="false">
                                <div class="panel-body">
                                    <div class="tab-pane active" id="1">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Contraceptive pill Pils </th>
                                                        <th>Quantity</th>
                                                        <th>Cost</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                                                                                <tr>
                                                                <td>Brevinor</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£12.50</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Cerazette (mini pill)</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£19.50</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Cilest</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£13.50</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Femodene</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£13.60</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Femodene ED</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£16.50</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Femodette</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£16.50</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Gedarel 20/150</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£11.50</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Gedarel 30/150</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£10.60</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Katya 30/75</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£16.50</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Loestrin 20</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£14.50</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Loestrin 30</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£14.50</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Logynon</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£15.00</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Logynon ED</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£15.00</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Marvelon</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£13.20</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Mercilon</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£17.50</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Microgynon 30</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£13.50</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Microgynon 30 ED</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£13.50</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Micronor (mini pill)</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£12.50</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Norgeston (mini pill)</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£13.50</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Noriday (mini pill)</td>
                                                                <td>3 x one month pack: £12.50</td>
                                                                <td>£12.50</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Norinyl-1</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£12.50</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Norinyl-1</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£12.50</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Ovranette</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£12.50</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Qlaira</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£36.00</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Rigevidon</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£13.50</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Sunya 20/75</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£19.00</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Synphase</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£11.50</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Triadene</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£22.50</td>
                                                            </tr>
                                                                                                                <tr>
                                                                <td>Yasmin</td>
                                                                <td>3 x one month pack</td>
                                                                <td>£24.20</td>
                                                            </tr>
                                                                                                                                                    </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="3">Prescription issued online - small <a href="#">prescription fee</a> per order.</td>
    
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"><a href="#">Compare prices:</a> Ascot Pharmacy prices are 25%-50% lower cost than other online clinics.</td>
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
                                                    <p>Ascot Pharmacy supplies medicine on prescription and charges a small prescription fee based on the order value of each prescription.Prescriptions are issued by our doctors online and sent electronically to our pharmacy.If you have your own private paper prescription please post to our pharmacy (details).Ascot Pharmacy prices are 25%&ndash;50% lower than other UK online clinics.</p>                                            </div>
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
                                                            <td>£25.00</td>
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
                                    <div class="tab-pane active" id="3">
                                        <div class="table-responsive">
                                           <table class="table table-bordered table-hover">
                                               <thead>
                                                   <tr>
                                                       <th>Items</th>
                                                       <th>Ascot Pharmacy</th>
                                                       <th>Ascot Pharmacy</th>
                                                       <th>Pharmacy2U</th>
                                                       <th>Superdrug</th>
                                                       <th>Express Pharmacy</th>
                                                       <th>Lloyds</th>
                                                       <th>Med Express</th>
                                                   </tr>
                                               </thead>
                                               <tbody>
    
                                                                                                                                                                                                                        <tr>
                                                                   <td>Brevinor</td>
                                                                   <td class="drfoxtd">£12.50</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 15.30 </td>
                                                                   <td>£ 17.50 </td>
                                                                   <td>£ 25.60 </td>
                                                                   <td>£ 11.60 </td>
                                                                   <td>£ 15.90 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Cerazette (mini pill)</td>
                                                                   <td class="drfoxtd">£19.50</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 234.99 </td>
                                                                   <td>£ 22.30 </td>
                                                                   <td>£ 22.50 </td>
                                                                   <td>£ 23.50 </td>
                                                                   <td>£ 24.50 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Cilest</td>
                                                                   <td class="drfoxtd">£13.50</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 15.00 </td>
                                                                   <td>£ 14.20 </td>
                                                                   <td>£ 15.60 </td>
                                                                   <td>£ 17.80 </td>
                                                                   <td>£ 16.50 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Femodene</td>
                                                                   <td class="drfoxtd">£13.60</td>
                                                                   <td>£ 13.00 </td>
                                                                   <td>£ 14.00 </td>
                                                                   <td>£ 12.00 </td>
                                                                   <td>£ 16.00 </td>
                                                                   <td>£ 18.00 </td>
                                                                   <td>£ 15.00 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Femodene ED</td>
                                                                   <td class="drfoxtd">£16.50</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 18.50 </td>
                                                                   <td>£ 17.50 </td>
                                                                   <td>£ 18.26 </td>
                                                                   <td>£ 14.99 </td>
                                                                   <td>£ 18.00 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Femodette</td>
                                                                   <td class="drfoxtd">£16.50</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 17.50 </td>
                                                                   <td>£ 16.50 </td>
                                                                   <td>£ 17.50 </td>
                                                                   <td>£ 18.00 </td>
                                                                   <td>£ 19.00 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Gedarel 20/150</td>
                                                                   <td class="drfoxtd">£11.50</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 12.00 </td>
                                                                   <td>£ 12.30 </td>
                                                                   <td>£ 15.50 </td>
                                                                   <td>£ 14.60 </td>
                                                                   <td>£ 15.00 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Gedarel 30/150</td>
                                                                   <td class="drfoxtd">£10.60</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 12.50 </td>
                                                                   <td>£ 11.99 </td>
                                                                   <td>£ 11.50 </td>
                                                                   <td>£ 13.00 </td>
                                                                   <td>£ 15.80 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Katya 30/75</td>
                                                                   <td class="drfoxtd">£16.50</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 16.99 </td>
                                                                   <td>£ 17.50 </td>
                                                                   <td>£ 17.20 </td>
                                                                   <td>£ 18.00 </td>
                                                                   <td>£ 18.50 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Loestrin 20</td>
                                                                   <td class="drfoxtd">£14.50</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 14.90 </td>
                                                                   <td>£ 14.50 </td>
                                                                   <td>£ 15.00 </td>
                                                                   <td>£ 15.90 </td>
                                                                   <td>£ 16.00 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Loestrin 30</td>
                                                                   <td class="drfoxtd">£14.50</td>
                                                                   <td style="text-align: center;"> NA </td>
                                                                   <td style="text-align: center;"> NA </td>
                                                                   <td style="text-align: center;"> NA </td>
                                                                   <td style="text-align: center;"> NA </td>
                                                                   <td style="text-align: center;"> NA </td>
                                                                   <td style="text-align: center;"> NA </td>
                                                               </tr>                                    
                                                                                                                                                                                                                                <tr>
                                                                   <td>Logynon</td>
                                                                   <td class="drfoxtd">£15.00</td>
                                                                   <td>£ 145.00 </td>
                                                                   <td>£ 15.80 </td>
                                                                   <td>£ 15.00 </td>
                                                                   <td>£ 14.50 </td>
                                                                   <td>£ 15.50 </td>
                                                                   <td>£ 16.00 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Logynon ED</td>
                                                                   <td class="drfoxtd">£15.00</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 16.00 </td>
                                                                   <td>£ 17.00 </td>
                                                                   <td>£ 16.80 </td>
                                                                   <td>£ 17.00 </td>
                                                                   <td>£ 16.50 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Marvelon</td>
                                                                   <td class="drfoxtd">£13.20</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 16.00 </td>
                                                                   <td>£ 14.20 </td>
                                                                   <td>£ 15.40 </td>
                                                                   <td>£ 14.90 </td>
                                                                   <td>£ 15.00 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Mercilon</td>
                                                                   <td class="drfoxtd">£17.50</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 17.00 </td>
                                                                   <td>£ 19.00 </td>
                                                                   <td>£ 18.00 </td>
                                                                   <td>£ 18.50 </td>
                                                                   <td>£ 16.20 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Microgynon 30</td>
                                                                   <td class="drfoxtd">£13.50</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 14.00 </td>
                                                                   <td>£ 14.99 </td>
                                                                   <td>£ 13.50 </td>
                                                                   <td>£ 14.00 </td>
                                                                   <td>£ 15.00 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Microgynon 30 ED</td>
                                                                   <td class="drfoxtd">£13.50</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 13.50 </td>
                                                                   <td>£ 13.60 </td>
                                                                   <td>£ 13.90 </td>
                                                                   <td>£ 14.00 </td>
                                                                   <td>£ 14.50 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Micronor (mini pill)</td>
                                                                   <td class="drfoxtd">£12.50</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 13.00 </td>
                                                                   <td>£ 12.80 </td>
                                                                   <td>£ 13.00 </td>
                                                                   <td>£ 13.50 </td>
                                                                   <td>£ 14.00 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Norgeston (mini pill)</td>
                                                                   <td class="drfoxtd">£13.50</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 13.70 </td>
                                                                   <td>£ 14.00 </td>
                                                                   <td>£ 15.00 </td>
                                                                   <td>£ 15.50 </td>
                                                                   <td>£ 16.00 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Noriday (mini pill)</td>
                                                                   <td class="drfoxtd">£12.50</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 12.99 </td>
                                                                   <td>£ 13.00 </td>
                                                                   <td>£ 13.20 </td>
                                                                   <td>£ 3.50 </td>
                                                                   <td>£ 14.00 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Norinyl-1</td>
                                                                   <td class="drfoxtd">£12.50</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 12.50 </td>
                                                                   <td>£ 12.90 </td>
                                                                   <td>£ 13.00 </td>
                                                                   <td>£ 14.20 </td>
                                                                   <td>£ 14.50 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Norinyl-1</td>
                                                                   <td class="drfoxtd">£12.50</td>
                                                                   <td style="text-align: center;"> NA </td>
                                                                   <td style="text-align: center;"> NA </td>
                                                                   <td style="text-align: center;"> NA </td>
                                                                   <td style="text-align: center;"> NA </td>
                                                                   <td style="text-align: center;"> NA </td>
                                                                   <td style="text-align: center;"> NA </td>
                                                               </tr>                                    
                                                                                                                                                                                                                                <tr>
                                                                   <td>Ovranette</td>
                                                                   <td class="drfoxtd">£12.50</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 12.30 </td>
                                                                   <td>£ 12.50 </td>
                                                                   <td>£ 13.20 </td>
                                                                   <td>£ 13.00 </td>
                                                                   <td>£ 14.20 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Qlaira</td>
                                                                   <td class="drfoxtd">£36.00</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 36.50 </td>
                                                                   <td>£ 36.90 </td>
                                                                   <td>£ 36.90 </td>
                                                                   <td>£ 37.00 </td>
                                                                   <td>£ 38.00 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Rigevidon</td>
                                                                   <td class="drfoxtd">£13.50</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 13.90 </td>
                                                                   <td>£ 13.50 </td>
                                                                   <td>£ 14.00 </td>
                                                                   <td>£ 14.50 </td>
                                                                   <td>£ 15.00 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Sunya 20/75</td>
                                                                   <td class="drfoxtd">£19.00</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 19.20 </td>
                                                                   <td>£ 19.50 </td>
                                                                   <td>£ 234.00 </td>
                                                                   <td>£ 234.50 </td>
                                                                   <td>£ 21.00 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Synphase</td>
                                                                   <td class="drfoxtd">£11.50</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 11.50 </td>
                                                                   <td>£ 11.99 </td>
                                                                   <td>£ 12.00 </td>
                                                                   <td>£ 12.40 </td>
                                                                   <td>£ 13.00 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Triadene</td>
                                                                   <td class="drfoxtd">£22.50</td>
                                                                   <td>£ 22.50 </td>
                                                                   <td>£ 22.60 </td>
                                                                   <td>£ 22.99 </td>
                                                                   <td>£ 23.00 </td>
                                                                   <td>£ 23.80 </td>
                                                                   <td>£ 24.00 </td>
                                                               </tr>
                                                                                                                                                                                                                                <tr>
                                                                   <td>Yasmin</td>
                                                                   <td class="drfoxtd">£24.20</td>
                                                                   <td>£ 34.00 </td>
                                                                   <td>£ 24.50 </td>
                                                                   <td>£ 25.00 </td>
                                                                   <td>£ 24.90 </td>
                                                                   <td>£ 24.70 </td>
                                                                   <td>£ 25.10 </td>
                                                               </tr>
                                                                                                                                                                                                 
                                               </tbody>
                                               <tfoot>
                                                   <tr>
                                                       <td colspan="6">Comparative costs of Trimethoprim 200mg x 6 from UK online clinics (13 September 2016) - qualifying notes
                                                           *Ascot Pharmacy adds a small prescription fee not included in table above.</td>
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
                                            <li>
                                                <a class="left ml_25" href="javascript:void(0)">Discreet</a>
                                            </li>
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
        <div class="col-md-12">
            <h2 class="prices">Prices</h2>
            <div id="exTab2">	
                <ul class="nav nav-tabs">
                    <li class="active"><a  href="#1" data-toggle="tab">Medicine Prices</a>
                    </li>
                    <li><a href="#2" data-toggle="tab">Prescription Fee</a>
                    </li>
                    <li><a href="#3" data-toggle="tab">Compare Prices</a>
                    </li>
                    <li><a href="#4" data-toggle="tab">Delivery</a>
                    </li>
                </ul>
                <div class="tab-content ">
                    <div class="tab-pane active" id="1">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Hay fever treatment</th>
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
                                        <td colspan="3">Prescription issued online - small <a href="#">prescription fee</a> per order.</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><a href="#">Compare prices:</a> Ascot Pharmacy prices are 25%-50% lower cost than other online clinics.</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div><!--end of .table-responsive-->
                    </div>
                    <div class="tab-pane" id="2">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <h2>Prescription fees</h2>
                                <p>Ascot Pharmacy supplies medicine on prescription and charges a small prescription fee based on the order value of each prescription.</p>
                                <p>Prescriptions are issued by our doctors online and sent electronically to our pharmacy.</p>
                                <p>If you have your own private paper prescription please post to our pharmacy (details).</p>
                                <p>Ascot Pharmacy prices are 25%–50% lower than other UK online clinics.</p>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Order value</th>
                                                <th>Prescription fee</td>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td> Any Order Value</td>
                                            <td>£<?php echo sprintf('%0.2f', $SiteSettings['prescfee'])?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="3">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Items</th>
                                        <th>ASCOT Pharmacy</th>
                                        <th>Ascot Pharmacy</th>
                                        <th>Pharmacy2U</th>
                                        <th>Superdrug</th>
                                        <th>Express Pharmacy</th>
                                        <th>Lloyds</th>
                                        <th>Med Express</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php if(!empty($medicine['pils'])){?>
                                    <?php foreach($medicine['pils'] as $pilList){?>
                                    <?php if(!empty($pil->pilprices)){ ?>
                                    <tr>
                                        <td><?php echo $pilList['title']?></td>
                                        <td class="drfoxtd">£<?php echo $pilList['cost']?></td>
                                        <td>£ <?php echo sprintf('%0.2f', $pilList['pilprices'][0]['drfox']);?> </td>
                                        <td>£ <?php echo sprintf('%0.2f', $pilList['pilprices'][0]['pharmacy2u']);?> </td>
                                        <td>£ <?php echo sprintf('%0.2f', $pilList['pilprices'][0]['superdrug']);?> </td>
                                        <td>£ <?php echo sprintf('%0.2f', $pilList['pilprices'][0]['expresspharmacy']);?> </td>
                                        <td>£ <?php echo sprintf('%0.2f', $pilList['pilprices'][0]['lloyds']);?> </td>
                                        <td>£ <?php echo sprintf('%0.2f', $pilList['pilprices'][0]['medexpress']);?> </td>
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
                                        <td colspan="7"> No Pils Exist With This Medicine </td>
                                    </tr>
                                    <?php } ?>                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6">Comparative costs of <?php echo $medicine['pils'][0]['title'] ?>  from UK online clinics - qualifying notes
                                            *ASCOT PAHARMACY adds a small prescription fee not included in table above.</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="4">
                        <h3>Delivery charges</h3>
                        <p>
                            UK delivery £2.90 per consultation via Royal Mail 24 Signed For (1-4 working days).</p>
                        <p>Standard international delivery £5.90 flat rate via Royal Mail International Tracked & Signed (2-5 working days).</p>
                        <p>Express international delivery £32.00 flat rate via DHL Express (2-8 days depending on destination, with tracking in transit).
                        </p>
                        <ul class="link-list">
                            <li>
                                <a class="left" href="#">More details</a>
                            </li>
                            <li>
                                <a class="left ml_25" href="#">Discreet</a>
                            </li>
                            <li>
                                <a class="left ml_25" href="#">Returns</a>
                            </li>
                        </ul>
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
            <!--
            <div class="symptoms">
                <h3>Hay fever symptoms</h3>
                <p>Hay fever symptoms arise where the body is sensitive to pollen or dust. The sensitivity results in the release of histamine which in turn causes inflammation. Hay fever is usually treated with medication which prevents histamine release or prevents the inflammation caused by histamine. Other ways to prevent hay fever include avoiding pollen and dust, and in some cases, undergoing treatments aimed at desensitising the body.</p>
            </div>
            <div class="symptoms">
                <div class="row">
                    <div class="col-md-8">
                        <h3>About hay fever</h3>
                        <p>The runny nose, sneezing and sore eyes of hay fever result from the release of the chemical, histamine. The histamine comes from cells that normally fight infection. In hay fever these cells become abnormally sensitised to pollen, releasing histamine and causing inflammation when pollen levels rise.
                        </p>
                    </div>
                    <div class="col-md-4">
                        <div class="symptoms-pic"><img src="<?php echo $this->Url->build('/', true); ?>images/hay-fever-symptoms.gif" alt=""/></div>
                    </div>
                </div>
            </div>
            <div class="symptoms">
                <h3>Preventing hay fever</h3>
                <ul>
                    <li><span class="blue-text"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> It is difficult to avoid pollen but it may be possible to reduce exposure.</li>
                    <li><span class="blue-text"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> Stay indoors when pollen counts are high.</li>
                    <li><span class="blue-text"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> Keep windows and doors closed.</li>
                    <li><span class="blue-text"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> Wrap around sunglasses reduce pollen contacting the eyes.</li>
                    <li><span class="blue-text"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> Shower after going outside.</li>
                    <li><span class="blue-text"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> Avoid grass cutting and places where pollen counts are high.</li>
                    <li><span class="blue-text"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> Vacuum regularly.</li>
                    <li><span class="blue-text"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> Keep pets out of the house during the hay fever season.</li>
                </ul>
                <p>For more information about hay fever see the NHS Choices information on <span class="blue-text"><b>Hay fever.</b></span></p>
            </div>
            <div class="symptoms">
                <h3>Raised dementia risk media scare</h3>
                <p>Ascot Pharmacy provides newer <b>non-sedative antihistamines</b> for hay fever which are of a different type to those that raised concern in a January 2015 US study.</p>
                <p><span class="blue-text"><b>Further information</b></span></p>
            </div>
            -->
        </div>
    </div>
</div>