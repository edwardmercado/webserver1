<?php

	class DbOperations{
		private $conn;
		
		function __construct(){
			require_once dirname(__FILE__).'/db_connect.php';
			
			$db = new DbConnect();
			
			$this->conn = $db->connect();
		}
		
		public function createUser($username,$pass,$fname,$mname,$lname,$city,$province,$email,$contactno){
			//$password = md5($pass);
			if($this->isUserExist($username,$email)){
				return 0;
			}else{
				$stmt = $this->conn->prepare("INSERT INTO `tbl_users` (`id`, `Username`, `Password`, `FirstName`, `MiddleName`, `LastName`, `City`, `Province`
				, `Email`, `ContactNo`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
				$stmt->bind_param("sssssssss",$username,$pass,$fname,$mname,$lname,$city,$province,$email,$contactno);
				
				if($stmt->execute()){
					return 1;
				}else{
					return 2;
				}
			}
		}
		
		public function addOrder($orderCode,$tableNo,$nameList,$qtyList,$priceList,$orderTotal){
			//$password = md5($pass);
			if($this->isOrderExist($orderCode)){
				return 0;
			}else{
				$stmt = $this->conn->prepare("INSERT INTO `tbl_orders` (`id`, `OrderCode`, `TableNo`, `FoodName`, `FoodQty`, `FoodPrice`, `OrderTotal`) 
				VALUES (NULL, ?, ?, ?, ?, ?, ?);");
				$stmt->bind_param("ssssss",$orderCode,$tableNo,$nameList,$qtyList,$priceList,$orderTotal);
				
				if($stmt->execute()){
					return 1;
				}else{
					return 2;
				}
			}
		}
		
		public function userLogin($username, $password){
			$stmt = $this->conn->prepare("SELECT id FROM tbl_users WHERE Username = ? AND Password = ? ");
			$stmt->bind_param("ss", $username, $password);
			$stmt->execute();
			$stmt->store_result();
			return $stmt->num_rows > 0;
		}
		
		public function getUserByUsername($username){
			$stmt = $this->conn->prepare("SELECT * FROM tbl_users WHERE Username = ?");
			$stmt->bind_param("s", $username);
			$stmt->execute();
			return $stmt->get_result()->fetch_assoc();
		}
		
		private function isUserExist($username,$email){
			$stmt = $this->conn->prepare("SELECT id FROM tbl_users WHERE Username = ? OR Email = ?");
			$stmt->bind_param("ss", $username, $email);
			$stmt->execute();
			$stmt->store_result();
			return $stmt->num_rows > 0;
		}
		
		private function isOrderExist($orderCode){
			$stmt = $this->conn->prepare("SELECT id FROM tbl_orders WHERE OrderCode = ?");
			$stmt->bind_param("s", $orderCode);
			$stmt->execute();
			$stmt->store_result();
			return $stmt->num_rows > 0;
		}
		
		private function isTransExist($transid){
			$stmt = $this->conn->prepare("SELECT transactionId FROM tbl_customers WHERE transactionId = ?");
			$stmt->bind_param("s", $transid);
			$stmt->execute();
			$stmt->store_result();
			return $stmt->num_rows > 0;
		}
		
		public function getCredits($credits){
			$stmt = $this->conn->prepare("SELECT KartsCredits FROM tbl_users WHERE id = ?");
			$stmt->bind_param("s", $credits);
			$stmt->execute();
			return $stmt->get_result()->fetch_assoc();
		}
		
		public function getTransid($transid){
			$stmt = $this->conn->prepare("SELECT transactionId FROM tbl_customers ORDER BY id DESC LIMIT 1");
			$stmt->bind_param("s", $transid);
			$stmt->execute();
			return $stmt->get_result()->fetch_assoc();
		}
		
		public function insertNewId($transid){
			if($this->isTransExist($transid)){
				return 0;
			}else{
				$stmt = $this->conn->prepare("INSERT INTO `tbl_customers` (`id`, `transactionId`) VALUES (NULL, ?);");
				$stmt->bind_param("s",$transid);
				
				if($stmt->execute()){
					return 1;
				}else{
					return 2;
				}
			}
		}
	}
?>