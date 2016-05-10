<?php 
// get database connection
include_once '../config/database.php';
 
$database = new Database();
$db = $database->getConnection();
 
// instantiate product object
include_once '../objects/software.class.php';
$software = new Software($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));

//print_r($data);
/*echo $data->nombre;

return;*/
 
// set product property values
$software->nombre = $data->nombre;
$software->version = $data->version;

$software->documento_de_amparo = $data->documento_de_amparo;
$software->numero_licencias = $data->numero_licencias;
$software->plataforma = $data->plataforma;
$software->clasificacion = $data->clasificacion;
$software->observaciones = $data->observaciones;
//$software->created = date('Y-m-d');
     
// create the product
if($software->create()){
    echo "Registro Agredo Correctamente.";
}
 
// if unable to create the product, tell the user
else{
    echo "Error Al Agregar un Nuevo Software";
}
 ?>