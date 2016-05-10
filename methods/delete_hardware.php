<?php 
// include database and object file
include_once '../config/database.php';
include_once '../objects/hardware.class.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$hardware = new Hardware($db);
 
// get hardware id
$data = json_decode(file_get_contents("php://input"));     
 
// set hardware id to be deleted
$hardware->id = $data->id;
 
// delete the hardware
if($hardware->delete()){
    echo "Registro Eliminado";
}
 
// if unable to delete the hardware
else{
    echo "Registro No Eliminado";
}
 ?>

