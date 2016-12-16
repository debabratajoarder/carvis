<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h1 > Add Sub Question </h1>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Sub Question List</h5>
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
                                    <label class="control-label col-lg-2">  Question : </label>
                                    <?php echo '<div class="col-lg-10">'.$question->question.'</div>'; ?>
                                </div>
                                <hr />
                                <div class="form-group"> 
                                    <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th style="width:5%"><?php echo $this->Paginator->sort('sl') ?></th>
                                                    <th style="width:65%"><?php echo $this->Paginator->sort('sub_question') ?></th>
                                                    <th class="actions" style="width:30%"><?php echo __('Actions') ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                        <?php if(!empty($question->question_checkboxes)){ ?>        
                                        <?php $i = 1; foreach ($question->question_checkboxes as $dt): ?>
                                                <tr>
                                                    <td><?php echo $this->Number->format($i) ?></td>
                                                    <td><?php echo h($dt->title) ?></td>
                                                    <td class="actions">
                                                        <a href="<?php echo $this->Url->build(["action" => "subqdelete", $dt->qid , $dt->id ]); ?>"> <button class="btn btn-danger btn-xs"><i class="icon-remove icon-white"></i> Delete</button> </a>   
                                                        
                                                        <?php if($dt->is_active == 1){ ?>
                                                        <a href="<?php echo $this->Url->build(["action" => "subqstatus", $dt->qid , $dt->id, '0']); ?>"> <button class="btn btn-info btn-xs"><i class="icon-thumbs-down"></i> Suspend</button> </a>
                                                        <?php } else if($dt->is_active == 0){ ?>
                                                        <a href="<?php echo $this->Url->build(["action" => "subqstatus", $dt->qid , $dt->id, '1']); ?>"> <button class="btn btn-success btn-xs"><i class="icon-thumbs-up"></i> Active</button> </a>
                                                        <?php } ?>
                                                    </td>                
                                                </tr>
                                        <?php $i++; endforeach; ?>
                                        <?php } else { ?> 
                                                <tr>
                                                    <td colspan="3">No Sub Question Exist.</td>              
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
        

        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Add Sub Question</h5>
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
				<?php echo $this->Form->create($subquestion,['class' => 'form-horizontal', 'id' => 'subquestion-validate']);?>
                                <input type="hidden" name="qid" id="qid" value="<?php echo $question->id ; ?>">
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Sub Question </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->input('title', array('class'=>'form-control','label' => false, 'style' => 'width:800px')).'</div>'; ?>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Is Active ? </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->input('is_active', array('label' => false, 'type' => 'checkbox')).'</div>'; ?>
                                </div>                                
                                
                                <label class="control-label col-lg-4"></label> 
                                <div class="col-lg-8" style="text-align:left;"> 
                                    <input type="submit" name="submit" value="Add Sub Question" class="btn btn-primary" />
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