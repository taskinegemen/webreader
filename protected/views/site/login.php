
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
	$(document).ready(function(){
		$('#login-form').submit(function(e) {
				e.preventDefault();
		  		window.setTimeout(function(){login();},100);
	  			$.blockUI({ message: '<h1>Please wait just a little...</h1>' });
		  		setTimeout($.unblockUI, 10000); 
	  			return false;
	  		});
		
		
	});
  	
  	function login(){
  		

  		var username=$('#LoginForm_username').val();
		var password=$('#LoginForm_password').val();
		//console.log(password);																																		
		var kerbela=$(window).kerbelainit('http://kerbela.lindneo.com','http://kerbela.lindneo.com/api/authenticate/','http://kerbela.lindneo.com/api/ticketgrant/','<?php echo Yii::app()->request->baseUrl; ?>/kerberizedservice/authenticate',username,password,'kerbela','reader','6000');
		var response=kerbela.execute();

		var kerbela_catalog=$(window).kerbelainit('http://kerbela.lindneo.com','http://kerbela.lindneo.com/api/authenticate/','http://kerbela.lindneo.com/api/ticketgrant/','<?php echo Yii::app()->params['catalog_host'];?>/kerberizedservice/authenticate',username,password,'kerbela','catalog','6000');
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
			$.blockUI({ message: '<h1>Please check your user name and password!</h1>' });
			setTimeout($.unblockUI, 4000); 
		}
		console.log(response);
  	}
  </script>
 <!-- login -->
 

<div class="login_page_container">    

<div class="login_linden_information">
<a href="http://www.linden-tech.com/" target="_blank">
<div class="login_page_ribbon">
<div class="ribbon_rectangle"></div>
<div class="ribbon_arrow_down"></div>
</div>
<div class="login_linden_information_text">Seviye Dijital <font style="color:#FFC">Linden Dijital Yayıncılık A.Ş.</font> Tarafından Hazırlanmıştır. <br /> Bizi daha yakından tanımak için logomuza tıklayın.</div>
</a>
</div>
<!--- END OF login_linden_information ----->


<video autoplay loop poster="../../../css/branding/seviye/seviye.png" id="bgvid">
<source src="../css/branding/seviye/seviye.webm" type="video/webm">
<source src="../css/branding/seviye/seviye.mp4" type="video/mp4">
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
							<div class="login-box" style="margin-top:100px;">
								<?php $form=$this->beginWidget('CActiveForm', array(
									'id'=>'login-form',
									/*'enableClientValidation'=>true,
									'clientOptions'=>array(
										'validateOnSubmit'=>true,
									)
									*/
								)); ?>
								
								<form >								
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
								  	
								  	
								  	<!-- <div class="form-group">
									  <label for="ytLoginForm_rememberMe"><div class="checker hover" id="uniform-ytLoginForm_rememberMe"><span class=""><input id="ytLoginForm_rememberMe" type="checkbox" class="uniform" value="0" name="LoginForm[rememberMe]"></span></div></label><?php _e("Beni Hatırla"); ?></div>
								    </div> -->

								  <div class="form-group">
									 <input type='submit' class="btn  login_submit brand_color_for_buttons" id="loginButton" value='<?php _e("Giriş Yap"); ?>' />									
								  </div>

								</form>
								<!-- SOCIAL LOGIN -->
									<div class="divide-20"></div>
                                     <div class="register_link">
										Henüz bir hesabınız yok mu? <a href="#" onclick="swapScreen('register_bg');return false;">Kayıt olun!</a>
									 <div class="login-helpers">
										<a href="#" onclick="swapScreen('forgot_bg');return false;">Şifremi Unuttum!</a> <br>
									</div>
									</div>
									

									</div><!-- 
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

									</div>-->

									
								<?php $this->endWidget(); ?>
							</div>
						</section>
                        
                        
                        
                        
                       
                         
                        
                        
                        
                        <!-- FORGOT PASSWORD -->
						<section id="forgot_bg" style="margin-top:180px;">
							<div class="container">
								<div class="row">
									<div class="">
										<div class="login-box">
											<form  id="forgetForm">
											  <div class="form-group">
												<label for="exampleInputEmail1">E-Mail Adresinizi Girin.</label>
												<i class="fa fa-envelope"></i>
												<input name="Reset[email]" id="Reset_email" type="text">
											  </div>
											  <div>
												<button type="submit" class="btn btn-info">Şifremi sıfırlamak için mail gönder</button>
											  </div>
											</form>
											<div class="login-helpers">
												<a href="#" onclick="swapScreen('login_bg');return false;">Giriş Sayfasına Dön</a> <br>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
						<!-- FORGOT PASSWORD -->
                        






						<section id="register_bg">
							<div class="container">
                            <div class="row">
                            <div class="login-box">
								<?php $RegisterForm=$this->beginWidget('CActiveForm', array(
									'id'=>'register-form',
									// 'enableClientValidation'=>true,
									 // 'clientOptions'=>array(
									 // 	'validateOnSubmit'=>true,
									 // ),
								)); ?>
								<h3 class="bigintro">Kayıt Ol</h3>
									<form  id="register" name="register">								
									  <div class="form-group">
										<label for=""><?php _e("İsim"); ?> *</label>
										<i class="fa fa-font"></i>
										<?php echo $RegisterForm->textField($SignUp,'name'); ?>
									  </div>
	                                  
	                                  <div class="form-group">
										<label for=""><?php _e("Soyisim"); ?> *</label>
										<i class="fa fa-user"></i>
										<?php echo $RegisterForm->textField($SignUp,'surname'); ?>
									  </div>
	                                  
	                                  <div class="form-group">
										<label for=""><?php _e("Email"); ?> *</label>
										<i class="fa fa-envelope"></i>
										<?php echo $RegisterForm->textField($SignUp,'email'); ?>
									  </div>

	                                  
	                                  <div class="form-group">
										<label for=""><?php _e("Şifre"); ?> *</label>
										<i class="fa fa-lock"></i>
										<?php echo $RegisterForm->passwordField($SignUp,'password'); ?>
									  </div>
									  
									  <div class="form-group"> 
										<label for=""><?php _e("Şifreyi Tekrarla"); ?> *</label>
										<i class="fa fa-check-square-o"></i>
										<?php echo $RegisterForm->passwordField($SignUp,'passwordR'); ?>
									  </div>
									  <?php if(CCaptcha::checkRequirements()): ?>

										<?php endif; ?>
									  	<?php echo CHtml::submitButton('Submit'); ?>
									</form>
									<?php $this->endWidget(); ?>
								
                                	<div class="login-helpers">
										<a href="#" onclick="swapScreen('login_bg');return false;">&lsaquo; Giriş Sayfasına Dön</a> <br>
									</div>
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
<!-- END OF LOGIN_PAGE_CONTAINER -->









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

