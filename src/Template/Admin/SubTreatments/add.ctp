  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
        $('#editor1').summernote({
            height: 300,                 // set editor height
            width: 800,
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true,                  // set focus to editable area after initializing summernote
        });
    });
  </script>

<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h1 > Add Sub Treatment </h1>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Add Sub Treatment</h5>
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
				  <?php echo $this->Form->create($treatment,['class' => 'form-horizontal', 'id' => 'treatment-validate', 'enctype' => 'multipart/form-data']);?>

                                <input type="hidden" name="parent_id" id="parent_id" value="0" />
                              
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Name </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->input('name', array('class'=>'form-control','label' => false, 'style' => 'width:800px')).'</div>'; ?>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Slug </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->input('slug', array('class'=>'form-control','label' => false, 'style' => 'width:800px')).'</div>'; ?>
                                </div>     
                                
                                 <div class="form-group">
                                    <label class="control-label col-lg-4">  Choose Treatment </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('parent_id', ['class' => 'form-control chzn-select', 'label' => false, 'type' => 'select','multiple' => false,'options' => $treatmentlist, 'empty' => true, 'style' => 'width:500px']) . '</div>'; ?>
                                </div>                                
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Choose Category </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('category_id', ['class' => 'form-control chzn-select', 'label' => false, 'type' => 'select','multiple' => false,'options' => $category, 'empty' => true, 'style' => 'width:800px']) . '</div>'; ?>
                                </div>                                

                                 <div class="form-group">
                                    <label class="control-label col-lg-4"> Description </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->textarea('description', array('class'=>'form-control','label' => false,'id'=>'editor1')).'</div>'; ?>
                                </div>                                
                                
                                <div class="form-group"> 
                                  <label class="control-label col-lg-4">Treatment Image </label>
                                  <div class="col-lg-8">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-preview thumbnail" style="width: 150px; height: 150px;">
                                        </div>
                                      <div> <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                        <input type="file" id="image" name="image" />
                                        </span> <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
                                    </div>
                                  </div>
                                </div>                                  
                                
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Meta Title </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->input('meta_title', array('class'=>'form-control','label' => false, 'style' => 'width:800px')).'</div>'; ?>
                                </div>                                
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Meta Keywords </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->input('meta_key', array('class'=>'form-control','type' => 'textarea','label' => false, 'style' => 'width:800px')).'</div>'; ?>
                                </div>                                
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Meta Description </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->input('meta_description', array('class'=>'form-control','type' => 'textarea','label' => false, 'style' => 'width:800px')).'</div>'; ?>
                                </div>                                  
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Is Active ? </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->input('is_active', array('label' => false, 'type' => 'checkbox')).'</div>'; ?>
                                </div>                                
                                
                                <label class="control-label col-lg-4"></label>
                                <div class="col-lg-8" style="text-align:left;"> 
                                    <input type="submit" name="submit" value="Add Treatment" class="btn btn-primary" />
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        /*
        $("#name").keyup(function(){
                var Text = $(this).val();
                Text = Text.toLowerCase();
                var regExp = /\s+/g;
                Text = Text.replace(regExp,'-');
                $("#slug").val(Text);        
        }); 
        */
        
        $("#name").keyup(function(){
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
                $("#slug").val(Text);        
        });        
    });
</script>


<!--
<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">

            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                  <div class="box">
                    <div id="collapseOne" class="accordion-body collapse in body">
                        <div class="col-sm-6">
                            <div class="row">
                                <?php //echo $this->Form->create($doctor) ?>
                                <?php echo $this->Form->create($doctor,['class' => 'form-horizontal', 'id' => 'admin-validate']);?>
                                <fieldset>
                                    <legend><?php echo __('Add Doctor') ?></legend>
                                    <?php
                                        echo '<div class="form-group">'.$this->Form->input('first_name', array('class'=>'form-control')).'</div>';
                                        echo '<div class="form-group">'.$this->Form->input('last_name', array('class'=>'form-control')).'</div>';
                                        echo '<div class="form-group">'.$this->Form->input('username', array('class'=>'form-control')).'</div>';
                                        echo '<div class="form-group">'.$this->Form->input('password', array('class'=>'form-control')).'</div>';
                                        echo '<div class="form-group">'.$this->Form->input('phone', array('class'=>'form-control')).'</div>';
                                        echo '<div class="form-group">'.$this->Form->input('email', array('class'=>'form-control')).'</div>';
                                        
                                    ?>
                                </fieldset>


                                <fieldset>
                                    <button type="submit" class="btn btn-primary" style="margin-top: 15px">Add Doctor</button>
                                </fieldset> 



                                <?php //echo $this->Form->button(__('Add Doctor')) ?>
                                <?php echo $this->Form->end() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->