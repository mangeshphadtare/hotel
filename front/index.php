<?php 
session_start();

/****** Debug Info - START  ******/
	ini_set("display_errors",0);
	error_reporting(E_ALL ^ E_NOTICE);
	#error_reporting(0);
/****** Debug Info - START  ******/

/****** Initiate Config - START  ******/
	require_once "config/config.php";
	Config::set();
/****** Initiate Config - END  ******/

/****** Import Libraries - START  ******/
	require_once "libraries/Excel/ExcelWriterXML.php";
	require_once "libraries/fileOperations.php";
	require_once "libraries/ftpUpload.php";
	require_once "libraries/class.smtp.php";
	require_once "libraries/class.phpmailer.php";
	require_once "config/class.database.php";
/****** Import Libraries - END  ******/

/****** Connect to Database - START  ******/
	require_once "config/dbconn.php";
/****** Connect to Database - END  ******/


	$action = isset($_GET['action'])	?	$_GET['action']	:	'';	
	$state = isset($_GET['state'])	?	$_GET['state']	:	'';	

	#print_r($_SESSION);
	#exit;
	

//Session Check
	if(($action != "login") && empty($_SESSION['user_name'])) 
		$action	=	"";

//Page Routing		
switch ($action) {
		case "home":			
			include_once(Config::get('MODULES_DIR').'home.php');
			break;
		case "updateuser" :			
			include_once(Config::get('MODULES_DIR').'adduser.php');
			break;
		case "login":
			include_once(Config::get('MODULES_DIR').'login.php');
			break;
		
		case "logout":
			include_once(Config::get('MODULES_DIR').'logout.php');
			break;
		case "part":
			include_once(Config::get('MODULES_DIR').'part.php');
			break;

			case "adduser":
				include_once(Config::get('MODULES_DIR').'adduser.php');
				break;
			case "trainer":
					include_once(Config::get('MODULES_DIR').'trainer.php');
					break;
			case "org":
					include_once(Config::get('MODULES_DIR').'org.php');
					break;
			case "tlist":
					include_once(Config::get('VIEWS_DIR').'trainerlist.php');
					break;
			case "plist":
					include_once(Config::get('VIEWS_DIR').'partlist.php');
					break;
			case "ulist":
					include_once(Config::get('VIEWS_DIR').'userlist.php');
					break;
			case "olist":
					include_once(Config::get('VIEWS_DIR').'orglist.php');
					break;
//list menu
				
		case "login":
			include_once(Config::get('MODULES_DIR').'login.php');
			break;
		
		case "logout":
			include_once(Config::get('MODULES_DIR').'logout.php');
			break;
		case "part":
			include_once(Config::get('MODULES_DIR').'part.php');
			break;

			case "adduser":
				include_once(Config::get('MODULES_DIR').'adduser.php');
				break;
			case "trainer":
					include_once(Config::get('MODULES_DIR').'trainer.php');
					break;
			case "org":
					include_once(Config::get('MODULES_DIR').'org.php');
					break;
			case "tlist":
					include_once(Config::get('VIEWS_DIR').'trainerlist.php');
					break;
			case "plist":
					include_once(Config::get('VIEWS_DIR').'partlist.php');
					break;
			case "ulist":
					include_once(Config::get('VIEWS_DIR').'userlist.php');
					break;
//list menu
				
		case "newuser":
			if($_SESSION['role_id']==1)
			{				
				include_once(Config::get('MODULES_DIR').'newuser.php');				
			}
			else
				include_once(Config::get('MODULES_DIR').'default.php');
			break;
		default:			
				#echo "login";exit;
                include_once(Config::get('MODULES_DIR').'login.php');
			break;
	}

	
/****** Close Database Connection - START  ******/
	
	// Close Native DB Connection 
	if(isset($db))
	{
		mysql_close($db);
		unset($db);
	}
	
/****** Close Database Connection - END  ******/

?>
