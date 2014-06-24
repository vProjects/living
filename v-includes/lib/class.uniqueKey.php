<?php
	include ('class.dbconnection.php');
	include('Hashids.php');
	$error ='';
	
	
	class uniqueKey{
	
	/*
	* link used to store the database connectivity throuhout manage user class
	*/
	
	public $link;
	
	
	/*
	 * Applications hash property which will make our urls unique in the world
	*/
	public $salt = 'Living Monument';
	
	
	/* 
	 * hash library object 
	*/
	public $hashids;  
	
	/*
	 * Total hash values stored in an array
	 */
	 
	 public $hashValues = array();
	
	/*
	* basic constructor which enables the database connectivity 
	*/
	
	function __construct(){
		$dbconnection = new dbconnnection();
		$this->link = $dbconnection->ConnectToDb('secure');
		
		$this->hashids = new Hashids\Hashids($this->salt,5);
		
	}
	
	
	 function getLastCount() {
	 	
		$query = $this->link->prepare("SELECT COUNT(*) FROM `uniquekey`");
		$query->execute();
		return $query->fetchALL(PDO::FETCH_ASSOC);
		
	 }
	 function keyGenerate($lastCount) {
	 	
		
		$upperLimit = $lastCount + 90;
		//increment  lastCount by one
		$lastCount++;
		
		
		
		for($lastCount; $lastCount<=$upperLimit; $lastCount++){
			//echo $lastCount.'<br>';
			echo '<table>';
			echo '<tr>';
			$hash = $this->hashids->encrypt($lastCount);
			echo '</tr>';
			echo '</table>';
			echo $hash.'<br>';
		}
	 	
	 }
	 function saveKeys() {
	 	
	 }



	/*
	 * function to store uniqueKeys into the database
	 * 
	 */
	 
	 function uniqueKeyGenerator() {
	 	$lastCount = $this->getLastCount();
		
		$keys = $this->keyGenerate($lastCount[0]['COUNT(*)']);
		
		$this->saveKeys();
		
		
	 }
	 

	
	
}





?>