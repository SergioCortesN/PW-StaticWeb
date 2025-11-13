<?php
require_once __DIR__ . '/../models/sistema.php';
require_once __DIR__ . '/../models/institucion.php';
require_once __DIR__ . '/../models/reportes.php';
require_once __DIR__ . '/../vendor/autoload.php';
$app = new Reportes();
ob_start();

$action = isset($_GET['action']) ? $_GET['action'] : '';
switch($action){
    case 'institucionesinvestigadores':
        $app -> checarRol('Administrador');
        $app -> InstitucionesInvestigadores();
        break;

    case 'excel_instituciones_investigadores':
        $app -> checarRol('Administrador');
        $app -> ExcelInstitucionesInvestigadores();
        break;

    default:
        die();
        break;

    
    
}
?>
