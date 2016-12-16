<!--<div class="treatments-prices-banner">
    <img src="<?php echo $this->Url->build('/', true); ?>images/treatment-banner.jpg" alt=""/>
     <img src="<?php echo $this->Url->build('/', true); ?>treatment_img/<?php echo $treatment['image']; ?>" alt=""/> 
    <div class="treatments-banner-content">
        <h1> <?php echo $treatment['name']; ?> </h1> 
<?php echo $treatment[0]['sort_descriptiion']; ?>
         <button type="button" class="btn btn-primary">Read More</button> 
    </div>
</div>-->

<div class="treatments-prices-banner">
    <div class="row">
        <div class="col-md-6">
            <div class="treatments-banner-content">
                <h1>Erectile dysfunction</h1>
                <p>Erectile dysfunction (also known as impotence) is a very common condition, which affects the majority of men at some point in their lives. Up to 50% of men aged 40 - 70 and up to 70% of men over the age of 70 suffer from erectile dysfunction to some extent. </p>
                <button class="btn btn-primary" type="button">Read More</button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="treatments-prices-pic">

                <img alt="" src="<?php echo $this->Url->build('/', true); ?>images/treatment-banner.jpg"> 

            </div>
        </div>
    </div>

</div>

<!--

<div class="treatments-prices-banner">
    <div class="row">
        <div class="col-md-6">
            <div class="treatments-banner-content">
                <h1><?php echo $treatment[0]['name']; ?></h1>
                <p><?php echo $treatment[0]['sort_descriptiion']; ?></p>

                <button class="btn btn-primary" type="button">Read More</button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="treatments-prices-pic">
                <?php if ($treatment[0]['image'] != "") { ?>
                    <img src="<?php echo $this->Url->build('/', true); ?>treatment_img/<?php echo $treatment[0]['image']; ?>" alt=""/>
                <?php } else { ?>
                    <img alt="" src="<?php echo $this->Url->build('/', true); ?>images/treatment-banner.jpg"> 

                <?php } ?>


            </div>
        </div>
    </div>

</div>

-->


