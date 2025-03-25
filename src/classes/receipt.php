<?php
	include "../classes/database.php";

	class Receipt extends Database{
		private $receiptid;
		private $userid;
		private $orderid;
		private $date;
		private $totalprice;

		public function __construct($receiptid, $userid, $orderid, $date, $totalprice){
			$db = new Credentials();
			$this->db_address = $db->get_db_address();
			$this->db_username = $db->get_db_username();
			$this->db_password = $db->get_db_password();
			$this->db_name = $db->get_db_name();
			
			$this->receiptid = $receiptid;
			$this->userid = $userid;
			$this->orderid = $orderid;
			$this->date = $date;
			$this->totalprice = $totalprice;
		}

		public function add_receipt(){
			try{
				$stmt = $this->conn->prepare("INSERT INTO receipts (receiptid, userid, orderid, date, totalprice) VALUES (:receiptid, :userid, :orderid, :date, :totalprice)");
				$stmt->bindParam(':receiptid', $this->receiptid);
				$stmt->bindParam(':userid', $this->userid);
				$stmt->bindParam(':orderid', $this->orderid);
				$stmt->bindParam(':date', $this->date);
				$stmt->bindParam(':totalprice', $this->totalprice);

				$stmt->execute();
			}
			catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}
		}

		public function select_receipt(){
			try{
				$stmt = ($this->connect())->prepare("SELECT * FROM receipts WHERE receiptid = :receiptid");
				$stmt->bindParam(':receiptid', $this->receiptid);

				$stmt->execute();

				$receipt = $stmt->fetch(PDO::FETCH_ASSOC);
				return $receipt;
			}
			catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
		}

		public function update_receipt($firstname, $username, $password){
			
		}

		public function delete_receipt(){
			try{
				$stmt = $this->conn->prepare("DELETE FROM receipts WHERE receiptid = :receiptid");
				$stmt->bindParam(':receiptid', $this->receiptid);

				$stmt->execute();

				$receipt = $stmt->fetch(PDO::FETCH_ASSOC);

				if($stmt->rowCount() == 0){
					echo "Receipt, ". $receipt['receiptid'] . "has been deleted";
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