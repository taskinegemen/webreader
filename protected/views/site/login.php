
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
	<section>
			<!-- HEADER -->
			<header>
				<!-- NAV-BAR -->
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<div id="logo">
								<a href="index.html"><img src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/img/logo/logo.png" height="40" alt="logo name" /></a>
							</div>
						</div>
					</div>
				</div>
				<!--/NAV-BAR -->
			</header>
			<section id="login_bg" class="visible">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<div class="login-box">
								<?php $form=$this->beginWidget('CActiveForm', array(
									'id'=>'login-form',
									'enableClientValidation'=>true,
									'clientOptions'=>array(
										'validateOnSubmit'=>true,
									),
								)); ?>
								<h2 class="bigintro">Sign In</h2>
								<div class="divide-40"></div>
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
								  	
								  	
								  	<label for="ytLoginForm_rememberMe"><input id="ytLoginForm_rememberMe" type="checkbox"  class="uniform"  value="0" name="LoginForm[rememberMe]"><?php _e("Beni Hatırla"); ?></label>
								  </div>

								  <div class="form-group">
									<button type="submit" class="btn btn-danger"><?php _e("Giriş"); ?></button>
									
								  </div>
								</form>
								<!-- SOCIAL LOGIN -->
									<div class="divide-20"></div>
									<div class="center">
										<strong>Or login using your social account</strong>
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
						</div>
					</div>
				</div>
			</section>
	<!--/PAGE -->
	
	<!-- /JAVASCRIPTS -->