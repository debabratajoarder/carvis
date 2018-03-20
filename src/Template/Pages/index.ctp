<style type="text/css">
	.justify-div{
	    width: 56%;
	    margin: 0 auto 0;
	}
	.justify-div > .row > .col-md-3 {
	    width: 50%;
	    display: inline-block;
	    float: left;
	}
</style>

<div class="clearfix"></div>

<div id="wowslider-container1">
  <div class="ws_images">
      <!--Slider start-->
    <ul>
        <?php if(!empty($slider)){
            
            foreach($slider as $dt){?>
        
      <li><img src="<?php echo $this->Url->build('/slider_img/'.$dt->image);?>"  id="wows1_0"/></li>

        <?php }
        } ?>
    </ul>
      <!--Slider end-->
  </div>
</div>
<div class="clearfix"></div>

<section class="middle-section">
	<div class="container">
		<div class="middle-div">
			<div class="row">
				<div class="col-md-12">
					<form action="<?php echo $this->Url->build(["controller" => "Users","action" => "searchlist"]);?>" method="post">
						<div class="row">
							<div class="col-md-9">
							  <div class="form-group">
							    <label for="st">Search a Service</label>
							    <input type="text" name="service_type_id" placeholder="Search.." 
							    class="form-control">
								<!-- <select class="form-control" id="st" name="service_type_id">
                                <option selected="selected" value="">Select</option>
                              <?php foreach($servicetype as $dt){?>
                              
                              <option value="<?php echo $dt->id; ?>"><?php echo $dt->type_name; ?></option>
                              <?php } ?>
								</select> -->							    
							  </div>								
							</div>

							<div class="col-md-3">
							  <div class="form-group">
							    <label for="lo">Location</label>
							    <div class="input-group">
      
                                  <input class="form-control" id="autocomplete" name="address" type="text" onFocus=geolocate() placeholder="Type Location" />
							      <div class="input-group-addon">
							      	<i class="fa fa-map-marker"></i>
							      </div>
							    </div>
							  </div>								
							</div>
                                                    
                              <input  type="hidden" id="lat" name="latitude" />
                              <input  type="hidden" id="long" name="longitude" />
						</div> <!-- row -->

						<div class="justify-div">	
							<div class="row">
								<div class="col-md-3">
								  <div class="form-group">
								    <label for="sm">Select Make</label>
									<select class="form-control" id="sm" name="make_id" onclick="fetchmodel(this.value)">
	                                                                    <option selected="selected" value="">Select</option>
									   <?php foreach($makes as $dt){?>
	                                                                  
	                                                                  <option value="<?php echo $dt->id; ?>"><?php echo $dt->make_name; ?></option>
	                                                                  <?php } ?>
									</select>							    
								  </div>								</div>
	                            <div class="col-md-3">
								  <div class="form-group">
								    <label for="sm">Select Model</label>
									<select class="form-control" id="model" name="model_id">
	                                                                    <option  value="">Select</option>
									   
	                                                                  
									</select>							    
								  </div>								</div>						
							</div> <!-- row -->
						</div>


                         <button type="submit">
							<h4 class="text-center text-uppercase">Search Now</h4>
						</button>
					</form>
				</div>
			</div> <!-- row -->


		</div>
	</div>
</section>
<div class="clearfix"></div>

<section class="most-view-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="common-head_div">
					<h1 class="text-center">Most Viewed Services
						<span>
							<img src="<?php echo $this->Url->build('/images/c.png');?>" alt="" class="center-block">
						</span>	
					</h1>
				</div>
			</div>
			
			<div class="most-view-div">
				<div class="row">
					<div class="col-md-4">
						<div class="most-view-innerdiv">
							<img src="images/c3.png" alt="" class="img-responsive center-block">
							<h4 class="text-center">Wheel Changing</h4>
							<p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
						</div>
					</div>

					<div class="col-md-4">
						<div class="most-view-innerdiv">
							<img src="images/c1.png" alt="" class="img-responsive center-block">
							<h4 class="text-center">Car Repair</h4>
							<p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
						</div>						
					</div>

					<div class="col-md-4">
						<div class="most-view-innerdiv">
							<img src="images/c2.png" alt="" class="img-responsive center-block">
							<h4 class="text-center">Car Inspection</h4>
							<p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
						</div>						
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<div class="clearfix"></div>

