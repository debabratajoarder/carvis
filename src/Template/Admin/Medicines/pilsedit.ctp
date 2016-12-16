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
  });
</script>

<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h1 > Add Pils </h1>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Edit Pils</h5>
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
                                <?php echo $this->Form->create($pil, ['class' => 'form-horizontal', 'id' => 'question-validate']); ?>
                                <input type="hidden" name="id" id="id" value="<?php echo $pil->id; ?>">
                                <input type="hidden" name="mid" id="mid" value="<?php echo $medicine->id; ?>">
                                <input type="hidden" name="tid" id="tid" value="<?php echo $medicine->Treatments->id; ?>">
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Title </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('title', array('class' => 'form-control', 'label' => false, 'style' => 'width:800px')) . '</div>'; ?>
                                </div>
                                <!--
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Choose Treatment </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('tid', ['class' => 'form-control chzn-select', 'label' => false, 'type' => 'select','multiple' => false,'options' => $treatment, 'empty' => true, 'style' => 'width:800px']) . '</div>'; ?>
                                </div>
                                -->
                                <?php $pil->cost = sprintf('%0.2f', $pil->cost); ?>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Cost Ascot Pharmacy </label> 
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('cost', array('class' => 'form-control', 'label' => false, 'style' => 'width:800px')) . '</div>'; ?>
                                </div>                                
                                
                                
                                <?php if(!empty($pil->pilprices)){ ?>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Cost At Dr Fox </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('drfox', array('class' => 'form-control', 'value' => sprintf('%0.2f', $pil->pilprices[0]->drfox), 'label' => false, 'style' => 'width:800px')) . '</div>'; ?>
                                </div>                                
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Cost At Pharmacy2U </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('pharmacy2u', array('class' => 'form-control', 'value' => sprintf('%0.2f', $pil->pilprices[0]->pharmacy2u), 'label' => false, 'style' => 'width:800px')) . '</div>'; ?>
                                </div>                                 
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Cost At Superdrug </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('superdrug', array('class' => 'form-control', 'value' => sprintf('%0.2f', $pil->pilprices[0]->superdrug), 'label' => false, 'style' => 'width:800px')) . '</div>'; ?>
                                </div> 
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Cost At Express Pharmacy </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('expresspharmacy', array('class' => 'form-control', 'value' => sprintf('%0.2f', $pil->pilprices[0]->expresspharmacy), 'label' => false, 'style' => 'width:800px')) . '</div>'; ?>
                                </div>                                 
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Cost At Lloyds </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('lloyds', array('class' => 'form-control', 'value' => sprintf('%0.2f', $pil->pilprices[0]->lloyds), 'label' => false, 'style' => 'width:800px')) . '</div>'; ?>
                                </div>                                 
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Cost At Med Express </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('medexpress', array('class' => 'form-control', 'value' => sprintf('%0.2f', $pil->pilprices[0]->medexpress), 'label' => false, 'style' => 'width:800px')) . '</div>'; ?>
                                </div> 
                                <?php } else { ?>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Cost At Dr Fox </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('drfox', array('class' => 'form-control', 'label' => false, 'style' => 'width:800px')) . '</div>'; ?>
                                </div>                                
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Cost At Pharmacy2U </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('pharmacy2u', array('class' => 'form-control', 'label' => false, 'style' => 'width:800px')) . '</div>'; ?>
                                </div>                                 
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Cost At Superdrug </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('superdrug', array('class' => 'form-control', 'label' => false, 'style' => 'width:800px')) . '</div>'; ?>
                                </div> 
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Cost At Express Pharmacy </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('expresspharmacy', array('class' => 'form-control', 'label' => false, 'style' => 'width:800px')) . '</div>'; ?>
                                </div>                                 
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Cost At Lloyds </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('lloyds', array('class' => 'form-control', 'label' => false, 'style' => 'width:800px')) . '</div>'; ?>
                                </div>                                 
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Cost At Med Express </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('medexpress', array('class' => 'form-control', 'label' => false, 'style' => 'width:800px')) . '</div>'; ?>
                                </div> 
                                <?php } ?>
                                
                                
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Quantity </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('quantity', array('class' => 'form-control', 'label' => false, 'style' => 'width:800px')) . '</div>'; ?>
                                </div>                                
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4"> Description </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->textarea('description', array('class'=>'form-control','label' => false,'id'=>'editor1')).'</div>'; ?>
                                </div>                                
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Is Active ? </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('is_active', array('label' => false, 'type' => 'checkbox')) . '</div>'; ?>
                                </div>                                

                                <label class="control-label col-lg-4"></label> 
                                <div class="col-lg-8" style="text-align:left;"> 
                                    <input type="submit" name="submit" value="Edit Pil" class="btn btn-primary" />
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



