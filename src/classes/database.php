<?php
	include "../classes/credentials.php";

	class Database{
		protected static $db_address;
		protected static $db_username;
		protected static $db_password;
		protected static $db_name;
		protected static $conn;

		function __construct(){
			$db = new Credentials();
			$this->db_address = $db->get_db_address();
			$this->db_username = $db->get_db_username();
			$this->db_password = $db->get_db_password();
			$this->db_name = $db->get_db_name();
			try{
				$this->conn = new PDO("mysql:host=$this->db_address;dbname=$this->db_name", $this->db_username, $this->db_password);
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
		}

		public function connect(){
			try{
				$conn = new PDO("mysql:host=$this->db_address;dbname=$this->db_name", $this->db_username, $this->db_password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				return $conn;
				/*$stmt = $conn->prepare("SELECT username FROM users WHERE username = :username AND password = :password");
				$stmt->bindParam(':username', $this->username);
				$stmt->bindParam(':password', $this->password);

				$stmt->execute();

				$user = $stmt->fetch(PDO::FETCH_ASSOC);
				return $user;*/
			}
			catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
		}
	}
?>