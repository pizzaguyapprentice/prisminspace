<?php
	include "../classes/credentials.php";

	class User{
		private static $db_address;
		private static $db_username;
		private static $db_password;
		private static $db_name;

		/*private $login_firstname;
		private $login_username;
		private $login_password;*/

		function __construct(){
			$db = new Credentials();
			$this->db_address = $db->get_db_address();
			$this->db_username = $db->get_db_username();
			$this->db_password = $db->get_db_password();
			$this->db_name = $db->get_db_name();

			/*$this->$login_firstname;
			$this->$login_username;
			$this->$login_password;*/
		}

		/*function __construct($login_firstname, $login_username, $login_password){
			$db = new Credentials();
			$db_address = $db->get_db_address();
			$db_username = $db->get_db_username();
			$db_password = $db->get_db_password();
			$db_name = $db->get_db_name();

			$this->$login_firstname = $login_firstname;
			$this->$login_username = $login_username;
			$this->$login_password = $login_password;
		}*/

		function add_user($login_firstname, $login_username, $login_password){
			
		}

		function select_user($login_username, $login_password){
			try{
				$conn = new PDO("mysql:host=$this->db_address;dbname=$this->db_name", $this->db_username, $this->db_password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$stmt = $conn->prepare("SELECT username FROM users WHERE username = :username AND password = :password");
				$stmt->bindParam(':username', $login_username);
				$stmt->bindParam(':password', $login_password);

				$stmt->execute();

				$user = $stmt->fetch(PDO::FETCH_ASSOC);
				return $user;
			}
			catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
		}

		public function login_user($login_username, $login_password){
			$user = $this->select_user($login_username, $login_password);
			if($user){
				session_start();
				$_SESSION['login_username'] = $user['username'];
				header("location: ../index/index.php");
			}
			else{
				echo "This account doesn't exist, or you have given incorrect credentials";
			}
		}

		/*function does_user_exist($login_username, $login_password){
			try{
				$conn = new PDO("mysql:host=$db_address;dbname=$db_name", $db_username, $db_password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$stmt = $conn->prepare("SELECT username FROM users WHERE username = :username AND password = :password");
				$stmt->bindParam(':username', $login_username);
				$stmt->bindParam(':password', $login_password);

				$stmt->execute();
				$user = $stmt->fetch(PDO::FETCH_ASSOC);

				if($user){
					return true;
				}
				else{
					return false;
				}
	
			}
			catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
				return false;
			}
		}*/

		function update_user($login_firstname, $login_username, $login_password){
			
		}

		function delete_user($login_firstname, $login_username, $login_password){
			
		}
	}
?>