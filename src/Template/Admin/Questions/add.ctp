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
                <h1 > Add Question </h1>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Add Question</h5>
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
				  <?php echo $this->Form->create($question,['class' => 'form-horizontal', 'id' => 'question-validate']);?>
                              
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Question </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->input('question', array('class'=>'form-control','label' => false, 'style' => 'width:800px')).'</div>'; ?>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4"> Answer </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->textarea('answer', array('class'=>'form-control','label' => false,'id'=>'editor1', 'required')).'</div>'; ?>
                                </div>                                
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Answer Type ? </label>
                                    <?php //echo '<div class="col-lg-8">'.$this->Form->radio('answer_type', array('class'=>'form-control', 'options'  => $ansType,'label' => false)).'</div>'; ?>
                                    <?php   $options = array('c'=> 'Sub Questions','y'=> 'Yes No');
                                            $attributes = array('legend' => false, 'class'=>'form-control');
                                            echo $this->Form->radio('answer_type', $options, $attributes);
                                    ?>
                                </div>                                
                                
                                <div class="form-group" id="actanswerdt" style="display: none">
                                    <label class="control-label col-lg-4">  Answer ? </label>
                                    <?php //echo '<div class="col-lg-8">'.$this->Form->radio('answer_type', array('class'=>'form-control', 'options'  => $ansType,'label' => false)).'</div>'; ?>
                                    <?php   $optionsa = array('1'=> 'Yes','0'=> 'No');
                                            $attributes = array('legend' => false, 'required'=>'required', 'class'=>'form-control');
                                            echo $this->Form->radio('valcheck', $optionsa, $attributes);
                                    ?>
                                </div>                                

                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Note </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->input('note', array('class'=>'form-control','type' => 'textarea','label' => false, 'style' => 'width:800px')).'</div>'; ?>
                                </div>                                
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Warnings </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->input('warning', array('class'=>'form-control','type' => 'textarea','label' => false, 'style' => 'width:800px')).'</div>'; ?>
                                </div>  
                                                                                             
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Is Active ? </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->input('is_active', array('label' => false, 'type' => 'checkbox')).'</div>'; ?>
                                </div>                                
                                
                                <label class="control-label col-lg-4"></label> 
                                <div class="col-lg-8" style="text-align:left;"> 
                                    <input type="submit" name="submit" value="Add Question" class="btn btn-primary" />
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="clearfix"></div>    <!-- actanswer  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#answer-type-y").blur(function(){
                $("#actanswer").css("display", "none");        
        });

        $("#answer-type-c").blur(function(){
                $("#actanswer").css("display", "block");        
        });        
    });
</script>