<section class="top-marchent-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="common-head_div">
					<h1 class="text-center">Top Merchants
						<span>
							<img src="images/c.png" alt="" class="center-block">
						</span>	
					</h1>
				</div>
			</div>			
		</div>

		<div class="row">
			<div class="top-marchent-div">
                            
                            
                            
                            <?php if(!empty($topmarchants)){
                                //pr($topmarchants);exit;
                                foreach($topmarchants as $dt){
                                ?>
                            
				<div class="col-md-4">
					<div class="topmarchent-inner-div">
						<div class="top-imgdiv">
                                                    <img src="<?php echo $this->Url->build('/user_img/'.$dt['details'][0]['company']['service_provider_images'][0]['image_name']);?>" alt="" class="center-block" width="326px" height="175px">
						</div>

						<div class="top-detaildiv">


	 						<h5><?php echo $dt['details'][0]['service']['service_name']?>  <br>
						
                                                                        <div><span class="stars"><?php if($dt['rating']!=''){echo $dt['rating'];}else{ echo 0; }?></span></div>
<!--                                                                        <span>(<?php echo $dt['rating']?>)</span>							-->
	 						</h5>


                                                    <!-- 	        				<h5>
	        					<sup><i class="fa fa-quote-left"></i></sup>  
	        						<?php if($dt['price'][0]['mp']!="" || $dt['price'][0]['mxp']!=""){ echo ('$'.$dt['price'][0]['mp'].'-'.'$'.$dt['price'][0]['mxp']);}else { ?> <?php echo ('$0-$0');} ?>    
	        					 <sub><i class="fa fa-quote-right"></i></sub> 
	        				  </h5> -->
                                                    
                                                    
                                                    
                                                    
                                                <?php if($dt['price'][0]['mp']!="" || $dt['price'][0]['mxp']!=""){?>    
                                                    
						<h5><span class="label label-success">$<?php echo $dt['price'][0]['mp'];?></span> <span class="fa fa-minus"></span> 
        					<span class="label label-success">$<?php echo $dt['price'][0]['mxp'];?></span></h5>
                                                                        
                                                                        
                                                <?php }else{ ?> 
                                                    
                                                    
                                               <h5><span class="label label-success">$0</span> <span class="fa fa-minus"></span> 
        					<span class="label label-success">$0</span></h5>     
                                                    
                                                    
                                                    
                                                    
                                                <?php } ?>
                                                                        
                                                                        

	 						<h5> Working Hours : <?php echo ($dt['details'][0]['company']['working_hours_from'].'-'.$dt['details'][0]['company']['working_hours_to']);?> <br>
<!--								<a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedetails",$dt['details'][0]['service_id']]);?>" class="btn-sm btn"><i class="fa fa-arrow-down"></i> More Details</a>-->
	 						</h5>

	 						<h5> Working Days :  <br>
                                                            
                                                            <?php $wd=explode(',',$dt['details'][0]['company']['working_days']);
                                                            foreach($wd as $w){ ?>
								<span class="label label-default"><?php echo $w;?></span>
                                                            <?php } ?>

	 						</h5>
						</div>
						<a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedetails",$dt['details'][0]['service_id']]);?>" class="text-center text-uppercase btn btn-block">View Details</a>
					</div>
				</div>
                            
                            <?php } }else{ ?>
                            
                            <div class="col-md-12">
                                
                                Sorry! No results found.
                                
                            </div>
                            
                            <?php } ?>
                            
                            
                            
                            

