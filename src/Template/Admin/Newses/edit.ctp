<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
 <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
 <script>
   $(document).ready(function() {
       $('#summernote').summernote();
       $('#editor1').summernote({
           defaultFontName: 'Lato',
           height: 200,                 // set editor height
           width: 800,
           minHeight: null,             // set minimum height of editor
           maxHeight: null,             // set maximum height of editor
           focus: true,                  // set focus to editable area after initializing summernote
           popover: {
                       image: [
                         ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                         ['float', ['floatLeft', 'floatRight', 'floatNone']],
                         ['remove', ['removeMedia']]
                       ],
                       link: [
                         ['link', ['linkDialogShow', 'unlink']]
                       ],
                       air: [
                         ['color', ['color']],
                         ['font', ['bold', 'underline']],
                         ['fontsize', ['8', '9', '10', '11', '12', '14', '18', '24', '36']],
                         ['para', ['ul', 'paragraph']],
                         ['table', ['table']],
                         ['insert', ['link', 'picture']]
                         ['style', ['style']],
                         ['text', ['bold', 'italic', 'underline', 'color', 'clear']],
                         ['para', [ 'paragraph']],
                         ['height', ['height']],
                         ['font', ['Lato','Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Merriweather']],
                       ]
                     },
           onblur: function() {
               var text = $('#editor').code();
               text = text.replace("<br>", " ");
               $('#description').val(text);
           }

       });
       $('#editor2').summernote({
           defaultFontName: 'Lato',
           height: 300,                 // set editor height
           width: 800,
           minHeight: null,             // set minimum height of editor
           maxHeight: null,             // set maximum height of editor
           focus: true,                  // set focus to editable area after initializing summernote
           popover: {
                       image: [
                         ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                         ['float', ['floatLeft', 'floatRight', 'floatNone']],
                         ['remove', ['removeMedia']]
                       ],
                       link: [
                         ['link', ['linkDialogShow', 'unlink']]
                       ],
                       air: [
                         ['color', ['color']],
                         ['font', ['bold', 'underline']],
                         ['fontsize', ['8', '9', '10', '11', '12', '14', '18', '24', '36']],
                         ['para', ['ul', 'paragraph']],
                         ['table', ['table']],
                         ['insert', ['link', 'picture']]
                         ['style', ['style']],
                         ['text', ['bold', 'italic', 'underline', 'color', 'clear']],
                         ['para', [ 'paragraph']],
                         ['height', ['height']],
                         ['font', ['Lato','Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Merriweather']],
                       ]
                     },
           onblur: function() {
               var text = $('#editor').code();
               text = text.replace("<br>", " ");
               $('#description').val(text);
           }

       });       

   });
 </script>

<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h1 > Edit News and Announcements </h1>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5> Edit News and Announcements </h5>
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
				<?php echo $this->Form->create($news,['class' => 'form-horizontal', 'id' => 'admin-validate', 'enctype' => 'multipart/form-data']);?>
                                <?php echo $this->Form->hidden('modified', ['value'=> gmdate("Y-m-d h:i:s")]); ?>
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">News Title</label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->input('title', array('class'=>'form-control','label' => false, 'style' => 'width:800px')).'</div>'; ?>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Slug </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->input('slug', array('class'=>'form-control','label' => false, 'style' => 'width:800px')).'</div>'; ?>
                                </div>                                
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Choose Treatment </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('treatment_id', ['class' => 'form-control chzn-select', 'label' => false, 'type' => 'select','multiple' => false,'options' => $treatments, 'empty' => false, 'style' => 'width:800px']) . '</div>'; ?>
                                </div>                
                                <?php $catList = array(); foreach($news->NewsCategories as $cat){ $catList[] = $cat->category_id; }  ?>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Choose Category </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('category_id', ['class' => 'form-control chzn-select', 'label' => false, 'type' => 'select','multiple' => true,'options' => $category, 'default'=> $catList, 'empty' => true, 'style' => 'width:800px']) . '</div>'; ?>
                                </div>                                
                                
                                 <div class="form-group">
                                    <label class="control-label col-lg-4"> Sort Description </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->textarea('sortdetail', array('class'=>'form-control','label' => false,'id'=>'editor1')).'</div>'; ?>
                                </div>
                                
                                 <div class="form-group">
                                    <label class="control-label col-lg-4"> News Content </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->textarea('detail', array('class'=>'form-control','label' => false,'id'=>'editor2')).'</div>'; ?>
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
                                  <label class="control-label col-lg-4"> Image </label>
                                  <div class="col-lg-8">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;">
                                            <?php $filePath = WWW_ROOT . 'news_img' .DS.$news->img; ?>
                                            <?php if ($news->img != "" && file_exists($filePath)) { ?>
                                                <img src="<?php echo $this->Url->build('/news_img/'.$news->img); ?>" width="150px" height="150px" />
                                            <?php } ?>                                            
                                        </div>
                                      <div> <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                        <input type="file" id="image" name="image" />
                                        </span> <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
                                    </div>
                                  </div>
                                </div>
                                
                                <label class="control-label col-lg-4"></label>
                                <div class="col-lg-8" style="text-align:left;"> 
                                    <input type="submit" name="submit" value="Edit News and Announcements" class="btn btn-primary" />
                                    <!-- <button type="submit" class="btn btn-primary" style="margin-top: 15px"> Add News and Announcements </button> -->
                                </div>
                                <?php echo $this->Form->end() ?>
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
        $("#title").keyup(function(){
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
                $("#slug").val(Text);        
        });        
    });
</script>

<style>
.search-field input.default{ height:23px !important;}
</style>