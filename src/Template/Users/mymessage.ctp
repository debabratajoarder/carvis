<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable({
            "bFilter": false,
            "bInfo": false
        });
    });
</script>
<style>
    .dataTables_filter, .dataTables_info { display: none; }
    .dataTables_wrapper .fg-toolbar { display: none; }
</style>

<?php //pr($msgList); exit;  ?>       
<?php echo $this->element('usermenu'); ?>
<div class="my-order-tab">
    <div class="order-conteainer">
        <div class="order-body-content">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="order-list-content table-responsive">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th style="color: black">Thread Id</th>
                                                <th style="color: black">Message</th>
                                                <th style="color: black">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($msgList as $msg) { ?>
                                                <tr class="odd gradeX">
                                                    <td> <?php echo $msg->ordid; ?> </td>
                                                    <td> <?php echo $msg->msg; ?> </td>
                                                    <td class="center">
                                                        <?php echo $this->Html->link('Detail', ['controller' => 'Users', 'action' => 'msgdetail', $msg->ordid], ['class' => 'btn btn-info']); ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "signout"]); ?>">
        <button type="button" class="btn btn-info btn-logout">Logout <i class="fa fa-lock"></i> </button>
    </a>
</div>