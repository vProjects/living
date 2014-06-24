<?php
	include ('class.dbconnection.php');
	$error ='';
	
class manageusers{
	
	/*
	* link used to store the database connectivity throuhout manage user class
	*/
	
	public $link;
	
	/*
	* basic constructor which enables the database connectivity 
	*/
	
	function __construct(){
		$dbconnection = new dbconnnection();
		$this->link = $dbconnection->ConnectToDb('secure');
		
	}
	
	
	/* code for living monument starts from here */
	
	/*
	 *  code to generate randome keys which will be used to print the qr codes
	 */

		
	function insertUniquekeys($uniquesKeys){
		
	}
	 
	 
	
	
	
	
	
	
	
	
	/*code for living monument ends here */
	
	
	
	
	
	
	/*
	* Function use to register a user and enrolls value in database.
	*/
	function register_user($firstname,$lastname,$email,$password,$phoneno,$streetaddress,$city,$state,$country,$ip,$date,$time,$activated){
			$query = $this->link->prepare("INSERT INTO user_profile 			
											(firstname,lastname,email,password,phoneno,streetaddress,city,
												state,country,ip,date,time,activated) 
													VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$values = array($firstname,$lastname,$email,$password,$phoneno,$streetaddress,$city,$state,$country,$ip,$date,$time,$activated);
			$query->execute($values);
			$counts = $query->rowCount();
			return $counts; 
	}
	
	/*
	* Function use to lgoin users into the website
	*/
	
	function login_users($email,$password){
		$query = $this->link->prepare("SELECT * FROM user_profile 
										WHERE email = '$email' and password ='$password'");
		$query->execute();
		$rowcount = $query->rowcount();
		return $rowcount;
		}
	
	/*
	* Function use to store the new project spectification into the database
	*/
		
	function project_post($title,$place_preferred,$project_details,$skills_required,$category,$duration,$amount){
					$query = $this->link->prepare("INSERT INTO project_list 												
								(project_title,place_preferred,project_details,skills_required,type_of_project,duration,amount) 
													VALUES(?,?,?,?,?,?,?)");
			$values = array($title,$place_preferred,$project_details,$skills_required,$category,$duration,$amount);
			$query->execute($values);
			$counts = $query->rowCount();
			return $counts; 

	}

	/*
	* Function resposible to list the jobs in the user profile
	*/
	function listpost($category){
		if($category == 'all'){
			$query = $this->link->prepare("select * from project_list");
		}
		else{
			$query = $this->link->prepare("select * from project_list where type_of_project ='$category'");
		}
			$query->execute();
			$info =$query->fetchALL(PDO::FETCH_ASSOC);
			return $info;
			
	}
	
	/*
	* Function responsible to show single job post on the bidding page. this takes an ID and searches for that Job
	*/
	function single_post($id){
		$query = $this->link->prepare("select * from project_list where id= '$id'");
		$query->execute();
		$info = $query->fetchALL(PDO::FETCH_ASSOC);
		return $info;
	}
	/*
	* Function responsible to place a bid on a proposal
	*/
	function placebid($jobid,$proposal,$proposal_amount,$proposal_duration){
			$query = $this->link->prepare("INSERT INTO bid_table(project_id,proposal,amount,duration) VALUES(?,?,?,?)");
			$values = array($jobid,$proposal,$proposal_amount,$proposal_duration);
			$query->execute($values);
			$counts = $query->rowCount();
			return $counts; 
	}
	
	/*
	* Function to show the total bids on the bidding page
	*/
	function totalbids($id){
		$query = $this->link->prepare("select * from bid_table where project_id = '$id'");
		$query->execute();
		$totalbids = $query->fetchALL(PDO::FETCH_ASSOC);
		return $totalbids;
	}
	
	/*
	* Function which adds basic profile detail to the users profile
	*/
	function editprofile($about_me, $work_style, $skills){
		$query = $this->link->prepare("update user_profile set about_me='$about_me', work_style_desc='$work_style', skills='$skills'");
		$query->execute();
		$counts = $query->rowCount();
		return $counts; 

	}
	/*
	* Function which fetches the information of a user
	*/
	function showprofile($useremail){
		$query = $this->link->prepare("select about_me,work_style_desc,skills from user_profile where email = '$useremail'");
		$query->execute();
		$userinfo = $query->fetchALL(PDO::FETCH_ASSOC);
		return $userinfo;
		
	}
	
}


?>