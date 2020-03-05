
<?php
    require_once 'vendor/autoload.php';

    session_start();

    if (isset($_SESSION[md5("user_data")])) {
        $user = $_SESSION[md5("user_data")];
        
        if($user->profile_page == "admin.php"){
            header("location: ".$user->profile_page."/?option=admin_painel");            
        }else{
            header("location: ".$user->profile_page."/option=employee_painel");
        }
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>HR System Control</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="view/assets/main.css">
    <link rel="stylesheet" href="view/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="view/assets/fontawesome/css/all.css">
    <link rel="shortcut icon" href="view/assets/images/favicon.png">
</head>
<body>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
            <img src="https://www.evaldoautopecas.com.br/images/facebook-evaldo.png" id="icon" alt="User Icon" />
            <h1>Sistema Administrativo</h1>
            </div>

            <!-- Login Form -->
            <form method="POST" action="controller/login.php">
                <input type="text" id="login" class="fadeIn second" name="name" placeholder="username">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>

        </div>
    </div>

    <script src="view/assets/bootstrap/js/jquery.js"></script>
    <script src="view/assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>