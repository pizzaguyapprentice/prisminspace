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
			if(array_key_exists("signout", $_POST)){
				$_SESSION['login_username'] = 'an';
			}

			$servername = "localhost";
			$username = "root";
			$password = "123";
			$dbname = "prisminspacedb";


			if(array_key_exists("delete", $_POST)){
				try{
					$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$stmt = $conn->prepare("DELETE FROM users WHERE username = :username");
					$stmt->bindParam(':username', $_SESSION['login_username']);

					$stmt->execute();

					if($stmt->rowCount() == 0){
						echo "User, ".$user['username']."has been deleted";
					}else{
						echo "User has not been found";
					}

				} catch (PDOException $e){
					echo "Connection failed: ". $e->getMessage();
				}
				$_SESSION['login_username'] = 'an';
			}


			//Keep Last
			if($_SESSION['login_username'] == 'an'){
				header("location: ../index/index.php");
			}
		?>

		<form method=POST>
			<input type="submit" name="delete" value="Delete Account">
		</form>

		<form method=POST>
			<input type="submit" name="signout" value="Sign Out">
		</form>
		

		<?php 
		
		?>
	</body>

</html>