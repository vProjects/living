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
		
		
		echo '<table>';
		for($lastCount; $lastCount<=$upperLimit; $lastCount++){
			//echo $lastCount.'<br>';
			
			echo '<tr>';
			$hash = $this->hashids->encrypt($lastCount);
			echo 'http://www.livingmonument.org/registration.php?id='.$hash;
			echo '</tr>';
			
			
		}
		echo '</table>';
		//this line was for test
	 	//print_r($this->hashids->decrypt('VGJlz'));
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