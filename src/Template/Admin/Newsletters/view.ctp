<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">

            </div>
        </div>
        <hr />
        <div class="table-responsive">
            <div class="runs view large-9 medium-8 columns content">
                <h3> Newsletter Detail</h3>
                <table class="vertical-table table table-striped table-bordered table-hover">
                    <tr>
                        <th style="width: 25"><?php echo __('Newsletter Title') ?></th>
                        <td style="width: 75%"><?php echo h($newsletter->title) ?></td>
                    </tr>
                    <tr>
                        <th><?php echo __('Newsletter Detail') ?></th>
                        <td><?php echo $newsletter->detail ?></td>
                    </tr>
                    <!--
                 <tr><th><?php echo __('Newsletter Created On') ?></th><td><?php echo $newsletter->created ?></td></tr>                    
                 <tr><th><?php echo __('Newsletter Modified On') ?></th><td><?php echo $newsletter->modified ?></td></tr>                    
                    -->
                </table>
            </div>
        </div>
    </div>
</div>
