<?php 

class Registro{
	// database connection and table name
    private $conn;
    private $table_name = "";
      
    // object properties
    public $id;
    public $numero_de_maquina;
    public $matricula;
    public $hora_entrada;
    public $hora_salida;
    public $fecha;
    
 

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
	    $query = "INSERT INTO  $this->table_name SET numero_de_maquina=:numero_de_maquina, matricula=:matricula, hora_entrada=:hora_entrada, hora_salida=:hora_salida, fecha=:fecha";
	     
	    // prepare query
	    $stmt = $this->conn->prepare($query);
	 
	    // posted values
	    
	    
	   
	    $this->numero_de_maquina=htmlspecialchars(strip_tags($this->numero_de_maquina));
	    $this->matricula=htmlspecialchars(strip_tags($this->matricula));
	    $this->hora_entrada=htmlspecialchars(strip_tags($this->hora_entrada));
	    $this->hora_salida=($this->hora_salida);
	    $this->fecha=htmlspecialchars(strip_tags($this->fecha));
	
	  



	 
	    // bind values
	    $stmt->bindParam(":numero_de_maquina", $this->numero_de_maquina);
	    $stmt->bindParam(":matricula", $this->matricula);
	    $stmt->bindParam(":hora_entrada", $this->hora_entrada);
	    $stmt->bindParam(":hora_salida", $this->hora_salida);
	    $stmt->bindParam(":fecha", $this->fecha);




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
}

 ?>
