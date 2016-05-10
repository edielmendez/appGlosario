<?php 

// include database and object file
include_once '../config/database.php';
include_once '../objects/termino.class.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$termino = new Termino($db);
 

$data = json_decode(file_get_contents("php://input"));     
 

$termino->id = $data->id;
 
// delete the termino
if($termino->delete()){
    echo "Registro Eliminado";
}
 
// if unable to delete the termino
else{
    echo "Registro No Eliminado";
}

 ?>

