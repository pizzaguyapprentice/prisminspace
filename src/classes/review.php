<?php
	include "../classes/database.php";

	class Review extends Database{
		private $reviewid;
		private $productid;
		private $reviewdescription;
		private $reviewrating;
		private $userid;

		public function __construct($reviewid, $productid, $reviewdescription, $reviewrating, $userid){
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

		public function add_review(){
			try{
				$stmt = ($this->connect())->prepare("INSERT INTO reviews (reviewid, productid, reviewdescription, reviewrating, userid) VALUES (:reviewid, :productid, :reviewdescription, :reviewrating, :userid)");
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

		public function select_review(){
			try{
				$stmt = ($this->connect())->prepare("SELECT * FROM reviews WHERE reviewid = :reviewid");
				$stmt->bindParam(':reviewid', $this->reviewid);

				$stmt->execute();

				$review = $stmt->fetch(PDO::FETCH_ASSOC);
				return $review;
			}
			catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
		}

		public function update_review(){
			
		}

		public function delete_review(){
			try{
				$stmt = ($this->connect())->prepare("DELETE FROM reviews WHERE reviewid = :reviewid");
				$stmt->bindParam(':reviewid', $this->reviewid);

				$stmt->execute();

				$review = $stmt->fetch(PDO::FETCH_ASSOC);

				if($stmt->rowCount() == 0){
					echo "Review, ". $review['reviewid'] . "has been deleted";
				}
				else{
					echo "Review has not been found";
				}
			}
			catch(PDOException $e){
				echo "Connection failed: ". $e->getMessage();
			}
		}
	}
?>