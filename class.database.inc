<?php
require_once("config.php");

class User{
	private $connection;
	private static $_Instance;
	private $user_id;
	private $user_username;
	private $user_password;	
	private $user_firstname;
	private $user_lastname;
	private $user_profile;
	private $user_online;
	
	
	public static function getInstance(){
		if(!self::$_Instance){
			self::$_Instance = new User();
		}
		else{
			
		}
		return self::$_Instance;
	}
	
	private function __construct(){
		$this -> connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		if(!$this -> connection){
			echo "not connected";
		}
	}
	
	public function query($sql){
		$res = $this -> connection -> query($sql);
		if(!$res){
			echo "no data";
		}
		else{
			return $res;
		}
	}
	
	public function login(){
		$user = $this -> user_username;
		$pass = $this -> user_password;
		$ctr = 0;
		$sql = "Select * from tbl_admin where username = '$user'";
		$logged = $this -> query($sql);
		if($logged){
			$rows = $this -> fetch_array($logged);
			$dbpassword = $rows['password'];
			$userid = $rows['id'];
			
			$this -> user_firstname = $rows['firstname'];
			$this -> user_lastname = $rows['lastname'];
			$this -> user_profile = $rows['userImg'];
			$this -> user_id = $rows['id'];
			
			
			if($pass!=$dbpassword){
				session_destroy();
				echo '<script language="javascript">';
				echo 'alert("Invalid Username or Password!"); location.href="index.php"';
				echo '</script>';
			}
		}
	}
	
	public function count(){
		$sql = "SELECT COUNT(*) from tbl_products";
		$test = $this -> query($sql);
		$rest = $this -> fetch_array($test);
		return $rest;
	}
	
	public function logout(){
		$userid = $this -> getId();
		$sql1 = "Update tbl_user set online = 'no' where id = '$userid'";
		$test = $this -> query($sql1);
			if($test){
				
			}	
			else{
				mysql_error();
			}
	}
	
	
	
	public function fetch_array($res){
		return mysqli_fetch_array($res);
	}
	
	function getOnline(){
		return $this -> user_online;
	}
	
	function setOnline($online){
		$this -> user_online = $online;
	}
	
	function getId(){
		return $this -> user_id;
	}
	
	function setId($id){
		$this -> user_id = $id;
	}
	
	function getFirstname(){
		return $this -> user_firstname;
	}
	
	function setFirstname($firstname){
		$this -> user_firstname = $firstname;
	}
	
	function getLastname(){
		return $this -> user_lastname;
	}
	
	function setLastname($lastname){
		$this -> user_lastname = $lastname;
	}
	
	function getProfile(){
		return $this -> user_profile;
	}
	
	function setProfile($profile){
		$this -> user_profile = $profile;
	}
	
	function getUsername(){
		return $this -> user_username;
	}
	
	function setUsername($username){
		$this -> user_username = $username;
	}
	
	function getPassword(){
		return $this -> user_password;
	}
	
	function setPassword($password){
		$this -> user_password = $password;
	}
	
	
}

?>