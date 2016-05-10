<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once '../objects/software.class.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$software = new Software($db);

// query products
$stmt = $software->readAll();
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
			$data .= '"version":"'   . $version . '",';
			$data .= '"documento_de_amparo":"'   . $documento_de_amparo . '",';
			$data .= '"numero_licencias":"'   . $numero_licencias . '",';
			$data .= '"plataforma":"'   . $plataforma . '",';
			$data .= '"clasificacion":"'   . $clasificacion . '",';
			$data .= '"observaciones":"' . html_entity_decode($observaciones ). '"';
		$data .= '}'; 
		
		$data .= $x<$num ? ',' : ''; 
		
		$x++;
	}
}

// json format output
echo '{"records":[' . $data . ']}';

 ?>