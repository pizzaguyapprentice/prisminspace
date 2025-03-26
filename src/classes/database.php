<?php
	class Database{
		public static $db_address = "localhost";
		public static $db_username = "root";
		public static $db_password = "123";
		public static $db_name = "prisminspacedb";

		public static function connect(){
			try{
				$conn = new PDO("mysql:host=" . Database::$db_address . ";dbname=" . Database::$db_name, Database::$db_username, Database::$db_password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

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