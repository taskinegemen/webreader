<?php

class SiteController extends Controller
{
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'transparent'=>true,
				'foreColor'=>'16777215',
				'backColor'=>'000000',
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionService(){
		$auth=Yii::app()->request->getPost('auth',0);
		$http_service_ticket=Yii::app()->request->getPost('http_service_ticket',0);
		$kerberized=new KerberizedServer($auth,$http_service_ticket);
		$myarray=$kerberized->ticketValidation();

		error_log("ticket validation:".serialize($myarray));	
		$kerberized->authenticate();			
	}

	private function authenticate()
	{
		$auth=Yii::app()->request->getPost('auth',0);
		$http_service_ticket=Yii::app()->request->getPost('http_service_ticket',0);
		$type=Yii::app()->request->getPost('type','android');
		$kerberized=new KerberizedServer($auth,$http_service_ticket,KerbelaEncryptionFactory::create($type));
		$myarray=$kerberized->ticketValidation();
		if ($kerberized->getUserId()) {
			return $kerberized->getUserId() != "undefined" ? $kerberized->getUserId() : false ;
		}
		else
			return false;
	} 

	public function actionAuthenticate()
	{
		$auth=Yii::app()->request->getPost('auth',0);
		$http_service_ticket=Yii::app()->request->getPost('http_service_ticket',0);
		$type=Yii::app()->request->getPost('type','android');
		// error_log("auth:".$auth);
		// error_log("http_service_ticket:".$http_service_ticket);
		$kerberized=new KerberizedServer($auth,$http_service_ticket,KerbelaEncryptionFactory::create($type));
		

		 $myarray=$kerberized->ticketValidation();
		// error_log("user_id:".$kerberized->getUserId());
		$kerberized->authenticate();
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//$this->render('index');
		
		$this->redirect('site/library');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the Library page
	 */
	public function actionLibrary(){
		
		error_log($this->authenticate());
		if($this->authenticate()){
			$this->render('library');
		}
		else
		{
			$this->redirect('login');
		}
	}

	public function actionForgetPassword($id=null)
	{
		if ($id) {
			$url=Yii::app()->params['kerbela_host'].'/site/checkVerifyCode';
			$fields=array('id'=>$id);
			$ch = curl_init( $url );
			curl_setopt( $ch, CURLOPT_POST, 1);
			curl_setopt( $ch, CURLOPT_POSTFIELDS, $fields);
			curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt( $ch, CURLOPT_HEADER, 0);
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
			$response = curl_exec( $ch );
			$ErrorMessage="";
			$SuccessMessage="";
			if ($response) {
				if (isset($_POST['Reset'])) {
					$attributes=$_POST['Reset'];
					$attributes['code']=$id;
					if ($attributes['password']==$attributes['password2']) {
						$url2=Yii::app()->params['kerbela_host'].'/site/updatePassword';
						$ch = curl_init( $url2 );
						curl_setopt( $ch, CURLOPT_POST, 1);
						curl_setopt( $ch, CURLOPT_POSTFIELDS, $attributes);
						curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
						curl_setopt( $ch, CURLOPT_HEADER, 0);
						curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
						$response = curl_exec( $ch );
						if ($response) {
							$SuccessMessage="Şifreniz değiştirme başarılı. Yeni şifreniz ile giriş yapabilirsiniz.";
						}
						else
						{
							$ErrorMessage="Şifreniz değiştirme başarılı değil. Lütfen tekrar deneyin.";
						}
					}

				}
			}
			else
			{
				$ErrorMessage="İstek bulunamadı.";
			}
 			$this->render('password_reset',array('ErrorMessage'=>$ErrorMessage,'SuccessMessage'=>$SuccessMessage));
		}
	}

	public function actionRunMobileLogin($user_id,$password)
	{
		$this->renderPartial('mobile_login',array('password'=>$password,'user_id'=>$user_id));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;
		$SignUp=new SignUpForm;

		//error messages
		$mobileSignupError="";
		$webSignupError="";
		$resetPasswordFeed=array();

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		// 
		if(isset($_POST['SignUpForm']))
		{
			$SignUp->attributes=$_POST['SignUpForm'];
			if ($SignUp->validate()) {
				$url=Yii::app()->params['kerbela_host'].'/site/signUp';
				$ch = curl_init( $url );
				curl_setopt( $ch, CURLOPT_POST, 1);
				curl_setopt( $ch, CURLOPT_POSTFIELDS, $_POST['SignUpForm']);
				curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt( $ch, CURLOPT_HEADER, 0);
				curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
				$response = curl_exec( $ch );
				$res=json_decode($response);
				
				$detect = new Mobile_Detect;
				if ($res->result) {
					$verifyEmailId=base64_encode($_POST['SignUpForm']['email']);
					$emailMeta=new UserMeta;
					$emailMeta->user_id=$_POST['SignUpForm']['email'];
					$emailMeta->meta_key='emailVerify';
					$emailMeta->meta_value=$verifyEmailId;
					$emailMeta->created=date('Y-n-d g:i:s',time());
					$emailMeta->save();

					$mail=Yii::app()->Smtpmail;
			        $mail->SetFrom(Yii::app()->params['noreplyEmail'], "OKUTUS");

			        $mail->Subject= "E-posta doğrulama";
			        $mail->AddAddress($_POST['SignUpForm']['email'], "");
		        	
		        	$link=Yii::app()->getBaseUrl(true);
					$link .='/site/verifyEmail/';
					$link .= $verifyEmailId;
					
					$message="Okutusa hoşgeldin. E-postanızı doğrulamak için <a href='".$link."'>buraya tıklayınız</a>.<br>".$link;
			        $mail->MsgHTML($message);
			        if($mail->Send()){
			        	error_log("mail sent");
			        }else{
			        	error_log("mail CAN'T sent");
			        	error_log($link);
			        	error_log(json_encode($mail));
			        }

					if ( $detect->isMobile() || $detect->isTablet()){
						$this->redirect(Yii::app()->request->baseUrl.'/site/runMobileLogin?user_id='.$res->user_id.'&password='.$res->password);
					}
					else
					{
						//$this->redirect(Yii::app()->request->baseUrl.'/site/login');
						$webSignupSuccess="Kayıt başarılı. Sisteme email adresi ve şifrenizle giriş yapabilirsiniz";
					}
				}
				else
				{
					if ( $detect->isMobile() || $detect->isTablet()){
						$mobileSignupError=$res->message;
					}
					else
					{
						$webSignupError=$res->message;
					}
				}
			}else{
				$webSignupError="Lütfen kayıt bilgilerini eksiksiz girip tekrar deneyiniz.";
			}
		}

		if (isset($_GET['Reset'])) {
			$email=$_GET['Reset']['email'];
			$url=Yii::app()->params['kerbela_host'].'/site/resetPassword';
			$ch = curl_init( $url );
			curl_setopt( $ch, CURLOPT_POST, 1);
			curl_setopt( $ch, CURLOPT_POSTFIELDS, $_GET['Reset']);
			curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt( $ch, CURLOPT_HEADER, 0);
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
			$response = curl_exec( $ch );
			$resetPasswordFeed=json_decode($response,true);
		}

		$this->render('login',array('model'=>$model,'SignUp'=>$SignUp,'webSignupSuccess'=>$webSignupSuccess, 'mobileSignupError'=>$mobileSignupError,'webSignupError'=>$webSignupError,'resetPasswordFeed'=>$resetPasswordFeed));
	}

	public function actionVerifyEmail($id)
	{
		$this->layout = '//layouts/column1';
		$result="1";
		$meta=UserMeta::model()->find('meta_key=:meta_key AND meta_value=:meta_value',array('meta_key'=>'emailVerify','meta_value'=>$id));
		if ($meta) {
			$meta->meta_value="verified";
			if ($meta->save()) {
				$result="0";
			}else{
				$result="1";
			}
		}

		$this->render('verifyEmail',array(
				'result'=>$result
			));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */

	public function actionMyprofile()
	{
		$this->render('myprofile');
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
