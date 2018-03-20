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
								<h5 class="h5">Edit Profile</h5>
							</div>
						</div>
					</div>					
					<div class="edit-profil-formdiv">
						<form action="<?php echo $this->Url->build(["controller" => "Users","action" => "editprofile"]);?>" method="post" class="form-inline">
							<div class="row">
								<div class="col-md-6">
								  <div class="form-group">
								    <label for="n">Name</label>
								    <div class="input-group">
								    	<div class="input-group-addon">
								    		<i class="fa fa-user"></i>
								    	</div>
								    	<input type="text" class="form-control" id="n" placeholder="Name..." name="full_name" value="<?php echo $user->full_name;?>">
								    </div>
								  </div>								
								</div>

								<div class="col-md-6">
								  <div class="form-group">
								    <label for="e">Email</label>
								    <div class="input-group">
								    	<div class="input-group-addon">
								    		<i class="fa fa-envelope"></i>
								    	</div>
								    	<input type="email" class="form-control" id="e" name="email" value="<?php echo $user->email;?>" placeholder="Mail Here...">
								    </div>
								  </div>									
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
								  <div class="form-group">
								    <label for="c">Contact Number</label>
								    <div class="input-group">
								    	<div class="input-group-addon">
								    		<i class="fa fa-phone"></i>
								    	</div>
								    	<input type="text" class="form-control" id="c" name="phone" value="<?php echo $user->phone;?>" placeholder="Phone Number...">
								    </div>
								  </div>								
								</div>

								<div class="col-md-6">
								  <div class="form-group">
								    <label for="ad">Address</label>
								    <div class="input-group">
								    	<div class="input-group-addon">
								    		<i class="fa fa-address-book"></i>
								    	</div>
								    	<input type="text" class="form-control"id="autocomplete" name="address" type="text" onFocus=geolocate() value="<?php echo $user->address ?>" placeholder="Address Here...">
								    </div>
								  </div>									
								</div>
							</div>
                                                    <input  type="hidden" id="lat" name="latitude" value="<?php echo $user->latitude ?>"/>
<input  type="hidden" id="long" name="longitude" value="<?php echo $user->longitude ?>"/>

														
							
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
<script>     
      var placeSearch, autocomplete;   

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});   

             google.maps.event.addListener(autocomplete, 'place_changed', function() {
		      var place = autocomplete.getPlace();
		      var lat = place.geometry.location.lat();
		      var lng = place.geometry.location.lng();
		      $('#lat').val(lat);
                      $('#long').val(lng);
		    
		    });     
      }

     
      function geolocate() { 
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) { 
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>

 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQ9hl89w8uiMND1-cnmkTVnqGh37TDvvk&libraries=places&callback=initAutocomplete"
        async defer></script>
 