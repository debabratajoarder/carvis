<div class="registration-body">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-md-offset-2">
                <?php echo $this->Form->create($user, ['class' => 'form-horizontal', 'id' => 'fpass_validate']); ?>
                <div class="registration-body-area login-area">
                    <h2>Forgot your password?</h2>
                    <p class="email-text">Please enter the email address registered on your account</p>
                    <div class="regi-info-area">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="regi-form-area">
                                    
                                        <div class="form-group form-part">
                                            <label for="inputEmail3" class="col-sm-5 control-label">Email Address</label>
                                            <div class="col-sm-7">
                                                <?php echo $this->Form->input('email', array('class'=>'form-control', 'required', 'label' => false )); ?>
                                            </div>
                                        </div>            
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-7">
                            <button type="submit" class="btn btn-default accountbutton loginbutton">Reset Password</button>
                        </div>
                    </div>
                </div>
                <?php echo $this->Form->end();?>
            </div>
        </div>
    </div>
</div>