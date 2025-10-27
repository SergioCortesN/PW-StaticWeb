<?php
require_once '../models/sistema.php';
$app = new Sistema();
$app -> checarRol('Administrador');
require_once ('./views/header.php');
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
switch($action){
    default:
        include_once './views/index/index.php';
        break;
}
require_once('./views/footer.php');
?>