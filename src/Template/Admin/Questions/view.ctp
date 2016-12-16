<div id="content">
    <div class="inner">
      <div class="row">
        <div class="col-lg-12">
        </div>
      </div>
      <hr />
       <div class="table-responsive">
            <div class="runs view large-9 medium-8 columns content">
                <h3> Question Detail</h3>
                <table class="vertical-table table table-striped table-bordered table-hover">
                    <tr>
                        <th style="width:20%"><?php echo __('Question') ?></th>
                        <td style="width:80%"><?php echo h($questions['question']) ?></td>
                    </tr>
                    <tr>
                        <th><?php echo __('Answer') ?></th>
                        <td><?php echo $questions['answer'] ?></td>
                    </tr>
                    <tr>
                        <th><?php echo __('Note') ?></th>
                        <td><?php echo h($questions['note']) ?></td>
                    </tr>
                    <tr>
                        <th><?php echo __('Warning') ?></th>
                        <td><?php echo h($questions['warning']) ?></td>
                    </tr>
                    <tr>
                        <th><?php echo __('Answer Type') ?></th>
                        <td><?php echo h($questions['answer_type'] == 'c' ? 'Sub Question' : 'Yes No') ?></td>
                    </tr>
                </table>
            </div>
       </div>
      <?php if($questions['answer_type'] == 'c'){ ?>
      <hr />
       <div class="table-responsive">
            <div class="runs view large-9 medium-8 columns content">
                <h3> Sub Question List</h3>
                <table class="vertical-table table table-striped table-bordered table-hover">
                    <tr>
                        <th style="width:5%">Sl No</th>
                        <th style="width:95"><?php echo h('Sub Question') ?></th>
                    </tr>                    
                    <?php if($questions['question_checkboxes']){ ?>
                    <?php $i = 1; foreach($questions['question_checkboxes'] as $que){ ?>
                    <tr>
                        <td style="width:10%"><?php echo h($i)?></td>
                        <td style="width:90%"><?php echo h($que['title']) ?></td>
                    </tr>
                    <?php $i++; } ?>
                    <?php } else { ?>
                    <tr>
                        <td style="width:10%"></td>
                        <td style="width:90%"><?php echo h('NO Sub Question Exist') ?></td>
                    </tr>                    
                    <?php } ?>
                </table>
            </div>
       </div>      
      <?php } ?>
</div>
</div>