<?php  

	# Incluindo os arquivos necessários
	include_once dirname(__DIR__)."/model/config.php";
	include_once $project_path."/model/class/Connect.class.php";
	include_once $project_path."/model/class/Manager.class.php";
	include_once $project_path."/model/class/User.class.php";

	# Iniciando a Session
	session_start();	


	if(!isset($_SESSION[md5("user_data")])){
		header("location: $project_index?error=access_denied");
	}else{

		# Recuperando os dados da Sessão
		$user = $_SESSION[md5("user_data")];

		# Filtro de Busca
		$filter['id_user'] = $user->id_user;

		# Alterando o ultimo acesso do usuário
		$manager = new Manager;
		/*
		$manager->update_common("users",array("user_last_access"=>date("Y-m-d H:i:s")),$filter);
		*/
		session_destroy();

		header("location: $project_index?success=ending_session");
	}


?>