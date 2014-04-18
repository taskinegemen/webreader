<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
require_once(dirname(__FILE__).'/../includes/localization.php');
$db_config=array(
					"tigerfish"=>array(
										'connectionString' => 'mysql:host=pufferfish.private.services.okutus.com;dbname=reader',
										'emulatePrepare' => true,
										'username' => 'tigerfish',
										'password' => '6MT3WFGnxqw7aux6',
										'charset' => 'utf8'
									),
					"lindneo"=>array(
										'connectionString' => 'mysql:host=lindneo.com;dbname=reader',
										'emulatePrepare' => true,
										'username' => 'db_reader',
										'password' => 'GGHABzec9wPWASL2',
										'charset' => 'utf8'
									)


	);
$host_config=array(
			"lindneo"=>array(
                				'catalog_host'=>'http://catalog.lindneo.com',
				                'kerbela_host'=>'http://kerbela.lindneo.com',
				                'panda_host'=>'http://panda.lindneo.com',
				                'koala_host'=>'http://koala.lindneo.com',
						'cloud_host'=>'http://cloud.lindneo.com'
					),
			"tigerfish"=>array(
                                                'catalog_host'=>'http://bigcat.okutus.com',
                                                'kerbela_host'=>'http://kerbela.okutus.com',
                                                'panda_host'=>'http://boxoffice.okutus.com',
                                                'koala_host'=>'http://wow.okutus.com',
						'cloud_host'=>'http://cloud.okutus.com'
				)
		);

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
		'user' => array(
			'allowAutoLogin'=>true,
		),
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
            'basePath'=>'/var/www/protected/locale/messages',
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
				array('KerberizedService/authenticate','pattern'=>'kerberizedservice/authenticate/','verb'=>'POST'),
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
		'db'=>$db_config[gethostname()],

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
		'organisation_id'=>'seviye',
		// this is used in contact page
		'adminEmail'=>'pacific@linden-tech.com',

		'catalog_host'=>$host_config[gethostname()]['catalog_host'],
                'kerbela_host'=>$host_config[gethostname()]['kerbela_host'],
                'panda_host'=>$host_config[gethostname()]['panda_host'],
                'koala_host'=>$host_config[gethostname()]['koala_host'],
                'cloud_host'=>$host_config[gethostname()]['cloud_host'],
	),
);
