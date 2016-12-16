<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
        $('#editor1').summernote({
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
</script>

<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h1 > Edit Newsletter </h1>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5> Edit Newsletter </h5>
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
				<?php echo $this->Form->create($newsletter,['class' => 'form-horizontal', 'id' => 'admin-validate']);?>
                                <?php //echo $this->Form->hidden('created', ['value'=> $news->created->format('Y-m-d h:i:s A')]); ?>
                                <?php echo $this->Form->hidden('modified', ['value'=> gmdate("Y-m-d h:i:s")]); ?>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Newsletter Title</label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->input('title', array('class'=>'form-control','label' => false, 'style' => 'width:800px')).'</div>'; ?>
                                </div>
                                 <div class="form-group">
                                    <label class="control-label col-lg-4"> Newsletter Detail </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->textarea('detail', array('class'=>'form-control','label' => false,'id'=>'editor1')).'</div>'; ?>
                                </div>                                
                                <label class="control-label col-lg-4"></label>
                                <div class="col-lg-8" style="text-align:left;"> 
                                    <input type="submit" name="submit" value="Edit Newsletter" class="btn btn-primary" />
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


