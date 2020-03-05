<?php  

	function do_includes(){
		include_once dirname(__DIR__)."/model/config.php";
		include_once $GLOBALS['project_path']."/model/class/Connect.class.php";
		include_once $GLOBALS['project_path']."/model/class/Manager.class.php";
		include_once $GLOBALS['project_path']."/model/class/User.class.php";
	}

	function do_session(){
		global $user;
		session_start();
		if(!isset($_SESSION[md5("user_data")])){
			header("location: ".$GLOBALS['project_index']."?error=access_denied");
		}
		$user = $_SESSION[md5("user_data")];		
	}

	function do_date($date_t){		
		$date = DateTime::createFromFormat('d/m/Y', $date_t);		
		return $date->format('Y-m-d');
	}

	function do_password($password){
		$password = password_hash($password, PASSWORD_DEFAULT);	
		return $password;
	}

?>