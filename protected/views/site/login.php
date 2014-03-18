
<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
// $this->breadcrumbs=array(
// 	'Login',
// );
?>
<!-- PAGE -->
<!-- login -->
  <script type="text/javascript">

  	$(document).on("click","#loginButton",function(e){
  		$.blockUI({ message: '<h1>Please wait just a little...</h1>' });
  		setTimeout($.unblockUI, 10000); 
  		window.setTimeout(function(){login();},100);
		
	});
  	function login(){
  		var username=$('#LoginForm_username').val();
		var password=$('#LoginForm_password').val();
		console.log(password);																																		
		var kerbela=$(window).kerbelainit('http://kerbela.lindneo.com','http://kerbela.lindneo.com/api/authenticate/','http://kerbela.lindneo.com/api/ticketgrant/','<?php echo Yii::app()->request->baseUrl; ?>/kerberizedservice/authenticate',username,password,'kerbela','reader','6000');
		var response=kerbela.execute();

		var kerbela_catalog=$(window).kerbelainit('http://kerbela.lindneo.com','http://kerbela.lindneo.com/api/authenticate/','http://kerbela.lindneo.com/api/ticketgrant/','http://catalog.lindneo.com/kerberizedservice/authenticate',username,password,'kerbela','catalog','6000');
		var response_catalog=kerbela_catalog.execute();
		
		var kerbela_koala=$(window).kerbelainit('http://kerbela.lindneo.com','http://kerbela.lindneo.com/api/authenticate/','http://kerbela.lindneo.com/api/ticketgrant/','http://koala.lindneo.com/kerberizedservice/authenticate',username,password,'kerbela','koala','6000');
		var response_koala=kerbela_koala.execute();

		var kerbela_panda=$(window).kerbelainit('http://kerbela.lindneo.com','http://kerbela.lindneo.com/api/authenticate/','http://kerbela.lindneo.com/api/ticketgrant/','http://panda.lindneo.com/kerberizedservice/authenticate',username,password,'kerbela','panda','6000');
		var response_panda=kerbela_panda.execute();
		if (response.status && response_catalog.status && response_panda.status && response_panda.status) {


			var ticket=kerbela.getTicket();
			var auth=kerbela.getAuthTicket();
			var HTTP_service_ticket=ticket.HTTP_service_ticket;
			var form='<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/site/library" style="display:none"><input type="hidden" name="auth" value="'+auth+'"><input type="hidden" name="http_service_ticket" value="'+HTTP_service_ticket+'"><input type="hidden" name="type" value="web"></form>';
			$('body').append(form);
			$(form).submit();
		}
		else
		{
			$.unblockUI();
		}
		console.log(response);
  	}
  </script>
 <!-- login -->
 
 
 

 
 
 
 
<div id="splashscreen">
merhaba
</div> 
<div class="login_page_container">    


<video autoplay loop poster="../../../js/login_back.png" id="bgvid">
<source src="../js/back.webm" type="video/webm">
<source src="../js/back.mp4" type="video/mp4">
</video>

   <div class="login_overlay"></div>     

<div class="col-lg-12">
<div class="row">
<div class="col-md-1"></div>


	<div class="col-md-7" style="height:709px;">
        <div class="login_page_reader_logo"></div>
        <div class="login_page_slogan"></div>
	</div>