<div class="treatments-body-aarea">

    <div class="row">
        <div class="col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#treatment-prices" aria-controls="treatment-prices" role="tab" data-toggle="tab">Treatment And Prices</a></li>
                <li role="presentation"><a href="#medical-information" aria-controls="medical-information" role="tab" data-toggle="tab">Medical Information </a></li>

                <?php if (!empty($questionlist)) { ?>
                    <li><a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "medicinedetail", $treatment[0]['Medicines'][0]['slug']]); ?>" aria-controls="treatment-prices"> Buy-Treatment </a></li>
                <?php } else { ?>
                    <li role="presentation"><a href="#buy-treatment" aria-controls="buy-treatment" role="tab" data-toggle="tab">Buy-Treatment</a></li>
                <?php } ?>

                <!-- <li role="presentation"><a href="#buy-treatment" aria-controls="buy-treatment" role="tab" data-toggle="tab">Buy-Treatment</a></li> -->
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="treatment-prices">
                    <div class="row">
                        <?php if (!empty($treatment[0]['Medicines'])) { ?>
                            <?php foreach ($treatment[0]['Medicines'] as $medicineRow) { ?>
                                <div class="col-md-4">
                                    <div class="viagra-product">
                                        <div class="viagra-product-pic"><img src="<?php echo $this->Url->build('/', true); ?>medicine_img/<?php echo $medicineRow['image'] ?>" /></div>
                                        <h3> <?php echo $medicineRow['title'] ?> </h3>
                                        <div class="viagra-product-text">
                                            <p> <?php //echo $medicineRow['note']  ?> </p>
                                            <a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "medicinedetail", $medicineRow['slug']]); ?>">   <button type="button" class="btn btn-success">Buy treatment</button> </a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="col-md-4">
                                <div class="viagra-product">
                                    <h3>No Medicine Exist</h3>
                                </div>
                            </div>                            
                        <?php } ?>

                        <!--
                        <div class="col-md-3">
                            <div class="viagra-product">
                                <div class="viagra-product-pic"><img src="<?php echo $this->Url->build('/', true); ?>images/generic-sildenafil-pic.jpg" /></div>
                                <h3>Generic Sildenafil</h3>
                                <div class="viagra-product-text">
                                    <p>Sildenafil (generic Viagra)<br>

                                        25mg, 50mg, 100mg from £1.50 per <br>
                                        tablet</p>
                                    `					<button type="button" class="btn btn-success">Buy treatment</button>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="viagra-product">
                                <div class="viagra-product-pic"><img src="<?php echo $this->Url->build('/', true); ?>images/cialis.jpg" /></div>
                                <h3>Cialis</h3>
                                <div class="viagra-product-text">
                                    <p>Cialis (tadalafil)<br>

                                        2.5mg, 5mg, 10mg, 20mg from £2.47 per
                                        tablet</p>
                                    `					<button type="button" class="btn btn-success">Buy treatment</button>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="viagra-product">
                                <div class="viagra-product-pic"><img src="<?php echo $this->Url->build('/', true); ?>images/spedra.jpg" /></div>
                                <h3>Viagra</h3>
                                <div class="viagra-product-text">
                                    <p>Viagra (sildenafil)<br>

                                        25mg, 50mg, 100mg from £5.13 per <br>
                                        tablet</p>
                                    `					<button type="button" class="btn btn-success">Buy treatment</button>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="viagra-product">
                                <div class="viagra-product-pic"><img src="<?php echo $this->Url->build('/', true); ?>images/spedra-b.jpg" /></div>
                                <h3>Viagra</h3>
                                <div class="viagra-product-text">
                                    <p>Viagra (sildenafil)<br>

                                        25mg, 50mg, 100mg from £5.13 per <br>
                                        tablet</p>
                                    `					<button type="button" class="btn btn-success">Buy treatment</button>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="viagra-product">
                                <div class="viagra-product-pic"><img src="<?php echo $this->Url->build('/', true); ?>images/levitra.jpg" /></div>
                                <h3>Viagra</h3>
                                <div class="viagra-product-text">
                                    <p>Viagra (sildenafil)<br>

                                        25mg, 50mg, 100mg from £5.13 per <br>
                                        tablet</p>
                                    `					<button type="button" class="btn btn-success">Buy treatment</button>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="viagra-product">
                                <div class="viagra-product-pic"><img src="<?php echo $this->Url->build('/', true); ?>images/spedra-c.jpg" /></div>
                                <h3>Viagra</h3>
                                <div class="viagra-product-text">
                                    <p>Viagra (sildenafil)<br>

                                        25mg, 50mg, 100mg from £5.13 per <br>
                                        tablet</p>
                                    `					<button type="button" class="btn btn-success">Buy treatment</button>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="viagra-product">
                                <div class="viagra-product-pic"><img src="<?php echo $this->Url->build('/', true); ?>images/viagra-pic.jpg" /></div>
                                <h3>Viagra</h3>
                                <div class="viagra-product-text">
                                    <p>Viagra (sildenafil)<br>

                                        25mg, 50mg, 100mg from £5.13 per <br>
                                        tablet</p>
                                    `					<button type="button" class="btn btn-success">Buy treatment</button>
                                </div>
                            </div>
                        </div>
                        -->




                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="medical-information">
                    <div class="buy-treatment-body">
                        <?php echo $treatment[0]['description']; ?>
                    </div>
                </div>


                <?php if (!empty($questionlist)) { ?>                   
                    <div role="tabpanel" class="tab-pane" id="buy-treatment">
                        <div class="buy-treatment-body">
                            <div class="breadcrumb-area">
                                <div class="btn-group btn-breadcrumb">
                                    <a href="#" class="btn btn-default breadcrumb-area-cart"><i class="glyphicon glyphicon-home"></i></a>
                                    <a href="#" class="btn btn-default">Medical questions</a>
                                    <a href="#" class="btn btn-default">Choose treatment</a>
                                    <a href="#" class="btn btn-default">Complete order</a>
                                </div>
                            </div>
                            <h3>Answer medical questions to order</h3>
                            <h4>You must read the important <span class="blue-text"><b>medical information</b></span> for malaria tablets.</h4>
                            <div class="medical-information">
                                <ul>
                                    <li>
                                        <div class="nmbr">1.</div> 
                                        <div class="medical-information-text">To find the malaria tablets recommended for the area you plan to visit please go to the <span class="blue-text">NHS Fit for Travel</span> website.</div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <li>
                                        <div class="nmbr">2.</div> 
                                        <div class="medical-information-text">On the NHS website find the page for the country you are visiting.</div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <li>
                                        <div class="nmbr">3.</div> 
                                        <div class="medical-information-text">On the top of your country page, click the link labeled 'Malaria Map'.</div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <li>
                                        <div class="nmbr">4.</div> 
                                        <div class="medical-information-text">On the malaria map page check if you are going to areas <span class="red">coloured red or pink</span> and see the advice below the map. If antimalarials are usually advised return to the malaria section of the country.</div>
                                        <div class="clearfix"></div>   
                                    </li>
                                    <li>
                                        <div class="nmbr">5.</div> 
                                        <div class="medical-information-text">Your recommended tablets are at the bottom of your country page under the heading 'Malaria precautions'. Make a note of <b>ALL</b> the recommended tablets.</div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <li><b>Please take care to get this right as it is important.</b></li>
                                    <li>
                                        <div class="nmbr">6.</div> 
                                        <div class="medical-information-text">People visiting multiple regions where different tablets are recommended must see their GP or a specialist travel adviser before ordering</div>
                                        <div class="clearfix"></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="anti-malaria-area">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h4> Have you read the anti-malaria tablets medical information?</h4>
                                        <p>Please read <span class="blue-text"><b>important medical information.</b></span></p>

                                        <div class="quote" id="chekisreadopt0" style=" display: none">
                                            <div class="red-circle">!</div><p>Please read the important medical information. You can change your answer and continue.</p>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="quote-blue" id="chekisreadopt0" style=" display: none">
                                            <div class="red-circle-b"><i class="fa fa-info" aria-hidden="true"></i></div><p>Please read the important medical information. You can change your answer and continue.</p>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="anti-malaria-right">
                                            <ul>
                                                <li> <input type="radio" name="isread0" data-answer="1" class="ckvalclassphphtml" onclick="checkValidation('isread0', this, '1');" id="isready" value="1">Yes</li>
                                                <li> <input type="radio" name="isread0" data-answer="1" class="ckvalclassphphtml" onclick="checkValidation('isread0', this, '1');" id="isreadyn" value="0"> No</li>
                                            </ul>
                                            <input type="hidden" name="field0" value="termscondition" >
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <?php foreach ($questionlist as $ind => $qlist) { ?>
                                <?php if ($qlist['answer_type'] != "y") { ?>
                                    <div class="anti-malaria-area">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4> <?php echo $qlist['question'] ?> </h4>
                                                <?php foreach ($qlist['checkboxlist'] as $chkList) { ?>
                                                    <p><input type="checkbox" name="<?php echo $qlist['id'] ?>[]" value="<?php echo $chkList['title'] ?>"> <?php echo $chkList['title'] ?></p>
                                                <?php } ?>
                                            </div>
                                            <input type="hidden" name="field<?php echo $ind ?>" value="<?php echo $qlist['question'] ?>" >
                                        </div>
                                    </div>                            

                                <?php } else { ?>
                                    <div class="anti-malaria-area">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <h4> <?php echo $qlist['question'] ?></h4>
                                                <div class="quote" id="chekisreadopt0" style=" display: none">
                                                    <div class="red-circle">!</div><p><?php echo $qlist['warning'] ?></p>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="quote-blue" id="chekisreadopt0" style=" display: none">
                                                    <div class="red-circle-b"><i class="fa fa-info" aria-hidden="true"></i></div><p><?php echo $qlist['note'] ?></p>
                                                    <div class="clearfix"></div>
                                                </div>

                                            </div>
                                            <div class="col-md-3">
                                                <div class="anti-malaria-right">
                                                    <ul>
                                                        <li> <input type="radio" name="isread<?php echo $ind ?>" class="ckvalclassphphtml" data-answer="<?php echo $qlist['valcheck'] ?>" onclick="checkValidation('isread<?php echo $ind ?>', this, '<?php echo $qlist['valcheck'] ?>');" id="isready" value="1">Yes</li>
                                                        <li> <input type="radio" name="isread<?php echo $ind ?>" class="ckvalclassphphtml" data-answer="<?php echo $qlist['valcheck'] ?>" onclick="checkValidation('isread<?php echo $ind ?>', this, '<?php echo $qlist['valcheck'] ?>');" id="isreadyn" value="0"> No</li>
                                                    </ul>
                                                    <input type="hidden" name="field<?php echo $ind ?>" value="<?php echo $qlist['question'] ?>" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                <?php } ?>

                            <?php } ?>
                            <input type="hidden" name="count" value="<?php echo count($questionlist) + 1 ?>" >
                            <!--
                            <div class="anti-malaria-area">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4> For my area of travel, Fitfortravel recommends the following (tick ALL the recommended medication from the list below):</h4>
                                        <p><input type="checkbox" value=""> Atovaquone/proguanil (Malarone)</p>
                                        <p><input type="checkbox" value=""> Chloroquine on its own <em>without progaunil</em></p>
                                        <p><input type="checkbox" value=""> Proguanil on its own <em>without chloroquine</em></p>
                                        <p><input type="checkbox" value=""> Chloroquine + proguanil <em>combined</em></p>
                                        <p><input type="checkbox" value=""> Mefloquine <em>(Lariam)</em></p>
                                        <p><input type="checkbox" value=""> Doxycycline</p>
                                    </div>
                                </div>
                            </div>
                            <div class="anti-malaria-area">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4> Are you allergic to:</h4>
                                        <p><input type="checkbox" value=""> Chloroquine</p>
                                        <p><input type="checkbox" value=""> Proguanil (Paludrine)</p>
                                        <p><input type="checkbox" value=""> Chloroquine/proguanil</p>
                                        <p><input type="checkbox" value=""> Mefloquine (Lariam)</p>
                                        <p><input type="checkbox" value=""> Doxycycline or Tetracycline</p>
                                        <p><input type="checkbox" value=""> Atovaquone/proguanil (Malarone)</p>
                                        <p><input type="checkbox" value=""> Quinine</p>
                                    </div>
                                </div>
                            </div>
                            <div class="anti-malaria-area">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h4>Do the following conditions apply?</h4>
                                        <div class="conditions-apply">
                                            <ul>
                                                <li><span class="blue-text"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> I will read the patient information leaflet(s) supplied with medication</li>
                                                <li><span class="blue-text"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> I am over 18</li>
                                                <li><span class="blue-text"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> The medication is for my own use</li>
                                                <li><span class="blue-text"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> I agree to the <span class="blue-text"><b>terms and conditions</b></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="anti-malaria-right">
                                            <ul>
                                                <li> <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">Yes</li>
                                                <li> <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio"> No</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="anti-malaria-area">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h4> Are you pregnant or do you intend to become pregnant during your trip or within 3 months afterwards?</h4>
                                        <div class="quote">
                                            <div class="red-circle">!</div><p>Please read the important medical information. You can change your answer and continue.</p>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="anti-malaria-right">
                                            <ul>
                                                <li> <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">Yes</li>
                                                <li> <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio"> No</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="anti-malaria-area">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h4> Have you been diagnosed with liver or kidney disease?</h4>
                                        <div class="quote">
                                            <div class="red-circle">!</div><p>Please answer this question to proceed</p>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="anti-malaria-right">
                                            <ul>
                                                <li> <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">Yes</li>
                                                <li> <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio"> No</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="anti-malaria-area">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h4> Are you pregnant or do you intend to become pregnant during your trip or within 3 months afterwards?</h4>
                                        <div class="quote">
                                            <div class="red-circle">!</div><p>Please answer this question to proceed</p>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="anti-malaria-right">
                                            <ul>
                                                <li> <input name="optionsRadios" id="optionsRadios1" data-answer="" value="option1" checked="" type="radio">Yes</li>
                                                <li> <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio"> No</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            -->
                            <div class="buy-treatment-btn-area">
                                <div class="next">
                                    <div class="btn-group">

                                        <!--<button type="button" id="stopgo" style="display: block" class="btn btn-success">Next: Choose Treatment</button>-->

                                        <input type="submit" id="startgo" disabled class="btn btn-success" name="submit" value="Next: Choose Treatment" >

                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="cart-btn"><i class="fa fa-cart-plus" aria-hidden="true"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <div class="please">
                                    <div class="quote">
                                        <div class="red-circle">!</div><p>Please answer this question to proceed</p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>

                    <div role="tabpanel" class="tab-pane" id="buy-treatment">
                        <div class="buy-treatment-body">
                            <div class="breadcrumb-area">
                                <div class="btn-group btn-breadcrumb">
                                    <a href="#" class="btn btn-default breadcrumb-area-cart"><i class="glyphicon glyphicon-home"></i></a>
                                    <a href="#" class="btn btn-default">Medical questions</a>
                                    <a href="#" class="btn btn-default">Choose treatment</a>
                                    <a href="#" class="btn btn-default">Complete order</a>
                                </div>
                            </div>
                            <h3>Answer medical questions to order</h3>
                            <h4>You must read the important <span class="blue-text"><b>medical information</b></span> for malaria tablets.</h4>
                            <div class="medical-information">
                                <ul>
                                    <li>
                                        <div class="nmbr">1.</div> 
                                        <div class="medical-information-text">To find the malaria tablets recommended for the area you plan to visit please go to the <span class="blue-text">NHS Fit for Travel</span> website.</div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <li>
                                        <div class="nmbr">2.</div> 
                                        <div class="medical-information-text">On the NHS website find the page for the country you are visiting.</div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <li>
                                        <div class="nmbr">3.</div> 
                                        <div class="medical-information-text">On the top of your country page, click the link labeled 'Malaria Map'.</div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <li>
                                        <div class="nmbr">4.</div> 
                                        <div class="medical-information-text">On the malaria map page check if you are going to areas <span class="red">coloured red or pink</span> and see the advice below the map. If antimalarials are usually advised return to the malaria section of the country.</div>
                                        <div class="clearfix"></div>   
                                    </li>
                                    <li>
                                        <div class="nmbr">5.</div> 
                                        <div class="medical-information-text">Your recommended tablets are at the bottom of your country page under the heading 'Malaria precautions'. Make a note of <b>ALL</b> the recommended tablets.</div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <li><b>Please take care to get this right as it is important.</b></li>
                                    <li>
                                        <div class="nmbr">6.</div> 
                                        <div class="medical-information-text">People visiting multiple regions where different tablets are recommended must see their GP or a specialist travel adviser before ordering</div>
                                        <div class="clearfix"></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="anti-malaria-area">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h4> Have you read the anti-malaria tablets medical information?</h4>
                                        <p>Please read <span class="blue-text"><b>important medical information.</b></span></p>

                                        <div class="quote" id="chekisreadopt0" style=" display: none">
                                            <div class="red-circle">!</div><p>Please read the important medical information. You can change your answer and continue.</p>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="quote-blue" id="chekisreadopt0" style=" display: none">
                                            <div class="red-circle-b"><i class="fa fa-info" aria-hidden="true"></i></div><p>Please read the important medical information. You can change your answer and continue.</p>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="anti-malaria-right">
                                            <ul>
                                                <li> <input type="radio" name="isread0" data-answer="1" class="ckvalclassphphtml" onclick="checkValidation('isread0', this, '1');" id="isready" value="1">Yes</li>
                                                <li> <input type="radio" name="isread0" data-answer="1" class="ckvalclassphphtml" onclick="checkValidation('isread0', this, '1');" id="isreadyn" value="0"> No</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="buy-treatment-btn-area">
                                <div class="next">
                                    <div class="btn-group">

                                        <!--<button type="button" id="stopgo" style="display: block" class="btn btn-success">Next: Choose Treatment</button>-->

    <!--<input type="submit" id="startgo" disabled class="btn btn-success" name="submit" value="Next: Choose Treatmentqq" >-->

                                        <!--<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="cart-btn"><i class="fa fa-cart-plus" aria-hidden="true"></i>
                                            </span>
                                        </button>-->
                                    </div>
                                </div>
                                <div class="please">
                                    <div class="quote">
                                        <div class="red-circle">!</div><p>No Medicine Exist To Poceed</p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>                    
                <?php } ?>                    
            </div>
        </div>
    </div>

</div>
<!--
<div class="treatments-mid-body">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
<?php echo $treatment[0]['description']; ?>
            </div>
        </div>
    </div>
</div>
-->

<div id="chekisreadoptval" style="display: none">0</div>



<script>

    function checkValidation(sl, val, ans) {
        if ($("input:radio[name='" + sl + "']:checked").val() != ans) {
            $("input:radio[name='" + sl + "']:checked").closest('.row').find('.quote').show();
            //$("input:radio[name='"+sl+"']:checked").closest('.row').find('.quote-blue').hide();
        } else {
            //$("input:radio[name='"+sl+"']:checked").closest('.row').find('.quote-blue').show();
            $("input:radio[name='" + sl + "']:checked").closest('.row').find('.quote').hide();
        }
        submitOnAns();
    }

    function submitOnAns() {
        $('.ckvalclassphphtml').each(function () {
            console.log($(this).attr('name'));
            var isGo = $(this).attr('name');
            if ($("input:radio[name='" + isGo + "']:checked").val() != $("input:radio[name='" + isGo + "']:checked").data('answer')) {
                $('#startgo').attr('disabled', true);
            } else {
                $('#startgo').attr('disabled', false);
            }
        })
    }

    /* 
     
     function checkValidation(sl,val){
     
     $("#chekisreadopt").css("display", "none");
     $("#regTitle").html("Hello World");
     
     }
     
     
     function notreadOption(st){
     
     $("#chekisreadopt").css("display", "none");
     $("#regTitle").html("Hello World");
     
     }
     
     
     */



</script>
