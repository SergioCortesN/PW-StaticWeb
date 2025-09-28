<?php
require_once("./models/institucion.php");
$app=new Institucion();
$data['institucion'] = 'Institucion prueba 5';
$data['logotipo'] = 'logo_prueba8.png';
$row = $app -> update($data, 6);
print_r($row);
?>
