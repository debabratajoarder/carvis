<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
<style>
    .dataTables_filter, .dataTables_info { display: none; }
    .dataTables_wrapper .fg-toolbar { display: none; }
</style>

<!--PAGE CONTENT -->
<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h1 > Messages </h1>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5> Messages List</h5>
                        <div class="toolbar">
                            <ul class="nav">
                                <li style="margin-right:15px">
                                    <div class="btn-group" style=" margin-top: 8px">

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
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th style="color: black; width: 40px">Sl No</th>
                                                    <th style="color: black; width: 200px">Patient Name</th>
                                                    <th style="color: black; width: 400px">Message</th>
                                                    <th style="color: black; width: 100px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $ik = 1; foreach ($msgList as $msg) { ?>
                                                    <tr class="odd gradeX">
                                                        <td> <?php echo $ik; ?> </td>
                                                        <td> <?php echo $msg->user->first_name . " " . $msg->user->last_name; ?> </td>
                                                        <td> <?php echo $msg->msg; ?> </td>
                                                        <td class="center">
                                                            <?php echo $this->Html->link('Detail', ['controller' => 'Messages', 'action' => 'msgdetail', $msg->ordid], ['class' => 'btn btn-info']); ?>
                                                        </td>
                                                    </tr>
                                                <?php $ik++; } ?>


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
    </div>
</div>
<!--END PAGE CONTENT -->