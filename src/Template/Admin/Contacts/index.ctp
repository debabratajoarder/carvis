  <!--PAGE CONTENT -->
  <div id="content">
    <div class="inner">
      <div class="row">
        <div class="col-lg-12">
          <h2> <?php echo __('Contacts List') ?> </h2>
        </div>
      </div>
      <hr />
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading"> <?php echo __('Contacts List') ?> </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th style="width: 5%">Sl No</th>
                      <th style="width: 20%"><?php echo $this->Paginator->sort('name') ?></th>
                      <th style="width: 20%"><?php echo $this->Paginator->sort('phone_no') ?></th>
                      <th style="width: 20%"><?php echo $this->Paginator->sort('email') ?></th>
                      <th style="width: 20%"><?php echo $this->Paginator->sort('order_no') ?></th>
                      <th style="width: 20%"><?php echo $this->Paginator->sort('send_at') ?></th>
                      <th style="width: 15%"><?php echo  __('Actions') ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($contacts as $dt): ?>
                    <tr>
                      <td> <?php echo $i ?> </td>
                      <td><?php echo h($dt->name) ?></td>
                      <td><?php echo h($dt->phone) ?></td>
                      <td><?php echo h($dt->email) ?></td>
                      <td><?php echo h($dt->order_no) ?></td>
                      <td><?php echo h($dt->sendon) ?></td>
                      <td>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?php echo $dt->id?>"> View Message </button>
                        <div class="modal fade" id="myModal<?php echo $dt->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Contact Message</h4>
                              </div>
                              <div class="modal-body"> <p> <?php echo addslashes($dt->msg);?> </p> </div>
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






<?php /*
<div id="content">
    <div class="inner">
      <div class="row">
        <div class="col-lg-12">
        </div>
      </div>
      <hr />
<div class="table-responsive">
    <h3><?php echo __('Contacts List') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id') ?></th>
                <th><?php echo $this->Paginator->sort('name') ?></th>
                <th><?php echo $this->Paginator->sort('phone_no') ?></th>
                <th><?php echo $this->Paginator->sort('email') ?></th>
                <th><?php echo $this->Paginator->sort('send_at') ?></th>
                <th class="actions"><?php echo __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $dt): ?>
            <tr>
                <td><?php echo $this->Number->format($dt->id) ?></td>
                <td><?php echo $dt->name ?></td>
                <td><?php echo h($dt->phone) ?></td>
                <td><?php echo h($dt->email) ?></td>
                <td><?php echo h($dt->sendon) ?></td>
                <td class="actions">
                <?php //echo $this->Html->link(__('View'), ['action' => 'view', $dt->id]) ?>
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?php echo $dt->id?>"> View Message </button>
                <div class="modal fade" id="myModal<?php echo $dt->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Contact Message</h4>
                      </div>
                      <div class="modal-body"> <p> <?php echo addslashes($dt->msg);?> </p> </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?php echo $this->Paginator->prev('< ' . __('previous')) ?>
            <?php echo $this->Paginator->numbers() ?>
            <?php echo $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?php echo $this->Paginator->counter() ?></p>
    </div>
</div>
</div>
</div>
 */ ?>