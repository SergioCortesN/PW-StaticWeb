<?php
require_once 'models/sistema.php';
require_once 'models/institucion.php';
$app = new Institucion();
$result = $app -> reporteInstituciones();
print_r($result);
?>
