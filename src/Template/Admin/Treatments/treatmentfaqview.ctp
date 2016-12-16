<div id="content">
    <div class="inner">
      <div class="row">
        <div class="col-lg-12">
        </div>
      </div>
      <hr />
       <div class="table-responsive">
            <div class="runs view large-9 medium-8 columns content">
                <h3> Treatment Faq Detail</h3>
                <table class="vertical-table table table-striped table-bordered table-hover">
                    <tr>
                        <th style="width:20%"><?php echo __('Treatment Name') ?></th>
                        <td style="width:80%"><?php echo h($treatments['name']) ?></td>
                    </tr>

                    <tr>
                        <th><?php echo __('Question') ?></th>
                        <td><?php echo $faq['question'] ?></td>
                    </tr>

                    <tr>
                        <th><?php echo __('Answer') ?></th>
                        <td><?php echo $faq['answer'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
</div>
</div>