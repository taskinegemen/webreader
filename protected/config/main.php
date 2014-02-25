<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
require_once(dirname(__FILE__).'/../includes/localization.php');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Linden Reader',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.utilities.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'wb14@LnDnwbr',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>false,
		),
		
	),



	// application components
	'components'=>array(

		'messages' => array(
 			'language'=>'en_US',
            'class' => 'CGettextMessageSource',
            'basePath'=>'/var/www/squid-pacific/egemen/protected/locale/messages',
            'useMoFile' => TRUE,
    	),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'content/file/<id:\w+>/<filepath:[\d\w-\/\.]+>'=>'content/file',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\w+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=reader',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '12548442',
			'charset' => 'utf8',
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'Smtpmail'=>array(
            'class'=>'application.extension.smtpmail.PHPMailer',
            'Host'=>"tls://smtp.gmail.com",
            'Username'=>'edubox@linden-tech.com',
            'Password'=>'12548442',
            'Mailer'=>'smtp',
            'Port'=>465,
            'SMTPAuth'=>true, 
            //'ssl'=>'tls'
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		'availableLanguages' => array(
     		'tr_TR' => 'Türkçe',
     		'en_US' => 'English'
     		),
		// this is used in contact page
		'adminEmail'=>'pacific@linden-tech.com',
	),
);
