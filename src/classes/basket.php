<?php
	include "../classes/database.php";

	class Basket extends Database{
		private $basketsid;
		private $userid;
		private $productid;

		public function __construct($basketsid, $userid, $productid){
			$db = new Credentials();
			$this->db_address = $db->get_db_address();
			$this->db_username = $db->get_db_username();
			$this->db_password = $db->get_db_password();
			$this->db_name = $db->get_db_name();
			
			$this->basketid = $basketsid;
			$this->userid = $userid;
			$this->productid = $productid;
		}

		public function add_basket(){
			try{
				$stmt = ($this->connect())->prepare("INSERT INTO baskets (basketid, userid, productid) VALUES (:basketid, :userid, :productid)");
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
				$stmt = ($this->connect())->prepare("SELECT * FROM baskets WHERE basketid = :basketid");
				$stmt->bindParam(':basketid', $this->basketid);

				$stmt->execute();

				$baskets = $stmt->fetch(PDO::FETCH_ASSOC);
				return $baskets;
			}
			catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
		}

		public function update_basket(){
			
		}

		public function delete_basket(){
			try{
				$stmt = ($this->connect())->prepare("DELETE FROM baskets WHERE basketid = :basketid");				
				$stmt->bindParam(':basketid', $this->basketid);

				$stmt->execute();

				if($stmt->rowCount() == 1){
					echo "Basket, ". $baskets['basketid'] . "has been deleted";
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