
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

		var username=$('#LoginForm_username').val();
		var password=$('#LoginForm_password').val();
		var kerbela=$(window).kerbelainit('http://kerbela.lindneo.com','http://kerbela.lindneo.com/api/authenticate/','http://kerbela.lindneo.com/api/ticketgrant/','<?php echo Yii::app()->request->baseUrl; ?>/kerberizedservice/authenticate',username,password,'kerbela','reader','6000');
		var response=kerbela.execute();
		console.log(response);
	});

  </script>
 <!-- login -->
<div class="login_page_container">    




        <div class="login_page_slogan_part_container">
        <div class="login_page_reader_logo"></div>
        <div class="login_page_slogan"></div>
        </div>






    <div class="login_box_container">
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
									<a href="#" class="btn btn-primary login_submit" id="loginButton"><?php _e("Giriş Yap"); ?></a>
									
								  </div>
								</form>
								<!-- SOCIAL LOGIN -->
									<div class="divide-20"></div>
									<div class="center">
										<strong>Veya bir sosyal ağ hesabınız ile giriş yapın</strong>
									</div>
									<div class="divide-20"></div>
									<div class="social-login center">
										<a class="btn btn-primary btn-lg">
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
							</div>
    
    
    
  
        
    
    
	<!--/PAGE -->
    
	
    
    </section>
    </div>
    
    



</div>