<?php 

$userid = $this->request->session()->read('Auth.User.id');
$admin_checkid = $this->request->session()->read('Auth.User.is_admin');

$base_url= "http://111.93.169.90/team6/carvis/";


echo $this->element('head');?> 


  <div class="top-div">
	<div class="container">
		<div class="row">
			<div class="col-md-6 hidden-sm hidden-xs"></div>
			<div class="col-md-3">
                            
                            <?php if(isset($userid) && $admin_checkid!=1){?> 
                            
                            <div class="login-div">
                                <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "signout"]);?>"><button type="button" class="bttn">Log Out</button></a>
					|
                                        <?php  if($user_details['utype'] == 1){ ?>
                                        <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "dashboard"]);?>"><button type="button" class="bttn">My Dashboard</button></a>
                                        
                                        <?php }else{ ?>
                                        
                                        <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedashboard"]);?>"><button type="button" class="bttn">My Dashboard</button></a>
                                        <?php } ?>
				</div>
                            
                            
                            
                            <?php }else{ ?>
                            
                            
				<div class="login-div">
					<button type="button" class="bttn" data-toggle="modal" data-target="#myModal">Login</button>
					|
					<button type="button" class="bttn" data-toggle="modal" data-target="#myModal_1">Register</button>
				</div>
                            
                            <?php } ?>
                            
                            
                            
                            
                            
                          <!--For forget password-->
                          
                          <div id="myModal_forget" class="modal fade" role="dialog">
				  <div class="modal-dialog">
				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">Forgot Password <br>
				        	<!--<span>Don't have an account?  <span>Register</span> here!</span>-->
				        </h4>
				      </div>
				      <div class="modal-body">
						<div class="login-form-div">
							<div class="row">
								<div class="col-md-6">
									<form style="text-align: center;" class="form-wrapper rightFrmContainer" id="frmLogin" accept-charset="utf-8" method="post" action="<?php echo $this->Url->build(["controller" => "Users","action" => "forgotpassword"]);?>">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-envelope"></i>
												</div>
												<input type="email" name="email" class="form-control" placeholder="Email">
											</div>
										</div>

										

											

										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 hidden-xs hidden-sm"></div>

												<div class="col-sm-6">
                                                                                                    <button type="submit">
														<h4 class="text-center text-uppercase">Send</h4>
													</button>													
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-sm-8">
													
												</div>
												<div class="col-sm-2 hidden-xs hidden-sm"></div>
											</div>
										</div>


									</form>	
								</div>

								<div class="col-md-6">
									<div class="welcome-div">
										<h2>Welcome</h2>
										<p class="text-left col-sm-10 col-sm-offset-3">Please enter your email to reset your password.</p>
									</div>
								</div>
							</div>
						</div>
				      </div>
				    </div>

				  </div>
				</div>
                          
                          
                          
                          
                          <!--forget password-->
                            
                            

				<!-- Modal-1 -->
				<div id="myModal" class="modal fade" role="dialog">
				  <div class="modal-dialog">
				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">LogIn <br>
				        	<!--<span>Don't have an account?  <span>Register</span> here!</span>-->
				        </h4>
				      </div>
				      <div class="modal-body">
						<div class="login-form-div">
							<div class="row">
								<div class="col-md-6">
									<form style="text-align: center;" class="form-wrapper rightFrmContainer" id="frmLogin" accept-charset="utf-8" method="post" action="<?php echo $this->Url->build(["controller" => "Users","action" => "signin"]);?>">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-envelope"></i>
												</div>
												<input type="email" name="email" class="form-control" placeholder="Email">
											</div>
										</div>

										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-unlock-alt"></i>
												</div>
                                                                                            <input type="password" name="password" class="form-control" placeholder="Password">
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-sm-6">
											      <div class="checkbox">
											        <label>
											          <input type="checkbox"> Remember Me
											        </label>
											      </div>													
												</div>

												<div class="col-sm-6">
                                                                                                    <h5 class="text-right"><a href="#" onclick="forget()">Forgot password?</a></h5>
												</div>
											</div>
										</div>	

										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 hidden-xs hidden-sm"></div>

												<div class="col-sm-6">
                                                                                                    <button type="submit">
														<h4 class="text-center text-uppercase">login</h4>
													</button>													
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-sm-8">
													<div class="bottom-div">
														<ul class="nav">
															<li><h6>Or Login With:</h6></li>

															<li>
																<a href="#" class="no-padding flogin">
																	<img src="<?php echo $this->request->webroot;?>images/ff.png" alt="" class="img-responsive"></a>
															</li>

															<li>
																<a href="#" class="no-padding" onclick="google_login()">
																	<img src="<?php echo $this->request->webroot;?>images/tw.png" alt="" class="img-responsive"></a>
															</li>
														</ul>
													</div>
												</div>
												<div class="col-sm-2 hidden-xs hidden-sm"></div>
											</div>
										</div>


									</form>	
								</div>

								<div class="col-md-6">
									<div class="welcome-div">
										<h2>Welcome</h2>
										<p class="text-left col-sm-10 col-sm-offset-3">Please log in to continue to view our merchant's contact details.</p>
									</div>
								</div>
							</div>
						</div>
				      </div>
				    </div>

				  </div>
				</div><!-- Modal-1 -->

				<!-- Modal-2 -->
				<div id="myModal_1" class="modal fade" role="dialog">
				  <div class="modal-dialog">
				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">Register <br>
                                            <!--<span>Already have an account? <span>Login</span> here!</span>-->
				        </h4>
				      </div>
				      <div class="modal-body">
						<div class="login-form-div">
							<div class="row">
								<div class="col-md-6">
									<form action="<?php echo $this->Url->build(["controller" => "Users","action" => "signup"]);?>" method="post" id="frmRegister">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-font"></i>
												</div>
												<input type="text" name="full_name" class="form-control" placeholder="Full Name">
											</div>
										</div>

										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-user"></i>
												</div>
                                                                                            <select class="form-control" name="utype">
                                                                                                <option value="">Select User Type</option>
                                                                                                <option value="1">Consumer</option>
                                                                                                <option value="2">Merchant</option>
                                                                                                
                                                                                            </select>
											</div>
										</div>										

										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-envelope"></i>
												</div>
												<input type="email" class="form-control" placeholder="Email" name="email">
											</div>
										</div>

										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-lock"></i>
												</div>
												<input type="password" class="form-control" placeholder="Password" name="password">
											</div>
										</div>
                                                                            
                                                                            
                                                                            <div class="form-group">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-lock"></i>
												</div>
												<input type="password" autocomplete="off" class="form-control" placeholder="Confirm password" size="30" maxlength="100"  name="con_password">
											</div>
										</div>
                                                                            
                                                                            

										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-mobile"></i>
												</div>
												<input type="tel" class="form-control" placeholder="Contact Number" name="phone">
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 hidden-xs hidden-sm"></div>

												<div class="col-sm-6">
													<button type="submit">
														<h4 class="text-center text-uppercase">Register</h4>
													</button>													
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-sm-8">
													<div class="bottom-div">
														<ul class="nav">
															<li><h6>Or Login With:</h6></li>

															<li>
																<a href="#" class="no-padding flogin">
																	<img src="<?php echo $this->request->webroot;?>images/ff.png" alt="" class="img-responsive"></a>
															</li>

															<li>
																<a href="#" class="no-padding">
																	<img src="<?php echo $this->request->webroot;?>images/tw.png" alt="" class="img-responsive"></a>
															</li>
														</ul>
													</div>
												</div>
												<div class="col-sm-2 hidden-xs hidden-sm"></div>
											</div>
										</div>


									</form>	
								</div>

								<div class="col-md-6">
									<div class="welcome-div">
										<h2>Welcome</h2>
										<p class="text-left col-sm-10 col-sm-offset-3">Please register to continue using our services.</p>
									</div>
								</div>
							</div>
						</div>
				      </div>
				    </div>
				  </div>
				</div><!-- Modal-2 -->	
			</div>

			<div class="col-md-3">
				<div class="marchent-div">
					<h4 class="text-center">Become A Merchant</h4>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>

