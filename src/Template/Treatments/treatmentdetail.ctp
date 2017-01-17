
<?php if($datap != "" && $datap == "medical-information"){ ?>
<script>
$(document).ready(function(){
    document.getElementById("treatmentprices").className = "panel-collapse collapse";
    document.getElementById("buytreatment").className = "panel-collapse collapse in";
});
</script>
<?php } ?>


<div class="treatments-prices-banner"> 
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <div class="treatments-banner-content">
                <h1><?php echo $treatment['name']; ?></h1>
                <?php echo $treatment['sort_descriptiion']; ?>
                <!-- <button class="btn btn-primary" type="button">Read More</button> -->
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <a class="navbar-brand" href="#">
                <div class="treatments-prices-pic">
                    <?php $filePath = WWW_ROOT . 'treatment_img' . DS . $treatment['image']; ?>
                    <?php if ($treatment['image'] != "" && file_exists($filePath)) { ?>
                        <img src="<?php echo $this->Url->build('/treatment_img/' . $treatment['image']); ?>" />
                    <!--<img alt="" src="<?php echo $this->Url->build('/', true); ?>images/treatment-banner.jpg">-->
                    <?php } else { ?>
                        <img alt="" src="<?php echo $this->Url->build('/', true); ?>images/treatment-banner.jpg">
                    <?php } ?>
                </div>
            </a>

        </div>
    </div>
</div>

