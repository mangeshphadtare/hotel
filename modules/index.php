<?php

$logged_in		=	FALSE;	
$url_home		=	Config::get('PROJECT_URL').'index.php?action=home';
$url_login		=	Config::get('PROJECT_URL').'index.php?action=login';

//print_r($_POST); die;
if(isset($_POST['login']) && $_POST['login'] == "Login" )
{
	$uname	  =	$_POST['log'];
	$pwd =	$_POST['pwd'];

	if(!empty($_POST['log']) && !empty($_POST['pwd']))
	{
		$sqlUser	=	"SELECT u.user_name,u.user_id,u.role_id,r.role_name,u.parent_user_id 
						FROM tbl_users u LEFT JOIN tbl_roles r USING(role_id) 
						WHERE u.user_name = '".mysql_real_escape_string($_POST['log'])."' AND u.password = '".mysql_real_escape_string($_POST['pwd'])."' 
						AND u.status=1 
						LIMIT 0,1";
        #echo $sqlUser;
                
		$resUser = mysql_query($sqlUser, $db);
		#echo mysql_num_rows($resUser);
        #exit;
		if(mysql_num_rows($resUser) > 0)
		{
			$rowUser				= mysql_fetch_assoc($resUser);
			#print_r($rowUser);
			$_SESSION['session_id']	= session_id();
			$_SESSION['user_name'] 	= $rowUser['user_name'];
			$_SESSION['user_id']	= $rowUser['user_id'];
			$_SESSION['parent_user_id']	= $rowUser['parent_user_id'];
			$_SESSION['role_id']	= $rowUser['role_id'];
			$_SESSION['role_name']	= $rowUser['role_name'];
			$_SESSION['login_datetime']	= date('m/d/Y h:i:s a', time()); //date('l\, F jS\, Y h:i:s a');
			$logged_in	=	TRUE;

			/*echo "Login";
			print_r($_SESSION);
			echo $url_home;
			exit;*/
			
			echo "<meta http-equiv='Refresh' content=\"0;url='".$url_home."' \">";
		}
		else
		{
			$message="Please enter valid UserName and Password";
			$logged_in	=	FALSE;
		}
		
		//echo $message;
		//die;
	}
	else
	{
		$message="   Please enter valid UserName and Password";
		$logged_in	=	FALSE;
	}
	
	// if($logged_in) {	
		// echo "<meta http-equiv='Refresh' content=\"0;url='".$url_home."' \">";
		// exit();
	// } else {
		// echo "<meta http-equiv='Refresh' content=\"0;url='".$url_login."' \">";
		// exit();
	// }	
}
// else
// {
	//echo "<meta http-equiv='Refresh' content=\"0;url='".$url_login."' \">";
	//exit();
//}

require_once(Config::get('VIEWS_DIR').'login.php');
exit();
?>
