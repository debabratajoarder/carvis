
<div class="clearfix"></div>

<!-- <section class="cus_section">
	<div class="cus-bg">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center">Our Services</h1>
				</div>
			</div>
		</div>
	</div>
</section> -->
<div class="clearfix"></div>

<section class="service-section">
	<div class="container">
		<div class="service-topdiv">
			<div class="row">
				<div class="col-md-2">
					<h4><?php 
          if(isset($allservices))
          echo count($allservices);

          ?> Results</h4>

				</div>


				<div class="col-md-10">
					<form action="#" class="form-inline text-right">
					  
<!--                                          <div class="form-group">
                                              <input type="text" class="form-control input-sm" name="keyword" onkeyup="search()" placeholder="Type Here">
					  </div>-->
                                            
					  	<div class="form-group">
							<h5 class="text-uppercase normal-h5">Sort By:</h5>                                     
                        </div>

                        <div class="form-group">
                          <select class="form-control input-sm" id="filter" onclick="sort()" style="width:170px;">
                              <option selected="selected" value="">Sort By Price</option>
	  <option value="PHL">Price: Highest to Lowest</option>
	  <option value="PLH">Price: Lowest to Highest</option>
                              
<!--                                                  <option value="DNF">Distance: Nearest to Furthest</option>
                              <option value="DFN">Distance: Furthest to Nearest
