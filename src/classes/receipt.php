<?php
	include "../classes/database.php";

	class Receipt extends Database{
		private $receiptid;
		private $userid;
		private $orderid;
		private $date;
		private $totalprice;
		private $email;

		public function __construct($receiptid, $userid, $orderid, $date, $totalprice, $email){
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
			$this->email = $email;
		}

		public function add_receipt(){
			try{
				$stmt = ($this->connect())->prepare("INSERT INTO receipts (receiptid, userid, orderid, date, totalprice, email) VALUES (:receiptid, :userid, :orderid, :date, :totalprice, :email)");
				$stmt->bindParam(':receiptid', $this->receiptid);
				$stmt->bindParam(':userid', $this->userid);
				$stmt->bindParam(':orderid', $this->orderid);
				$stmt->bindParam(':date', $this->date);
				$stmt->bindParam(':totalprice', $this->totalprice);
				$stmt->bindParam(':email', $this->email);

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

		public function update_receipt(){
			
		}

		public function delete_receipt(){
			try{
				$stmt = ($this->connect())->prepare("DELETE FROM receipts WHERE receiptid = :receiptid");
				$stmt->bindParam(':receiptid', $this->receiptid);

				$stmt->execute();

				if($stmt->rowCount() == 1){
					echo "Receipt ". $this->receiptid . " has been deleted";
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