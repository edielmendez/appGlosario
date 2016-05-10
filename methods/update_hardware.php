
<?php 
// include database and object files
include_once '../config/database.php';
include_once '../objects/hardware.class.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$hardware = new Hardware($db);
 
// get id of hardware to be edited
$data = json_decode(file_get_contents("php://input"));     


// set ID property of hardware to be edited
$hardware->id = $data->id;
 
// set hardware property values

$hardware->nombre = $data->nombre;
$hardware->caracteristicas = $data->caracteristicas;
$hardware->modelo = $data->modelo;
$hardware->numero_serie = $data->numero_serie;
$hardware->fecha_de_compra = $data->fecha_de_compra;
$hardware->costo = $data->costo;


 
// update the hardware
if($hardware->update()){
    echo "Registro Actualizado.";
}
 
// if unable to update the hardware, tell the user
else{
    echo "Registro NO Actualizado..";
}
 ?>