<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">

            </div>
        </div>
        <hr />
        <div class="table-responsive">
            <div class="runs view large-9 medium-8 columns content">
                <h3>News and Announcements Detail</h3>
                <table class="vertical-table table table-striped table-bordered table-hover">
                    <tr>
                        <th style="width: 20%"><?php echo __('News Title') ?></th>
                        <td style="width: 80%"><?php echo h($news->title) ?></td>
                    </tr>
                    <tr>
                        <th><?php echo __('News Detail') ?></th>
                        <td><?php echo $news->detail ?></td>
                    </tr>
                    <!--
                 <tr><th><?php echo __('News Created On') ?></th><td><?php echo $news->created ?></td></tr>                    
                 <tr><th><?php echo __('News Modified On') ?></th><td><?php echo $news->modified ?></td></tr>                    
                    -->
                </table>
            </div>
        </div>
    </div>
</div>
