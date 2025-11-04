<?php
require_once '../models/sistema.php';
require_once '../models/institucion.php';
$app = new Sistema();
$appInstituicion = new Institucion();
$app -> checarRol('Administrador');
require_once ('./views/header.php');
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
switch($action){
    default:
        $reporte = $appInstituicion -> reporteInstituciones();
        include_once './views/index/index.php';
        break;
}
require_once('./views/footer.php');
?>