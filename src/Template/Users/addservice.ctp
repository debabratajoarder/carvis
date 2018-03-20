<div class="clearfix"></div>

<div class="clearfix"></div>
    <section class="edit-profil-detaildiv">
      <div class="container">
          
        <div class="row">
          <div class="col-md-3">
            
              <?php echo $this->element('side_menu');?>  
          </div>
      <div class="col-md-9">
      <?php echo $this->Flash->render();?>

				<div class="dashboard-rightdiv">
					<div class="alert new-alert">
						<h5 class="text-uppercase">Services</h5>
					</div>

					<div class="dashboard-formdiv">
						<form method="post" id="addservice" action="<?= $this->Url->build(['controller'=>'Users','action'=>'addservice'])?>">
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<h5 class="h5 text-uppercase">Service Name</h5>
									</div>

									<div class="col-md-10">
										<input type="text" name="service_name" class="form-control" placeholder="Name..." required>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<h5 class="h5 text-uppercase text-right">Service Type</h5>
									</div>

									<div class="col-md-10">
                                <?php foreach($servicetype as $type):?>
										<div class="row">
											<div class="col-md-12">
											  <div class="form-group">
											      <div class="checkbox">
											        <label>
											          <input type="checkbox" value="<?= $type->id?>" name="service_type_id[]" > <?= $type->type_name?> 
											        </label>
											      </div>
											  </div>												
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
											  <div class="form-group">
											     <input type="text" class="form-control"   name="min_price[]" placeholder="Min Price">
											  </div>												
											</div>	
											<div class="col-md-6">
											  <div class="form-group">
											     <input type="text" class="form-control"   name="max_price[]" placeholder="Max Price">
											  </div>												
											</div>																						
										</div>

                                    <?php endforeach;?>	
									</div>
								</div>
							</div>
						

							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<h5 class="h5 text-uppercase">Description</h5>
									</div>

									<div class="col-md-10">
										<textarea class="form-control" name="description" placeholder="Description here..."required></textarea>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="row">
									<div class="col-md-2"></div>
									<div class="col-md-10"> 
										<button type="submit" class="btn" onclick="addservice()">
											<h5 class="h5 text-uppercase"> ADD</h5>
										</button>										
									</div>
									<div class="col-md-4"></div>
								</div>
							</div>
						</form>	
					</div>
				</div>
			</div>
    </div>
  </div>
</section>

<script>
function addservice11(){
  document.getElementById("addservice").submit();
}

</script>

