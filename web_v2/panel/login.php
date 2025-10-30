<?php
require_once '../models/sistema.php';
$app = new Sistema();
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

$view = './views/login/_forms.php';
$showAlert = false;
$alerta = [];

switch($action){
    case 'logout':
        $app -> logout();
        $alerta['mensaje'] = "Salió del sistema correctamente";
        $alerta['tipo'] = "success";
        $showAlert = true;
        $view = './views/login/_forms.php';
        break;

    case 'recuperar':
        $view = './views/login/recuperar.php';
        break;

    case 'cambio':
        $data = $_POST;
        $cambio = $app -> cambioContrasena($data);
        if($cambio){
            $alerta['mensaje'] = "Se envió un enlace para cambiar la contraseña al correo indicado.";
            $alerta['tipo'] = "success";
            $showAlert = true;
            $view = './views/login/_forms.php';
        }else{
            $alerta['mensaje'] = "No se pudo generar el token. Verifique el correo e intente de nuevo.";
            $alerta['tipo'] = "danger";
            $showAlert = true;
            $view = './views/login/recuperar.php';
        }
        break;

    case 'token':
        $view = './views/login/token.php';
        break;

    case 'reestablecer':
        $data = $_POST;
        $reestablecer = $app->reestablecerContrasena($data);
        if($reestablecer){
            $alerta['mensaje'] = "Se ha restablecido la contraseña correctamente.";
            $alerta['tipo'] = "success";
            $showAlert = true;
            $view = './views/login/_forms.php';
        }else{
            $alerta['mensaje'] = "Error al restablecer la contraseña. Verifique los datos e intente de nuevo.";
            $alerta['tipo'] = "danger";
            $showAlert = true;
            $view = './views/login/recuperar.php';
        }
        break;

    case 'login':
        if(isset($_POST['enviar'])){
            $correo = $_POST['correo'] ?? '';
            $contrasena = $_POST['contrasena'] ?? '';
            $login = $app -> login($correo, $contrasena);
            if($login){
                header("Location: index.php");
                exit();
            }else{
                $alerta['mensaje'] = "Correo o contraseña incorrecta";
                $alerta['tipo'] = "danger";
                $showAlert = true;
                $view = './views/login/_forms.php';
            }
        } else {
            $view = './views/login/_forms.php';
        }
        break;
    default:
        $view = './views/login/_forms.php';
        break;
}

require_once './views/login/header.php';
if ($showAlert) {
    include_once('./views/alert.php');
}
if (isset($view)) {
    require_once $view;
}
require_once './views/login/footer.php';
?>