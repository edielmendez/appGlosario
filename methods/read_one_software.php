<?php 
// include database and object files
include_once '../config/database.php';
include_once '../objects/software.class.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare prSoftwareoduct object
$software = new Software($db);
 
// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));     
 
// set ID property of product to be edited
$software->id = $data->id;
 
// read the details of software to be edited
$software->readOne();
 
// create array
$software_arr[] = array(
    "id" => $software->id,
   	"nombre"=> $software->nombre,
	"version"=> $software->version,
	"documento_de_amparo"=> $software->documento_de_amparo,
	"numero_licencias"=> $software->numero_licencias,
	"plataforma"=> $software->plataforma,
	"clasificacion"=> $software->clasificacion,
	"observaciones"=> $software->observaciones
);
 
// make it json format
print_r(json_encode($software_arr));
 ?>