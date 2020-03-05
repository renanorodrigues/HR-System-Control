<?php  

	include_once '_helpers.php';
	do_includes();	
	do_session();


	# receber os dados do formulario
	$data = $_POST;

	# Formatando os campos necessários
	$data['user_password'] = do_password($data['user_password']);
	#$data['user_birth'] = do_date($data['user_birth']);

	# Criar o objeto do tipo manager
	$manager = new Manager;
	$manager->insert_common("users",$data,NULL);

	# Redirecionamento
	header("location: $project_index/".$user->profile_page."?option=list_users&success=insert_success");

?>