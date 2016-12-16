<?php echo $this->Html->script('ckeditor/ckeditor.js') ?>


  <?php //pr($SiteSettings); exit; ?>
    <div id="content">
    <div class="inner">
      <div class="row">
        <div class="col-lg-12">
          <h2> Add Treatment FAQ </h2>
        </div>
      </div>
      <hr />
      <div class="row">
        <div class="col-lg-12">
          <div class="box">
            <header class="dark">
              <div class="icons"><i class="icon-cloud-upload"></i></div>
              <h5>Add FAQ of <?php echo $treatments['name']?></h5> 
            </header>
            <div class="body">
              <!-- <form class="form-horizontal"> -->
                <?php echo $this->Form->create($treatmentfaq,['class' => 'form-horizontal', 'id' => 'admintreatmentfaq-validate', 'type' => 'post']);?>
                <?php echo $this->Form->input('treatment_id', array('type' => 'hidden', 'value'=>$id));?>
              
                <div class="form-group">
                    <label class="control-label col-lg-2">Question</label>
                    <?php echo '<div class="col-lg-10>'.$this->Form->input('question', array('class'=>'form-control','label' => false, 'style' => 'width:600px')).'</div>'; ?>
                </div>
              
                <div class="form-group">
                    <label class="control-label col-lg-2">Answer</label>
                    <div class="col-lg-10">
                        <textarea class="form-control ckeditor" style="width:600px" id="editor1" rows="6" name="answer"></textarea>
                    </div>
                </div>
              
                <div class="form-group">
                  <label class="control-label col-lg-2"> </label>
                  <div class="col-lg-10">
                    <button type="submit" class="btn btn-primary" style="margin-top: 15px"> Add Treatment FAQ </button>
                  </div>
                </div>  
                <!-- </form> -->
                <?php echo $this->Form->end() ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--END PAGE CONTENT --> 
  </div>
