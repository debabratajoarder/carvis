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
                <h1 > Pils List </h1>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Pils List</h5>
                        <div class="toolbar">
                            <ul class="nav">
                                <li style="margin-right:15px">
                                    <div class="btn-group" style=" margin-top: 8px">
                                        <a href="<?php echo $this->Url->build(["action" => "addmedicinepils", $medicine->id]); ?>"> <button class="btn btn-info btn-xs"><i class="icon-cogs icon-white"></i> Add Pils</button>  </a>
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
                                    <?php echo '<div class="col-lg-10">' . $medicine->title . '</div>'; ?>
                                </div>
                                <hr />
                                <div class="form-group"> 
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th style="width:5%"><?php echo $this->Paginator->sort('sl') ?></th>
                                                        <th style="width:25%"><?php echo $this->Paginator->sort('title') ?></th>
                                                        <th style="width:20%"><?php echo $this->Paginator->sort('Treatment') ?></th>
                                                        <th style="width:8%"><?php echo $this->Paginator->sort('quantity') ?></th>
                                                        <th style="width:8%"><?php echo $this->Paginator->sort('cost') ?></th>
                                                        <th class="actions" style="width:27%"><?php echo __('Actions') ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php if (!empty($medicine->pils)) { ?>        
                                                        <?php $i = 1; foreach ($medicine->pils as $dt): ?>
                                                            <tr>
                                                                <td><?php echo $this->Number->format($i) ?></td>
                                                                <td><?php echo h($dt->title) ?></td>
                                                                <td><?php echo h($dt->Treatments['name']) ?></td> 
                                                                <td><?php echo h($dt->quantity) ?></td>
                                                                <td>£ <?php echo h( sprintf('%0.2f', $dt->cost) ) ?></td>
                                                                <td class="actions">
                                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $dt->id ?>"> Describtion </button>
                                                                    <div class="modal fade" id="myModal<?php echo $dt->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                    <h4 class="modal-title" id="myModalLabel"> Pils Description </h4>
                                                                                </div>
                                                                                <div class="modal-body"> <p> <?php echo addslashes($dt->description); ?> </p> </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <a href="<?php echo $this->Url->build(["action" => "pilsedit", $dt->mid, $dt->id]); ?>"> <button class="btn btn-primary btn-xs"><i class="icon-pencil icon-white"></i> Edit</button>  </a>
                                                                    <a href="<?php echo $this->Url->build(["action" => "pildelete", $dt->mid, $dt->id]); ?>"> <button class="btn btn-danger btn-xs"><i class="icon-remove icon-white"></i> Delete</button> </a>   
                                                                    <?php if ($dt->is_active == 1) { ?>
                                                                        <a href="<?php echo $this->Url->build(["action" => "pilstatus", $dt->mid, $dt->id, '0']); ?>"> <button class="btn btn-info btn-xs"><i class="icon-thumbs-down"></i> Suspend</button> </a>
                                                                    <?php } else if ($dt->is_active == 0) { ?>
                                                                        <a href="<?php echo $this->Url->build(["action" => "pilstatus", $dt->mid, $dt->id, '1']); ?>"> <button class="btn btn-success btn-xs"><i class="icon-thumbs-up"></i> Active</button> </a>
                                                                    <?php } ?>
                                                                </td>                
                                                            </tr>
                                                            <?php $i++; endforeach; ?>
                                                            <?php } else { ?> 
                                                            <tr>
                                                                <td colspan="6">No Pils Exist.</td>              
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
        <!--
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Add Pils</h5>
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
                                <input type="hidden" name="mid" id="mid" value="<?php echo $medicine->id; ?>">

                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Title </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('title', array('class' => 'form-control', 'label' => false, 'style' => 'width:500px')) . '</div>'; ?>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Choose Treatment </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('tid', ['class' => 'form-control chzn-select', 'label' => false, 'type' => 'select','multiple' => false,'options' => $treatment, 'empty' => true, 'style' => 'width:500px']) . '</div>'; ?>
                                </div>                                
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Cost </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('cost', array('class' => 'form-control', 'label' => false, 'style' => 'width:500px')) . '</div>'; ?>
                                </div>                                
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Quantity </label>
                                    <?php echo '<div class="col-lg-8">' . $this->Form->input('quantity', array('class' => 'form-control', 'label' => false, 'style' => 'width:500px')) . '</div>'; ?>
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
                                    <input type="submit" name="submit" value="Add Pil" class="btn btn-primary" />
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        -->
    </div>
</div>



