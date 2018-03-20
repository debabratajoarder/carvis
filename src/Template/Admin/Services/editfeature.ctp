<?php //pr($user); //exit; ?>


<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h1 > Edit Feature </h1>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Edit Feature</h5>
                        <div class="toolbar">

                        </div>
                    </header>
                    <div id="collapseOne" class="accordion-body collapse in body">
                        <div class="col-sm-6">

                            <div class="row">
                                <?php echo $this->Form->create($user, ['class' => 'form-horizontal', 'id' => 'user-validate', 'enctype' => 'multipart/form-data']); ?>

                                                               

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Feature Name</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="first_name" name="feature_name" class="form-control" value="<?php echo $user->feature_name ?>"/>
                                    </div>
                                </div>  

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Feature Description</label>
                                    <div class="col-lg-8">
                                        <textarea id="first_name" name="description" class="form-control"><?php echo $user->description ?></textarea>
                                    </div>
                                </div>
                                
                                
                                
                                  <?php $stype_id=explode(',',$user->service_type_id); ?>    
                                       
                            <div class="form-group">
                                    <label class="control-label col-lg-4">Service Type</label>
                                    <div class="col-lg-8"> 
                                        <?php foreach($servicetypes as $dt)
                                            { ?>
                                                <div class="col-lg-1">
                                                    <input type="checkbox" name="service_type_id[]" value="<?php echo $dt->id; ?>" <?php if(in_array( $dt->id,$stype_id)){echo 'checked';}?>>
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
                                    <input type="submit" name="submit" value="Edit Feature" class="btn btn-primary" />
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

<style>
    .datepicker{
        background:white !important;
    }    
</style>    