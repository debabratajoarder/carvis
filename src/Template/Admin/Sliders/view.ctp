<div id="content">
    <div class="inner">
      <div class="row">
        <div class="col-lg-12">
         
        </div>
      </div>
      <hr />
       <div class="table-responsive">
            <div class="runs view large-9 medium-8 columns content">
			    <h3>Image of Home Slider</h3>
			    <table class="vertical-table">
			        <tr>
			            <th style="width:200px;"><?= __('Title') ?></th>
			            <td style="width:400px;"><?= h($slide->title) ?></td>
			        </tr>	
					
			        <tr>
			            <th style="width:200px;"></th>
			            <td style="width:400px;"></td>
			        </tr>								
			        <tr>
			            <th><?= __('Image') ?></th>
			            <td>
							<?php $filePath = WWW_ROOT . 'home_slider' .DS.$slide->file; ?>
                            <?php if ($slide->file != "" && file_exists($filePath)) { ?>
                            <img src="<?php echo $this->Url->build('/home_slider/'.$slide->file); ?>" width="150px" height="70px" />
                            <?php } ?>
						</td>
			        </tr>
			    </table>
            </div>
        </div>
       

</div>
</div>