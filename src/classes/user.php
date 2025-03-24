<?php
	include "../classes/database.php";

	class User extends Database{
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

			try{
				$this->conn = new PDO("mysql:host=$this->db_address;dbname=$this->db_name", $this->db_username, $this->db_password);
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
		}

		function add_user(){
			try{
				$stmt = $this->conn->prepare("INSERT INTO users (firstname, username, password, profilepicture) VALUES (:firstname, :username, :password, :profilepicture)");
				$stmt->bindParam(':firstname', $this->firstname);
				$stmt->bindParam(':username', $this->username);
				$stmt->bindParam(':password', $this->password);
				$stmt->bindParam(':profilepicture', $this->profilepicture);

				$stmt->execute();
			}
			catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}
		}

		private function select_user(){
			try{
				$stmt = ($this->connect())->prepare("SELECT username FROM users WHERE username = :username AND password = :password");
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
				$conn = new Database()->connect();
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
				$stmt = $this->conn->prepare("DELETE FROM users WHERE username = :username");				
				$stmt->bindParam(':username', $this->username);

				$stmt->execute();

				$user = $stmt->fetch(PDO::FETCH_ASSOC);

				if($stmt->rowCount() == 0){
					echo "User, ". $user['username'] . "has been deleted";
				}
				else{
					echo "User has not been found";
				}
			}
			catch(PDOException $e){
				echo "Connection failed: ". $e->getMessage();
			}
		}
	}
	//echo User::does_user_exist("qwe");
?>