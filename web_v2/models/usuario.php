<?php
require_once "sistema.php";

Class Usuario extends Sistema{

    function create($data){
        $this -> connect();
        $this -> _DB -> beginTransaction();
        try {
            $sql = "INSERT into usuario(correo, contrasena) 
                    values (:correo, :contrasena)";
            $sth = $this -> _DB -> prepare($sql);
            $sth -> bindParam(":correo", $data['correo'], PDO::PARAM_STR);
            $pwd = md5($data['contrasena']);
            $sth -> bindParam(":contrasena", $pwd, PDO::PARAM_STR);
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
        $sth = $this -> _DB -> prepare("Select * from usuario");
        $sth -> execute();
        $data = $sth -> fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function readOne($id){
        $this -> connect();
        $sth = $this -> _DB -> prepare("Select * from usuario 
        where id_usuario = :id_usuario");
        $sth -> bindParam(":id_usuario", $id, PDO::PARAM_INT);
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
                if (!empty($data['contrasena'])) {
                    $sql = "UPDATE usuario SET correo = :correo, 
                    contrasena = :contrasena WHERE id_usuario = :id_usuario";
                    $sth = $this->_DB->prepare($sql);
                    $sth -> bindParam(":correo", $data['correo'], PDO::PARAM_STR);
                    $pwd = md5($data['contrasena']);
                    $sth -> bindParam(":contrasena", $pwd, PDO::PARAM_STR);
                    $sth -> bindParam(":id_usuario", $id, PDO::PARAM_INT);
                } else {
                    $sql = "UPDATE usuario SET correo = :correo WHERE id_usuario = :id_usuario";
                    $sth = $this->_DB->prepare($sql);
                    $sth -> bindParam(":correo", $data['correo'], PDO::PARAM_STR);
                    $sth -> bindParam(":id_usuario", $id, PDO::PARAM_INT);
                }
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
                $sql = "DELETE FROM usuario WHERE id_usuario = :id_usuario";
                $sth = $this->_DB->prepare($sql);
                $sth -> bindParam(":id_usuario", $id, PDO::PARAM_INT);
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

    function getRoles($id_usuario){
        $this -> connect();
        $sql = "SELECT r.* FROM rol r
                INNER JOIN usuario_rol ur ON r.id_rol = ur.id_rol
                WHERE ur.id_usuario = :id_usuario";
        $sth = $this -> _DB -> prepare($sql);
        $sth -> bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        $sth -> execute();
        $data = $sth -> fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function addRol($id_usuario, $id_rol){
        $this -> connect();
        $this -> _DB -> beginTransaction();
        try {
            $sql = "INSERT INTO usuario_rol(id_usuario, id_rol) 
                    VALUES (:id_usuario, :id_rol)";
            $sth = $this -> _DB -> prepare($sql);
            $sth -> bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
            $sth -> bindParam(":id_rol", $id_rol, PDO::PARAM_INT);
            $sth -> execute();
            $rowsAffected = $sth -> rowCount();
            $this -> _DB ->commit();
            return $rowsAffected;
        } catch (Exception $ex) {
            $this -> _DB ->rollback();
        }
        return null;
    }

    function removeRol($id_usuario, $id_rol){
        $this -> connect();
        $this -> _DB -> beginTransaction();
        try {
            $sql = "DELETE FROM usuario_rol 
                    WHERE id_usuario = :id_usuario AND id_rol = :id_rol";
            $sth = $this -> _DB -> prepare($sql);
            $sth -> bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
            $sth -> bindParam(":id_rol", $id_rol, PDO::PARAM_INT);
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