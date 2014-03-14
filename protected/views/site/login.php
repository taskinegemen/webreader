
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
		console.log(password);
		var kerbela=$(window).kerbelainit('http://kerbela.lindneo.com','http://kerbela.lindneo.com/api/authenticate/','http://kerbela.lindneo.com/api/ticketgrant/','<?php echo Yii::app()->request->baseUrl; ?>/kerberizedservice/authenticate',username,password,'kerbela','reader','6000');
		var response=kerbela.execute();
		if (response.status) {
			var ticket=kerbela.getTicket();
			var auth=kerbela.getAuthTicket();
			var HTTP_service_ticket=ticket.HTTP_service_ticket;
			var form='<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/site/library" style="display:none"><input type="hidden" name="auth" value="'+auth+'"><input type="hidden" name="http_service_ticket" value="'+HTTP_service_ticket+'"><input type="hidden" name="type" value="web"></form>';
			$('body').append(form);
			$(form).submit();
		};
		console.log(response);
	});

  </script>
 <!-- login -->
 
 
 

 
 
 
 
 
<div class="login_page_container">    


<video autoplay loop poster="../../../js/login_back.png" id="bgvid">
<source src="../js/back.webm" type="video/webm">
<source src="../js/back.mp4" type="video/mp4">
</video>

        

<div class="col-lg-12">
<div class="row">
<div class="col-md-1"></div>


	<div class="col-md-7">

        	<div class="login_page_reader_logo"></div>
        	<div class="login_page_slogan"></div>

	</div>


<div class="col-md-3">

						
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
										Henüz bir hesabınız yok mu? <a href="#">Kayıt olun</a>
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
						


</div>





<div class="col-md-1"></div>


</div>
</div>



    
    
    
    
  
        
    
    
	<!--/PAGE -->
    
	
    
    </section>
    </div>
    
    



</div>