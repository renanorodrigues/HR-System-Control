<?php  

	include_once '_helpers.php';
	do_includes();	
	do_session();


	# receber os dados do formulario
	$data = $_POST;

	# Criar o objeto do tipo manager
	$manager = new Manager;
	$manager->insert_common("employees",$data,NULL);

	# Redirecionamento
	header("location: $project_index/".$user->profile_page."?option=list_users&success=insert_success");

?>