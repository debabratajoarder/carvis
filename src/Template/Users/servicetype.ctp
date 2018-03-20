
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
					<h4><?php echo count($allservicetype);?> Results</h4>
				</div>
        
        <div class="col-md-10">
          <form action="<?php echo $this->Url->build(["controller" => "Users","action" => "servicetype"]);?>" method="post">
            <div class="row">
              <div class="col-md-10">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">
                      <i class="fa fa-search"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Username">
                  </div>
                </div>                
              </div>
              <div class="col-md-2">
                <button class="btn button btn-block btn-success text-uppercase" type="button">Search</button>
              </div>
            </div>
          </form>
        </div>
        

				
			</div>
		</div>


		<div class="srvc-innerdiv" id="products">
                    
                    <input type="hidden" id="vtype" name="vtype" value="0">   
                    
                <?php if(!empty($allservicetype)){
                    
                    foreach($allservicetype as $dt){
                    //print_r($dt);exit;
                    ?>    
                    
                    
	        <div class="item col-xs-12 col-sm-12 col-md-3">
	            <div class="thumbnail topmarchent-inner-div">
	            		
        			<div class="caption new-inner">
                                        

 						<h4 class="text-center"><?php echo $dt['type_name']?>
							 							
 						</h4>
                                    
           						

 						<p style="padding-top: 14px;">  <?php echo substr($dt['description'],0,80).'..';?>

 						</p>

 						

        			</div>
                        <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "services",$dt['id']]);?>" class="text-center text-uppercase btn btn-block">View Details</a>
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
   
   var makeid = new Array();
    $.each($("select[name='makeid[]']"), function() {       
        makeid.push($(this).val());
    }); 
    //alert($("select[name='modelid']"));
   
  /* var modelid=[];
 $('#modelid :selected').each(function(){
     modelid[$(this).val()]=$(this).val();
    });*/
   
   var modelid = new Array();
    $.each($("#modelid :selected"), function() {       
        modelid.push($(this).val());
    });
   
   //alert(modelid);
   
    if(vp!=""){
    $.post('<?php $this->request->webroot;?>filtersearch',
    {vp:vp,make_id:make_id,service_type_id:service_type_id,lat:lat,long:long},
    function(data,status){
        //alert(data);exit();
       if(status=='success'){
          $('#products').html(data);
        }
        
    });
  }
  if(vr!=""){
  $.post('<?php $this->request->webroot;?>filtersearch',
    {vr:vr,make_id:make_id,service_type_id:service_type_id,lat:lat,long:long},
    function(data,status){
        //alert(data);exit();
       if(status=='success'){
                 
          $('#products').html(data);
        }
    });
    }
    if(vr!="" && vp!=""){
  $.post('<?php $this->request->webroot;?>filtersearch',
    {vr:vr,vp:vp,make_id:make_id,service_type_id:service_type_id,lat:lat,long:long},
    function(data,status){
        //alert(data);exit();
       if(status=='success'){
                 
          $('#products').html(data);
        }
    });
    }
    
    if(makeid!=""){
  $.post('<?php $this->request->webroot;?>filtersearch',
    {makeid:makeid,make_id:make_id,service_type_id:service_type_id,lat:lat,long:long},
    function(data,status){
        //alert(data);exit();
       if(status=='success'){
                 
          $('#products').html(data);
        }
    });
    }
   if(modelid!=""){
       //alert(modelid);
  $.post('<?php $this->request->webroot;?>filtersearch',
    {modelid:modelid,make_id:make_id,service_type_id:service_type_id,lat:lat,long:long},
    function(data,status){
        //alert(data);exit();
       if(status=='success'){
                 
          $('#products').html(data);
        }
    });
    } 
    
}    
    
</script>