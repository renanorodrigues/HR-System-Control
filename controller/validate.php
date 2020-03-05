<?php  
	
	
	# Validação de mensagens na tela.
	function validate_message(){
		//caso haja mensagem a ser mostrada, mostre-as.
		if(isset($_GET['error'])){
			@$alert_msg = $GLOBALS['dictionary'][$_GET['error']];
			$alert_icon = "fa fa-exclamation-triangle";
			$alert_class = "error";
		}elseif(isset($_GET['success'])){
			@$alert_msg = $GLOBALS['dictionary'][$_GET['success']];
			$alert_icon = "fa fa-check-square";
			$alert_class = "success";
		}else{
			return false;
		}

		//renderizando alert
		include_once $GLOBALS['project_path'].'/view/alert.html';
	}

	function validate_options(){

		if(!isset($_GET['option'])){
			return false;
		}

		# Globalizando o objeto user
		global $user;

		# Incluindo as classes necessárias
		include_once $GLOBALS['project_path']."/model/class/Connect.class.php";
		include_once $GLOBALS['project_path']."/model/class/Manager.class.php";

		switch($_GET['option']){

			# Todas as opções do administrador
			case 'admin_painel':
				include_once $GLOBALS['project_path']."/view/admin_painel.html";
			break;

			case 'list_users':

				# Instaciar o objeto do tipo Manager
				$manager = new Manager;

				# Tables
				$tb['users'] = array();
				$tb['profiles'] = array();

				# Relacionmaentos
				$rel['users.profile_id'] = "profiles.id_profile";

				# Realizando a busca
				$table_content = $manager->select_special($tb,$rel,NULL);

				# Titulos da Tabela
				$table_titles['user_name'] = "Nome";
				$table_titles['user_phone'] = "Telefone";
				$table_titles['user_cellphone'] = "Celular";
				$table_titles['profile_name'] = "Perfil";
				//$table_titles['user_address'] = "Endereço";

				# Caminho das Ações
				$delete_destiny = "controller/delete_user.php";
				$update_destiny = "?option=update_user";

				# Liberação das Ações
				$delete = true;
				$update = true;
				$print = true;

				# Filtro das ações
				$filter = "id_user";

				# Incluindo a tabela
				include_once $GLOBALS['project_path']."/view/list_common.html";
			break;
		
			case "add_user":

				# Trazendo os perfis
				$manager = new Manager;

				$profiles = $manager->select_common("profiles",null,null);

				include_once $GLOBALS['project_path']."/view/forms/add_user.html";
			break;

			case "update_user":

				$manager = new Manager;
				$filter['id_user'] = base64_decode($_GET['filter']);

				$tb['users'] = array();
				$tb['profiles'] = array();
				$rel['users.profile_id'] = "profiles.id_profile";

				# Realizando a busca do usuário selecionado
				$user_p = $manager->select_special($tb, $rel,$filter," LIMIT 1");

				# Eliminando uma camada do array
				$user_p = $user_p[0];

				# Chamando os perfis
				$profiles = $manager->select_common("profiles",null,null);

				# Incluindo os arquivos necessários
				include_once $GLOBALS['project_path']."/view/forms/update_user.html";
			break;

			case 'list_employees':

				# Instaciar o objeto do tipo Manager
				$manager = new Manager;

				# Tables
				$tb['users'] = array();
				$tb['employees'] = array();

				# Relacionmaentos
				$rel['users.id_user'] = "employees.user_id";

				# Realizando a busca
				$table_content = $manager->select_special($tb,$rel,NULL);

				# Titulos da Tabela
				$table_titles['user_fullname'] = "Nome";
				$table_titles['user_cpf'] = "CPF";
				$table_titles['employee_function'] = "Cargo";
				$table_titles['employee_salary'] = "Salário";
				$table_titles['employee_state'] = "Estado";

				# Caminho das Ações
				$delete_destiny = "controller/delete_user.php";
				$update_destiny = "?option=update_user";

				# Liberação das Ações
				$delete = true;
				$update = true;
				$print = true;

				# Filtro das ações
				$filter = "id_user";

				# Incluindo a tabela
				include_once $GLOBALS['project_path']."/view/list_common.html";
			break;

			case "add_employee":

				include_once $GLOBALS['project_path']."/view/forms/add_employee.html";
			break;

			case "update_employee":

				$manager = new Manager;
				$filter['id_user'] = base64_decode($_GET['filter']);

				$tb['users'] = array();
				$tb['employees'] = array();
				$rel['users.id_user'] = "employees.user_id";

				# Realizando a busca do funcionário selecionado
				$employee_p = $manager->select_special($tb, $rel,$filter," LIMIT 1");

				# Eliminando uma camada do array
				$employee_p = $employee_p[0];

				# Chamando os dados do funcionário
				$employees = $manager->select_common("employees",null,null);

				# Incluindo os arquivos necessários
				include_once $GLOBALS['project_path']."/view/forms/update_employee.html";
			break;

			# Todas as opções do empregado
			case 'employee_painel':
				$manager = new Manager;

				include_once $GLOBALS['project_path']."/view/employee_painel.html";
			break;
		}

	}



?>