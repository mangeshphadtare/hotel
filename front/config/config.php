<?php
Class Config {

public static $config	=	array(); 

	public static function set()
	{
		self::$config['PROJECT_FOLDER']			=	'struct/front'.'/';
		
		self::$config['WEBSITE_URL']			=	'http://'.$_SERVER['HTTP_HOST'].'/';
		
		self::$config['PROJECT_URL']			=	self::$config['WEBSITE_URL'].self::$config['PROJECT_FOLDER'];
		
		self::$config['DOCUMENT_ROOT']			=	$_SERVER['DOCUMENT_ROOT'].'/';
		
		self::$config['PROJECT_PATH']			=	self::$config['DOCUMENT_ROOT'].self::$config['PROJECT_FOLDER'];
			
		self::$config['MODULES_DIR']			=	self::$config['DOCUMENT_ROOT'].self::$config['PROJECT_FOLDER'].'modules/';
		
		self::$config['VIEWS_DIR']				=	self::$config['DOCUMENT_ROOT'].self::$config['PROJECT_FOLDER'].'views/';
	
		self::$config['UPLOADS_DIR']			=	self::$config['DOCUMENT_ROOT'].self::$config['PROJECT_FOLDER'].'data/';
		
		self::$config['JS_PATH']				=	self::$config['PROJECT_URL'].'assets/js/';
		
		self::$config['CSS_PATH']				=	self::$config['PROJECT_URL'].'assets/css/';
		
		self::$config['LIB_PATH']				=	self::$config['DOCUMENT_ROOT'].self::$config['PROJECT_FOLDER'].'libraries/';
		
		self::$config['DB_CONFIG']				=	array(
															'DB_HOST'		=>	'localhost',
															'DB_USERNAME'	=>	'root',
															'DB_PASSWORD'	=>	'password', 
															'DB_NAME'		=>	'isha'
														);
														
		self::$config['MAILER_CONFIG']			=	array(
															'HOST'				=>	'',
															'PORT'				=>	'',
															'SMTP_USERNAME'		=>	'',
															'SMTP_PASSWORD'		=>	'',
															'FROMEMAIL_ID'		=>	'',
															'FROM_EMAIL_NAME'	=>	''
														);
		self::$config['PAGIN_PER_SET']			=	10;
	}
	
	public static function get($keyword)
	{	
		return self::$config[$keyword]; 
		exit;
	}
}
?>
