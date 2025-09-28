<?php
include_once("./views/header.php");
require_once("models/investigador.php");
$app = new Investigador();
$investigadores = $app -> read();
include_once("./views/miembros/index.php");
include_once("./views/footer.php");
?>