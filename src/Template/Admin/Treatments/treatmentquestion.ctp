<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
<script>
  $(document).ready(function() {
      $('#summernote').summernote();
      $('#editor1').summernote({
          height: 300,                 // set editor height
          width: 500,
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
                <h1 > Questions List </h1>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Questions List</h5>
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
                        <div class="col-sm-12">
                            <div class="row">                               
                                <div class="form-group">
                                    <label class="control-label col-lg-2">  Medicine : </label>
                                    <?php echo '<div class="col-lg-10">' . $treatment['name'] . '</div>'; ?>
                                </div>
                                <hr />
                                <div class="form-group"> 
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th style="width:5%"><?php echo $this->Paginator->sort('sl') ?></th>
                                                        <th style="width:25%"><?php echo $this->Paginator->sort('question') ?></th>
                                                        <th class="actions" style="width:22%"><?php echo __('Actions') ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($treatment['treatment_questions'])) { ?>        
                                                        <?php $ik = 1; foreach ($treatment['treatment_questions'] as $dt): ?>
                                                            <tr>
                                                                <td><?php echo $this->Number->format($ik) ?></td>
                                                                <td><?php echo h($dt['Questions']['question']) ?></td>
                                                                <td class="actions">
                                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $dt['Questions']['id'] ?>"> Detail </button>
                                                                    <div class="modal fade" id="myModal<?php echo $dt['Questions']['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                    <h4 class="modal-title" id="myModalLabel"> Question Description </h4>
                                                                                </div>
                                                                                    <div class="modal-body"> 
                                                                                    <div class="table-responsive">
                                                                                        <div class="runs view large-9 medium-8 columns content">
                                                                                            <h3> Question Detail</h3>
                                                                                            <table class="vertical-table table table-striped table-bordered table-hover">
                                                                                                <tr>
                                                                                                    <th style="width:20%"><?php echo __('Question') ?></th>
                                                                                                    <td style="width:80%"><?php echo h($dt['Questions']['question']) ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th><?php echo __('Answer') ?></th>
                                                                                                    <td><?php echo $dt['Questions']['answer'] ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th><?php echo __('Note') ?></th>
                                                                                                    <td><?php echo h($dt['Questions']['note']) ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th><?php echo __('Warning') ?></th>
                                                                                                    <td><?php echo h($dt['Questions']['warning']) ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th><?php echo __('Answer Type') ?></th>
                                                                                                    <td><?php echo h($dt['Questions']['answer_type'] == 'c' ? 'Sub Question' : 'Yes No') ?></td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </div>
                                                                                   </div>
                                                                                  <?php if($dt['Questions']['answer_type'] == 'c'){ ?>
                                                                                  <hr />
                                                                                   <div class="table-responsive">
                                                                                        <div class="runs view large-9 medium-8 columns content">
                                                                                            <h3> Sub Question List</h3>
                                                                                            <table class="vertical-table table table-striped table-bordered table-hover">
                                                                                                <tr>
                                                                                                    <th style="width:5%">Sl No</th>
                                                                                                    <th style="width:95"><?php echo h('Sub Question') ?></th>
                                                                                                </tr>                    
                                                                                                <?php if($dt['Questions']['question_checkboxes']){ ?>
                                                                                                <?php $i = 1; foreach($dt['Questions']['question_checkboxes'] as $que){ ?>
                                                                                                <tr>
                                                                                                    <td style="width:10%"><?php echo h($i)?></td>
                                                                                                    <td style="width:90%"><?php echo h($que['title']) ?></td>
                                                                                                </tr>
                                                                                                <?php $i++; } ?>
                                                                                                <?php } else { ?>
                                                                                                <tr>
                                                                                                    <td style="width:10%"></td>
                                                                                                    <td style="width:90%"><?php echo h('NO Sub Question Exist') ?></td>
                                                                                                </tr>                    
                                                                                                <?php } ?>
                                                                                            </table>
                                                                                        </div>
                                                                                   </div>      
                                                                                  <?php } ?>                                               

                                                                                    </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>                                    
                                                                    <a href="<?php echo $this->Url->build(["action" => "questiondelete", $dt['tid'], $dt['id']]); ?>"> <button class="btn btn-danger btn-xs"><i class="icon-remove icon-white"></i> Delete</button> </a>   
                                                                    <?php if ($dt['is_active'] == 1) { ?>
                                                                        <a href="<?php echo $this->Url->build(["action" => "questionstatus", $dt['tid'], $dt['id'], '0']); ?>"> <button class="btn btn-info btn-xs"><i class="icon-thumbs-down"></i> Suspend</button> </a>
                                                                    <?php } else if ($dt['is_active'] == 0) { ?>
                                                                        <a href="<?php echo $this->Url->build(["action" => "questionstatus", $dt['tid'], $dt['id'], '1']); ?>"> <button class="btn btn-success btn-xs"><i class="icon-thumbs-up"></i> Active</button> </a>
                                                                    <?php } ?>
                                                                </td>                
                                                            </tr>
                                                            <?php $ik ++; endforeach; ?>
                                                            <?php } else { ?> 
                                                            <tr>
                                                                <td colspan="6">No Question Exist.</td>              
                                                            </tr>
                                                            <?php } ?>        
                                                </tbody>
                                            </table>
                                        </div>  
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>        

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
                                <?php echo $this->Form->create($treatmentquestions, ['class' => 'form-horizontal', 'id' => 'tq-validate']); ?>
                                <input type="hidden" name="tid" id="mid" value="<?php echo $treatment['id']; ?>">

                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Choose Question </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('qid', ['class' => 'form-control chzn-select', 'onchange'=>'myfunc(this.value)', 'label' => false, 'type' => 'select','multiple' => false,'options' => $question, 'empty' => true, 'style' => 'width:500px']) . '</div>'; ?>
                                </div>                                
                                <?php $answer = ['' => 'Choose Answer', 1 => 'Yes', 0 => 'No']; ?>
                                <div class="form-group" id="yesno" style="display: block">
                                    <label class="control-label col-lg-4">  Answer </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('valcheck', ['class' => 'form-control chzn-select', 'label' => false, 'type' => 'select','multiple' => false,'options' => $answer, 'empty' => "Choose Answer", 'default'=>'', 'style' => 'width:500px']) . '</div>'; ?>
                                </div>                                 
                                
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Is Active ? </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('is_active', array('label' => false, 'type' => 'checkbox')) . '</div>'; ?>
                                </div>                                

                                <label class="control-label col-lg-4"></label> 
                                <div class="col-lg-8" style="text-align:left;"> 
                                    <input type="submit" name="submit" value="Add Question" class="btn btn-primary" />
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
    function myfunc(dt){      
        jQuery.ajax({           
            type:"post",
            //dataType:"json", 
            url: "<?php echo $this->Url->build('/'); ?>admin/treatments/checkqtype/",
            data: {id: dt},
            success: function(data) {
                if(data == 1){
                    $('#yesno').css('display','block');
                } else {
                    $('#yesno').css('display','none');
                }
            }
        });        
        
        
    }

</script>