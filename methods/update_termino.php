<?php 
if (session_id()==null)
  session_start();


// include database and object files
include_once '../config/database.php';
include_once '../objects/termino.class.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$termino = new Termino($db);


// set ID property of termino to be edited
$termino->id = $_POST['id'];
 
// set termino property values

$termino->termino = $_POST['termino'];
$termino->definicion = $_POST['definicion'];
$termino->fuente = $_POST['fuente'];


 
// update the termino
if($termino->update()){

    


    $_SESSION['msj'] = "TERMINO ACTUALIZADO CORRECTAMENTE";
    header("location:../views/admin/admin.php");

}
else{
	$_SESSION['msj'] = "TERMINO NO ACTUALIZADO ";
	header("location:../views/admin/admin.php");
}


 ?>