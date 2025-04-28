<?php
	include "../classes/database.php";

	class User extends Database{
		private $firstname;
		private $username;
		private $password;
		private $profilepicture;

		public function __construct($firstname, $username, $password, $profilepicture){
			$this->firstname = $firstname;
			$this->username = $username;
			$this->password = $password;
			$this->profilepicture = $profilepicture;
		}

		public function add_user(){
			try{
				$stmt = ($this->connect())->prepare("INSERT INTO users (firstname, username, password, profilepicture) VALUES (:firstname, :username, :password, :profilepicture)");
				$stmt->bindParam(':firstname', $this->firstname);
				$stmt->bindParam(':username', $this->username);
				$stmt->bindParam(':password', $this->password);
				$stmt->bindParam(':profilepicture', $this->profilepicture);

				$stmt->execute();

				$user = $stmt->fetch(PDO::FETCH_ASSOC);

				return $user;
			}
			catch(PDOException $e) {
				echo "Error: " . $e->getMessage();
			}
		}

		private function select_user(){
			try{
				$stmt = ($this->connect())->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
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
				$_SESSION['user'] = $user;
				$_SESSION['login_userid'] = $user['userid'];
				$_SESSION['login_username'] = $user['username'];
				header("location: " . $page);
			}
			else{
				return "This account doesn't exist, or you have given incorrect credentials";
			}
		}

		public static function does_user_exist($username){
			try{
				$stmt = (Database::connect())->prepare("SELECT username FROM users WHERE username = :username");
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

		public function update_user($firstname, $username, $password){
			
		}

		public function delete_user(){
			try{
				$stmt = ($this->connect())->prepare("DELETE FROM users WHERE username = :username");				
				$stmt->bindParam(':username', $this->username);

				$stmt->execute();

				if($stmt->rowCount() == 1){
					echo "User ". $this->username . " has been deleted";
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
?>