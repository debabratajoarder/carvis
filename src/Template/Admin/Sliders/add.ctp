  <?php //pr($SiteSettings); exit; ?>
    <div id="content">
    <div class="inner">
      <div class="row">
        <div class="col-lg-12">
          <h2> Add Home Slider </h2>
        </div>
      </div>
      <hr />
      <div class="row">
        <div class="col-lg-12">
          <div class="box">
            <header class="dark">
              <div class="icons"><i class="icon-cloud-upload"></i></div>
              <h5>Add Home Slider</h5>
            </header>
            <div class="body">
              <!-- <form class="form-horizontal"> -->
                <?php echo $this->Form->create($sliders,['class' => 'form-horizontal', 'id' => 'admin-validate', 'type' => 'post', 'enctype' => 'multipart/form-data']);?>
       
                <div class="form-group">
                    <label class="control-label col-lg-4">Slider Text</label>
                    <?php echo '<div class="col-lg-8">'.$this->Form->input('title', array('class'=>'form-control','label' => false, 'style' => 'width:600px')).'</div>'; ?>
                </div>
              
              
                <div class="form-group"> 
                  <label class="control-label col-lg-4">Slider Image Upload</label>
                  <div class="col-lg-8">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-preview thumbnail" style="width: 350px; height: 150px;">
                        </div>
                      <div> <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                        <input type="file" id="file" name="file" />
                        </span> <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
                    </div>
                  </div>
                </div>
                           
                  
                <div class="form-group">
                  <label class="control-label col-lg-4"> </label>
                  <div class="col-lg-8">
                    <button type="submit" class="btn btn-primary" style="margin-top: 15px"> Add Slider </button>
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