<div class="treatments-body-aarea">
    <div class="row">
        <!--
            <ul class="nav nav-tabs" role="tablist">
                <li id="treatmentprices" role="presentation" class="<?php echo (empty($this->request->params['pass'][1]) || $this->request->params['pass'][1] != 'medical-information') ? 'active' : ''; ?>"><a href="#treatment-prices" aria-controls="treatment-prices" role="tab" data-toggle="tab">Prices Detail</a></li>
                <li id="medicalinformation" role="presentation"><a href="#medical-information" aria-controls="medical-information" role="tab" data-toggle="tab">Medical Details </a></li>               
                <li id="buytreatment" role="presentation" class="<?php echo (!empty($this->request->params['pass'][1]) && $this->request->params['pass'][1] == 'medical-information') ? 'active' : ''; ?>"><a href="#buy-treatment" aria-controls="buy-treatment" role="tab" data-toggle="tab">Order Treatment</a></li>
            </ul>
            -->
            <script>
                function funcActive() {

                    document.getElementById("treatmentprices").className = "panel-collapse collapse";
                    document.getElementById("buytreatment").className = "panel-collapse collapse in";
                }

                function funcActiveInform() {
                    
                    document.getElementById("buytreatment").className = "panel-collapse collapse";
                    document.getElementById("medicalinformation").className = "panel-collapse collapse in";                    

                }


            </script>        
        


        <div class="col-md-12">
            <div class="detail-accordion">
                <h2> Details </h2>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#treatmentprices" aria-expanded="true" aria-controls="collapseOne">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title"> Prices Detail </h4>
                            </div>
                        </a>
                        <div id="treatmentprices" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">

                                <div class="row">
                                    <?php if (!empty($treatment['Medicines'])) { ?>
                                        <?php foreach ($treatment['Medicines'] as $medicineRow) { ?>
                                            <div class="col-md-4">
                                                <div class="viagra-product">
                                                    <div class="viagra-product-pic"><img src="<?php echo $this->Url->build('/', true); ?>medicine_img/<?php echo $medicineRow['image'] ?>" /></div>
                                                    <h3> <?php echo $medicineRow['title'] ?> </h3>
                                                    <div class="viagra-product-text">
                                                        <p> <?php //echo $medicineRow['note']      ?> </p>
                                                        <!--<a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "medicinedetail", $medicineRow['slug']]); ?>">   <button type="button" class="btn btn-success">Buy treatment</button> </a>-->
                                                        <a href="#buy-treatment" aria-controls="buy-treatment" data-toggle="tab"><button type="button" onclick="funcActive()" class="btn btn-success">Order Treatment</button></a>
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
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#medicalinformation" aria-expanded="false" aria-controls="collapseTwo"><div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    Medical Details
                                </h4>
                            </div>
                        </a>
                        <div id="medicalinformation" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <div class="buy-treatment-body">
                                    <?php echo $treatment['description']; ?>                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#buytreatment" aria-expanded="false" aria-controls="collapseThree"><div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    Order Treatment
                                </h4>
                            </div>
                        </a>
                        <div id="buytreatment" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <form method="post" id="quest_validate" >
                                    <input type="hidden" name="treatment_id" value="<?php echo $treatment['id']; ?>">
                                    <input type="hidden" name="prescription_fee" value="<?php echo $treatment['prescription_fee']; ?>">
                                    <div class="buy-treatment-body">
                                        <div class="breadcrumb-area">
                                            <div class="btn-group btn-breadcrumb">
                                                <a href="#" class="btn btn-default breadcrumb-area-cart"><i class="glyphicon glyphicon-home"></i></a>
                                                <a href="#" class="btn btn-default active">Medical inquiry</a>
                                                <a href="#" class="btn btn-default">Select treatment</a>
                                                <a href="#" class="btn btn-default">Checkout</a>
                                            </div>
                                        </div>
                                        <h3>Answer medical questions to order</h3>
                                        <h4>You must read the important <span class="blue-text"><b>medical information</b></span> for prescription tablets.</h4>
                                        <h5>See <a href="javascript:void(0)" onclick="funcActiveInform()" >medical information</a> section</h5>
                                        <?php foreach ($questionlist as $ind => $qlist) { ?>
                                            <?php if ($qlist['answer_type'] != "y") { ?>
                                                <div class="anti-malaria-area">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4> <?php echo $qlist['question'] ?> </h4>
                                                            <?php foreach ($qlist['checkboxlist'] as $chkList) { ?>
                                                                <p><input type="checkbox"  name="checkbox<?php echo $ind ?>[]" value="<?php echo $chkList['title'] ?>"> <?php echo $chkList['title'] ?></p>
                                                            <?php } ?>
                                                        </div>
                                                        <input type="hidden" name="field<?php echo $ind ?>" value="checkbox" >
                                                        <input type="hidden" name="fieldq<?php echo $ind ?>" value="<?php echo $qlist['question'] ?>" >
                                                    </div>
                                                </div>                            
                                            <?php } else { ?>
                                                <div class="anti-malaria-area">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <p> <?php echo $qlist['question'] ?></p>

                                                            <?php if (!empty($qlist['answer'])) { ?>
                                                                <p><?php echo $qlist['answer'] ?></p>
                                                            <?php } ?>

                                                            <?php if ($qlist['warning'] != "") { ?>
                                                                <?php $alType[$ind] = 'quote'; ?>
                                                                <div class="quote" id="chekisreadopt0" style=" display: none">
                                                                    <div class="red-circle">!</div><p><?php echo $qlist['warning'] ?></p>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            <?php } else { ?>
                                                                <?php $alType[$ind] = 'quote-blank'; ?>
                                                                <div class="quote-blank" id="chekisreadopt0" style=" display: none">
                                                                </div>                                            
                                                            <?php } ?>
                                                                
                                                                
                                                                 
                                                                
                                                            <?php if ($qlist['note'] != "") { ?>
                                                                <?php $alType[$ind] = 'quote-blue'; ?>
                                                                <div class="quote-blue" id="chekisreadopt0" style=" display: none">
                                                                    <div class="red-circle-b"><i class="fa fa-info" aria-hidden="true"></i></div><p><?php echo $qlist['note'] ?></p>
                                                                    <div class="clearfix"></div>
                                                                </div>                                                                
                                                            <?php } else { ?>
                                                                <?php $alType[$ind] = 'quote-blue'; ?>
                                                                <div class="quote-blank" id="chekisreadopt0" style=" display: none">
                                                                </div>                                            
                                                            <?php } ?>                                                                
                                                                
                                                                
                                                        </div>
                                                        <?php if ($qlist['warning'] != "") { ?>
                                                            <div class="col-md-3">
                                                                <div class="anti-malaria-right">
                                                                    <ul>
                                                                        <li> <input type="radio" required name="isread<?php echo $ind ?>" class="ckvalclassphphtml" data-answer="<?php echo $qlist['valcheck'] ?>" onclick="checkValidation('isread<?php echo $ind ?>', this, '<?php echo $qlist['valcheck'] ?>');" id="isready" value="1">Yes</li>
                                                                        <li> <input type="radio" required name="isread<?php echo $ind ?>" class="ckvalclassphphtml" data-answer="<?php echo $qlist['valcheck'] ?>" onclick="checkValidation('isread<?php echo $ind ?>', this, '<?php echo $qlist['valcheck'] ?>');" id="isreadyn" value="0"> No</li>
                                                                    </ul>
                                                                    <input type="hidden" name="field<?php echo $ind ?>" value="<?php echo $qlist['question'] ?>" >
                                                                </div>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="col-md-3">
                                                                <div class="anti-malaria-right">
                                                                    <ul>
                                                                        <li> <input type="radio" required name="isread<?php echo $ind ?>" class="ckvalclassphphtml" data-answer="2" onclick="checkValidation('isread<?php echo $ind ?>', this, '<?php echo $qlist['valcheck'] ?>');" id="isready" value="2">Yes</li>
                                                                        <li> <input type="radio" required name="isread<?php echo $ind ?>" class="ckvalclassphphtml" data-answer="2" onclick="checkValidation('isread<?php echo $ind ?>', this, '<?php echo $qlist['valcheck'] ?>');" id="isreadyn" value="0"> No</li>
                                                                    </ul>
                                                                    <input type="hidden" name="field<?php echo $ind ?>" value="<?php echo $qlist['question'] ?>" >
                                                                </div>
                                                            </div>                                        
                                                        <?php } ?>
                                                    </div>
                                                </div>                                    
                                            <?php } ?>
                                        <?php } ?>
                                        <input type="hidden" name="count" value="<?php echo count($questionlist) + 1 ?>" >
                                        <div class="buy-treatment-btn-area">
                                            <div class="next">

                                                <?php if ($this->request->session()->check('Auth.User')) { ?>
                                                    <div class="btn-group">
                                                        <!--<button type="button" id="stopgo" style="display: block" class="btn btn-success">Next: Choose Treatment</button>-->
                                                        <input type="submit" id="startgo" disabled class="btn btn-success" name="submit" value="Next: Choose Treatment" >
                                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="cart-btn"><i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                            </span>
                                                        </button>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="btn-group">
                                                        <!--<button type="button" id="stopgo" style="display: block" class="btn btn-success">Next: Choose Treatment</button>-->
                                                        <input type="submit" id="startgo" disabled class="btn btn-success" name="submit" value="Next: Choose Treatment" >
                                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="cart-btn"><i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                            </span>
                                                        </button>
                                                    </div>
                                                <?php } ?>                                
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php /* ?>
          <div class="col-md-12">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
          <li id="treatmentprices" role="presentation" class="<?php echo (empty($this->request->params['pass'][1]) || $this->request->params['pass'][1] != 'medical-information') ? 'active' : ''; ?>"><a href="#treatment-prices" aria-controls="treatment-prices" role="tab" data-toggle="tab">Prices Detail</a></li>
          <li id="medicalinformation" role="presentation"><a href="#medical-information" aria-controls="medical-information" role="tab" data-toggle="tab">Medical Details </a></li>
          <li id="buytreatment" role="presentation" class="<?php echo (!empty($this->request->params['pass'][1]) && $this->request->params['pass'][1] == 'medical-information') ? 'active' : ''; ?>"><a href="#buy-treatment" aria-controls="buy-treatment" role="tab" data-toggle="tab">Get-Treatment</a></li>
          </ul>
          <script>
          function funcActive() {
          document.getElementById("treatmentprices").className = "";
          document.getElementById("buytreatment").className = "active";
          document.getElementById("treatment-prices").className = "tab-pane";
          document.getElementById("buy-treatment").className = "tab-pane active";
          }

          function funcActiveInform() {
          document.getElementById("buytreatment").className = "";
          document.getElementById("medicalinformation").className = "active";
          document.getElementById("buy-treatment").className = "tab-pane";
          document.getElementById("medical-information").className = "tab-pane active";
          }


          </script>
          <div class="tab-content">
          <div role="tabpanel" class="tab-pane <?php echo (empty($this->request->params['pass'][1]) || $this->request->params['pass'][1] != 'medical-information') ? 'active' : ''; ?>" id="treatment-prices">
          <div class="row">
          <?php if (!empty($treatment['Medicines'])) { ?>
          <?php foreach ($treatment['Medicines'] as $medicineRow) { ?>
          <div class="col-md-4">
          <div class="viagra-product">
          <div class="viagra-product-pic"><img src="<?php echo $this->Url->build('/', true); ?>medicine_img/<?php echo $medicineRow['image'] ?>" /></div>
          <h3> <?php echo $medicineRow['title'] ?> </h3>
          <div class="viagra-product-text">
          <p> <?php //echo $medicineRow['note']    ?> </p>
          <!--<a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "medicinedetail", $medicineRow['slug']]); ?>">   <button type="button" class="btn btn-success">Buy treatment</button> </a>-->
          <a href="#buy-treatment" aria-controls="buy-treatment" data-toggle="tab"><button type="button" onclick="funcActive()" class="btn btn-success">Get treatment</button></a>
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
          </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="medical-information">
          <div class="buy-treatment-body">
          <?php echo $treatment['description']; ?>
          </div>
          </div>
          <div role="tabpanel" class="tab-pane <?php echo (!empty($this->request->params['pass'][1]) && $this->request->params['pass'][1] == 'medical-information') ? 'active' : ''; ?>" id="buy-treatment">
          <form method="post" id="quest_validate" >
          <input type="hidden" name="treatment_id" value="<?php echo $treatment['id']; ?>">
          <input type="hidden" name="prescription_fee" value="<?php echo $treatment['prescription_fee']; ?>">
          <div class="buy-treatment-body">
          <div class="breadcrumb-area">
          <div class="btn-group btn-breadcrumb">
          <a href="#" class="btn btn-default breadcrumb-area-cart"><i class="glyphicon glyphicon-home"></i></a>
          <a href="#" class="btn btn-default active">Medical inquiry</a>
          <a href="#" class="btn btn-default">Select treatment</a>
          <a href="#" class="btn btn-default">Checkout</a>
          </div>
          </div>
          <h3>Answer medical questions to order</h3>
          <h4>You must read the important <span class="blue-text"><b>medical information</b></span> for prescription tablets.</h4>
          <h5>See <a href="javascript:void(0)" onclick="funcActiveInform()" >medical information</a> section</h5>
          <?php foreach ($questionlist as $ind => $qlist) { ?>
          <?php if ($qlist['answer_type'] != "y") { ?>
          <div class="anti-malaria-area">
          <div class="row">
          <div class="col-md-12">
          <h4> <?php echo $qlist['question'] ?> </h4>
          <?php foreach ($qlist['checkboxlist'] as $chkList) { ?>
          <p><input type="checkbox"  name="checkbox<?php echo $ind ?>[]" value="<?php echo $chkList['title'] ?>"> <?php echo $chkList['title'] ?></p>
          <?php } ?>
          </div>
          <input type="hidden" name="field<?php echo $ind ?>" value="checkbox" >
          <input type="hidden" name="fieldq<?php echo $ind ?>" value="<?php echo $qlist['question'] ?>" >
          </div>
          </div>
          <?php } else { ?>
          <div class="anti-malaria-area">
          <div class="row">
          <div class="col-md-9">
          <p> <?php echo $qlist['question'] ?></p>

          <?php if (!empty($qlist['answer'])) { ?>
          <p><?php echo $qlist['answer'] ?></p>
          <?php } ?>

          <?php if ($qlist['warning'] != "") { ?>
          <?php $alType[$ind] = 'quote'; ?>
          <div class="quote" id="chekisreadopt0" style=" display: none">
          <div class="red-circle">!</div><p><?php echo $qlist['warning'] ?></p>
          <div class="clearfix"></div>
          </div>
          <?php } else if ($qlist['warning'] == "" && $qlist['note'] != "") { ?>
          <?php $alType[$ind] = 'quote-blue'; ?>
          <div class="quote-blue" id="chekisreadopt0" style=" display: none">
          <div class="red-circle-b"><i class="fa fa-info" aria-hidden="true"></i></div><p><?php echo $qlist['note'] ?></p>
          <div class="clearfix"></div>
          </div>
          <?php } else { ?>
          <?php $alType[$ind] = 'quote-blank'; ?>
          <div class="quote-blank" id="chekisreadopt0" style=" display: none">
          </div>
          <?php } ?>
          </div>
          <?php if ($qlist['warning'] != "") { ?>
          <div class="col-md-3">
          <div class="anti-malaria-right">
          <ul>
          <li> <input type="radio" required name="isread<?php echo $ind ?>" class="ckvalclassphphtml" data-answer="<?php echo $qlist['valcheck'] ?>" onclick="checkValidation('isread<?php echo $ind ?>', this, '<?php echo $qlist['valcheck'] ?>');" id="isready" value="1">Yes</li>
          <li> <input type="radio" required name="isread<?php echo $ind ?>" class="ckvalclassphphtml" data-answer="<?php echo $qlist['valcheck'] ?>" onclick="checkValidation('isread<?php echo $ind ?>', this, '<?php echo $qlist['valcheck'] ?>');" id="isreadyn" value="0"> No</li>
          </ul>
          <input type="hidden" name="field<?php echo $ind ?>" value="<?php echo $qlist['question'] ?>" >
          </div>
          </div>
          <?php } else { ?>
          <div class="col-md-3">
          <div class="anti-malaria-right">
          <ul>
          <li> <input type="radio" required name="isread<?php echo $ind ?>" class="ckvalclassphphtml" data-answer="2" onclick="checkValidation('isread<?php echo $ind ?>', this, '<?php echo $qlist['valcheck'] ?>');" id="isready" value="2">Yes</li>
          <li> <input type="radio" required name="isread<?php echo $ind ?>" class="ckvalclassphphtml" data-answer="2" onclick="checkValidation('isread<?php echo $ind ?>', this, '<?php echo $qlist['valcheck'] ?>');" id="isreadyn" value="0"> No</li>
          </ul>
          <input type="hidden" name="field<?php echo $ind ?>" value="<?php echo $qlist['question'] ?>" >
          </div>
          </div>
          <?php } ?>
          </div>
          </div>
          <?php } ?>
          <?php } ?>
          <input type="hidden" name="count" value="<?php echo count($questionlist) + 1 ?>" >
          <div class="buy-treatment-btn-area">
          <div class="next">

          <?php if ($this->request->session()->check('Auth.User')) { ?>
          <div class="btn-group">
          <!--<button type="button" id="stopgo" style="display: block" class="btn btn-success">Next: Choose Treatment</button>-->
          <input type="submit" id="startgo" disabled class="btn btn-success" name="submit" value="Next: Choose Treatment" >
          <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="cart-btn"><i class="fa fa-cart-plus" aria-hidden="true"></i>
          </span>
          </button>
          </div>
          <?php } else { ?>
          <div class="btn-group">
          <!--<button type="button" id="stopgo" style="display: block" class="btn btn-success">Next: Choose Treatment</button>-->
          <input type="submit" id="startgo" disabled class="btn btn-success" name="submit" value="Next: Choose Treatment" >
          <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="cart-btn"><i class="fa fa-cart-plus" aria-hidden="true"></i>
          </span>
          </button>
          </div>
          <?php } ?>
          </div>
          <div class="clearfix"></div>
          </div>
          </div>
          </form>
          </div>
          </div>
          </div>
          <?php */ ?>
    </div>
