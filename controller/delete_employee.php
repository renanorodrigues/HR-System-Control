<?php  

	include_once '_helpers.php';
	do_includes();	
	do_session();

	$filter['id_user'] = $_POST['filter'];

	$manager = new Manager;

	$manager->delete_common("users",$filter,NULL);

	# Redirecionamento
	header("location: $project_index/".$user->profile_page."?option=list_users&success=delete_success");