<?php 
// get database connection
include_once '../config/database.php';
 
$database = new Database();
$db = $database->getConnection();
 
// instantiate product object
include_once '../objects/hardware.class.php';
$hardware = new Hardware($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));

//print_r($data);
/*echo $data->nombre;

return;*/

// set product property values
$hardware->nombre = $data->nombre;
$hardware->caracteristicas = $data->caracteristicas;
$hardware->modelo = $data->modelo;
$hardware->numero_serie = $data->numero_serie;
$hardware->fecha_de_compra = $data->fecha_de_compra;
$hardware->costo = $data->costo;


//$software->created = date('Y-m-d');
     
// create the product
if($hardware->create()){
    echo "Registro Agredo Correctamente.";
}
 
// if unable to create the product, tell the user
else{
    echo "Error Al Agregar un Nuevo hardware";
}
 ?>