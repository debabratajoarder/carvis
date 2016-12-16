<div class="registration-body">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-md-offset-2">
                <div class="registration-body-area login-area">
                    <h2>Login</h2>
                    <div class="regi-info-area">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="regi-form-area">
                                    <?php echo $this->Form->create('', ['class' => 'form-horizontal', 'id' => 'signup_validate']); ?>
                                        <div class="form-group form-part">
                                            <label for="inputEmail3" class="col-sm-5 control-label">Email Address</label>
                                            <div class="col-sm-7">
                                                <input type="email" class="form-control" id="email" required="required" name="email" placeholder="Email Address">
                                            </div>
                                        </div>
                                        <div class="form-group form-part">
                                            <label for="inputPassword3" class="col-sm-5 control-label">Password</label>
                                            <div class="col-sm-7">
                                                <input type="password" name="password" id="password" required="required" class="form-control" id="inputPassword3" placeholder="Password">
                                            </div>
                                        </div>            
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-7">
                            <button type="submit" class="btn btn-default accountbutton loginbutton">Login</button>
                        </div>
                    </div>
                    <?php echo $this->Form->end();?>
                    <div class="form-group">
                            <div class="existing_accont">Forgot Your Password? <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "forgotpassword"]); ?>" class="click">Click here to Change Password</a> (for existing customers)</div>
                    </div>                    
                    
                    <div class="form-group">
                            
                            <div class="existing_accont">You not have account? <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "signup"]); ?>" class="click">Signup</a> </div>
                    </div>                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>