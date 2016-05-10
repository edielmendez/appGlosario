<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once '../objects/hardware.class.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$hardware = new Hardware($db);

// query products
$stmt = $hardware->readAll();
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
			$data .= '"caracteristicas":"'   . html_entity_decode($caracteristicas ) . '",';
			$data .= '"modelo":"'   . $modelo . '",';
			$data .= '"numero_serie":"'   . $numero_serie . '",';
			$data .= '"fecha_de_compra":"'   . $fecha_de_compra . '",';
			$data .= '"costo":"'   . $costo . '"';

		$data .= '}'; 
		
		$data .= $x<$num ? ',' : ''; 
		
		$x++;
	}
}

// json format output
echo '{"records":[' . $data . ']}';

 ?>