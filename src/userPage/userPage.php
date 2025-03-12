<!DOCTYPE html>

<html lang="en">
    <head>
        <link rel="icon" href="placeholderlogo.svg">
        <title>prisminspace</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel ="stylesheet" href="../main.css">
        <link rel="stylesheet" href="registered.css">
        <!-- <link rel="stylesheet" href="./output.css"> -->
    </head>

	<body>
		<?php
			include "../navbar/navbar.php";	
		?>
		<br>

		<?php
		$servername = "localhost";
		$username = "root";
		$password = "123";
		$dbname = "prisminspacedb";

		//$userfirstname = $_POST["firstname"];
		//$userusername = $_POST["username"];
		//$userpassword = $_POST["password"];

		if(isset($_POST['username']) && isset($_POST['password'])){
			try{
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $conn->prepare("SELECT firstname FROM users WHERE username = :username AND password = :password");
			$stmt->bindParam(':username', $_POST['username']);
       		$stmt->bindParam(':password', $_POST['password']);
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_ASSOC);
			if($user){
				echo "Welcome, ".$user['firstname']." you have logged in!";
			}else{
				echo "This account doesn't exist, or you have given incorrect credentials";
			}
			} catch (PDOException $e){
				echo "Connection failed: ". $e->getMessage();
			}
			
			
		}
		else{
	
			echo "Womp womp";
			
		}

	?>



		<input type="button" value="Delete Account">
	</body>

</html>