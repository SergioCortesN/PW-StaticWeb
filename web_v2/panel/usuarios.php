<?php
require_once "../models/usuario.php";
require_once "../models/rol.php";
$app = new Usuario();
$app -> checarRol('Administrador');
$appRol = new Rol();
$roles = $appRol -> read();
$action = isset($_GET['action']) ? $_GET['action'] : 'read';
$data = array();
include_once("./views/header.php");
switch ($action) {
    case 'create':
        if (isset($_POST['enviar'])) {
            $data = $_POST;
            $row = $app -> create($data);
            if ($row){
                $alerta['mensaje'] = "Usuario dado de alta correctamente";
                $alerta['tipo'] = "success";
                include_once("./views/alert.php");
            }else{
                $alerta['mensaje'] = "El usuario no fue dado de alta";
                $alerta['tipo'] = "danger";
                include_once("./views/alert.php");
            }
            $data = $app -> read();
            include_once("./views/usuarios/index.php");
        }else{
            include_once("./views/usuarios/_form.php");
        }
        break;
    case 'update':
        if (isset($_POST['enviar'])) {
            $data = $_POST;
            $id = $_GET['id'];
            $row = $app -> update($id, $data); 
            if ($row){
                $alerta['mensaje'] = "Usuario modificado correctamente";
                $alerta['tipo'] = "success";
                include_once("./views/alert.php");
            }else{
                $alerta['mensaje'] = "El usuario no fue modificado";
                $alerta['tipo'] = "danger";
                include_once("./views/alert.php");
            }
            $data = $app -> read();
            include_once("./views/usuarios/index.php");
        }else{
            $id = $_GET['id'];
            $data = $app -> readOne($id);
            include_once("./views/usuarios/_form_update.php");
        }
        break;
    case 'delete':
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $row = $app -> delete($id);
            if ($row){
                $alerta['mensaje'] = "Usuario eliminado correctamente";
                $alerta['tipo'] = "success";
                include_once("./views/alert.php");
            }else{
                $alerta['mensaje'] = "El usuario no fue eliminado";
                $alerta['tipo'] = "danger";
                include_once("./views/alert.php");
            }
        }
        $data = $app -> read();
        include_once("./views/usuarios/index.php");
        break;
    
    case 'roles':
        if (isset($_POST['agregar_rol'])) {
            $id_usuario = $_GET['id'];
            $id_rol = $_POST['id_rol'];
            $row = $app -> addRol($id_usuario, $id_rol);
            if ($row){
                $alerta['mensaje'] = "Rol agregado correctamente";
                $alerta['tipo'] = "success";
                include_once("./views/alert.php");
            }else{
                $alerta['mensaje'] = "El rol no fue agregado";
                $alerta['tipo'] = "danger";
                include_once("./views/alert.php");
            }
        }
        if (isset($_GET['eliminar_rol'])) {
            $id_usuario = $_GET['id'];
            $id_rol = $_GET['eliminar_rol'];
            $row = $app -> removeRol($id_usuario, $id_rol);
            if ($row){
                $alerta['mensaje'] = "Rol eliminado correctamente";
                $alerta['tipo'] = "success";
                include_once("./views/alert.php");
            }else{
                $alerta['mensaje'] = "El rol no fue eliminado";
                $alerta['tipo'] = "danger";
                include_once("./views/alert.php");
            }
        }
        $id = $_GET['id'];
        $usuarioData = $app -> readOne($id);
        $rolesAsignados = $app -> getRoles($id);
        include_once("./views/usuarios/_form_roles.php");
        break;

    case 'read':
    default:
        $data = $app -> read();
        include_once("./views/usuarios/index.php");
        break;
}
include_once("./views/footer.php");
?>