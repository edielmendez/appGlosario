<?php 
/**
* 
*/
class User
{
	// database connection and table name
    private $conn;
    private $table_name = "user";
      
    // object properties
    public $id;
    public $username;
    public $email;
    public $password;



	
	public function __construct($db)
	{
		# code...
		$this->conn = $db;
	}

	function readOneForLogin(){
		$query = "SELECT * FROM " . $this->table_name .
	     " WHERE username = ? and password = ? LIMIT 0,1";


	     // prepare query statement
	    $stmt = $this->conn->prepare( $query );
	  

	    
	    // execute query
	    $a = $stmt->execute(array($this->username,$this->password));


	 
	    // get retrieved row
	    $row = $stmt->fetch(PDO::FETCH_ASSOC);
	    

	    // set values to object properties
	    $this->id = $row['id'];
	    $this->username = $row['username'];
	    $this->email = $row['email'];
	    $this->password = $row['password'];

	    

	   
	}
	/*
	function readOne(){

	    // query to read single record
	    $query = "SELECT name, price, description FROM " . $this->table_name .
	     "WHERE id = ? LIMIT 0,1";
	 
	    // prepare query statement
	    $stmt = $this->conn->prepare( $query );
	     
	    // bind id of product to be updated
	    $stmt->bindParam(1, $this->id);
	     
	    // execute query
	    $stmt->execute();
	 
	    // get retrieved row
	    $row = $stmt->fetch(PDO::FETCH_ASSOC);
	     
	    // set values to object properties
	    $this->name = $row['id'];
	    $this->username = $row['username'];
	    $this->email = $row['email'];
	    $this->password = $row['password'];
	    $this->created = $row['created'];


	}*/

	


}
?>