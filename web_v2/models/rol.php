<?php
require_once "sistema.php";

Class Rol extends Sistema{

    function create($data){
        $this -> connect();
        $this -> _DB -> beginTransaction();
        try {
            $sql = "INSERT into rol(rol) 
                    values (:rol)";
            $sth = $this -> _DB -> prepare($sql);
            $sth -> bindParam(":rol", $data['rol'], PDO::PARAM_STR);
            $sth -> execute();
            $rowsAffected = $sth -> rowCount();
            $this -> _DB ->commit();
            return $rowsAffected;
        } catch (Exception $ex) {
            $this -> _DB ->rollback();
        }
        return null;
    }

    function read(){
        $this -> connect();
        $sth = $this -> _DB -> prepare("Select * from rol");
        $sth -> execute();
        $data = $sth -> fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function readOne($id){
        $this -> connect();
        $sth = $this -> _DB -> prepare("Select * from rol 
        where id_rol = :id_rol");
        $sth -> bindParam(":id_rol", $id, PDO::PARAM_INT);
        $sth -> execute();
        $data = $sth -> fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function update($id, $data){
        if (!is_numeric($id)) {
            return null;
        }
        if($this -> validate($data)){
            $this -> connect();
            $this -> _DB -> beginTransaction();
            try {
                $sql = "UPDATE rol SET rol = :rol WHERE id_rol = :id_rol";
                $sth = $this->_DB->prepare($sql);
                $sth -> bindParam(":rol", $data['rol'], PDO::PARAM_STR);
                $sth -> bindParam(":id_rol", $id, PDO::PARAM_INT);
                $sth -> execute();
                $rowsAffected = $sth->rowCount();
                $this -> _DB ->commit();
                return $rowsAffected;
            } catch (Exception $ex) {
                $this -> _DB ->rollback();
            }
        }
        return null;
    }

    function delete($id){
        if (is_numeric($id)) {
            $this -> connect();
            $this -> _DB -> beginTransaction();
            try {
                $sql = "DELETE FROM rol WHERE id_rol = :id_rol";
                $sth = $this->_DB->prepare($sql);
                $sth -> bindParam(":id_rol", $id, PDO::PARAM_INT);
                $sth -> execute();
                $rowsAffected = $sth->rowCount();
                $this -> _DB ->commit();
                return $rowsAffected;
            } catch (Exception $ex) {
                $this -> _DB ->rollback();
            }
        }
        return null;
    }

    function getPrivilegios($id_rol){
        $this -> connect();
        $sql = "SELECT p.* FROM privilegio p
                INNER JOIN rol_privilegio rp ON p.id_privilegio = rp.id_privilegio
                WHERE rp.id_rol = :id_rol";
        $sth = $this -> _DB -> prepare($sql);
        $sth -> bindParam(":id_rol", $id_rol, PDO::PARAM_INT);
        $sth -> execute();
        $data = $sth -> fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function addPrivilegio($id_rol, $id_privilegio){
        $this -> connect();
        $this -> _DB -> beginTransaction();
        try {
            $sql = "INSERT INTO rol_privilegio(id_rol, id_privilegio) 
                    VALUES (:id_rol, :id_privilegio)";
            $sth = $this -> _DB -> prepare($sql);
            $sth -> bindParam(":id_rol", $id_rol, PDO::PARAM_INT);
            $sth -> bindParam(":id_privilegio", $id_privilegio, PDO::PARAM_INT);
            $sth -> execute();
            $rowsAffected = $sth -> rowCount();
            $this -> _DB ->commit();
            return $rowsAffected;
        } catch (Exception $ex) {
            $this -> _DB ->rollback();
        }
        return null;
    }

    function removePrivilegio($id_rol, $id_privilegio){
        $this -> connect();
        $this -> _DB -> beginTransaction();
        try {
            $sql = "DELETE FROM rol_privilegio 
                    WHERE id_rol = :id_rol AND id_privilegio = :id_privilegio";
            $sth = $this -> _DB -> prepare($sql);
            $sth -> bindParam(":id_rol", $id_rol, PDO::PARAM_INT);
            $sth -> bindParam(":id_privilegio", $id_privilegio, PDO::PARAM_INT);
            $sth -> execute();
            $rowsAffected = $sth -> rowCount();
            $this -> _DB ->commit();
            return $rowsAffected;
        } catch (Exception $ex) {
            $this -> _DB ->rollback();
        }
        return null;
    }

    function validate($data){
        return true;
    }
}

?>
