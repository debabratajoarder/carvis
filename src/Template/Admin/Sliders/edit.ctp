
<?php //pr($sliders); exit; ?>

<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h1 > Edit Home Slider </h1>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Edit Home Slider</h5>
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
			<?php echo $this->Form->create($sliders,['class' => 'form-horizontal', 'id' => 'admin-validate', 'type' => 'post', 'enctype' => 'multipart/form-data']); ?>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Title</label>
                                    <div class="col-lg-8">
                                    <?php if ($this->request->data){ ?>
                                    	<input type="text" id="title" name="title" class="form-control" value="<?php echo $this->request->data['title'] ?>"/>
                                    <?php } else { ?>
                                    	<input type="text" id="title" name="title" class="form-control" value="<?php echo $sliders->title ?>"/>
                                    <?php } ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-lg-4">Slider Image Upload</label>
                                  <div class="col-lg-8">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;">
                                            <?php $filePath = WWW_ROOT . 'home_slider' .DS.$sliders->file; ?>
                                            <?php if ($sliders->file != "" && file_exists($filePath)) { ?>
                                                <img src="<?php echo $this->Url->build('/home_slider/'.$sliders->file); ?>" width="200px" height="150px" />
                                            <?php } ?>
                                        </div>
                                      <div> <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                        <input type="file" id="file" name="file" />
                                        </span> <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
                                    </div>
                                  </div>
                                </div>                                

                                <label class="control-label col-lg-4"></label>
                                <div class="col-lg-8" style="text-align:left;"> 
                                    <input type="submit" name="submit" value="Edit Home Slider" class="btn btn-primary" />
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