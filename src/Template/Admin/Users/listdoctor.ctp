<?php echo $this->Html->script('/plugins/dataTables/jquery.dataTables.js') ?>
<?php echo $this->Html->script('/plugins/dataTables/dataTables.bootstrap.js') ?>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<script language="javascript" type="text/javascript">
    function deleteConfirm(){
        var x = window.confirm("Are you sure you want to delete this?")
        if (x){
            return true;
        } else {
            return false;
        }
        return false;
    }
</script>
<!--PAGE CONTENT -->
<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h1 > Doctor List </h1>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5> Doctor List</h5>
                        <div class="toolbar">
                            <ul class="nav">
                                <li style="margin-right:15px">
                                    <div class="btn-group" style=" margin-top: 8px">
                                    <?php if (!empty($searchheadadm)) { ?>
                                    <div style="float: left; padding:7px 2px !important;"> 
                                    <a href="<?php echo $this->Url->build(["action" => "listdoctor"]); ?>/all"> All Doctor </a>
                                    </div>
                                    <?php } ?>
                                    </div>
                                </li>                               
                                

                                
                                <li style="margin-right:15px">
                                    <div class="btn-group" style=" margin-top: 8px">
                                        <a href="<?php echo $this->Url->build(["action" => "adddoctor"]); ?>"> Add Doctor </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </header>
                    <?php echo $this->Form->create('', ['class' => 'form-horizontal', 'id' => 'admsearch-validate']); ?>
                    <div class="icons"></div>
                    <div class="toolbar" style=" margin-right: 50px">
                        <div class="form-group" style=" margin-top: 15px;">
                            <div style="float: left; padding: 7px 40px;">  

                                <?php if (!empty($searchheadadm)) { ?>
                                    <input type="text" name="searchheadadm" id="searchheadadm" style="width: 500px" value="<?php echo $searchheadadm; ?>" placeholder="Search"/>
                                <?php } else { ?>
                                    <input type="text" name="searchheadadm" id="searchheadadm" style="width: 500px" placeholder="Search"/>
                                <?php } ?>                                    
                            </div>
                            <div style="float: left; padding:7px 2px !important;"> <input type="submit" name="submit" value="Search" class="btn btn-success btn-sm btn-flat" /> </div>
                             
                        </div>
                    </div>
                    <?php echo $this->Form->end(); ?>
                    
                    <div id="collapseOne" class="accordion-body collapse in body">
                        <div class="col-sm-12">
                            <div class="row">                               
                                <div class="form-group"> 
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo $this->Paginator->sort('id') ?></th>
                                                        <th><?php echo $this->Paginator->sort('name') ?></th>
                                                        <th><?php echo $this->Paginator->sort('liesence') ?></th>
                                                        <th><?php echo $this->Paginator->sort('email') ?></th>
                                                        <th><?php echo $this->Paginator->sort('status') ?></th>
                                                        <!-- <th><?php echo $this->Paginator->sort('created_on') ?></th>
                                                        <th><?php echo $this->Paginator->sort('modified_on') ?></th> -->
                                                        <th class="actions"><?php echo __('Actions') ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
<?php $i = 1;
foreach ($user as $doct): ?>
                                                        <tr>
                                                            <td><?php echo $this->Number->format($i) ?></td>
                                                            <td><?php echo h($doct->first_name . " " . $doct->last_name) ?></td>
                                                            <td><?php echo h($doct->license_no) ?></td>
                                                            <td><?php echo h($doct->email) ?></td>
                                                            <?php if ($doct->is_active == 1) { ?>
                                                                <td style="color: green"><?php echo h('Active') ?></td>
                                                            <?php } else if ($doct->is_active == 0) { ?>
                                                                <td style="color: red"><?php echo h('Suspended') ?></td>
                                                            <?php } ?>                                                       
                                                       <!-- <td><?php echo h($doct->created) ?></td>
                                                       <td><?php echo h($doct->modified) ?></td> -->
                                                            <td class="actions">
                                                                <?php //echo $this->Html->link(__('View'), ['action' => 'view', $doct->id])  ?>
                                                                <?php //echo $this->Html->link(__('Edit'), ['action' => 'edit', $doct->id]) ?> 
                                                                <?php //echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $doct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doct->first_name." ".$doct->last_name)]) ?>
                                                                <a href="<?php echo $this->Url->build(["action" => "doctorview", $doct->id]); ?>"> <button class="btn-btn-info btn-xs"><i class="icon-eye-open"></i> View</button> </a>
                                                                <a href="<?php echo $this->Url->build(["action" => "editdoctor", $doct->id]); ?>"> <button class="btn btn-primary btn-xs"><i class="icon-pencil icon-white"></i> Edit</button>  </a>
                                                                <a href="<?php echo $this->Url->build(["action" => "doctordelete", $doct->id]); ?>" onclick="return confirm('Are you sure you want to delete?');"> <button class="btn btn-danger btn-xs"><i class="icon-remove icon-white"></i> Delete</button> </a>                
                                                                <?php if ($doct->is_active == 1) { ?>
                                                                    <a href="<?php echo $this->Url->build(["action" => "docstatus", $doct->id, '0']); ?>"> <button class="btn btn-info btn-xs"><i class="icon-thumbs-down"></i> Suspend</button> </a>
                                                                <?php } else if ($doct->is_active == 0) { ?>
                                                                    <a href="<?php echo $this->Url->build(["action" => "docstatus", $doct->id, '1']); ?>"> <button class="btn btn-success btn-xs"><i class="icon-thumbs-up"></i> Active</button> </a>
                                                                <?php } ?>

                                                            </td>                
                                                        </tr>
                                                        <?php $i++;
                                                    endforeach; ?>
                                                </tbody>
                                            </table>
                                            <div class="paginator">
                                                <ul class="pagination">
                                                    <?php echo $this->Paginator->prev('< ' . __('previous')) ?>
                                                    <?php echo $this->Paginator->numbers() ?>
                                                    <?php echo $this->Paginator->next(__('next') . ' >') ?>
                                                </ul>
                                                <p><?php //echo $this->Paginator->counter()  ?></p>
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
<!--END PAGE CONTENT -->