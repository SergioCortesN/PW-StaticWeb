<?php
require_once("../models/rol.php");
require_once("../models/privilegio.php");
$app = new Rol();
$app -> checarRol('Administrador');
$appPrivilegio = new Privilegio();
$privilegios = $appPrivilegio -> read();
$action = isset($_GET['action']) ? $_GET['action'] : 'read';
$data = array();
include_once("./views/header.php");
switch ($action) {
    case 'create':
        if (isset($_POST['enviar'])) {
            $data = $_POST;
            $row = $app -> create($data);
            if ($row){
                $alerta['mensaje'] = "Rol dado de alta correctamente";
                $alerta['tipo'] = "success";
                include_once("./views/alert.php");
            }else{
                $alerta['mensaje'] = "El rol no fue dado de alta";
                $alerta['tipo'] = "danger";
                include_once("./views/alert.php");
            }
            $data = $app -> read();
            include_once("./views/rol/index.php");
        }else{
            include_once("./views/rol/_form.php");
        }
        break;

    case 'update':
        if (isset($_POST['enviar'])) {
            $data = $_POST;
            $id = $_GET['id'];
            $row = $app -> update($id, $data); 
            if ($row){
                $alerta['mensaje'] = "Rol modificado correctamente";
                $alerta['tipo'] = "success";
                include_once("./views/alert.php");
            }else{
                $alerta['mensaje'] = "El rol no fue modificado";
                $alerta['tipo'] = "danger";
                include_once("./views/alert.php");
            }
            $data = $app -> read();
            include_once("./views/rol/index.php");
        }else{
            $id = $_GET['id'];
            $data = $app -> readOne($id);
            include_once("./views/rol/_form_update.php");
        }
        break;

    case 'delete':
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $row = $app -> delete($id);
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
        $data = $app -> read();
        include_once("./views/rol/index.php");
        break;

    case 'privilegios':
        if (isset($_POST['agregar_privilegio'])) {
            $id_rol = $_GET['id'];
            $id_privilegio = $_POST['id_privilegio'];
            $row = $app -> addPrivilegio($id_rol, $id_privilegio);
            if ($row){
                $alerta['mensaje'] = "Privilegio agregado correctamente";
                $alerta['tipo'] = "success";
                include_once("./views/alert.php");
            }else{
                $alerta['mensaje'] = "El privilegio no fue agregado";
                $alerta['tipo'] = "danger";
                include_once("./views/alert.php");
            }
        }
        if (isset($_GET['eliminar_privilegio'])) {
            $id_rol = $_GET['id'];
            $id_privilegio = $_GET['eliminar_privilegio'];
            $row = $app -> removePrivilegio($id_rol, $id_privilegio);
            if ($row){
                $alerta['mensaje'] = "Privilegio eliminado correctamente";
                $alerta['tipo'] = "success";
                include_once("./views/alert.php");
            }else{
                $alerta['mensaje'] = "El privilegio no fue eliminado";
                $alerta['tipo'] = "danger";
                include_once("./views/alert.php");
            }
        }
        $id = $_GET['id'];
        $rolData = $app -> readOne($id);
        $privilegiosAsignados = $app -> getPrivilegios($id);
        include_once("./views/rol/_form_privilegios.php");
        break;
    
    case 'read':
    default:
        $data = $app -> read();
        include_once("./views/rol/index.php");
        break;
}
include_once("./views/footer.php");
?>
