<div class="registration-body">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-md-offset-2">
                <?php echo $this->Form->create('$user', ['class' => 'form-horizontal', 'id' => 'reset_validate']); ?>
                <input type="hidden" name="id" value="<?php echo $user->id ?>"/>
                <div class="registration-body-area login-area">
                    <h2>Reset your password</h2>
                    <div class="regi-info-area">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="regi-form-area">
                                        <div class="form-group form-part">
                                            <label for="inputEmail3" class="col-sm-5 control-label">Password</label>
                                            <div class="col-sm-7">
                                                <?php echo $this->Form->input('password', array('class'=>'form-control', 'type'=>'password', 'label' => false, 'value'=>'' )); ?>
                                            </div>
                                        </div>                                    
                                        <div class="form-group form-part">
                                            <label for="inputEmail3" class="col-sm-5 control-label">Confiirm Password</label>
                                            <div class="col-sm-7">
                                                <?php echo $this->Form->input('cpassword', array('class'=>'form-control', 'type'=>'password', 'label' => false, 'value'=>'' )); ?>
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