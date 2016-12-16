
<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h1 > Add Patient </h1>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Add Patient</h5>
                        <div class="toolbar">
                            <ul class="nav">
                                <li style="margin-right:15px">
                                    <div class="btn-group"> 

                                        <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "listuser"]);?>"><button class="btn btn-xs btn-success close-box">
                                                <i class="icon-list"></i>List Patient</button></a>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </header>
                    <div id="collapseOne" class="accordion-body collapse in body">
                        <div class="col-sm-6">

                            <div class="row">
				  <?php echo $this->Form->create($user,['class' => 'form-horizontal', 'id' => 'user-validate']);?>

                                <input type="hidden" name="active" id="active" value="1" />

                                <div class="form-group">
                                    <label class="control-label col-lg-4">First Name</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="first_name" name="first_name" class="form-control" value=""/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Last Name</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="last_name" name="last_name" class="form-control" value=""/>
                                        <!--<input type="text" style="direction:rtl;" id="bank_name_arabic" name="last_name" class="form-control" value=""/>-->
                                    </div>
                                </div>
 
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Phone</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="phone" name="phone" class="form-control" value=""/>
                                    </div>
                                </div>                                
                                <!--
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Username</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="username" name="username" class="form-control" value=""/>
                                    </div>
                                </div>
                                -->
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Email</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="email" name="email" class="form-control" value=""/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Password</label>
                                    <div class="col-lg-8">
                                        <input type="password" id="password" name="password" class="form-control" value=""/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Address</label>
                                    <div class="col-lg-8">
                                        <?php echo $this->Form->input('address', array('class'=>'form-control','label' => false)); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">City</label>
                                    <div class="col-lg-8">
                                        <?php echo $this->Form->input('city', array('class'=>'form-control','label' => false)); ?>
                                    </div>
                                </div>                                
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Country</label>
                                    <div class="col-lg-8">
                                        <?php echo $this->Form->input('country', array('class'=>'form-control','label' => false)); ?>
                                    </div>
                                </div>                                
                                
                                
                                <label class="control-label col-lg-4"></label>
                                <div class="col-lg-8" style="text-align:left;"> 
                                    <input type="submit" name="submit" value="Add Patient" class="btn btn-primary" />
                                </div>
                                <?php echo $this->Form->end();?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>