</option>-->
							</select>
  						</div>

	                    <div class="form-group">
	                      <select class="form-control input-sm" id="filter1" onclick="sort()" style="width:170px;">
	                          <option value="" selected="selected">Sort By Rating</option>
	  
	                          <option value="RHL">Rating: Highest to Lowest</option>
	                          <option value="RLH">Rating: Lowest to Highest</option>

							</select>
							</div>
                             <div class="form-group">
                        <select class="form-control input-sm" id="filter2" onclick="sort()" style="width:170px;">
                            <option value="" selected="selected">Sort By Location</option>
    
                            <option value="RHL">Location: Nearest to Furthest</option>
                            <option value="RLH">Location: Furthest to Nearest</option>

              </select>
              </div>               
                                            

					  <a href="#" class="btn btn-default btn-sm new_select" data-toggle="tooltip" data-placement="top" title="Grid View" 
					  id="grid">
					  	<i class="fa fa-th-large"></i>
					  </a>	

					  <a href="#" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="List View"
					  id="list">
					  	<i class="fa fa-list"></i>
					  </a>

					  <div class="clearfix"></div>

					 <div class="row"> 	
					 <div class="col-md-4" style="margin-left: -124px;">
					 	<h5 class="text-right new_h5">Filter By :</h5>
					 </div>
					 	
					  <div class="col-md-8">
            <div class="form-group f">
                              <div class="dropdown sl form-control input-sm" style="width: 170px;">
                                <button class="dropdown-toggle select-dropdown" type="button" data-toggle="dropdown" aria-expanded="false">
                                  Filter by Make &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                <?php foreach($makes as $dt){?>
                                  <li><label  onclick="sort()"><input type="checkbox" name="makeid[]" value="<?php echo $dt->id?>"> <span class="h6"><?php echo $dt->make_name?></span></label></li>
                                  <?php } ?>
                                  <!-- <li><label><input type="checkbox" name="data[Company][service][]" value="2"> <span class="h6">Lorem Ipsum</span></label></li>
                                  <li><label><input type="checkbox" name="data[Company][service][]" value="3"> <span class="h6">Lorem Ipsum</span></label></li>
                                  <li><label><input type="checkbox" name="data[Company][service][]" value="4"> <span class="h6">Lorem Ipsum</span></label></li>
                                  <li><label><input type="checkbox" name="data[Company][service][]" value="5"> <span class="h6">Lorem Ipsum</span></label></li>
                                  <li><label><input type="checkbox" name="data[Company][service][]" value="6"> <span class="h6">Lorem Ipsum</span></label></li>
                                  <li><label><input type="checkbox" name="data[Company][service][]" value="7"> <span class="h6">Lorem Ipsum</span></label></li>
                                  <li><label><input type="checkbox" name="data[Company][service][]" value="8"> <span class="h6">Lorem Ipsum</span></label></li>
                                  <li><label><input type="checkbox" name="data[Company][service][]" value="9"> <span class="h6">Lorem Ipsum</span></label></li>
                                  <li><label><input type="checkbox" name="data[Company][service][]" value="10"> <span class="h6">Lorem Ipsum</span></label></li>
                                  <li><label><input type="checkbox" name="data[Company][service][]" value="11"> <span class="h6">Lorem Ipsum</span></label></li>
                                  <li><label><input type="checkbox" name="data[Company][service][]" value="12"> <span class="h6">Lorem Ipsum</span></label></li> -->
                                </ul>
                              </div>
                            </div>

                            <div class="form-group f">
                              <div class="dropdown sl form-control input-sm" style="width: 170px;">
                                <button class="dropdown-toggle select-dropdown" type="button" data-toggle="dropdown" aria-expanded="false">
                                  Filter by Model &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" >
                                <?php foreach($models as $dt){?>
                                  <li ><label onclick="sort()"><input type="checkbox" name="modelid[]"  value="<?php echo $dt->id?>"> <span class="h6"><?php echo $dt->model_name?></span></label></li>
                                   <?php } ?>
                                <!--   <li><label><input type="checkbox" name="data[Company][service][]" value="2"> <span class="h6">Lorem Ipsum</span></label></li>
                                  <li><label><input type="checkbox" name="data[Company][service][]" value="3"> <span class="h6">Lorem Ipsum</span></label></li>
                                  <li><label><input type="checkbox" name="data[Company][service][]" value="4"> <span class="h6">Lorem Ipsum</span></label></li>
                                  <li><label><input type="checkbox" name="data[Company][service][]" value="5"> <span class="h6">Lorem Ipsum</span></label></li>
                                  <li><label><input type="checkbox" name="data[Company][service][]" value="6"> <span class="h6">Lorem Ipsum</span></label></li>
                                  <li><label><input type="checkbox" name="data[Company][service][]" value="7"> <span class="h6">Lorem Ipsum</span></label></li>
                                  <li><label><input type="checkbox" name="data[Company][service][]" value="8"> <span class="h6">Lorem Ipsum</span></label></li>
                                  <li><label><input type="checkbox" name="data[Company][service][]" value="9"> <span class="h6">Lorem Ipsum</span></label></li>
                                  <li><label><input type="checkbox" name="data[Company][service][]" value="10"> <span class="h6">Lorem Ipsum</span></label></li>
                                  <li><label><input type="checkbox" name="data[Company][service][]" value="11"> <span class="h6">Lorem Ipsum</span></label></li>
                                  <li><label><input type="checkbox" name="data[Company][service][]" value="12"> <span class="h6">Lorem Ipsum</span></label></li> -->
                                </ul>
                              </div>
                            </div> 
                            <!-- <div class="form-group f">
                                <select class="form-control input-sm sl" name="makeid[]" onclick="sort()" multiple="multiple" style="height: 50px;width:170px;">
                                  <option value="">Filter by Make</option>
		  <?php foreach($makes as $dt){?>
                                  <option value="<?php echo $dt->id?>"><?php echo $dt->make_name?></option>
                                  <?php } ?>

								</select>
	  						</div>

                            <div class="form-group f">
                                <select class="form-control sl input-sm" id="modelid" onclick="sort()" name="modelid" multiple="multiple" style="height: 50px;width:170px;margin-left: -23px;">
                                  <option value="">Filter by Model</option>
		  <?php foreach($models as $dt){?>
                                  <option value="<?php echo $dt->id?>"><?php echo $dt->model_name?></option>
                                  <?php } ?>

								</select>
	  						</div> 	 -->				  
					  </div>

					</div>	 <!-- row -->

					</form>
				</div>
			</div>
		</div>


		<div class="srvc-innerdiv" id="products">
                    
                    <input type="hidden" id="vtype" name="vtype" value="0">   
                    
                <?php if(!empty($allservices)){
                    
                    foreach($allservices as $dt){
                   // print_r($dt);exit;
                    ?>    
                    
                    
	        <div class="item col-xs-12 col-sm-12 col-md-3">
	            <div class="thumbnail topmarchent-inner-div">
	            	<div class="sv-imgdiv">
                            <?php if($dt['details']['user']['service_provider_images'][0]['image_name']!=""){?>
	                	<img class="group list-group-image "  src="<?php echo $this->request->webroot;?>user_img/<?php echo $dt['details']['user']['service_provider_images'][0]['image_name'];?>" alt="" width="253px" height="204px"/>
                            <?php }else{ ?>
                                
                            <img class="group list-group-image "  src="<?php echo $this->request->webroot;?>user_img/car_default.png" width="253px" height="204px" alt="" />    
                                
                                
                            <?php } ?>
	                </div>	
        			<div class="caption">
                                        

 						<h5><?php echo $dt['details']['user']['full_name']?>
							<span>
								<div><span class="stars"><?php if($dt['rating'][0]['avr']!=''){echo $dt['rating'][0]['avr'];}else{ echo 0; }?></span></div>
<!--								<span>(<?php echo $dt['rating'][0]['avr']?>)</span>-->
							</span> 							
 						</h5>
                                    
                                    
                                    <!-- <h5>"<?php if($dt['price'][0]['mp']!="" || $dt['price'][0]['mxp']!=""){ echo ('$'.$dt['price'][0]['mp'].'-'.'$'.$dt['price'][0]['mxp']);}else { ?> <?php echo ('$0-$0');} ?>" </h5> -->
                                    
                                    
                                    
						<?php if($dt['price'][0]['mp']!="" || $dt['price'][0]['mxp']!=""){?>    
                                                    
						<h5><span class="label label-success">$<?php echo $dt['price'][0]['mp'];?></span> <span class="fa fa-minus"></span> 
        					<span class="label label-success">$<?php echo $dt['price'][0]['mxp'];?></span></h5>
                                                                        
                                                                        
                                                <?php }else{ ?> 
                                                    
                                                    
                                               <h5><span class="label label-success">$0</span> <span class="fa fa-minus"></span> 
        					<span class="label label-success">$0</span></h5>     
                                                    
                                                    
                                                    
                                                    
                                                <?php } ?> 						

 						<h5> Working Hours : <?php echo ($dt['details']['user']['working_hours_from'].'-'.$dt['details']['user']['working_hours_to']);?>
<!--							<a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedetails",$dt['details']['id']]);?>" class="btn-sm btn"><i class="fa fa-arrow-down"></i> More Details</a>-->
 						</h5>

 						<h5> Working Days :  <br>
                                                    
                                                    <?php $wd=explode(',',$dt['details']['user']['working_days']);
                                                            foreach($wd as $w){ ?>
								<span class="label label-default"><?php echo $w;?></span>
                                                            <?php } ?>
                                                    
 						</h5>

        			</div>
                        <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedetails",'P_'.$dt['details']['user']['id']]);?>" class="text-center text-uppercase btn btn-block">View Details</a>
	            </div>
	        </div>
                    
                <?php } }else{ ?>
                    
                    <div class="item col-xs-12 col-sm-12 col-md-12">
                        
                       Sorry! No results found. 
                    </div>  
                    
                <?php } ?>

