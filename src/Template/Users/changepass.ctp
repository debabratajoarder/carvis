<div class="clearfix"></div>
<?php echo $this->element('profile_head');?>

<div class="clearfix"></div>

<section class="edit-profil-detaildiv">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				
                          <?php echo $this->element('side_menu');?>  
                            
			</div>

			<div class="col-md-8">
				<div class="edit-profil-rightdiv">
					<div class="row">
						<div class="col-md-12">
							<div class="user-div">
								<h5 class="h5">Change Password</h5>
							</div>
						</div>
					</div>					
					<div class="edit-profil-formdiv">
						<form action="<?php echo $this->Url->build(["controller" => "Users","action" => "changepass"]);?>" method="post" class="form-inline">
							<div class="row">
								<div class="col-md-6">
								  <div class="form-group">
								    <label for="n">New Password</label>
								    <div class="input-group">
								    	<div class="input-group-addon">
								    		<i class="fa fa-lock"></i>
								    	</div>
                                                                        <input type="password" class="form-control" id="n" placeholder="New password..." name="new_password" >
								    </div>
								  </div>								
								</div>

								
							</div>

                                                    
                                                    <div class="row">
								
								<div class="col-md-6">
								  <div class="form-group">
								    <label for="e">Confirm Password</label>
								    <div class="input-group">
								    	<div class="input-group-addon">
								    		<i class="fa fa-lock"></i>
								    	</div>
                                                                        <input type="password" class="form-control" id="e" name="password"  placeholder="Confirm password...">
								    </div>
								  </div>									
								</div>
							</div>
                                                    
                                                    
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<button class="form-control btn text-uppercase" type="submit"> Save</button>
									</div>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="clearfix"></div>

 