<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once '../objects/computadora.class.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$computadora = new Computadora($db);

// query products
$stmt = $computadora->readAll();

$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){
	
	$data="";
	$x=1;
	
	// retrieve our table contents
	// fetch() is faster than fetchAll()
	// http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		// extract row
		// this will make $row['name'] to
		// just $name only
		extract($row);
		
		$data .= '{';
			$data .= '"id":"'  . $id . '",';
			$data .= '"nombre":"'   . $nombre . '",';
			$data .= '"modelo":"'   . html_entity_decode($modelo ) . '",';
			$data .= '"caracteristicas":"'   . $caracteristicas . '",';
			$data .= '"numero_de_serie":"'   .$numero_de_serie . '",';
			$data .= '"fecha_de_compra":"'   . $fecha_de_compra . '",';
			$data .= '"costo":"'   . $costo . '",';
			$data .= '"numero_asignado":"'   . $numero_asignado . '"';
		$data .= '}'; 
		
		$data .= $x<$num ? ',' : ''; 
		
		$x++;
	}
}



// json format output
echo '{"records":[' . $data . ']}';

 ?>