<div class="col-md-3">

						<section id="login_bg" class="visible">
							<div class="login-box">
								<?php $form=$this->beginWidget('CActiveForm', array(
									'id'=>'login-form',
									'enableClientValidation'=>true,
									'clientOptions'=>array(
										'validateOnSubmit'=>true,
									),
								)); ?>
								<h3 class="bigintro">Okutus Reader'a Giriş Yap</h3>
								
								<form role="form">								
								  <div class="form-group">
									<label for="exampleInputEmail1"><?php echo $form->labelEx($model,'username'); ?></label>
									<i class="fa fa-envelope"></i>
									<?php echo $form->textField($model,'username'); ?>
								  </div>
								  
								  <div class="form-group"> 
									<label for="exampleInputPassword1"><?php echo $form->labelEx($model,'password'); ?></label>
									<i class="fa fa-lock"></i>
									<?php echo $form->passwordField($model,'password'); ?>								
								  </div>
								  
								  <div class="form-group">
								  	
								  	
								  	<div class="form-group">
									  <label for="ytLoginForm_rememberMe"><div class="checker hover" id="uniform-ytLoginForm_rememberMe"><span class=""><input id="ytLoginForm_rememberMe" type="checkbox" class="uniform" value="0" name="LoginForm[rememberMe]"></span></div></label><?php _e("Beni Hatırla"); ?></div>
								    </div>

								  <div class="form-group">
									<a href="#" class="btn btn-primary login_submit brand_color_for_buttons" id="loginButton"><?php _e("Giriş Yap"); ?></a>									
								  </div>
								</form>
								<!-- SOCIAL LOGIN -->
									<div class="divide-20"></div>
                                    <div class="register_link">
										Henüz bir hesabınız yok mu? <a href="#" onclick="swapScreen('register_bg');return false;">Kayıt olun!</a>
									</div>
									<div class="center">
										Veya bir sosyal ağ hesabınız ile giriş yapın
									</div>
									<div class="divide-20"></div>
									<div class="social-login center">
										<a class="btn btn-primary-2 btn-lg">
											<i class="fa fa-facebook"></i>
										</a>
										<a class="btn btn-info btn-lg">
											<i class="fa fa-twitter"></i>
										</a>
										<a class="btn btn-danger btn-lg">
											<i class="fa fa-google-plus"></i>
										</a>
									</div>
									<!-- /SOCIAL LOGIN -->
									<!-- <div class="login-helpers">
										<a href="#" onclick="swapScreen('forgot_bg');return false;">Forgot Password?</a> <br>
										Don't have an account with us? <a href="#" onclick="swapScreen('register_bg');return false;">Register
											now!</a>
									</div> -->
								<?php $this->endWidget(); ?>
						</section>
                        
                        
                        
                        
                        <section id="register_bg">
							<div class="container">
                            <div class="row">
							
                            
                            
                            
                            
                            
                            
                            <div class="login-box">
								<?php $form=$this->beginWidget('CActiveForm', array(
									'id'=>'login-form',
									'enableClientValidation'=>true,
									'clientOptions'=>array(
										'validateOnSubmit'=>true,
									),
								)); ?>
								<h3 class="bigintro">Kayıt Ol</h3>
								
								<form role="form">								
								  <div class="form-group">
									<label for="exampleInputEmail1"><?php echo $form->labelEx($model,'username'); ?></label>
									<i class="fa fa-font"></i>
									<?php echo $form->textField($model,'username'); ?>
								  </div>
                                  
                                  <div class="form-group">
									<label for="exampleInputEmail1"><?php echo $form->labelEx($model,'username'); ?></label>
									<i class="fa fa-user"></i>
									<?php echo $form->textField($model,'username'); ?>
								  </div>
                                  
                                  <div class="form-group">
									<label for="exampleInputEmail1"><?php echo $form->labelEx($model,'username'); ?></label>
									<i class="fa fa-envelope"></i>
									<?php echo $form->textField($model,'username'); ?>
								  </div>
                                  
                                  <div class="form-group">
									<label for="exampleInputEmail1"><?php echo $form->labelEx($model,'username'); ?></label>
									<i class="fa fa-lock"></i>
									<?php echo $form->textField($model,'username'); ?>
								  </div>
								  
								  <div class="form-group"> 
									<label for="exampleInputPassword2"><?php _e("Şifreyi Tekrarla"); ?></label>
									<i class="fa fa-check-square-o"></i>
									<input size="60" maxlength="255" name="User[passwordR]" id="User_password_r" type="password">
								  </div>
								  
								</form>
                                
                                
                                
                                
                                
                                
                                  <div>
								  	<br>
									<!-- <label class="checkbox"> <input type="checkbox" class="uniform" value=""> I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label> -->
									<button type="submit" class="btn btn-success"><?php _e("Kaydet");?></button>
								  </div>
                                
                                
                                
                                
                                
                                
                                
								<!-- SOCIAL LOGIN 
									<div class="divide-20"></div>
									<div class="center">
										Veya bir sosyal ağ hesabınız ile kayıt olun
									</div>
									<div class="divide-20"></div>
									<div class="social-login center">
										<a class="btn btn-primary-2 btn-lg">
											<i class="fa fa-facebook"></i>
										</a>
										<a class="btn btn-info btn-lg">
											<i class="fa fa-twitter"></i>
										</a>
										<a class="btn btn-danger btn-lg">
											<i class="fa fa-google-plus"></i>
										</a>
									</div>
									SOCIAL LOGIN -->
									<!-- <div class="login-helpers">
										<a href="#" onclick="swapScreen('forgot_bg');return false;">Forgot Password?</a> <br>
										Don't have an account with us? <a href="#" onclick="swapScreen('register_bg');return false;">Register
											now!</a>
									</div> -->
								<?php $this->endWidget(); ?>
                            
                            
                            <div class="login-helpers">
									<a href="#" onclick="swapScreen('login_bg');return false;">&lsaquo; Giriş Sayfasına Dön</a> <br>
								</div>
                            
                            
                            
                            
                            </div>
                            </div>
						</section>
                        
                        
                        
                        
                        
                        

							</div>
				

						








<div class="col-md-1"></div>


</div>
</div>

<!--/PAGE -->
    
	
    
    
    </div>
    
    


</div>



		


<div class="login_contact">
<p>OKUTUS Reader Linden Dijital Yayıncılık A.Ş. Tarafından Hazırlanmıştır.</p>
<p>Bizi daha yakından tanıyın. <a target="_blank" href="http://www.linden-tech.com/">www.linden-tech.com</a></p>
</div>









	<script>
		jQuery(document).ready(function() {		
			App.setPage("login_bg");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<script type="text/javascript">
		function swapScreen(id) {
			jQuery('.visible').removeClass('visible animated fadeInUp');
			jQuery('#'+id).addClass('visible animated fadeInUp');
		}
	</script>
	<!-- /JAVASCRIPTS -->