</div>
<div class="treatments-mid-body">
    <div class="row">
        <div class="col-md-12">
            <div class="detail-accordion">
                <h2>Prices</h2>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#price-collapse" aria-expanded="true" aria-controls="price-collapse">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    Price List
                                </h4>
                            </div>
                        </a>
                        <div id="price-collapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div class="tab-pane active" id="1">
                                    <div class="">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th><?php echo $treatment['name']; ?> Pils </th>
                                                    <th>Quantity</th>
                                                    <th>Cost</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($trPils)) { ?>
                                                    <?php foreach ($trPils as $tpils) { ?>
                                                        <tr>
                                                            <td><?php echo $tpils['title'] ?></td>
                                                            <td><?php echo $tpils['quantity'] ?></td>
                                                            <td>£<?php echo sprintf('%0.2f', $tpils['cost']) ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } else { ?> 
                                                    <tr>
                                                        <td colspan="3"> No Pils Exist </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
<!--                                                <tr>
                                                    <td colspan="3">Prescription issued online - small <a href="#">prescription fee</a> per order.</td>

                                                </tr>-->
                                                <tr>
                                                    <td colspan="3"> Medicinesbymailbox prices are 25%-50% lower cost than other online clinics.</td>
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
                                                <?php echo $SiteSettings['prescription_fee'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
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
                                                        <td>£<?php echo sprintf('%0.2f', $SiteSettings['prescfee']) ?></td>
                                                    </tr>
                                                </table>
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
                                           <tbody>

                                               <?php if (!empty($trPils)) { ?>
                                                   <?php foreach ($trPils as $tpils) { ?>
                                                       <?php if (!empty($tpils['pilprices'])) { ?>
                                                           <tr>
                                                               <td><?php echo $tpils['title'] ?></td>
                                                               <td class="drfoxtd">£<?php echo sprintf('%0.2f', $tpils['cost']) ?></td>
                                                               <td>£ <?php echo sprintf('%0.2f', $tpils['pilprices'][0]['drfox']); ?> </td>
                                                               <td>£ <?php echo sprintf('%0.2f', $tpils['pilprices'][0]['pharmacy2u']); ?> </td>
                                                               <td>£ <?php echo sprintf('%0.2f', $tpils['pilprices'][0]['superdrug']); ?> </td>
                                                               <td>£ <?php echo sprintf('%0.2f', $tpils['pilprices'][0]['expresspharmacy']); ?> </td>
                                                               <td>£ <?php echo sprintf('%0.2f', $tpils['pilprices'][0]['lloyds']); ?> </td>
                                                               <td>£ <?php echo sprintf('%0.2f', $tpils['pilprices'][0]['medexpress']); ?> </td>
                                                           </tr>
                                                       <?php } else { ?>
                                                           <tr>
                                                               <td><?php echo $tpils['title'] ?></td>
                                                               <td class="drfoxtd">£<?php echo sprintf('%0.2f', $tpils['cost']) ?></td>
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
                                                       <td colspan="7"> No Pils Exist </td>
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
                                    <?php echo $SiteSettings['deliverycharges'] ?> 
                                    <ul class="link-list">
                                        <li>
                                            <?php echo $this->Html->link('More details', ['controller' => 'Contents', 'action' => 'index', "delivery"], ['class' => 'left']); ?>
                                        </li>
<!--                                        <li>
                                            <a class="left ml_25" href="javascript:void(0)">Discreet</a>
                                        </li>-->
                                        <li>
                                            <?php echo $this->Html->link('Refunds', ['controller' => 'Contents', 'action' => 'index', "return-and-refunds"], ['class' => 'left ml_25']); ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        
        
        <?php /* ?>
        <div class="col-md-12 border-box-n">
            <h2 class="prices">Prices</h2>
            <div id="exTab2">	
                <ul class="nav nav-tabs">
                    <li class="active"><a  href="#1" data-toggle="tab">Prices List</a>
                    </li>
                    <li><a href="#2" data-toggle="tab">Site Fee</a>
                    </li>
                    <li><a href="#3" data-toggle="tab">Parallel Prices</a>
                    </li>
                    <li><a href="#4" data-toggle="tab"> Shipment </a>
                    </li>
                </ul>
                <div class="tab-content ">
                    <div class="tab-pane active" id="1">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><?php echo $treatment['name']; ?> Pils </th>
                                        <th>Quantity</th>
                                        <th>Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($trPils)) { ?>
                                        <?php foreach ($trPils as $tpils) { ?>
                                            <tr>
                                                <td><?php echo $tpils['title'] ?></td>
                                                <td><?php echo $tpils['quantity'] ?></td>
                                                <td>£<?php echo sprintf('%0.2f', $tpils['cost']) ?></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } else { ?> 
                                        <tr>
                                            <td colspan="3"> No Pils Exist </td>
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
                        </div>
                    </div>
                    <div class="tab-pane" id="2">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="border-box-n">
                                    <h2>Prescription fees</h2>
                                    <?php echo $SiteSettings['prescription_fee'] ?>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
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
                                            <td>£<?php echo sprintf('%0.2f', $SiteSettings['prescfee']) ?></td>
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

                                    <?php if (!empty($trPils)) { ?>
                                        <?php foreach ($trPils as $tpils) { ?>
                                            <?php if (!empty($tpils['pilprices'])) { ?>
                                                <tr>
                                                    <td><?php echo $tpils['title'] ?></td>
                                                    <td class="drfoxtd">£<?php echo sprintf('%0.2f', $tpils['cost']) ?></td>
                                                    <td>£ <?php echo sprintf('%0.2f', $tpils['pilprices'][0]['drfox']); ?> </td>
                                                    <td>£ <?php echo sprintf('%0.2f', $tpils['pilprices'][0]['pharmacy2u']); ?> </td>
                                                    <td>£ <?php echo sprintf('%0.2f', $tpils['pilprices'][0]['superdrug']); ?> </td>
                                                    <td>£ <?php echo sprintf('%0.2f', $tpils['pilprices'][0]['expresspharmacy']); ?> </td>
                                                    <td>£ <?php echo sprintf('%0.2f', $tpils['pilprices'][0]['lloyds']); ?> </td>
                                                    <td>£ <?php echo sprintf('%0.2f', $tpils['pilprices'][0]['medexpress']); ?> </td>
                                                </tr>
                                            <?php } else { ?>
                                                <tr>
                                                    <td><?php echo $tpils['title'] ?></td>
                                                    <td class="drfoxtd">£<?php echo sprintf('%0.2f', $tpils['cost']) ?></td>
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
                                            <td colspan="7"> No Pils Exist </td>
                                        </tr>
                                    <?php } ?>                                    
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
                    <div class="tab-pane border-box-n" id="4">
                        <h3>Delivery charges</h3>
                        <?php echo $SiteSettings['deliverycharges'] ?> 
                        <ul class="link-list">
                            <li>
                                <?php echo $this->Html->link('More details', ['controller' => 'Contents', 'action' => 'index', "delivery"], ['class' => 'left']); ?>
                            </li>
                            <li>
                                <a class="left ml_25" href="javascript:void(0)">Discreet</a>
                            </li>
                            <li>
                                <?php echo $this->Html->link('Refunds', ['controller' => 'Contents', 'action' => 'index', "return-and-refunds"], ['class' => 'left ml_25']); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php */ ?>
    </div>
</div>

<div class="treatments-mid-body">
    <div class="row">
        <div class="col-md-12">
            <div class="suplimentary-information">
                <h2>Supplementary information</h2>
                <ul class="bxslider">                   
                <?php foreach ($appSlider as $sliderData) { ?>
                <?php if($treatment['id'] != $sliderData['id']){ ?>
                    <li>
                        <a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "treatmentdetail", $sliderData['slug']]); ?>">
                            <img src="<?php echo $this->Url->build('/'); ?>treatment_img/<?php echo $sliderData['image'] ?>" width="169" height="130" /> 
                            <p style="font-size: 12px; alignment-adjust: central"><?php echo $sliderData['name'] ?></p></a>
                    </li>
                <?php } } ?>
                </ul>
            </div>                    
        </div>
    </div>
</div>


















<div id="chekisreadoptval" style="display: none">0</div>
<script>
    function checkValidation(sl, val, ans) {
        if ($("input:radio[name='" + sl + "']:checked").val() != ans) {
            $("input:radio[name='" + sl + "']:checked").closest('.row').find('.quote').show();
            $("input:radio[name='" + sl + "']:checked").closest('.row').find('.quote-blue').hide();
            //$("input:radio[name='"+sl+"']:checked").closest('.row').find('.quote-blue').hide();
        } else {
            //$("input:radio[name='"+sl+"']:checked").closest('.row').find('.quote-blue').show();
            $("input:radio[name='" + sl + "']:checked").closest('.row').find('.quote').hide();
            $("input:radio[name='" + sl + "']:checked").closest('.row').find('.quote-blue').show();
        }
        submitOnAns();
    }

    function submitOnAns() {
        //console.log('...');
        var trig = 0;
        $('.ckvalclassphphtml').each(function (e) {
            //console.log($(this).attr('name'));
            var isGo = $(this).attr('name');
            //console.log(isGo,$("input:radio[name='" + isGo + "']:checked").val(),$("input:radio[name='" + isGo + "']:checked").data('answer'));
            if ($("input:radio[name='" + isGo + "']:checked").val() && (($("input:radio[name='" + isGo + "']:checked").val() == $("input:radio[name='" + isGo + "']:checked").data('answer')) || $("input:radio[name='" + isGo + "']:checked").data('answer') == 2)) {
                //$('#startgo').attr('disabled', true);
                trig++;
            } else {
                //$('#startgo').attr('disabled', false);
                //trig++;
            }
        })
        //console.log(trig,$('.ckvalclassphphtml').length);
        if ($('.ckvalclassphphtml').length == trig)
        {
            $('#startgo').attr('disabled', false);
        }
        else
        {
            $('#startgo').attr('disabled', true);
        }
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
