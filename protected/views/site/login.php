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
<?php if ($webSignupError||$webSignupSuccess){ ?>
	<script type="text/javascript">
		$(document).ready(function(){
			swapScreen('register_bg');
		});
	</script>
<?php } ?>
  <script type="text/javascript">
	$(document).ready(function(){

		var resetPasswordFeed = "<?php echo $resetPasswordFeed['message'] ?>";
		if (resetPasswordFeed) {
			swapScreen('forgot_bg');
		};


		sessionStorage.clear();
		$('#login-form, #login-form-responsive').submit(function(e) {
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
			console.log("submitttttt");

			var ticket=kerbela.getTicket();
			var auth=kerbela.getAuthTicket();
			var HTTP_service_ticket=ticket.HTTP_service_ticket;
			var form='<form method="post" name="kerbela_form" action="<?php echo Yii::app()->request->baseUrl; ?>/site/library" style="display:none"><input type="hidden" name="auth" value="'+auth+'"><input type="hidden" name="http_service_ticket" value="'+HTTP_service_ticket+'"><input type="hidden" name="type" value="web"></form>';
			$('body').append(form);
			//document.body.appendChild(form);
			//$(form).submit();
			document.getElementsByName('kerbela_form')[0].submit();
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
<?php $detect = new Mobile_Detect;

//geçici olarak kaldırıldı tasarıma göre tekrar eklenebilme durumu var

if (0):
//if ( $detect->isMobile() || $detect->isTablet()):
?>
<section id="register_bg_mobil">
	<div class="container">
    <div class="row">
    	<?php if ($mobileSignupError) {
    		echo '<h3>'.$mobileSignupError.'</h3>';
    	}?>
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
			  <div class="form-group">
					<label for=""><?php _e("Güvenlik Doğrulama Kodu"); ?> *</label><br>
					<?php $this->widget('CCaptcha',array('showRefreshButton'=>true,'buttonOptions'=>array('id'=>'refreshCaptcha'))); ?><br><br>
					<i class="fa fa-lock"></i>
					<?php echo $RegisterForm->textField($SignUp,'verify'); ?>
					<div>Yukarıdaki resimde görünen karakterleri girin.
					<br/>Küçük-Büyük harf duyarlıdır.</div>
				</div>
				<?php endif; ?>
			  	<?php echo CHtml::submitButton('Kayıt Ol'); ?>
			</form>
			<?php $this->endWidget(); ?>
        </div>
        
    </div>
    </div>
</section>
<?php
else:
  
?>
 

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
<!--- END OF login_linden_information -->


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
									

									</div>
								<?php $this->endWidget(); ?>
							</div>
						</section>
                         
                        
                        
                        
                        <!-- FORGOT PASSWORD -->
						<section id="forgot_bg" style="margin-top:180px;">
							<div class="container">
								<div class="row">
									<div class="">
										<div class="login-box">
										<?php 
											if (!empty($resetPasswordFeed)) {
												if ($resetPasswordFeed['result']==1) {
													?>
													<div class="alert alert-success">
														<h4><?php echo $resetPasswordFeed['message'] ?></h4>
													</div>
													<?php
												}else
												{ ?>

													<div class="alert alert-danger">
														<h4><?php echo $resetPasswordFeed['message'] ?></h4>
													</div>

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

												<?php }
											}
											else{?>
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
											<?php }
										?>


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

								<?php if ($webSignupError) { ?>
						    		<div class="alert alert-danger">
						    			<h3><?php echo $webSignupError; ?></h3>
						    		</div>
						    	<?php }?>
						    	<?php if ($webSignupSuccess) { ?>
						    		<div class="alert alert-success">
						    			<h3><?php echo $webSignupSuccess; ?></h3>
						    		</div>
						    	<?php }?>
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
									  <div class="form-group">
 											<label for=""><?php _e("Güvenlik Doğrulama Kodu"); ?> *</label><br>
 											<?php $this->widget('CCaptcha',array('showRefreshButton'=>true, 'buttonOptions'=>array('id'=>'refreshCaptcha'))); ?><br><br>
 											<i class="fa fa-lock"></i>
 											<?php echo $RegisterForm->textField($SignUp,'verify'); ?>
 											<div>Yukarıdaki resimde görünen karakterleri girin.
 											<br/>Küçük-Büyük harf duyarlıdır.</div>
 										</div>

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




<!-- RESPONSIVE_LOGIN_PAGE_CONTAINER -->

    <div class="responsive_login_page_container">
        <div class="responsive_login_page_logo"></div>
        <div class="responsive_login_buttons">
            <a href="#" onclick="swapScreen('register');return false;"><button class="btn pull-left brand_color_for_buttons">Kayıt Ol!</button></a>
            <a href="#" onclick="swapScreen('login');return false;"><button class="btn pull-right btn-default">Giriş Yap <i class="fa fa-angle-right"></i></button></a>
        </div>
			<section id="login" class="responsive_page_forms">
            	<div class="responsive_page_bar">
                	<a href="#" onclick="swapScreen('');return false;"><div class="responsive_page_bar_logo"></div></a>
                </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <div class="login-box-plain">
                                    <form role="form" id="login-form-responsive">
                                      <div class="form-group">
                                        <i class="fa fa-envelope"></i>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="E-Mail Adresiniz" >
                                      </div>
                                      
                                      <hr />
                                      
                                      <div class="form-group"> 
                                        <i class="fa fa-lock"></i>
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Şifreniz" >
                                      </div>
                                      <input type="submit" class="btn brand_color_for_buttons" value='Giriş Yap' />
                                      
                                    </form>
                                    </div>
                                    <div class="login-helpers">
                                        <a href="#" onclick="swapScreen('register');return false;">Kayıt Ol</a> <br><br>
                                        <a href="#" onclick="swapScreen('forgot');return false;">Şifremi Unuttum!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
			</section>
			<!--/ RESPONSIVE LOGIN -->
            
			<!-- RESPONSIVE REGISTER -->
			<section id="register" class="responsive_page_forms">
            	<div class="responsive_page_bar">
                	<a href="#" onclick="swapScreen('');return false;"><div class="responsive_page_bar_logo"></div></a>
                </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <div class="login-box-plain">
                                    <form role="form">
                                      <div class="form-group">
                                        <i class="fa fa-font"></i>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="İsminiz" >
                                      </div>
                                      
                                      <hr />
                                      
                                      <div class="form-group">
                                        <i class="fa fa-user"></i>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Soyisminiz" >
                                      </div>
                                      
                                      <hr />
                                      
                                      <div class="form-group">
                                        <i class="fa fa-envelope"></i>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="E-Mail Adresiniz" >
                                      </div>
                                      
                                      <hr />
                                      
                                      <div class="form-group">
                                        <i class="fa fa-lock"></i>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Şifreniz" >
                                      </div>
                                      
                                      <hr />
                                      
                                      <div class="form-group"> 
                                        <i class="fa fa-check-square-o"></i>
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Şifrenizi Tekrar Girin" >
                                      </div>
                                      </form>
                                      </div>
                                      <button type="submit" class="btn brand_color_for_buttons">Kayıt Ol</button>
                                    <div class="login-helpers">
                                        <a href="#" onclick="swapScreen('login');return false;">Giriş Yap</a> <br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
			</section>
			<!--/ RESPONSIVE REGISTER -->
            
			<!-- RESPONSIVE FORGOT PASSWORD -->
			<section id="forgot" class="responsive_page_forms">
            	<div class="responsive_page_bar">
                	<a href="#" onclick="swapScreen('');return false;"><div class="responsive_page_bar_logo"></div></a>
                </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <div class="login-box-plain">
                                    <form role="form">
                                      <div class="form-group">
                                        <i class="fa fa-envelope"></i>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="E-Mail Adresinizi Girin" >
                                      </div>
                                    </form>
                                    </div>
                                      <button type="submit" class="btn brand_color_for_buttons">Şifremi sıfırlamak için mail gönder</button>
                                    <div class="login-helpers">
                                        <a href="#" onclick="swapScreen('login');return false;">Giriş Yap</a> <br><br>
                                        <a href="#" onclick="swapScreen('register');return false;">Kayıt Ol</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
			</section>
			<!-- RESPONSIVE FORGOT PASSWORD -->

	</div>
<!-- END OF RESPONSIVE_LOGIN_PAGE_CONTAINER -->
<?php endif; ?>

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
