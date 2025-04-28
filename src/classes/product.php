<?php
	include "../classes/database.php";

	class Product extends Database{
		private $productid;
		private $productname;
		private $productprice;
		private $productamount;
		private $productimage;
		private $productdescription;
		private $productsize;
		private $productcategory;
		

		/*function __construct($productname, $productprice, $productamount, $productimage,$productdescription,$productsize,$productcategory){
			$db = new Credentials();
			$this->db_address = $db->get_db_address();
			$this->db_username = $db->get_db_username();
			$this->db_password = $db->get_db_password();
			$this->db_name = $db->get_db_name();
			
			$this->productname = $productname;
			$this->productprice = $productprice;
			$this->productamount = $productamount;
			$this->productimage = $productimage;
			$this->productdescription = $productdescription;
			$this->productsize = $productsize;
			$this->productcategory = $productcategory;
		}
*/


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