<header>
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<div class="logo-div">
					<a href="<?php echo $this->request->webroot;?>"><img src="<?php echo $this->request->webroot;?>images/logo.png" alt="" class="img-responsive center-block"></a>
				</div>				
			</div>

			<div class="col-md-7">
				<div class="menu-div">
			     <nav class="navbar navbar-default">
			      <div class="container-fluid">
			       <div class="navbar-header">
			        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collaspe-1" aria-expended="false">
			        	<span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			         </button> 
			         <h4 class="text-left text-capitalize hidden-md hidden-lg visible-xs visible-sm navbar-brand">
			         	<img src="<?php echo $this->request->webroot;?>images/sw.gif" alt="" class="img-responsive" width="34" height="34">
			         	Carvis
			         </h4>  
			       </div><!--navbar-header -->
			       
			       <div class="collapse navbar-collapse" id="bs-example-navbar-collaspe-1">
			        <ul class="nav navbar-nav">
			          <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'index'){?> class="active_new" <?php } ?> ><a href="<?php echo $this->request->webroot;?>">home</a></li>
			          <li <?php if ($this->request->params['controller'] == 'contents' && $this->request->params['action'] == 'index'){?> class="active_new" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "contents", "about-us"]); ?>">about us</a></li>
			          <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'services'){?> class="active_new" <?php } ?>>
			     <a href="<?php echo $this->request->webroot;?>users/services">services</a>
			          	
			          </li>
			          <li><a href="#">blog</a></li>
			          <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'reviews'){?> class="active_new" <?php } ?>><a href="<?php echo $this->request->webroot;?>users/reviews">reviews</a></li> 
			          <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'contactus'){?> class="active_new" <?php } ?>><a href="<?php echo $this->request->webroot;?>users/contactus">contact Us</a></li>            
			        </ul>
			       </div>
			      </div>
			     </nav>
			    </div>					
			</div>

			<div class="col-md-3">
				<div class="callus-div">
					<div class="cl_img-div">
						<img src="<?php echo $this->request->webroot;?>images/clk.png" alt="" class="img-responsive">
					</div>
					<h4>Call Us Now  <br>
						<a href="tel:<?php echo $SiteSettings['contact_phone'];?>"><?php echo $SiteSettings['contact_phone'];?></a>
					</h4>
				</div>
			</div>
		</div>
	</div>
