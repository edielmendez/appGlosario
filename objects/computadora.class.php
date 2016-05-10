<?php 
/**
* 
*/
class Computadora
{
	// database connection and table name
    private $conn;
    private $table_name = "computadora";
      
    // object properties
    public $id;
    public $nombre;
    public $modelo;
    public $caracteristicas;
    public $numero_de_serie;
    public $fecha_de_compra;
    public $costo;
    public $numero_asignado;
 

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
	    $query = "INSERT INTO  $this->table_name SET nombre=:nombre, caracteristicas=:caracteristicas, modelo=:modelo, numero_de_serie=:numero_de_serie, fecha_de_compra=:fecha_de_compra,costo=:costo,numero_asignado=:numero_asignado";
	     
	    // prepare query
	    $stmt = $this->conn->prepare($query);
	 
	    // posted values
	    
	    
	    $this->nombre=htmlspecialchars(strip_tags($this->nombre));
	    $this->modelo=htmlspecialchars(strip_tags($this->modelo));
	    $this->caracteristicas=htmlspecialchars(strip_tags($this->caracteristicas));
	    $this->numero_de_serie=htmlspecialchars(strip_tags($this->numero_de_serie));
	    $this->fecha_de_compra=($this->fecha_de_compra);
	    $this->costo=htmlspecialchars(strip_tags($this->costo));
	    $this->numero_asignado=htmlspecialchars(strip_tags($this->numero_asignado));
	  



	 
	    // bind values
	    $stmt->bindParam(":nombre", $this->nombre);
	    $stmt->bindParam(":caracteristicas", $this->caracteristicas);
	    $stmt->bindParam(":modelo", $this->modelo);
	    $stmt->bindParam(":numero_de_serie", $this->numero_de_serie);
	    $stmt->bindParam(":fecha_de_compra", $this->fecha_de_compra);
	    $stmt->bindParam(":costo", $this->costo);
	    $stmt->bindParam(":numero_asignado", $this->numero_asignado);


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
	    $this->caracteristicas = $row['caracteristicas'];
	    $this->modelo = $row['modelo'];
	    $this->numero_de_serie = $row['numero_de_serie'];
	    $this->fecha_de_compra = $row['fecha_de_compra'];
	    $this->costo = $row['costo'];
	    $this->numero_asignado = $row['numero_asignado'];
	



	 	

	}

	function update(){
	 
	    // update query
	    $query = "UPDATE " . $this->table_name .
	            " SET nombre=:nombre, caracteristicas=:caracteristicas, modelo=:modelo, numero_de_serie=:numero_de_serie, fecha_de_compra=:fecha_de_compra,costo=:costo,numero_asignado=:numero_asignado WHERE id =:id";
	 
	    // prepare query statement
	    $stmt = $this->conn->prepare($query);
	 
	    // posted values
	    
	    $this->nombre=htmlspecialchars(strip_tags($this->nombre));
	    $this->caracteristicas=htmlspecialchars(strip_tags($this->caracteristicas));
	    $this->modelo=htmlspecialchars(strip_tags($this->modelo));
	    $this->numero_de_serie=htmlspecialchars(strip_tags($this->numero_de_serie));
	    $this->fecha_de_compra=($this->fecha_de_compra);
	    $this->costo=htmlspecialchars(strip_tags($this->costo));
	    $this->numero_asignado=htmlspecialchars(strip_tags($this->numero_asignado));
	 
	    // bind new values
	    $stmt->bindParam(":nombre", $this->nombre);
	    $stmt->bindParam(":caracteristicas", $this->caracteristicas);
	    $stmt->bindParam(":modelo", $this->modelo);
	    $stmt->bindParam(":numero_de_serie", $this->numero_de_serie);
	    $stmt->bindParam(":fecha_de_compra", $this->fecha_de_compra);
	    $stmt->bindParam(":costo", $this->costo);
	    $stmt->bindParam(":numero_asignado", $this->numero_asignado);
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

	function getNumeroAsignado(){
		// query to read single record
	    $query = "SELECT *  FROM " . $this->table_name . " WHERE numero_asignado = ? LIMIT 0,1";
	 
	    // prepare query statement
	    $stmt = $this->conn->prepare( $query );
	     
	   
	     
	    // execute query
	    $stmt->execute(array($this->numero_asignado));
	 
	    // get retrieved row
	    $row = $stmt->fetch(PDO::FETCH_ASSOC);

	    return $row;

	
	}

	function getNumeroAsignadoAndID(){
		// query to read single record
	    $query = "SELECT *  FROM " . $this->table_name . " WHERE numero_asignado = ? and id!=? LIMIT 0,1";
	 
	    // prepare query statement
	    $stmt = $this->conn->prepare( $query );
	     
	   
	     
	    // execute query
	    $stmt->execute(array($this->numero_asignado,$this->id));
	 
	    // get retrieved row
	    $row = $stmt->fetch(PDO::FETCH_ASSOC);

	    return $row;

	
	}
	




}
 ?>