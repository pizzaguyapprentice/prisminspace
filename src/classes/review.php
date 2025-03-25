<?php
	include "../classes/database.php";

	class Receipt extends Database{
		private $reviewid;
		private $productid;
		private $reviewdescription;
		private $reviewrating;
		private $userid;

		function __construct($reviewid, $productid, $reviewdescription, $reviewrating, $userid){
			$db = new Credentials();
			$this->db_address = $db->get_db_address();
			$this->db_username = $db->get_db_username();
			$this->db_password = $db->get_db_password();
			$this->db_name = $db->get_db_name();
			
			$this->reviewid = $reviewid;
			$this->productid = $productid;
			$this->reviewdescription = $reviewdescription;
			$this->reviewrating = $reviewrating;
			$this->userid = $userid;
		}

		function add_receipt(){
			try{
				$stmt = $this->conn->prepare("INSERT INTO receipts (reviewid, productid, reviewdescription, reviewrating, userid) VALUES (:reviewid, :productid, :reviewdescription, :reviewrating, :userid)");
				$stmt->bindParam(':reviewid', $this->reviewid);
				$stmt->bindParam(':productid', $this->productid);
				$stmt->bindParam(':reviewdescription', $this->reviewdescription);
				$stmt->bindParam(':reviewrating', $this->reviewrating);
				$stmt->bindParam(':userid', $this->userid);

				$stmt->execute();
			}
			catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}
		}

		public function select_receipt(){
			try{
				$stmt = ($this->connect())->prepare("SELECT * FROM receipts WHERE reviewid = :reviewid");
				$stmt->bindParam(':reviewid', $this->reviewid);

				$stmt->execute();

				$user = $stmt->fetch(PDO::FETCH_ASSOC);
				return $user;
			}
			catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
		}

		/*function upreviewrating_receipt($firstname, $username, $password){
			
		}*/

		function delete_receipt(){
			try{
				$stmt = $this->conn->prepare("DELETE FROM receipts WHERE reviewid = :reviewid");
				$stmt->bindParam(':reviewid', $this->reviewid);

				$stmt->execute();

				$receipt = $stmt->fetch(PDO::FETCH_ASSOC);

				if($stmt->rowCount() == 0){
					echo "Receipt, ". $receipt['reviewid'] . "has been deleted";
				}
				else{
					echo "Receipt has not been found";
				}
			}
			catch(PDOException $e){
				echo "Connection failed: ". $e->getMessage();
			}
		}
	}
?>