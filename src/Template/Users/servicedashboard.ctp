<div class="clearfix"></div>

<div class="clearfix"></div>
    <section class="edit-profil-detaildiv">
      <div class="container">
          
        <div class="row">
          <div class="col-md-3">
            
              <?php echo $this->element('side_menu');?>  
          </div>
      <div class="col-md-9">
				<div class="edit-profil-rightdiv">
					<div class="row">
						<div class="col-md-3">
							<div class="edit-profil-img">
                              <?php if(!empty($user->pimg)) :?>
                                <img src="<?= $this->Url->build('/')?>user_img/<?= $user->pimg ?>" alt="" class="img-responsive center-block img-thumbnail">	
                            <?php else: ?>
                                <img src="<?= $this->Url->build('/')?>images/pro-img.jpg" alt="" class="img-responsive center-block img-thumbnail">	
                            <?php endif;?>
								
							</div>
						</div>

						<div class="col-md-9">
							<div class="edit-profil-txtdiv">
								<h3 class="h4"><?= $user->full_name ?></h3>	
								<h4 class="h6">
									<i class="fa fa-map-marker"></i>
									<?= $user->address?> <br>

									<i class="fa fa-phone"></i>	
									<a href="tel:123456789"><?=$user->phone?></a> <br>

									<i class="fa fa-envelope"></i>	
									<a href="mailto:<?=$user->email?>"><?=$user->email?></a>	 <br>
									
									Rating: 
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>	
									<i class="fa fa-star-half-empty"></i>
									<i class="fa fa-star-o"></i>
								</h4>

								<a href="#" class="add">Add Review</a>
								<a href="#" class="add">Add Place</a>
							</div>
                            <br>
							
							<div class="edit-newcustom-div">
								<div class="media">
								  <div class="media-left">
								    <a href="#">
								      <img class="media-object" src="<?= $this->Url->build('/')?>images/rv.png" alt="">
								    </a>
								  </div>
								  <div class="media-body">
								    <h5 class="media-heading">John Doe
								    	<span>2 hrs ago</span>
								    </h5>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. <br>
									<a href="services.html" class="text-capitalize add">click Here</a>	
									<span>Rating:
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
										<i class="fa fa-star-o"></i>
									</span>  
									</p>
								  </div>
								</div>
							</div><!-- edit-newreviwe-div -->
							
							<div class="edit-newcustom-div">
								<div class="media">
								  <div class="media-left">
								    <a href="#">
								      <img class="media-object" src="<?= $this->Url->build('/')?>images/rv.png" alt="">
								    </a>
								  </div>
								  <div class="media-body">
								    <h5 class="media-heading">John Doe
								    	<span>2 hrs ago</span>
								    </h5>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. <br>
									<a href="#" class="text-capitalize add">click Here</a>	
									<span>Rating:
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
										<i class="fa fa-star-o"></i>
									</span>  
									</p>
								  </div>
								</div>
							</div><!-- edit-newreviwe-div -->
						</div>
					</div>
                    <br><br>
					<div class="row">
						<div class="edit-newservice-div">
							<div class="col-md-12">
								<h3 class="h4">Update Resent Services</h3>
							</div>
                         <br><br>
                        <?php foreach($latest_services as $service):?>
							<div class="col-md-3">
								<div class="edit-newimg-div">
									
                                    <?php if(!empty($service->image)):?>
                                    <a href="#" class="thumbnail">
									    <img src="<?= $this->Url->build('/')?>service_img/<?= $service->image?>" alt="" class="img-responsive center-block">
                                    </a>
                                    <?php else:?>
                                     <a href="#" class="thumbnail">
                                        <img src="<?= $this->Url->build('/')?>images/ee1.jpg" alt="" class="img-responsive center-block">
                                    </a>
                                    <?php endif;?>
																		
								</div>
							</div>
                            <?php endforeach;?>
							
						</div>
					</div>
				</div>
			</div>

            <!-- end of class="col-md-9" -->
    </div>
  </div>
</section>

