<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h1 > Medicine List </h1>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Medicine List</h5>
                        <div class="toolbar">
                            <ul class="nav">
                                <li style="margin-right:15px">
                                    <div class="btn-group" style=" margin-top: 8px">
                                        <a href="<?php echo $this->Url->build(["action" => "add"]); ?>"> <button class="btn btn-info btn-xs"><i class="icon-cogs icon-white"></i> Add Medicine</button>  </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </header>
                    <div id="collapseOne" class="accordion-body collapse in body">
                        <div class="col-sm-12">
                            <div class="row">                               
                                <div class="form-group"> 
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                        <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th style="width:5%;text-align: center"><?php echo $this->Paginator->sort('id') ?></th>
                                                    <th style="width:20%;text-align: center"><?php echo $this->Paginator->sort('title') ?></th>
                                                    <th style="width:20%;text-align: center"><?php echo $this->Paginator->sort('slug') ?></th>
                                                    <th style="width:15%;text-align: center"><?php echo $this->Paginator->sort('image') ?></th>
                                                    <th class="actions" style="width:30%;text-align: center"><?php echo __('Actions') ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        <?php $i = 1; foreach ($medicines as $dt): ?>
                                                <tr>
                                                    <td><?php echo $this->Number->format($i) ?></td>
                                                    <td><?php echo h($dt->title) ?></td>
                                                    <td><?php echo h($dt->slug) ?></td>
                                                    <td style="text-align: center">
                                                        <?php $filePath = WWW_ROOT . 'medicine_img' . DS . $dt->image; ?>
                                                        <?php if ($dt->image != "" && file_exists($filePath)) { ?>
                                                            <img src="<?php echo $this->Url->build('/medicine_img/' . $dt->image); ?>" width="100px" height="100px" />
                                                        <?php } ?>
                                                    </td>                        
                                                    <td class="actions">
                                                <?php //echo $this->Html->link(__('View'), ['action' => 'view', $doct->id]) ?>
                                                <?php //echo $this->Html->link(__('Edit'), ['action' => 'edit', $doct->id]) ?> 
                                                <?php //echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $doct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doct->first_name." ".$doct->last_name)]) ?>
                                                        <a href="<?php echo $this->Url->build(["action" => "view", $dt->id]); ?>"> <button class="btn btn-info btn-xs"><i class="icon-eye-open icon-white"></i> View</button>  </a>
                                                        <a href="<?php echo $this->Url->build(["action" => "edit", $dt->id]); ?>"> <button class="btn btn-primary btn-xs"><i class="icon-pencil icon-white"></i> Edit</button>  </a>
                                                        <a href="<?php echo $this->Url->build(["action" => "delete", $dt->id]); ?>" onclick="return confirm('Are you sure you want to delete?');" > <button class="btn btn-danger btn-xs"><i class="icon-remove icon-white"></i> Delete</button> </a> 
                                                        <a href="<?php echo $this->Url->build(["action" => "medicinepils", $dt->id]); ?>"> <button class="btn btn-info btn-xs"><i class="icon-cogs icon-white"></i> View Pils</button>  </a>
                                                        <!-- <a href="<?php echo $this->Url->build(["action" => "medicinequestion", $dt->id]); ?>"> <button class="btn btn-info btn-xs"><i class="icon-cogs icon-white"></i> Add Question</button>  </a> -->
                                                    </td>                
                                                </tr>
                                        <?php $i++; endforeach; ?>
                                            </tbody>
                                        </table>
                                        <div class="paginator">
                                            <ul class="pagination">
                                        <?php echo $this->Paginator->prev('< ' . __('previous')) ?>
                                        <?php echo $this->Paginator->numbers() ?>
                                        <?php echo $this->Paginator->next(__('next') . ' >') ?>
                                            </ul>
                                            <p><?php //echo $this->Paginator->counter() ?></p>
                                        </div>
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
     </div>
</div>