<!--	        <div class="item col-xs-12 col-sm-12 col-md-3">
	            <div class="thumbnail">
	            	<div class="sv-imgdiv">
	                	<img class="group list-group-image img-responsive"  src="images/sv1.jpg" alt="" />
	                </div>	
        			<div class="caption">
        				<h5>"$0 - $100" (price range)</h5>
 						<h5>Workshop Name 
							<span>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-o"></i>
								<i class="fa fa-star-o"></i>
								<span>(4.5)</span>
							</span> 							
 						</h5>
 						<h5> Working Hours : 1 hr - 5hr
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
	            </div>
	        </div>	-->

<!--	        <div class="item col-xs-12 col-sm-12 col-md-3">
	            <div class="thumbnail">
	            	<div class="sv-imgdiv">
	                	<img class="group list-group-image img-responsive"  src="images/sv2.jpg" alt="" />
	                </div>	
        			<div class="caption">
        				<h5>"$0 - $100" (price range)</h5>
 						<h5>Workshop Name 
							<span>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-o"></i>
								<i class="fa fa-star-o"></i>
								<span>(4.5)</span>
							</span> 							
 						</h5>
 						<h5> Working Hours : 1 hr - 5hr
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
	            </div>
	        </div>-->

<!--	        <div class="item col-xs-12 col-sm-12 col-md-3">
	            <div class="thumbnail">
	            	<div class="sv-imgdiv">
	                	<img class="group list-group-image img-responsive"  src="images/sv3.jpg" alt="" />
	                </div>	
        			<div class="caption">
        				<h5>"$0 - $100" (price range)</h5>
 						<h5>Workshop Name 
							<span>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-o"></i>
								<i class="fa fa-star-o"></i>
								<span>(4.5)</span>
							</span> 							
 						</h5>
 						<h5> Working Hours : 1 hr - 5hr
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
	            </div>
	        </div>-->

		</div>
	</div>
</section>
<div class="clearfix"></div>



<!--<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>-->

<style>
   .form-horizontal .control-label {
	text-align: left;
    }
    
    
    span.stars, span.stars span {
    display: block;
    background: url(../image/stars.png) 0 -16px repeat-x;
    width: 80px;
    height: 16px;
}

span.stars span {
    background-position: 0 0;
}
    
    
</style>


<script>
    
    
    
