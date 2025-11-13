<?php
header('Content-Type: application/json');
require_once __DIR__ . "/../../models/sistema.php";
require_once __DIR__ . "/../../models/Institucion.php";
$app = new Institucion();
//$app -> checarRol('Administrador');
$action = $_SERVER['REQUEST_METHOD'];
$data = array();
$id = isset($_GET['id']) ? $_GET['id'] : null;
switch ($action) {
    
    case 'POST':
        $data = $_POST;
        if (!is_null($id) ){
            $row = $app -> update($data, $id);
            $data['mensaje'] = ($row) ? "Institución actualizada correctamente" : "Error al actualizar la institución";
                        
        }else{
            $row = $app -> create($data);
            $data['mensaje'] = ($row) ? "Institución creada correctamente" : "Error al crear la institución";   
        }
        break;

    case 'DELETE':
        if(is_null($id)){
            $row = $app -> delete($id);
            if ($row){
                $data['mensaje'] = "Institución eliminada correctamente";   
            }else{
                $data['mensaje'] = "Error al eliminar la institución";   
            }          
        }else{
            $data['mensaje'] = "Se requiere el ID de la institución a eliminar";   
        }
        break;

    case 'PUT': 
        $data = $app -> read();
        break;
    
    case 'GET':
    default:
        if(is_null($id)){
            $data = $app -> read();
        }else{
            $data = $app -> readOne($id);
        }
        break;
}
$json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE); 
print_r($json);                   
?>
