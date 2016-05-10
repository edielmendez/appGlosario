<?php 
/**
* 
*/
class Software
{
	// database connection and table name
    private $conn;
    private $table_name = "software";
      
    // object properties
    public $id;
    public $nombre;
    public $version;
    public $documento_de_amparo;
    public $numero_licencias;
    public $plataforma;
    public $clasificacion;
    public $observaciones;


	function __construct($db)
	{
		# code...	
		$this->conn = $db;
	}

	// read all softwares
	function readAll(){

		// select all query
		$query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";

		// prepare query statement
		$stmt = $this->conn->prepare( $query );
		
		// execute query
		$stmt->execute();
		
		return $stmt;
	}
	// create software
	function create(){
	     
	    // query to insert record
	    $query = "INSERT INTO  $this->table_name SET nombre=:nombre, version=:version, documento_de_amparo=:documento_de_amparo, numero_licencias=:numero_licencias,plataforma=:plataforma,clasificacion=:clasificacion,observaciones=:observaciones";
	     
	    // prepare query
	    $stmt = $this->conn->prepare($query);
	 
	    // posted values
	    
	    
	    $this->nombre=htmlspecialchars(strip_tags($this->nombre));
	    $this->version=htmlspecialchars(strip_tags($this->version));
	    $this->documento_de_amparo=htmlspecialchars(strip_tags($this->documento_de_amparo));
	    $this->numero_licencias=($this->numero_licencias);
	    $this->plataforma=htmlspecialchars(strip_tags($this->plataforma));
	    $this->clasificacion=htmlspecialchars(strip_tags($this->clasificacion));
	    $this->observaciones=htmlspecialchars(strip_tags($this->observaciones));



	 
	    // bind values
	    $stmt->bindParam(":nombre", $this->nombre);
	    $stmt->bindParam(":version", $this->version);
	    $stmt->bindParam(":documento_de_amparo", $this->documento_de_amparo);
	    $stmt->bindParam(":numero_licencias", $this->numero_licencias);
	    $stmt->bindParam(":plataforma", $this->plataforma);
	    $stmt->bindParam(":clasificacion", $this->clasificacion);
	    $stmt->bindParam(":observaciones", $this->observaciones);

	   /* print_r($stmt->bindParam());
	    return;*/

	     
	    // execute query
	    if($stmt->execute()){
	        return true;
	    }else{
	        echo "<pre>";
	            print_r($stmt->errorInfo());
	        echo "</pre>";
	 
	        return false;
	    }
	}

	function readOne(){
	     
	    // query to read single record
	    $query = "SELECT *  FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
	 
	    // prepare query statement
	    $stmt = $this->conn->prepare( $query );
	     
	   
	     
	    // execute query
	    $stmt->execute(array($this->id));
	 
	    // get retrieved row
	    $row = $stmt->fetch(PDO::FETCH_ASSOC);
	     
	    // set values to object properties
	    $this->nombre = $row['nombre'];
	    $this->version = $row['version'];
	    $this->documento_de_amparo = $row['documento_de_amparo'];
	    $this->numero_licencias = $row['numero_licencias'];
	    $this->plataforma = $row['plataforma'];
	    $this->clasificacion = $row['clasificacion'];
	    $this->observaciones = $row['observaciones'];



	 	

	}

	function update(){
	 
	    // update query
	    $query = "UPDATE " . $this->table_name .
	            " SET nombre=:nombre, version=:version, documento_de_amparo=:documento_de_amparo, numero_licencias=:numero_licencias,plataforma=:plataforma,clasificacion=:clasificacion,observaciones=:observaciones
	            WHERE id =:id";
	 
	    // prepare query statement
	    $stmt = $this->conn->prepare($query);
	 
	    // posted values
	    
	    $this->nombre=htmlspecialchars(strip_tags($this->nombre));
	    $this->version=htmlspecialchars(strip_tags($this->version));
	    $this->documento_de_amparo=htmlspecialchars(strip_tags($this->documento_de_amparo));
	    $this->numero_licencias=($this->numero_licencias);
	    $this->plataforma=htmlspecialchars(strip_tags($this->plataforma));
	    $this->clasificacion=htmlspecialchars(strip_tags($this->clasificacion));
	    $this->observaciones=htmlspecialchars(strip_tags($this->observaciones));
	 
	    // bind new values
	    $stmt->bindParam(":nombre", $this->nombre);
	    $stmt->bindParam(":version", $this->version);
	
	    $stmt->bindParam(":documento_de_amparo", $this->documento_de_amparo);
	    $stmt->bindParam(":numero_licencias", $this->numero_licencias);
	    $stmt->bindParam(":plataforma", $this->plataforma);
	    $stmt->bindParam(":clasificacion", $this->clasificacion);
	    $stmt->bindParam(":observaciones", $this->observaciones);
	    $stmt->bindParam(":id", $this->id);
	     
	    // execute the query
	 
	

	    if($stmt->execute()){
	        return true;
	    }else{
	 
	    	echo "<pre>";
	            print_r($stmt->errorInfo());
	        echo "</pre>";
	        return false;
	    }
	}

	// delete the software
	function delete(){
	 
	    // delete query
	    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
	     
	    // prepare query
	    $stmt = $this->conn->prepare($query);
	     
	    // bind id of record to delete
	    $stmt->bindParam(1, $this->id);
	 
	    // execute query
	    if($stmt->execute()){
	        return true;
	    }else{
	        return false;
	    }
	}
	




}
 ?>