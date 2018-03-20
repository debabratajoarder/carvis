<?php ?>
<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h1> Add Feature</h1>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Add Feature</h5>
                        <div class="toolbar">
                            <ul class="nav">
                                <li style="margin-right:15px">
                                    <div class="btn-group"> 


                                    </div>
                                </li>

                            </ul>
                        </div>
                    </header>
                    <div id="collapseOne" class="accordion-body collapse in body"> 
                        <div class="col-sm-6">
                            <div class="row">
				<?php echo $this->Form->create($service,['class' => 'form-horizontal', 'id' => 'user-validate', 'enctype' => 'multipart/form-data']);?>
                                
                                
                                
                                
                                <div class="form-block">

                                                                

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Feature Name</label>
                                    <div class="col-lg-8">
                                        <?php echo $this->Form->input('feature_name', array('class'=>'form-control','label' => false)); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Feature Description</label>
                                    <div class="col-lg-8">
                                        <?php echo $this->Form->input('description', array('class'=>'form-control','label' => false,'type'=>'textarea')); ?>
                                    </div>
                                </div>
                                
                               <div class="form-group">
                                    <label class="control-label col-lg-4">Service Type</label>
                                    <div class="col-lg-8"> 
                                        <?php foreach($servicetypes as $dt)
                                            { ?>
                                                <div class="col-lg-1">
                                                    <input type="checkbox" name="service_type_id[]" value="<?php echo $dt->id; ?>">
                                                </div>
                                                <div class="col-lg-7">
                                                    <?php echo $dt->type_name; ?>
                                                </div>
                                                <div class="clearfix"></div>
                                            <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                                                              
                                
                               

                                
                                
                                                               
                                
                                <label class="control-label col-lg-4"></label>
                                <div class="col-lg-8" style="text-align:left;"> 
                                    <input type="submit" name="submit" value="Add Feature" class="btn btn-primary" />
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
</div>