<?php
class Sistema{
    var $_DSN = "mysql:host=mariadb; dbname=database;";
    var $_USER = "user";
    var $_PASSWORD = "password";
    var $_DB = null;
    function connect(){
        $this -> _DB = new PDO($this -> _DSN,$this -> _USER, $this -> _PASSWORD);
    }
}
?>