
<?php 
// include database and object file
include_once '../config/database.php';
include_once '../objects/computadora.class.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$computadora = new Computadora($db);
 
// get computadora id
$data = json_decode(file_get_contents("php://input"));     
 
// set computadora id to be deleted
$computadora->id = $data->id;
 
// delete the computadora
if($computadora->delete()){
    echo "Registro Eliminado";
}
 
// if unable to delete the computadora
else{
    echo "Registro No Eliminado";
}
 ?>