</header>    
 <div id="AjaxMsgFrom"></div>       
<?php echo $this->Flash->render() ?>
<?php echo $this->Flash->render('success') ?>
<?php echo $this->Flash->render('error') ?>
<?php echo $this->fetch('content');?>
<?php echo $this->element('footer');?> 
        
 
    
    <script type="text/javascript">
    $( document ).ready( function () {
//alert('ok');
    $( "#frmRegister" ).validate({
        //alert('ok');
        rules: {
          'full_name': "required",
          
          'phone': "required",
          'utype': "required",
          'email': {
            required: true           
          },
                  
          'password': {
            required: true,
            minlength: 6
          },
          'con_password': {
            required: true,
            minlength: 6
          }
          
        },
        messages: {
          'utype': "Please choose user type", 
          'full_name': "Please enter your firstname",
          
          'email': "Please enter a valid email address", 
          'phone': "Please enter a valid mobileno.", 
                 
          'password': {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long"
          },
          'con_password': {
            required: "Please re-type  password",
            minlength: "Your password must be same as above password"
          }
        },
        
       
      });



$( "#frmLogin" ).validate({
        //alert('ok');
        rules: {
          
          'email': {
            required: true           
          },
                  
          'password': {
            required: true,
            minlength: 6
          }
         
        },
        messages: {
          
          'email': "Please enter a valid email address",
         
                 
          'password': {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long"
          }
          
        },
       
      });

    });


</script>
<script>
    
    function forget(){
        
        $('#myModal').modal('hide');
         $('#myModal_forget').modal('show');
        
        
    }
</script> 