</script>




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
	$(document).ready(function() {
           
    $('#list').click(function(event){
        $("#vtype").val(1);
        event.preventDefault();
        $('#products .item').addClass('list-group-item');
       
    });
    
    
    
    $('#grid').click(function(event){
        $("#vtype").val(0);
        event.preventDefault();
        $('#products .item').removeClass('list-group-item');
        $('#products .item').addClass('grid-group-item');
        
        
        
    });
   
});


function search(){
  // alert(v);
   var keyword=$('input[name=keyword]').val();
   
   var vtype= $("#vtype").val();
   //alert(vtype);exit();
   
    $.post('<?php $this->request->webroot;?>servicesearch',
    {keyword:keyword, vtype:vtype},
    function(data,status){
        //alert(data);exit();
       if(status=='success'){
           
                  
          $('#products').html(data);
           
        }
        
        
    }
          );
     
     
 } 



</script>	
<script>
function sort(){
    
   var vp=$('#filter').val();
   var vr=$('#filter1').val();
   var make_id=$('#make_id').val();
   var service_type_id=$('#service_type_id').val();
   var lat=$('#lat').val();
   var long=$('#long').val();
   

//alert(make_id)
   var makeid = new Array();
    $.each($("input[name='makeid[]']:checked"), function() {       
        makeid.push($(this).val());
    }); 
    //alert($("select[name='modelid']"));
   
  /* var modelid=[];
 $('#modelid :selected').each(function(){
     modelid[$(this).val()]=$(this).val();
    });*/
   
   var modelid = new Array();
    $.each($("input[name='modelid[]']:checked"), function() {       
        modelid.push($(this).val());
    });
   //alert(modelid)
   // var makeid = new Array();
   //  $.each($("select[name='makeid[]']"), function() {       
   //      makeid.push($(this).val());
   //  }); 
    //alert($("select[name='modelid']"));
   
  /* var modelid=[];
 $('#modelid :selected').each(function(){
     modelid[$(this).val()]=$(this).val();
    });*/
   
   // var modelid = new Array();
   //  $.each($("#modelid :selected"), function() {       
   //      modelid.push($(this).val());
   //  });
   
   //alert(<?php $this->request->webroot;?>filtersearch);
   $.ajaxSetup({ cache: true});
    if(vp!=""){
    $.post('http://111.93.169.90/team6/carvis/users/filtersearch',
    {vp:vp,make_id:make_id,service_type_id:service_type_id,lat:lat,long:long},
    function(data,status){
        //alert(data);exit();
       if(status=='success'){
        $.ajaxSetup({ cache: false});
          $('#products').html(data);
        }
        
    });
  }

  if(vr!=""){
  $.post('http://111.93.169.90/team6/carvis/users/filtersearch',
    {vr:vr,make_id:make_id,service_type_id:service_type_id,lat:lat,long:long},
    function(data,status){
        //alert(data);exit();
       if(status=='success'){
                 $.ajaxSetup({ cache: false});
          $('#products').html(data);
        }
    });
    }
    if(vr!="" && vp!=""){
  $.post('http://111.93.169.90/team6/carvis/users/filtersearch',
    {vr:vr,vp:vp,make_id:make_id,service_type_id:service_type_id,lat:lat,long:long},
    function(data,status){
        //alert(data);exit();
       if(status=='success'){
                 $.ajaxSetup({ cache: false});
          $('#products').html(data);
        }
    });
    }
    
    if(makeid!=""){
  $.post('http://111.93.169.90/team6/carvis/users/filtersearch',
    {makeid:makeid,make_id:make_id,service_type_id:service_type_id,lat:lat,long:long},
    function(data,status){
        //alert(data);exit();
       if(status=='success'){
                 $.ajaxSetup({ cache: false});
          $('#products').html(data);
        }
    });
    }
   if(modelid!=""){
       //alert(modelid);
  $.post('http://111.93.169.90/team6/carvis/users/filtersearch',
    {modelid:modelid,make_id:make_id,service_type_id:service_type_id,lat:lat,long:long},
    function(data,status){
        //alert(data);exit();

       if(status=='success'){
                 $.ajaxSetup({ cache: false});
          $('#products').html(data);
        }
    });
    } 
    if(modelid == "" || makeid == "" || vr=="" || vp=="")
    {
      $.post('http://111.93.169.90/team6/carvis/users/filtersearch',
    {modelid:modelid,make_id:make_id,service_type_id:service_type_id,lat:lat,long:long},
    function(data,status){
        //alert(data);exit();

       if(status=='success'){
                 $.ajaxSetup({ cache: false});
          $('#products').html(data);
        }
    });
    }
}    
    
</script>