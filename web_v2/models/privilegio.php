<?php
require_once "sistema.php";

Class Privilegio extends Sistema{

    function create($data){
        $this -> connect();
        $this -> _DB -> beginTransaction();
        try {
            $sql = "INSERT into privilegio(privilegio) 
                    values (:privilegio)";
            $sth = $this -> _DB -> prepare($sql);
            $sth -> bindParam(":privilegio", $data['privilegio'], PDO::PARAM_STR);
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
        $sth = $this -> _DB -> prepare("Select * from privilegio");
        $sth -> execute();
        $data = $sth -> fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function readOne($id){
        $this -> connect();
        $sth = $this -> _DB -> prepare("Select * from privilegio 
        where id_privilegio = :id_privilegio");
        $sth -> bindParam(":id_privilegio", $id, PDO::PARAM_INT);
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
                $sql = "UPDATE privilegio SET privilegio = :privilegio WHERE id_privilegio = :id_privilegio";
                $sth = $this->_DB->prepare($sql);
                $sth -> bindParam(":privilegio", $data['privilegio'], PDO::PARAM_STR);
                $sth -> bindParam(":id_privilegio", $id, PDO::PARAM_INT);
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
                $sql = "DELETE FROM privilegio WHERE id_privilegio = :id_privilegio";
                $sth = $this->_DB->prepare($sql);
                $sth -> bindParam(":id_privilegio", $id, PDO::PARAM_INT);
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

    function validate($data){
        return true;
    }
}

?>
