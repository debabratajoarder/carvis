  <!--PAGE CONTENT -->
  <?php echo $this->Html->script('jquery.raty-fa.js') ?>
  <?php //pr($reviews); exit; ?>
  <div id="content">
    <div class="inner">
      <div class="row">
        <div class="col-lg-12">
          <h2> <?php echo __('Reviews List') ?> </h2>
        </div>
      </div>
      <hr />
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading"> <?php echo __('Reviews List') ?> </div>
            <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th style="width: 5%">Sl No</th>
                      <th style="width: 30%"><?php echo $this->Paginator->sort('name') ?></th>
                      <th style="width: 12%"><?php echo $this->Paginator->sort('rating') ?></th>
                      <th style="width: 24%"><?php echo $this->Paginator->sort('reviewd at') ?></th>
                      <th style="width: 10%"><?php echo $this->Paginator->sort('status') ?></th>
                      <th style="width: 20%"><?php echo  __('Actions') ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($reviews as $dt): ?>
                      
                    <script>
                        $(document).ready(function(){
                        $("#<?php echo $i ?>").raty({score:'<?php echo $dt->rate ?>',readOnly:true, halfShow : true}); 
                    }); 
                    </script>                      
                      
                    <tr>
                      <td> <?php echo $i ?> </td>
                      <td><?php echo h($dt->user->first_name." ".$dt->user->last_name) ?></td>
                      <td> <span id="<?php echo $i ?>" style="color:#ff6624; font-size: 14px;"></span> </td>
                      <td><?php echo h( date('d F Y h:i:s', strtotime($dt->date)) ) ?></td>
                      <td>
                          <?php echo $dt->is_active == 1 ? '<span style="color:green"><b>Active</b></span>' : '<span style="color:red"><b>Inactive</b></span>' ?>
                      </td>
                      <td>
                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $dt->id?>"> View Review Text </button>
                        <?php if ($dt->is_active == 1) { ?>
                            <a href="<?php echo $this->Url->build(["action" => "revstatus", $dt->id, '0']); ?>"> <button class="btn btn-info btn-xs"><i class="icon-thumbs-down"></i> Suspend</button> </a>
                        <?php } else if ($dt->is_active == 0) { ?>
                            <a href="<?php echo $this->Url->build(["action" => "revstatus", $dt->id, '1']); ?>"> <button class="btn btn-success btn-xs"><i class="icon-thumbs-up"></i> Active</button> </a>
                        <?php } ?>
                        <div class="modal fade" id="myModal<?php echo $dt->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Review Text</h4>
                              </div>
                              <div class="modal-body"> <p> <?php echo addslashes($dt->review);?> </p> </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <?php $i ++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <div class="paginator">
                    <ul class="pagination">
                        <?php echo  $this->Paginator->prev('< ' . __('previous')) ?>
                        <?php echo  $this->Paginator->numbers() ?>
                        <?php echo  $this->Paginator->next(__('next') . ' >') ?>
                    </ul>
                    <p><?php //echo  $this->Paginator->counter() ?></p>
                </div>                  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--END PAGE CONTENT --> 

