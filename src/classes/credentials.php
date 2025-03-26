<?php
	class Credentials{
		private $db_address;
		private $db_username;
		private $db_password;
		private $db_name;

		function __construct(){
			$this->db_address = "localhost";
			$this->db_username = "root";
			$this->db_password = "123";
			$this->db_name = "prisminspacedb";
		}

		function get_db_address(){
			return $this->db_address;
		}

		function get_db_username(){
			return $this->db_username;
		}

		function get_db_password(){
			return $this->db_password;
		}

		function get_db_name(){
			return $this->db_name;
		}
	}
?>