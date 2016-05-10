<?php
/*
if (session_id()==null)
  session_start();*/
// include database and object files
/*
include_once '../config/database.php';
include_once '../objects/computadora.class.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare prcomputadoraoduct object
$computadora = new Computadora($db);
 
// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));     
 
// set ID property of product to be edited
$computadora->id = $data->id;
 
// read the details of computadora to be edited
$computadora->readOne();
 
// create array
$computadora_arr[] = array(
    "id" => $computadora->id,
   	"nombre"=> $computadora->nombre,
	"caracteristicas"=> $computadora->caracteristicas,
	"modelo"=> $computadora->modelo,
	"numero_de_serie"=> $computadora->numero_de_serie,
	"fecha_de_compra"=> $computadora->fecha_de_compra,
	"costo"=> $computadora->costo,
	"numero_asignado"=> $computadora->numero_asignado
);


 
// make it json format
print_r(json_encode($computadora_arr));*/


// include database and object files
include_once '../config/database.php';
include_once '../objects/computadora.class.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare prcomputadoraoduct object
$computadora = new Computadora($db);
 
// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));     
 //$id = $_GET['id'];


// set ID property of product to be edited
$computadora->id = $data->id;


 
// read the details of computadora to be edited
$computadora->readOne();
/*
$_SESSION['computadora_id'] = $computadora->id;
$_SESSION['computadora_nombre'] = $computadora->nombre;
$_SESSION['computadora_modelo'] = $computadora->modelo;
$_SESSION['computadora_caracteristicas'] = $computadora->caracteristicas;
$_SESSION['computadora_numero_de_serie'] = $computadora->numero_de_serie;
$_SESSION['computadora_fecha_de_compra'] = $computadora->fecha_de_compra;
$_SESSION['computadora_costo'] = $computadora->costo;
$_SESSION['computadora_numero_asignado'] = $computadora->numero_asignado;
// echo $_SESSION['computadora']->nombre;


 header("location:../views/edit_computadora.php")*/
 
// create array
$computadora_arr[] = array(
    "id" => $computadora->id,
   	"nombre"=> $computadora->nombre,
	"caracteristicas"=> $computadora->caracteristicas,
	"modelo"=> $computadora->modelo,
	"numero_de_serie"=> $computadora->numero_de_serie,
	"fecha_de_compra"=> $computadora->fecha_de_compra,
	"costo"=> $computadora->costo,
	"numero_asignado"=> $computadora->numero_asignado
);


 
// make it json format
print_r(json_encode($computadora_arr));

 ?>