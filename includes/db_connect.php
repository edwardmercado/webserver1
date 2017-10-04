<?php
	
	class DbConnect{
		private $conn;
		
		function __construct(){
		}
		
		function connect(){
			include_once dirname(__FILE__).'/db_config.php';
			$this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			
			if(mysqli_connect_errno()){
				
			}else{
				
			}
			
			return $this->conn;
		}
	}
?>