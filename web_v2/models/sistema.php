<?php
class Sistema{
    var $_DSN = "mysql:host=mariadb; dbname=database;";
    var $_USER = "user";
    var $_PASSWORD = "password";
    var $_DB = null;
    function connect(){
        $this -> _DB = new PDO($this -> _DSN,$this -> _USER, $this -> _PASSWORD);
    }

    function cargarFotografia($carpeta){
        $tipos = array("image/jpg", "image/jpeg", "image/png", "image/gif");
        $imagen = $_FILES;
        
        if(move_uploaded_file($_FILES['fotografia']['tmp_name'], "../images/".$carpeta."/".$_FILES['fotografia']['name'])){
            return $_FILES['fotografia']['name'];
        }else{
            return null;
        }
    }
}
?>