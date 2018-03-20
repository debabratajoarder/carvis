<style>
.slidecontainer {
    width: 100%;
}

.slider {
    -webkit-appearance: none;
    width: 100%;
    height: 15px;
    border-radius: 5px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider:hover {
    opacity: 1;
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #4CAF50;
    cursor: pointer;
}

.slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #4CAF50;
    cursor: pointer;
}
</style>

<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h1 > Add Service </h1>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Add Service</h5>
                        <div class="toolbar">
                            <ul class="nav">
                                <li style="margin-right:15px">
                                    <div class="btn-group"> 


                                    </div>
                                </li>

                            </ul>
                        </div>
                    </header>
                    <div id="collapseOne" class="accordion-body collapse in body"> 
                        <div class="col-sm-6">
                            <div class="row">
				<?php echo $this->Form->create($service,['class' => 'form-horizontal', 'id' => 'user-validate', 'enctype' => 'multipart/form-data']);?>
                                
                                <input type="hidden" name="is_active" id="is_active" value="1"/>
                                
                                
                                <div class="form-block">

                                                                

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Service Name</label>
                                    <div class="col-lg-8">
                                        <?php echo $this->Form->input('service_name', array('class'=>'form-control','label' => false)); ?>
                                    </div>
                                </div>
                                
                                
<!--                               <div class="form-group">
                                    <label class="control-label col-lg-4">Service Type</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name='service_type_id'>
                                            
                                            <option value="">--Select Type--</option>
                                            <?php foreach($stname as $dt){?>
                                            <option value='<?php echo $dt->id;?>'><?php echo $dt->type_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>-->


                                <div class="form-group">
                                    <label class="control-label col-lg-4"> Service Type</label>
                                    <div class="col-lg-8"> 
                                        <?php foreach($stname as $dt)
                                            { ?>
                                        <div class="row"><div class="col-lg-1">
                                                    <input type="checkbox" name="service_type_id[]" value="<?php echo $dt->id; ?>">
                                                </div>
                                                <div class="col-lg-7">
                                                    <?php echo $dt->type_name; ?>
                                                </div></div>
                                        
                                        <div class="row form-group">
                                            <div class="col-md-6"><input type="text" name="min_price[]" placeholder="Min price" class="form-control"></div>
                                            <div class="col-md-6"><input type="text" name="max_price[]" placeholder="Max price" class="form-control"></div>
                                        </div>
                                            <?php
                                            }
                                        ?>
                                    </div>
                                </div>




                                
 
                               <div class="form-group">
                                    <label class="control-label col-lg-4"> Models</label>
                                    <div class="col-lg-8"> 
                                        <?php foreach($stagname as $dt)
                                            { ?>
                                                <div class="col-lg-1">
                                                    <input type="checkbox" name="service_model_id[]" value="<?php echo $dt->id; ?>">
                                                </div>
                                                <div class="col-lg-7">
                                                    <?php echo $dt->model_name; ?> (<?php echo $dt->make->make_name; ?>)
                                                </div>
                                                <div class="clearfix"></div>
                                            <?php
                                            }
                                        ?>
                                    </div>
                                </div>   
                                  
                               <div class="form-group">
                                    <label class="control-label col-lg-4"> Features</label>
                                    <div class="col-lg-8"> 
                                        <?php foreach($sfname as $dt)
                                            { ?>
                                                <div class="col-lg-1">
                                                    <input type="checkbox" name="service_feature_id[]" value="<?php echo $dt->id; ?>">
                                                </div>
                                                <div class="col-lg-7">
                                                    <?php echo $dt->feature_name; ?>
                                                </div>
                                                <div class="clearfix"></div>
                                            <?php
                                            }
                                        ?>
                                    </div>
                                </div>     
                                    
                                
<!--                               <div class="form-group">
                                    <label class="control-label col-lg-4">Address</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" id="autocomplete" name="address" type="text" onFocus=geolocate() />
                                    </div>
                                </div>     
                                    
                              <input  type="hidden" id="lat" name="latitude" />
                              <input  type="hidden" id="long" name="longitude" />
                                
                              <div class="form-group">
                                    <label class="control-label col-lg-4">City</label>
                                    <div class="col-lg-8">
                                        <input class="form-control"  name="city_name" type="text" />
                                    </div>
                              </div> 
                              
                              <div class="form-group">
                                    <label class="control-label col-lg-4">Country</label>
                                    <div class="col-lg-8">
                                        <input class="form-control"  name="country" type="text" />
                                    </div>
                              </div>-->
                              
                              <div class="form-group">
                                    <label class="control-label col-lg-4">Description</label>
                                    <div class="col-lg-8">
                                        <textarea  name="description" class="form-control"></textarea>
                                    </div>
                              </div>
<!--                              <div class="form-group">
                                  <label class="control-label col-lg-4">Pricing</label>
                              <div class="slidecontainer col-lg-8">
                                RM<input type="range" min="100" max="200" name="price" class="slider" id="myRange">
                                <p>Value: <span id="demo"></span></p>
                              </div>
                              </div>-->
                              
<!--                              <div class="form-group"> 
                                  <label class="control-label col-lg-4">Service Image </label>
                                  <div class="col-lg-8">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-preview thumbnail" style="width: 150px; height: 150px;">
                                        </div>
                                      <div> <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                        <input type="file" id="image" name="image" />
                                        </span> <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
                                    </div>
                                  </div>
                                </div>-->
                              
                                <label class="control-label col-lg-4"></label>
                                <div class="col-lg-8" style="text-align:left;"> 
                                    <input type="submit" name="submit" value="Add Service" class="btn btn-primary" />
                                </div>
                                <?php echo $this->Form->end();?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
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