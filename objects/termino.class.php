<?php 

class Termino{
	// database connection and table name
    private $conn;
    private $table_name = "termino";
      
    // object properties
    public $id;
    public $termino;
    public $definicion;
    public $fuente;
 

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

	function create(){
	     
	    // query to insert record
	    $query = "INSERT INTO  $this->table_name SET termino=:termino, definicion=:definicion, fuente=:fuente";
	     
	    // prepare query
	    $stmt = $this->conn->prepare($query);
	 
	    // posted values
	    
	    
	   
	    $this->termino=htmlspecialchars(strip_tags($this->termino));
	    $this->definicion=htmlspecialchars(strip_tags($this->definicion));
	    $this->fuente=htmlspecialchars(strip_tags($this->fuente));
	    
	
	  



	 
	    // bind values
	    $stmt->bindParam(":termino", $this->termino);
	    $stmt->bindParam(":definicion", $this->definicion);
	    $stmt->bindParam(":fuente", $this->fuente);
	  



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
	    $this->id = $row['id'];
	    $this->termino = $row['termino'];
	    $this->definicion = $row['definicion'];
	    $this->fuente = $row['fuente'];
	   
	



	 	

	}

	function update(){
	 
	    // update query
	    $query = "UPDATE " . $this->table_name .
	            " SET termino=:termino, definicion=:definicion, fuente=:fuente WHERE id =:id";
	 
	    // prepare query statement
	    $stmt = $this->conn->prepare($query);
	 
	    // posted values
	    
	    $this->termino=htmlspecialchars(strip_tags($this->termino));
	    $this->definicion=htmlspecialchars(strip_tags($this->definicion));
	    $this->fuente=htmlspecialchars(strip_tags($this->fuente));
	   

	 
	    // bind new values
	    $stmt->bindParam(":termino", $this->termino);
	    $stmt->bindParam(":definicion", $this->definicion);
	    $stmt->bindParam(":fuente", $this->fuente);
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
