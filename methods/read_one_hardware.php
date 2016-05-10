<?php 
// include database and object files
include_once '../config/database.php';
include_once '../objects/hardware.class.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare prhardwareoduct object
$hardware = new Hardware($db);
 
// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));     
 
// set ID property of product to be edited
$hardware->id = $data->id;
 
// read the details of hardware to be edited
$hardware->readOne();
 
// create array
$hardware_arr[] = array(
    "id" => $hardware->id,
   	"nombre"=> $hardware->nombre,
	"caracteristicas"=> $hardware->caracteristicas,
	"modelo"=> $hardware->modelo,
	"numero_serie"=> $hardware->numero_serie,
	"fecha_de_compra"=> $hardware->fecha_de_compra,
	"costo"=> $hardware->costo
);


 
// make it json format
print_r(json_encode($hardware_arr));
 ?>