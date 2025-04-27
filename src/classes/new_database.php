<?php
	class Database{
		public static $db_address = "localhost";
		public static $db_username = "root";
		public static $db_password = "123";
		public static $db_name = "prisminspacedb";

		public static $conn = "Temp";

		public static function createNewDBConnection(){
			try{
				Database::$conn = new PDO("mysql:host=" . Database::$db_address . ";dbname=" . Database::$db_name, Database::$db_username, Database::$db_password);
				Database::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				Database::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			}
			catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
		}

		public static function returnConnection(){
			return Database::$conn;
		}
	}
?>