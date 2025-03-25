<?php
	include "../classes/database.php";

	class Product extends Database{
		private $productname;
		private $productprice;
		private $productamount;
		private $productimage;

		/*function __construct($productname, $productprice, $productamount, $productimage){
			$db = new Credentials();
			$this->db_address = $db->get_db_address();
			$this->db_username = $db->get_db_username();
			$this->db_password = $db->get_db_password();
			$this->db_name = $db->get_db_name();
			
			$this->productname = $productname;
			$this->productprice = $productprice;
			$this->productamount = $productamount;
			$this->productimage = $productimage;
		}*/

		public function __construct(){
			$db = new Credentials();
			$this->db_address = $db->get_db_address();
			$this->db_username = $db->get_db_username();
			$this->db_password = $db->get_db_password();
			$this->db_name = $db->get_db_name();
		}

		public function select_all_products(){
			try{
				$stmt = ($this->connect())->prepare("SELECT * FROM products");

				$stmt->execute();

				$stmt->setFetchMode(PDO::FETCH_ASSOC);
				return $stmt;
			}
			catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
		}
	}
?>