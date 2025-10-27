<?php
require_once '../models/sistema.php';
$app = new Sistema();
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

switch($action){
    case 'logout':
        $app -> logout();
        $alerta['mensaje'] = "Salio del sistema correctamente";
        $alerta['tipo'] = "Success";
        include_once('./views/alert.php');
        break;
    case 'login':
        if(isset($_POST['enviar'])){
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            $login = $app -> login($correo, $contrasena);
            if($login){
                header("Location: index.php");
                exit();
            }else{
                $alerta['mensaje'] = "Correo o contraseña incorrecta";
                $alerta['tipo'] = "danger";
                include_once('./views/alert.php');
            }
        }
        break;
    default:
        break;
}

require_once './views/login/header.php';
require_once './views/login/_forms.php';
require_once './views/login/footer.php';
?>