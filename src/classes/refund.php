<?php
	include "../classes/database.php";

	class Receipt extends Database{
		private $refundid;
		private $receiptid;
		private $date;
		private $accepted;

		public function __construct($refundid, $receiptid, $date, $accepted){
			$db = new Credentials();
			$this->db_address = $db->get_db_address();
			$this->db_username = $db->get_db_username();
			$this->db_password = $db->get_db_password();
			$this->db_name = $db->get_db_name();
			
			$this->refundid = $refundid;
			$this->receiptid = $receiptid;
			$this->date = $date;
			$this->accepted = $accepted;
		}

		public function add_receipt(){
			try{
				$stmt = $this->conn->prepare("INSERT INTO receipts (refundid, receiptid, date, accepted) VALUES (:refundid, :receiptid, :date, :accepted)");
				$stmt->bindParam(':refundid', $this->refundid);
				$stmt->bindParam(':receiptid', $this->receiptid);
				$stmt->bindParam(':date', $this->date);
				$stmt->bindParam(':accepted', $this->accepted);

				$stmt->execute();
			}
			catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}
		}

		public function select_receipt(){
			try{
				$stmt = ($this->connect())->prepare("SELECT * FROM receipts WHERE refundid = :refundid");
				$stmt->bindParam(':refundid', $this->refundid);

				$stmt->execute();

				$user = $stmt->fetch(PDO::FETCH_ASSOC);
				return $user;
			}
			catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
		}

		public function update_receipt($firstname, $username, $password){
			
		}

		public function delete_receipt(){
			try{
				$stmt = $this->conn->prepare("DELETE FROM receipts WHERE refundid = :refundid");
				$stmt->bindParam(':refundid', $this->refundid);

				$stmt->execute();

				$receipt = $stmt->fetch(PDO::FETCH_ASSOC);

				if($stmt->rowCount() == 0){
					echo "Receipt, ". $receipt['refundid'] . "has been deleted";
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