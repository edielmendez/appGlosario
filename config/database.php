<?php 
class Database{ 
private $host = "localhost";
private $db_name = "glosario";
private $username = "root"; 
private $password = "ediel";
public $conn;

	public function getConnection(){ 
		$this->conn = null;
		
		try{
			$params = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); 
			$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password,$params);
		}catch(PDOException $exception){
			echo "Connection error: " . $exception->getMessage();
		}
		
		return $this->conn;
	}
}

?>