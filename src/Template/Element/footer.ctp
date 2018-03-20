<footer>
	<div class="container">
		<div class="row">
			<div class="footer_innerdiv">
				<div class="col-md-6">
					<div class="contact-div">
						<h4>Contact Us 
							<img src="<?php echo $this->Url->build('/images/hnd.png');?>" alt="" class="img-responsive">
						</h4>
						<a href="<?php echo $SiteSettings['facebook_url'];?>" data-toggle="tooltip" data-placement="top" title="Facebook">
							<img src="<?php echo $this->Url->build('/images/f.png');?>" alt="" class="img-responsive"></a>

						<a href="<?php echo $SiteSettings['instagram_url'];?>" data-toggle="tooltip" data-placement="top" title="Instragram">
							<img src="<?php echo $this->Url->build('/images/ins.png');?>" alt="" class="img-responsive"></a>

						<!-- <a href="#" data-toggle="tooltip" data-placement="top" title="Services">
							<img src="<?php echo $this->Url->build('/images/hnd.png');?>" alt="" class="img-responsive"></a> -->	

						<p>Carvis is here to provide you with more information, answer any <br> questions you may have and assist your navigation through our <br> website. <br><br>
						For any inquiry, feel free to contact us at <br>
						<a href="mailto:contact@carvis.com.my">contact@carvis.com.my</a>							
						</p>
					</div>
				</div>

				<div class="col-md-3">
					<div class="contact-div">
						<h4>About Us</h4>
						<h6><i class="fa fa-arrow-right"></i> <a href="#">What we do</a></h6> 
						<h6><i class="fa fa-arrow-right"></i> <a href="#">Who we are</a></h6>
						<h6><i class="fa fa-arrow-right"></i> <a href="#">Join the team</a></h6> 
						<h6><i class="fa fa-arrow-right"></i> <a href="#">List your Business</a></h6>
						<h6><i class="fa fa-arrow-right"></i> <a href="<?php echo $this->request->webroot;?>users/contactus">Contact Us</a> </h6>
					</div>
				</div>

				<div class="col-md-3">
					<div class="contact-div">
						<h4>Newsletter</h4>
						<p>Stay in the loop on all upcoming
						promotions,discounts and latest
						updates</p>

                                                <form action="" class="form-group">
							<div class="form-group">
							   <input type="email" id="email" name="email" class="input-sm" placeholder="Enter Your Email Address...." required>								
							</div>

                                                    <button type="button" onclick="subscribe()">
								<h5 class="text-center text-uppercase">Subscribe</h5>
							</button>							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="copy-rightdiv">
		<div class="container">
			<div class="row">
                            <div class="col-md-12" >
					<h6 class="text-center">Copyright (C) 2017-2018 Carvis Auto Sdn. Bhd.</h6>
				</div>
			</div>
		</div>
	</div>
</footer>
<a href="#" class="scrollup" style="display: none;">Scroll</a>
<?php echo $this->Html->script('jquery.validate'); ?>
<?php echo $this->Html->script('bootstrap.min.js') ?>
<?php echo $this->Html->script('wowslider.js') ?>
<?php echo $this->Html->script('script.js') ?>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>

<script>
    
    function subscribe(){
        //alert('ok');
        
        var email = $('#email').val();
        if(email!=""){
       $.ajax({
                type: 'POST',
                url: '<?php echo $this->request->webroot;?>users/subscribe',
                data: {email: email},
                //dataType: 'json',
                success: function(response) {
                    var obj = jQuery.parseJSON( response );
                    
                    $("#AjaxMsgFrom").html('');
                    if(obj.Ack == 1){
                        $('#email').val("");
                        $("html, body").animate({ scrollTop: 0 }, 600);
                        $("#AjaxMsgFrom").html('<div class="row"><div class="col-md-12"><div class="alert alert-success alert-dismissible" style="text-align: center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Success!</strong> '+obj.data+'</div></div></div>');
                    }else{
                       $("html, body").animate({ scrollTop: 0 }, 600);
                       $("#AjaxMsgFrom").html('<div class="row"><div class="col-md-12"><div class="alert alert-danger alert-dismissible" style="text-align: center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error!</strong> '+obj.data+'</div></div></div>');
                        
                    }
                   
                }
            });
            }else{
            
            alert('Please enter your email');
            }
        
    }
    
    
</script>    

<script type="text/javascript">
	$(document).ready(function(){ 
	
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollup').fadeIn();
		} else {
			$('.scrollup').fadeOut();
		}
	}); 
	
	$('.scrollup').click(function(){
		$("html, body").animate({ scrollTop: 0 }, 600);
		return false;
	});
});
</script>
<script>      $(document).ready(function(){ 
     setTimeout(function() { 
         $('.message').fadeOut('slow');  
         $('.success').fadeOut('slow');        }, 5000);      });    
 var base_url = "<?php echo $this->request->webroot;?>"; 
 </script>
</body>
</html>