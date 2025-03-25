<?php
	include "../classes/database.php";

	class Basket extends Database{
		private $basketid;
		private $userid;
		private $productid;

		function __construct($basketid, $userid, $productid){
			$db = new Credentials();
			$this->db_address = $db->get_db_address();
			$this->db_username = $db->get_db_username();
			$this->db_password = $db->get_db_password();
			$this->db_name = $db->get_db_name();
			
			$this->basketid = $basketid;
			$this->userid = $userid;
			$this->productid = $productid;
		}

		function add_basket(){
			try{
				$stmt = ($this->connect())->prepare("INSERT INTO basket (basketid, userid, productid) VALUES (:basketid, :userid, :productid)");
				$stmt->bindParam(':basketid', $this->basketid);
				$stmt->bindParam(':userid', $this->userid);
				$stmt->bindParam(':productid', $this->productid);

				$stmt->execute();
			}
			catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}
		}

		public function select_basket(){
			try{
				$stmt = ($this->connect())->prepare("SELECT * FROM basket WHERE basketid = :basketid");
				$stmt->bindParam(':basketid', $this->basketid);

				$stmt->execute();

				$basket = $stmt->fetch(PDO::FETCH_ASSOC);
				return $basket;
			}
			catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
		}

		/*function update_basket($basketid, $userid, $productid){
			
		}*/

		function delete_basket(){
			try{
				$stmt = ($this->connect())->prepare("DELETE FROM basket WHERE basketid = :basketid");				
				$stmt->bindParam(':basketid', $this->basketid);

				$stmt->execute();

				$basket = $stmt->fetch(PDO::FETCH_ASSOC);

				if($stmt->rowCount() == 0){
					echo "Basket, ". $basket['basketid'] . "has been deleted";
				}
				else{
					echo "Basket has not been found";
				}
			}
			catch(PDOException $e){
				echo "Connection failed: ". $e->getMessage();
			}
		}
	}
?>