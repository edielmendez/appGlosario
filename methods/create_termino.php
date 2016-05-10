<?php
if (session_id()==null)
  session_start();
// get database connection
include_once '../config/database.php';
 
$database = new Database();
$db = $database->getConnection();
 
// instantiate product object
include_once '../objects/termino.class.php';
$termino = new Termino($db);
 


//print_r($data);
/*echo $data->nombre;

return;*/

// set product property values

$termino->termino = $_POST['termino'];
$termino->definicion = $_POST['definicion'];
$termino->fuente = $_POST['fuente'];




//$software->created = date('Y-m-d');
     
// create the product
if($termino->create()){
	$_SESSION['msj'] = "TERMINO CREADO CORRECTAMENTE";
    header("location:../views/admin/admin.php");
}
 
// if unable to create the product, tell the user
else{
	$_SESSION['msj'] = "TERMINO NO CREADO";
    header("location:../views/admin/admin.php");
}
 ?>