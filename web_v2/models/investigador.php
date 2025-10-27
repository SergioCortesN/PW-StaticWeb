<?php
require_once "sistema.php";

class Investigador extends Sistema{
    function create($data){
        $this -> connect();
        $this -> _DB -> beginTransaction();
        try {
            $sql = "INSERT into investigador(primer_apellido, segundo_apellido, nombre, fotografia, id_institucion, 
            semblanza, id_tratamiento) VALUES (:primer_apellido, :segundo_apellido, :nombre, :fotografia, :id_institucion, 
            :semblanza, :id_tratamiento)";
            $sth = $this -> _DB -> prepare($sql);
            $sth -> bindParam(":primer_apellido", $data['primer_apellido'], PDO::PARAM_STR);
            $sth -> bindParam(":segundo_apellido", $data['segundo_apellido'], PDO::PARAM_STR);
            $sth -> bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
            $sth -> bindParam(":id_institucion", $data['id_institucion'], PDO::PARAM_INT);
            $sth -> bindParam(":semblanza", $data['semblanza'], PDO::PARAM_STR);
            $sth -> bindParam(":id_tratamiento", $data['id_tratamiento'], PDO::PARAM_INT);
            $fotografia = $this->cargarFotografia('investigadores', 'fotografia');
            $sth -> bindParam(":fotografia", $fotografia, PDO::PARAM_STR);
            $sth -> execute();
            $rowsAffected = $sth -> rowCount();
            $sql = "INSERT into usuario(correo, contrasena) 
                    values (:correo, :contrasena)";
            $sth = $this -> _DB -> prepare($sql);
            $sth -> bindParam(":correo", $data['correo'], PDO::PARAM_STR);
            $pwd = md5($data['contrasena']);
            $sth -> bindParam(":contrasena", $pwd, PDO::PARAM_STR);
            $sth -> execute();
            $sql = "SELECT * FROM usuario WHERE correo = :correo";
            $sth = $this -> _DB -> prepare($sql);
            $sth -> bindParam(":correo", $data['correo'], PDO::PARAM_STR);
            $sth -> execute();
            $usuario = $sth -> fetch(PDO::FETCH_ASSOC);
            $id_usuario = $usuario['id_usuario'];
            $sql = "INSERT into usuario_rol(id_usuario, id_rol) VALUES (:id_usuario, 2)";
            $sth = $this -> _DB -> prepare($sql);
            $sth -> bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
            $sth -> execute();
            $sql = "SELECT * from investigador order by id_investigador desc limit 1";
            $sth = $this -> _DB -> prepare($sql);
            $sth -> execute();
            $investigador = $sth -> fetch(PDO::FETCH_ASSOC);
            $id_investigador = $investigador['id_investigador'];
            $sql = "UPDATE investigador set id_usuario = :id_usuario where id_investigador = :id_investigador";
            $sth = $this -> _DB -> prepare($sql);
            $sth -> bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
            $sth -> bindParam(":id_investigador", $id_investigador, PDO::PARAM_INT);
            $sth -> execute();
            $this -> _DB ->commit();
            return $rowsAffected;
        } catch (Exception $ex) {
            $this -> _DB ->rollback();
        }
        return null;
    }

    function read() {
        $this -> connect();
        $sql = "select inv.*, ins.institucion, t.tratamiento from investigador inv
                left join institucion ins on inv.id_institucion = ins.id_institucion
                left join tratamiento t on inv.id_tratamiento = t.id_tratamiento";
        $sth = $this -> _DB -> prepare($sql);
        $sth -> execute();
        $data = $sth -> fetchAll();
        return $data;
    }
        
    function readOne($id){
        $this -> connect();
        $sth = $this -> _DB -> prepare("Select * from investigador 
        where id_investigador = :id_investigador");
        $sth -> bindParam(":id_investigador", $id, PDO::PARAM_INT);
        $sth -> execute();
        $data = $sth -> fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function update($id, $data){
        if (is_numeric($id)){
            $this->connect();
            $this->_DB->beginTransaction();
            try {
                $sql = "UPDATE investigador 
                        SET primer_apellido = :primer_apellido,
                            segundo_apellido = :segundo_apellido,
                            nombre = :nombre,
                            id_institucion = :id_institucion,
                            semblanza = :semblanza,
                            id_tratamiento = :id_tratamiento
                        WHERE id_investigador = :id_investigador";
                
                $fotografia = null;
                if (isset($_FILES['fotografia'])){
                    if ($_FILES['fotografia']['error'] == 0){
                        $fotografia = $this->cargarFotografia('investigadores', 'fotografia');
                        if ($fotografia !== null) {
                            $sql = "UPDATE investigador 
                            SET primer_apellido = :primer_apellido,
                                segundo_apellido = :segundo_apellido,
                                nombre = :nombre,
                                fotografia = :fotografia,
                                id_institucion = :id_institucion,
                                semblanza = :semblanza,
                                id_tratamiento = :id_tratamiento
                            WHERE id_investigador = :id_investigador";
                        }
                    }
                }
                
                $sth = $this->_DB->prepare($sql);
                $sth->bindParam(":id_investigador", $id, PDO::PARAM_INT);
                $sth->bindParam(":primer_apellido", $data['primer_apellido'], PDO::PARAM_STR);
                $sth->bindParam(":segundo_apellido", $data['segundo_apellido'], PDO::PARAM_STR);
                $sth->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
                $sth->bindParam(":id_institucion", $data['id_institucion'], PDO::PARAM_INT);
                $sth->bindParam(":semblanza", $data['semblanza'], PDO::PARAM_STR);
                $sth->bindParam(":id_tratamiento", $data['id_tratamiento'], PDO::PARAM_INT);
                if ($fotografia !== null){
                    $sth->bindParam(":fotografia", $fotografia, PDO::PARAM_STR);
                }
                $sth->execute();
                $affectedRows = $sth->rowCount();
                $this->_DB->commit();
                return $affectedRows;
            } catch(Exception $e){
                $this->_DB->rollback();
                return null;
            }
        } else{
            return null;
        }
    }

    function delete($id){
        $this -> connect();
        $this -> _DB -> beginTransaction();
        $sth = $this -> _DB -> prepare("DELETE from investigador 
        where id_investigador = :id_investigador");
        $sth -> bindParam(":id_investigador", $id, PDO::PARAM_INT);
        $sth -> execute();
        $rowsAffected = $sth -> rowCount();
        $this -> _DB -> commit();
        return $rowsAffected;
    }
}
?>