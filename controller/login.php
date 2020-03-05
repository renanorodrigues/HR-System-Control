<?php  

	# Incluindo os arquivos necessários
	include_once dirname(__DIR__)."/model/config.php";
	include_once $project_path."/model/class/Connect.class.php";
	include_once $project_path."/model/class/Manager.class.php";
	include_once $project_path."/model/class/User.class.php";

	# Recebendo os dados do Formulário
	$name = $_POST['name'];
	$password = $_POST['password'];

	# Criar o objeto do tipo Manager
	$manager = new Manager;

	# Fazendo a busca do usuário
	$tables['users'] = array();
	$tables['profiles'] = array();

	$relations['users.profile_id'] = "profiles.id_profile";

	$filter['user_name'] = $name;

	# Busca do Usuário no Banco de Dados
	$log = $manager->select_special($tables,$relations,$filter," LIMIT 1");

	# Testando os resultados
	if($log === false){
		header("location: $project_index?error=user_not_found");
	}elseif(!password_verify($password, $log[0]['user_password'])){
		header("location: $project_index?error=password_incorrect");
	}else{

		# Removendo a senha da sessão
		unset($log[0]['user_password']);

		# Criando o objeto do tipo User
		$user = new User($log[0]['user_name'],$log[0]['user_name']);

		# Setando o restante dos atributos graças ao metódo mágico __set
		foreach ($log[0] as $key => $value){
			$user->$key = $value;
		}

		# Criando a sessão
		session_start();

		$_SESSION[md5("user_data")] = $user;

		header("location: $project_index");

	}
?>