<!--				<div class="col-md-4">
					<div class="topmarchent-inner-div">
						<div class="top-imgdiv">
							<img src="images/t2.jpg" alt="" class="img-responsive center-block">
						</div>
						<div class="top-detaildiv">
	        				<h5>
	        					<sup><i class="fa fa-quote-left"></i></sup>  
	        						$0 - $100    
	        					 <sub><i class="fa fa-quote-right"></i></sub> &nbsp;
	        				  &lbrack;price range&rbrack; </h5>

	 						<h5>Workshop Name  <br>
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
									<i class="fa fa-star-o"></i>
									<span>(4.5)</span>
								</span> 							
	 						</h5>

	 						<h5> Working Hours : 1 hr - 5hr <br>
								<a href="#" class="btn-sm btn"><i class="fa fa-arrow-down"></i> More Details</a>
	 						</h5>

	 						<h5> Working Days :  <br>
								<span class="label label-default">Mon</span>
								<span class="label label-default">Tues</span>
								<span class="label label-default">Wed</span>
								<span class="label label-default">Thurs</span>
								<span class="label label-default">Fri</span>
								<span class="label label-default">Sat</span>
								<span class="label label-default">Sun</span>
	 						</h5>
						</div>
						<a href="#" class="text-center text-uppercase btn btn-block">View Details</a>
					</div>					
				</div>

				<div class="col-md-4">
					<div class="topmarchent-inner-div">
						<div class="top-imgdiv">
							<img src="images/t3.jpg" alt="" class="img-responsive center-block">
						</div>
						<div class="top-detaildiv">
	        				<h5>
	        					<sup><i class="fa fa-quote-left"></i></sup>  
	        						$0 - $100    
	        					 <sub><i class="fa fa-quote-right"></i></sub> &nbsp;
	        				  &lbrack;price range&rbrack; </h5>

	 						<h5>Workshop Name  <br>
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
									<i class="fa fa-star-o"></i>
									<span>(4.5)</span>
								</span> 							
	 						</h5>

	 						<h5> Working Hours : 1 hr - 5hr <br>
								<a href="#" class="btn-sm btn"><i class="fa fa-arrow-down"></i> More Details</a>
	 						</h5>

	 						<h5> Working Days :  <br>
								<span class="label label-default">Mon</span>
								<span class="label label-default">Tues</span>
								<span class="label label-default">Wed</span>
								<span class="label label-default">Thurs</span>
								<span class="label label-default">Fri</span>
								<span class="label label-default">Sat</span>
								<span class="label label-default">Sun</span>
	 						</h5>
						</div>
						<a href="#" class="text-center text-uppercase btn btn-block">View Details</a>
					</div>					
				</div>
			</div>
		</div>

		<div class="row">
			<div class="top-marchent-div">
				<div class="col-md-4">
					<div class="topmarchent-inner-div">
						<div class="top-imgdiv">
							<img src="images/t4.jpg" alt="" class="img-responsive center-block">
						</div>
						<div class="top-detaildiv">
	        				<h5>
	        					<sup><i class="fa fa-quote-left"></i></sup>  
	        						$0 - $100    
	        					 <sub><i class="fa fa-quote-right"></i></sub> &nbsp;
	        				  &lbrack;price range&rbrack; </h5>

	 						<h5>Workshop Name  <br>
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
									<i class="fa fa-star-o"></i>
									<span>(4.5)</span>
								</span> 							
	 						</h5>

	 						<h5> Working Hours : 1 hr - 5hr <br>
								<a href="#" class="btn-sm btn"><i class="fa fa-arrow-down"></i> More Details</a>
	 						</h5>

	 						<h5> Working Days :  <br>
								<span class="label label-default">Mon</span>
								<span class="label label-default">Tues</span>
								<span class="label label-default">Wed</span>
								<span class="label label-default">Thurs</span>
								<span class="label label-default">Fri</span>
								<span class="label label-default">Sat</span>
								<span class="label label-default">Sun</span>
	 						</h5>
						</div>
						<a href="#" class="text-center text-uppercase btn btn-block">View Details</a>
					</div>
				</div>

				<div class="col-md-4">
					<div class="topmarchent-inner-div">
						<div class="top-imgdiv">
							<img src="images/t5.jpg" alt="" class="img-responsive center-block">
						</div>
						<div class="top-detaildiv">
	        				<h5>
	        					<sup><i class="fa fa-quote-left"></i></sup>  
	        						$0 - $100    
	        					 <sub><i class="fa fa-quote-right"></i></sub> &nbsp;
	        				  &lbrack;price range&rbrack; </h5>

	 						<h5>Workshop Name  <br>
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
									<i class="fa fa-star-o"></i>
									<span>(4.5)</span>
								</span> 							
	 						</h5>

	 						<h5> Working Hours : 1 hr - 5hr <br>
								<a href="#" class="btn-sm btn"><i class="fa fa-arrow-down"></i> More Details</a>
	 						</h5>

	 						<h5> Working Days :  <br>
								<span class="label label-default">Mon</span>
								<span class="label label-default">Tues</span>
								<span class="label label-default">Wed</span>
								<span class="label label-default">Thurs</span>
								<span class="label label-default">Fri</span>
								<span class="label label-default">Sat</span>
								<span class="label label-default">Sun</span>
	 						</h5>
						</div>
						<a href="#" class="text-center text-uppercase btn btn-block">View Details</a>
					</div>					
				</div>

				<div class="col-md-4">
					<div class="topmarchent-inner-div">
						<div class="top-imgdiv">
							<img src="images/t6.jpg" alt="" class="img-responsive center-block">
						</div>
						<div class="top-detaildiv">
	        				<h5>
	        					<sup><i class="fa fa-quote-left"></i></sup>  
	        						$0 - $100    
	        					 <sub><i class="fa fa-quote-right"></i></sub> &nbsp;
	        				  &lbrack;price range&rbrack; </h5>

	 						<h5>Workshop Name  <br>
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
									<i class="fa fa-star-o"></i>
									<span>(4.5)</span>
								</span> 							
	 						</h5>

	 						<h5> Working Hours : 1 hr - 5hr <br>
								<a href="#" class="btn-sm btn"><i class="fa fa-arrow-down"></i> More Details</a>
	 						</h5>

	 						<h5> Working Days :  <br>
								<span class="label label-default">Mon</span>
								<span class="label label-default">Tues</span>
								<span class="label label-default">Wed</span>
								<span class="label label-default">Thurs</span>
								<span class="label label-default">Fri</span>
								<span class="label label-default">Sat</span>
								<span class="label label-default">Sun</span>
	 						</h5>
						</div>
						<a href="#" class="text-center text-uppercase btn btn-block">View Details</a>
					</div>					
				</div>-->
			</div>
		</div>		
	</div>
