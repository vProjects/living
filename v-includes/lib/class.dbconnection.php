<?php
class dbconnnection{
	protected $db_conn;
	var $host = 'localhost';
	var $db_user = 'root';
	var $db_pass = '';
	var $db_name = 'livingmonument';
	/**
	* @secure_connection is used to secure the connectivity of the database 
	*
	*/
	var $secure_connection = 'unsecure';
	
	
	/*
	The function ConnectToDb takes a parameter and inturn calls DbConnection if the correct parameter is provided
	*/
	public function ConnectToDb($secure_connection){
		if ($secure_connection == 'secure'){
			$db_conn = $this->DbConnnection1();
			return $db_conn;
		}
		else{
			return $secure_connection;
		}
		
	}
	/*
	Function responsible for database connectivity
	*/
	 private function DbConnnection1(){
		/*$con = mysqli_connect($this->host, $this->db_user, $this->db_pass, $this->db_name);
		if(mysqli_connect_errno($con)){
			echo 'unsucessful attempt';
		}
		else{
		echo "succesfully connected to db";
		}*/
		try{
				$this->db_conn = new PDO("mysql:host=$this->host;dbname=$this->db_name",$this->db_user,$this->db_pass);
				return $this->db_conn;
			}
			catch(PDOException $e){
				return $e->getMessage();
			}
		
	}
}
?>