<script>


 /*************** Sign Up Facebook ***********************/
            $.getScript('//connect.facebook.net/en_US/all.js', function(){
                FB.init({ appId: '550300998642584'});    
                $(".flogin").on("click", function(e){ 
                    
                    
                 e.preventDefault();    
                 FB.login(function(response){
                  // FB Login Failed //
                  if(!response || response.status !== 'connected') {
                   alert("Given account information are not authorised", "Facebook says");
                  }else{
                   // FB Login Successfull //
                   FB.api('/me',{fields: ['email','name']}, function(fbdata){ 
                   //alert(fbdata) ;    
                   //console.log(fbdata); 
                   var name1 = fbdata.name;
                   var name = name1.split(' ');
                    var fb_user_id = fbdata.id;      
                    var fb_first_name = name[0];
                    var fb_last_name = name[1];
                    var fb_email = fbdata.email;
                    var fb_username = fbdata.username;
                    //fb_usertype = 'S';
                   
                    //alert(fb_email);
                    
                    //console.log(fb_email);
                    
                    $.ajax({
                            url: 'users/fblogin',
                            dataType: 'json',
                            type: 'post',
                            data: {"data" : {"User" : {"email" : fb_email,  "full_name" : fb_first_name +' '+fb_last_name, "facebook_id" : fb_user_id, "is_active" : 1,"is_admin" : 0 }}},
                            success: function(data){ //console.log(data);alert('here ok');alert(data.status);
                                if(data.status)
                                {
                                  //alert(data.url);
                                    window.location.href = data.url;
                                    //$(this).closest('form').find("input[type=text]").val("");
                                    //showSuccess('Registration successfull.');
                                     //$('.email_error').hide();
                                    //$('.sign-up-btn').removeAttr('disabled');
                                }  
                                else
                                {
                                    window.location = '';
                                    //showError(data.message);
                                    //showError('Internal Error. Please try again later.');
                                   // $('.email_error').show();
                                    //$('.sign-up-btn').attr('disabled','disabled');
                                }
                            }
                    });
                   

                   })
                  }
                 }, {scope:"email"});
                 
                 
                  });


                  
               });
               
     
</script>


<script src="https://apis.google.com/js/client:plusone.js" type="text/javascript"></script>
<script>
    (function() {
                 var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                 po.src = 'https://apis.google.com/js/client:plusone.js?onload=googleonLoadCallback1';
                 var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
               })();
               
               function googleonLoadCallback1()
                {
                    gapi.client.setApiKey('AIzaSyAiHAU-y9TPqKPJsHCJWXISULhybhfhaag'); //set your API KEY
                    gapi.client.load('plus', 'v1',function(){});//Load Google + API
                }

                function google_login()
                {
                  var myParams = {
                    'clientid' : '828743319746-e7f5upfed8l72l2imkqjrinliop95sut.apps.googleusercontent.com', //You need to set client id
                    'cookiepolicy' : 'single_host_origin',
                    'callback' : 'googleloginCallback', //callback function
                    'approvalprompt':'force',
                    'scope' : 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read'
                  };
                  gapi.auth.signIn(myParams);
                }

                function googleloginCallback(result)
                {
                    if(result['status']['signed_in'])
                    {
                        console.log(result);
                       // alert("Login Success");
                        gapi.client.load('plus', 'v1', function() {

    var request = gapi.client.plus.people.get({
        'userId': 'me'
    });

    request.execute(function(resp) {
      //console.log(resp);
        var email = '';
                            if(resp['emails'])
                            {
                                for(i = 0; i < resp['emails'].length; i++)
                                {
                                    if(resp['emails'][i]['type'] == 'account')
                                    {
                                        email = resp['emails'][i]['value'];
                                    }
                                }
                            }
              var name1 = resp['displayName'];
               var name = name1.split(' ');      
                             var first_name = name[0];
                             var last_name = name[1];
               var google_id = resp['id'];
                              $.ajax({
                            url: '/team6/carvis/users/googlelogin',
                            dataType: 'json',
                            type: 'post',
                            data: {"data" : {"User" : {"email" : email,  "full_name" : first_name +' '+ last_name, "google_id" : google_id, "is_active" : 1,"is_admin" : 0}}},
                            success: function(data){ //console.log(data);alert(data.url);alert(data.status);
                                if(data.status)
                                {
                                    
                                    window.location.href = data.url;

                                    //$(this).closest('form').find("input[type=text]").val("");
                                    //showSuccess('Registration successfull.');
                                     //$('.email_error').hide();
                                    //$('.sign-up-btn').removeAttr('disabled');
                                }  
                                else
                                {
                                    window.location = '';
                                    //showError(data.message);
                                    //showError('Internal Error. Please try again later.');
                                   // $('.email_error').show();
                                    //$('.sign-up-btn').attr('disabled','disabled');
                                }
                            }
                    });
                           
    });
});
                       
                        
                    }  

                }
</script>