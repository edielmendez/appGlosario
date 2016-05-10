
<?php 
// include database and object files
include_once '../config/database.php';
include_once '../objects/computadora.class.php';

$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$computadora = new Computadora($db);
 
// get id of computadora to be edited
$data = json_decode(file_get_contents("php://input"));     

$computadora->numero_asignado = $data->numero_asignado;
$computadora->id = $data->id;

//print_r( $computadora->getNumeroAsignado());

if($computadora->getNumeroAsignadoAndID()){
	echo "1";
}else{
	// set ID property of computadora to be edited
	$computadora->id = $data->id;
	 
	// set computadora property values

	$computadora->nombre = $data->nombre;
	$computadora->caracteristicas = $data->caracteristicas;
	$computadora->modelo = $data->modelo;
	$computadora->numero_de_serie = $data->numero_de_serie;
	$computadora->fecha_de_compra = $data->fecha_de_compra;
	$computadora->costo = $data->costo;
	$computadora->numero_asignado = $data->numero_asignado;

	 
	// update the computadora
	if($computadora->update()){
	    echo "Registro Actualizado.";
	}
	 
	// if unable to update the computadora, tell the user
	else{
	    echo "Registro NO Actualizado..";
	}
}


 ?>