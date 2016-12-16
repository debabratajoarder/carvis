<div id="content">
    <div class="inner">
      <div class="row">
        <div class="col-lg-12">
         
        </div>
      </div>
      <hr />
<div class="table-responsive">
    <h3><?= __('Reports') ?></h3> 
    
	<div class="row">
		<div class="col-lg-12">
			  <div class="box">
				<div id="collapseOne" class="accordion-body collapse in body">
					<div class="col-sm-6">
					<div class="row">
						<?php echo $this->Form->create(null, ['url' => ['controller' => 'Reports', 'action' => 'packing_report']]); ?>
						<fieldset>
							<legend><?= __('Search Reports') ?></legend>
							
							<div class="form-group">
								<div class="input">
									<label>Date</label>
									<?php if(isset($this->request->data['delivery_date'])){?>
									<input type="text" class="form-control" value="<?=$this->request->data['delivery_date']?>" name="delivery_date" id="dp1" />
									<?php } else { ?>
									<input type="text" class="form-control" value="<?=date('m-d-Y')?>" name="delivery_date" id="dp1" />	
									<?php } ?>
								</div>
							</div>						        
							
						</fieldset>
						<?= $this->Form->button(__('Search')) ?>
						<?= $this->Form->end() ?>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>    
</div>
</div>





