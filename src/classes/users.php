<?php
	include "../classes/credentials.php";

	class User{
		private static $db_address;
		private static $db_username;
		private static $db_password;
		private static $db_name;

		private $firstname;
		private $username;
		private $password;
		private $profilepicture;

		function __construct($firstname, $username, $password, $profilepicture){
			$db = new Credentials();
			$this->db_address = $db->get_db_address();
			$this->db_username = $db->get_db_username();
			$this->db_password = $db->get_db_password();
			$this->db_name = $db->get_db_name();

			$this->firstname = $firstname;
			$this->username = $username;
			$this->password = $password;
			$this->profilepicture = $profilepicture;
		}

		function add_user(){
			try{
				$conn = new PDO("mysql:host=$this->db_address;dbname=$this->db_name", $this->db_username, $this->db_password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$stmt = $conn->prepare("INSERT INTO users (firstname, username, password, profilepicture) VALUES (:firstname, :username, :password, :profilepicture)");
				$stmt->bindParam(':firstname', $this->firstname);
				$stmt->bindParam(':username', $this->username);
				$stmt->bindParam(':password', $this->password);
				$stmt->bindParam(':profilepicture', $this->profilepicture);

				$stmt->execute();

				return $this->username;
			}
			catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}
			$conn = null;
		}

		private function select_user(){
			try{
				$conn = new PDO("mysql:host=$this->db_address;dbname=$this->db_name", $this->db_username, $this->db_password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$stmt = $conn->prepare("SELECT username FROM users WHERE username = :username AND password = :password");
				$stmt->bindParam(':username', $this->username);
				$stmt->bindParam(':password', $this->password);

				$stmt->execute();

				$user = $stmt->fetch(PDO::FETCH_ASSOC);
				return $user;
			}
			catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
		}

		public function login_user($page){
			$user = $this->select_user();
			if($user){
				session_start();
				$_SESSION['login_username'] = $user['username'];
				header("location: " . $page);
			}
			else{
				return "This account doesn't exist, or you have given incorrect credentials";
			}
		}

		static function does_user_exist($username){
			try{
				$db_credentials = new Credentials();
				$db_address = $db_credentials->get_db_address();
				$db_name = $db_credentials->get_db_name();
				$conn = new PDO("mysql:host=$db_address;dbname=$db_name", $db_credentials->get_db_username(), $db_credentials->get_db_password());
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$stmt = $conn->prepare("SELECT username FROM users WHERE username = :username");
				$stmt->bindParam(':username', $username);

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
		}

		/*function update_user($firstname, $username, $password){
			
		}*/

		function delete_user(){
			try{
				$conn = new PDO("mysql:host=$this->db_address;dbname=$this->db_name", $this->db_username, $this->db_password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$stmt = $conn->prepare("DELETE FROM users WHERE username = :username");				
				$stmt->bindParam(':username', $this->username);

				$stmt->execute();

				$user = $stmt->fetch(PDO::FETCH_ASSOC);

				if($stmt->rowCount() == 0){
					echo "User, ". $user['username'] . "has been deleted";
				}
				else{
					echo "User has not been found";
				}

			} catch (PDOException $e){
				echo "Connection failed: ". $e->getMessage();
			}
		}
	}
?>