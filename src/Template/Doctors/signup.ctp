<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  $( function() {
    $( ".datepicker" ).datepicker({ maxDate:-6570, dateFormat: 'yy-dd-mm' }).val();
  } );
  </script>

<div class="registration-body">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-md-offset-2">
                <div class="registration-body-area">
                    <h2>New Customers - Registration</h2>
                    <?php echo $this->Form->create($user, ['class' => 'form-horizontal', 'id' => 'signup_validate']); ?>
                    <div class="regi-info-area">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Personal Informations</h4>
                                <div class="regi-form-area">
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label"> Gender<span*</span></label>
                                        <?php 
                                        $options = ['Male' => 'Male', 'Female' => 'Female'];
                                        $attributes = ['legend' => true];
                                        echo $this->Form->radio('gender', $options, $attributes);
                                        ?>                                        
                                    </div>
                                    <div class="form-group form-part">
                                        <label for="inputEmail3" class="col-sm-5 control-label">First Name<span>*</span></label>
                                        <div class="col-sm-7">
                                            <!-- <input type="text" class="form-control" id="inputEmail3" placeholder="First Name"> -->
                                            <?php echo $this->Form->input('first_name', array('class' => 'form-control', 'required', 'label' => false )); ?>
                                        </div>
                                    </div>
                                    <div class="form-group form-part">
                                        <label for="inputPassword3" class="col-sm-5 control-label">Last Name<span>*</span></label>
                                        <div class="col-sm-7">
                                            <!-- <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name"> -->
                                            <?php echo $this->Form->input('last_name', array('class'=>'form-control', 'required', 'label' => false )); ?>
                                        </div>
                                    </div>
                                    <div class="form-group form-part">
                                        <label for="inputEmail3" class="col-sm-5 control-label">Email Address<span>*</span></label>
                                        <div class="col-sm-7">
                                            <!-- <input type="email" class="form-control" id="inputEmail3" placeholder="Email Address"> -->
                                            <?php echo $this->Form->input('email', array('class'=>'form-control', 'required', 'label' => false )); ?>
                                        </div>
                                    </div>
                                    <div class="form-group form-part">
                                        <label for="inputPassword3" class="col-sm-5 control-label">Set Password<span>*</span></label>
                                        <div class="col-sm-7">
                                            <!-- <input type="password" class="form-control" id="inputPassword3" placeholder="Set Password"> -->
                                            <?php echo $this->Form->input('password', array('class'=>'form-control', 'required', 'label' => false )); ?>
                                        </div>
                                    </div>
                                    <div class="form-group form-part">
                                        <label for="inputPassword3" class="col-sm-5 control-label">Telephone</label>
                                        <div class="col-sm-7">
                                            <!-- <input type="tel" class="form-control" id="inputPassword3" placeholder="Telephone"> -->
                                            <?php echo $this->Form->input('phone', array('class'=>'form-control', 'label' => false )); ?>
                                        </div>
                                    </div>
                                    <div class="form-group form-part">
                                        <label for="inputPassword3" class="col-sm-5 control-label">Date Of Birth<span>*</span></label>
                                        <div class="col-sm-7">
                                             <!-- <input type="text" class="form-control datepicker" id="inputPassword3" placeholder="Date Of Birth"> -->
                                                <?php echo $this->Form->input('dob', array('class'=>'form-control datepicker', 'type'=>'text', 'id'=>'inputPassword3', 'value'=>'' , 'label' => false )); ?>
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
                                                <?php echo $this->Form->input('address', array('class'=>'form-control', 'required', 'label' => false)); ?>
                                            </div>
                                        </div>
                                    
                                        <div class="form-group form-part">
                                            <label for="inputPassword3" class="col-sm-5 control-label">City<span>*</span></label>
                                            <div class="col-sm-7">
                                                <!-- <input type="text" class="form-control" id="inputEmail3" placeholder="Street Address*:"> -->
                                                <?php echo $this->Form->input('city', array('class'=>'form-control','required', 'label' => false)); ?>
                                            </div>
                                        </div>

                                        <div class="form-group form-part">
                                            <label for="inputEmail3" class="col-sm-5 control-label">State/Region<span>*</span></label>
                                            <div class="col-sm-7">
                                                <?php echo $this->Form->input('region', array('class'=>'form-control', 'required', 'label' => false )); ?>
                                            </div>
                                        </div>
                                        <div class="form-group form-part">
                                            <label for="inputPassword3" class="col-sm-5 control-label">Postcode<span>*</span></label>
                                            <div class="col-sm-7">
                                                <!-- <input type="password" class="form-control" id="inputPassword3" placeholder="Postcode"> -->
                                                <?php echo $this->Form->input('postcode', array('class'=>'form-control', 'required', 'label' => false)); ?>
                                            </div>
                                        </div>
                                        <div class="form-group form-part">
                                            <label for="inputPassword3" class="col-sm-5 control-label">Country<span>*</span></label>
                                            <div class="col-sm-7">
                                                <?php echo $this->Form->input('country', array('class'=>'form-control', 'required', 'label' => false)); ?>
                                            </div>
                                        </div>
                                        <div class="form-group form-part">
                                            <div class="col-sm-offset-5 col-sm-7">
                                                <div class="checkbox">
                                                    <p>
                                                        <input type="checkbox" name="is_newsletter" id="test1" value="1" />
                                                        <label for="test1">I want to receive discounts and specials offers</label>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-5 col-sm-7">
                                                <button type="submit" class="btn btn-default accountbutton">Create Account</button>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->end();?>
                    
                    
                    
                    
                    
                    
                    <div class="existing_accont">Already have an existing account? <a href="#" class="click">Click here to login</a> (for existing customers)</div>
                </div>
            </div>
        </div>
    </div>
</div>