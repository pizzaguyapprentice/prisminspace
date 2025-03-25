<?php
	include "../classes/database.php";

	class Order extends Database{
		private $orderid;
		private $date;
		private $userid;
		private $productid;
		private $address;
		private $city;
		private $postcode;

		public function __construct($orderid, $date, $userid, $productid, $address, $city, $postcode){
			$db = new Credentials();
			$this->db_address = $db->get_db_address();
			$this->db_username = $db->get_db_username();
			$this->db_password = $db->get_db_password();
			$this->db_name = $db->get_db_name();
			
			$this->orderid = $orderid;
			$this->date = $date;
			$this->userid = $userid;
			$this->productid = $productid;
			$this->address = $address;
			$this->city = $city;
			$this->postcode = $postcode;
		}

		public function add_order(){
			try{
				$stmt = ($this->connect())->prepare("INSERT INTO orders (orderid, date, userid, productid, address, city, postcode) VALUES (:orderid, :date, :userid, :productid, :address, :city, :postcode)");
				$stmt->bindParam(':orderid', $this->orderid);
				$stmt->bindParam(':date', $this->date);
				$stmt->bindParam(':userid', $this->userid);
				$stmt->bindParam(':productid', $this->productid);

				$stmt->execute();
			}
			catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}
		}

		public function select_order(){
			try{
				$stmt = ($this->connect())->prepare("SELECT * FROM orders WHERE orderid = :orderid");
				$stmt->bindParam(':orderid', $this->orderid);

				$stmt->execute();

				$order = $stmt->fetch(PDO::FETCH_ASSOC);
				return $order;
			}
			catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
		}

		public function update_user(){
			
		}

		public function delete_order(){
			try{
				$stmt = ($this->connect())->prepare("DELETE FROM orders WHERE orderid = :orderid");
				$stmt->bindParam(':orderid', $this->orderid);

				$stmt->execute();

				$order = $stmt->fetch(PDO::FETCH_ASSOC);

				if($stmt->rowCount() == 0){
					echo "Order, ". $order['orderid'] . "has been deleted";
				}
				else{
					echo "Order has not been found";
				}
			}
			catch(PDOException $e){
				echo "Connection failed: ". $e->getMessage();
			}
		}
	}
?>