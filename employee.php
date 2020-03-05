<?php  

	# Incluinfdo os arquivos necessários
	include_once 'model/config.php';
	include_once 'model/dictionary.php';
	include_once 'model/class/User.class.php';
	include_once 'controller/validate.php';

	# Testando se existe sessões
	session_start();

	if(!isset($_SESSION[md5("user_data")])){
		header("location: $project_index?error=access_denied");
	}

	$user = $_SESSION[md5("user_data")];	

	# Titulo da Página
	$page_title = "Empregado - ".$user->name;

	# Função gerenciadora de conteudos
	function page_content(){
		validate_options();
	}

	include_once 'view/template.html';

?>

