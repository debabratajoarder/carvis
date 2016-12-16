<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(function () {
        $(".datepicker").datepicker({maxDate: -6570, dateFormat: 'yy-dd-mm'}).val();
    });
</script>

<div class="registration-body">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-md-offset-2">
                <div class="registration-body-area">
                    <h2>Enter Payment Detail</h2>
                    <?php echo $this->Form->create('', ['class' => 'form-horizontal', 'id' => 'checkout_validate']); ?>
                    <div class="regi-info-area">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Account Informations</h4>
                                <div class="regi-form-area">
                                    <div class="form-group form-part">
                                        <label for="inputEmail3" class="col-sm-5 control-label">Card<span>*</span></label>
                                        <div class="col-sm-7">
                                            <!-- <input type="text" class="form-control" id="inputEmail3" placeholder="First Name"> -->
                                            <?php $cards = array('Visa' => 'Visa','Mastercard' => 'Mastercard','Maestro' => 'Maestro','Electron' => 'Electron') ?>
                                            <?php echo $this->Form->input('card', ['class' => 'form-control','label'=>false ,'type' => 'select','multiple' => false,'options' => $cards,'empty' => true]);?>
                                        </div>
                                    </div>
                                    <div class="form-group form-part">
                                        <label for="inputPassword3" class="col-sm-5 control-label">Card Number<span>*</span></label>
                                        <div class="col-sm-7">
                                            <!-- <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name"> -->
                                            <?php echo $this->Form->input('card_number', array('class' => 'form-control', 'required', 'label' => false)); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group form-part">
                                        <label for="inputEmail3" class="col-sm-5 control-label">First Name On Card<span>*</span></label>
                                        <div class="col-sm-7">
                                            <!-- <input type="email" class="form-control" id="inputEmail3" placeholder="Email Address"> -->
                                            <?php echo $this->Form->input('firstname', array('class' => 'form-control', 'required', 'label' => false)); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group form-part">
                                        <label for="inputEmail3" class="col-sm-5 control-label">Last Name On Card<span>*</span></label>
                                        <div class="col-sm-7">
                                            <!-- <input type="email" class="form-control" id="inputEmail3" placeholder="Email Address"> -->
                                            <?php echo $this->Form->input('lastname', array('class' => 'form-control', 'required', 'label' => false)); ?>
                                        </div>
                                    </div>                                    

                                    <?php 
                                    $mnth = array('1'=>'01 January','2'=>'02 February','3'=>'03 March','4'=>'04 April','5'=>'05 May','6'=>'06 June','7'=>'07 July','8'=>'08 August','9'=>'09 September','10'=>'10 October','11'=>'11 November','12'=>'12 December');
                                    $year = array('2016'=>'2016','2017'=>'2017','2018'=>'2018','2019'=>'2019','2020' =>'2020','2021' =>'2021','2022' =>'2022','2023' =>'2023');
                                    //$y = date('Y'); $year = array();
                                    //for($k = $y; $k >= $y+10; $k++){ $year[$y] = $y; }
                                            
                                    ?>                                    
                                    
                                    
                                    <div class="form-group form-part">
                                        <label for="inputPassword3" class="col-sm-5 control-label">Expiry Date<span>*</span></label>
                                        <div class="col-sm-3">
                                            <!-- <input type="password" class="form-control" id="inputPassword3" placeholder="Set Password"> -->
                                            <?php echo $this->Form->input('expiry_month', ['class' => 'form-control','label'=>false ,'type' => 'select','multiple' => false,'options' => $mnth, 'empty' => "Choose Month"]);?>
                                        </div>
                                        <div class="col-sm-3">
                                            <!-- <input type="password" class="form-control" id="inputPassword3" placeholder="Set Password"> -->
                                            <?php echo $this->Form->input('expiry_year', ['class' => 'form-control','label'=>false ,'type' => 'select','multiple' => false,'options' => $year,'empty' => "Choose Year"]);?>
                                        </div>
                                    </div>
                                    <div class="form-group form-part">
                                        <label for="inputPassword3" class="col-sm-5 control-label">Security Code<span>*</span></label>
                                        <div class="col-sm-7">
                                            <!-- <input type="tel" class="form-control" id="inputPassword3" placeholder="Telephone"> -->
                                            <?php echo $this->Form->input('cvv', array('class' => 'form-control', 'required', 'label' => false)); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="regi-info-area">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Delivery Address</h4>
                                <div class="regi-form-area">
                                    <div class="form-group form-part">
                                        <label for="inputPassword3" class="col-sm-5 control-label">Street Address<span>*</span></label>
                                        <div class="col-sm-7">
                                            <!-- <input type="text" class="form-control" id="inputEmail3" placeholder="Street Address*:"> -->
                                            <?php echo $this->Form->input('ship_address', array('class' => 'form-control', 'required', 'label' => false)); ?>
                                        </div>
                                    </div>

                                    <div class="form-group form-part">
                                        <label for="inputPassword3" class="col-sm-5 control-label">City<span>*</span></label>
                                        <div class="col-sm-7">
                                            <!-- <input type="text" class="form-control" id="inputEmail3" placeholder="Street Address*:"> -->
                                            <?php echo $this->Form->input('ship_city', array('class' => 'form-control', 'required', 'label' => false)); ?>
                                        </div>
                                    </div>
                                    <!--
                                    <div class="form-group form-part">
                                        <label for="inputEmail3" class="col-sm-5 control-label">State/Region<span>*</span></label>
                                        <div class="col-sm-7">
                                            <?php echo $this->Form->input('ship_region', array('class' => 'form-control', 'required', 'label' => false)); ?>
                                        </div>
                                    </div>
                                    -->
                                    <div class="form-group form-part">
                                        <label for="inputPassword3" class="col-sm-5 control-label">Postcode<span>*</span></label>
                                        <div class="col-sm-7">
                                            <!-- <input type="password" class="form-control" id="inputPassword3" placeholder="Postcode"> -->
                                            <?php echo $this->Form->input('ship_postcode', array('class' => 'form-control', 'required', 'label' => false)); ?>
                                        </div>
                                    </div>
                                    <div class="form-group form-part">
                                        <label for="inputPassword3" class="col-sm-5 control-label">Country<span>*</span></label>
                                        <div class="col-sm-7">
                                            <?php echo $this->Form->input('ship_country', array('class' => 'form-control', 'required', 'label' => false)); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-5 col-sm-7">
                                            <button type="submit" class="btn btn-default accountbutton">Checkout Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->end(); ?>
                    <div class="existing_accont">Please Fill up <span style="color: red" >*</span> marked fields. </div>
                </div>
            </div>
        </div>
    </div>
</div>