</section>
<div class="clearfix"></div>

<section class="banner-section">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="banner-div">
					<h4 class="text-uppercase">Awesome ! Loving It</h4>
					<p>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an </p>

					<img src="images/ts1.png" alt="" class="img-responsive">
					<h4 class="n-h4">Jhon Wilson  <br>
						<span>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-half-empty"></i>
							<i class="fa fa-star-o"></i>
						</span>	
					</h4>
					<h1 class="pull-right">
						<span>
							<i class="fa fa-quote-right"></i>
						</span>						
					</h1>
				</div>
			</div>

			<div class="col-md-4">
				<div class="banner-div">
					<h4 class="text-uppercase">Awesome ! Loving It</h4>
					<p>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an </p>

					<img src="images/ts2.png" alt="" class="img-responsive">
					<h4 class="n-h4">Liza Wilson <br>
						<span>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-half-empty"></i>
							<i class="fa fa-star-o"></i>
						</span>	
					</h4>
					<h1 class="pull-right">
						<span>
							<i class="fa fa-quote-right"></i>
						</span>						
					</h1>
				</div>				
			</div>

			<div class="col-md-4">
				<div class="banner-div">
					<h4 class="text-uppercase">Awesome ! Loving It</h4>
					<p>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an </p>

					<img src="images/ts3.png" alt="" class="img-responsive">
					<h4 class="n-h4">Roger Wilson <br>
						<span>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-half-empty"></i>
							<i class="fa fa-star-o"></i>
						</span>	
					</h4>
					<h1 class="pull-right">
						<span>
							<i class="fa fa-quote-right"></i>
						</span>						
					</h1>
				</div>				
			</div>
		</div>
	</div>
</section>
<div class="clearfix"></div>

<style>
   .form-horizontal .control-label {
	text-align: left;
    }
    
    
    span.stars, span.stars span {
    display: block;
    background: url(image/stars.png) 0 -16px repeat-x;
    width: 80px;
    height: 16px;
}

span.stars span {
    background-position: 0 0;
}
    
    
</style>

<script>
$.fn.stars = function() {
    return $(this).each(function() {
        // Get the value
        var val = parseFloat($(this).html());
        // Make sure that the value is in 0 - 5 range, multiply to get width
        var size = Math.max(0, (Math.min(5, val))) * 16;
        // Create stars holder
        var $span = $('<span />').width(size);
        // Replace the numerical value with stars
        $(this).html($span);
    });
}
$(function() {
    $('span.stars').stars();
});

</script>



<script>
   
    function fetchmodel(id) {
        
            $.ajax({
                url: '<?php echo $this->request->webroot; ?>users/fetchmodel', 
                cache: false,
                data: { make_id: id},
                type: 'post',
                success: function (response) {
                    console.log(response);
                    var obj = jQuery.parseJSON(response);

                    if (obj.Ack == 1) {
                       
                        html ="";
                        for (var i = 0; i < obj.data.length; i++) {
                          
                           html= html+"<option value='"+obj.data[i].id+"'>"+obj.data[i].model_name+"</option>";
                           
                        }
                        
                      $('#model').html(html); 
                    }
                },
                error: function (response) {
                    $('#msg').html(response); // display error response from the PHP script
                }
            });
        }

 
 




</script>







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
