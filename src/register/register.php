<!DOCTYPE html>

<html lang="en">
    <head>
        <link rel="icon" href="placeholderlogo.svg">
        <title>prisminspace</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel ="stylesheet" href="../main.css">
        <link rel="stylesheet" href="register.css">
        <!-- <link rel="stylesheet" href="./output.css"> -->
    </head>

    <body>
		<?php
			include "../navbar/navbar.php";		
		?>

		<?php
			$servername = "localhost";
			$username = "root";
			$password = "123";
			$dbname = "prisminspacedb";

			try{
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$userfirstname = $_POST["register_firstname"];
				$userusername = $_POST["register_username"];
				$userpassword = $_POST["register_password"];
				$stmt = $conn->prepare("INSERT INTO users (firstname, username, password) VALUES ('$userfirstname', '$userusername', '$userpassword')");
				$stmt->execute();
				header("location: ../index/index.php");
			}
			catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}
			$conn = null;
		?>
		<div class="main">
			<div class="empty">

			</div>
			<div class="inputholder">        
				<div id="card1" class="card">
					<div class="card-border">
						<form method="POST">
							<br>
							<h2>Register</h2>
							<br>
							<label for="firstname">Firstname: </label>
							<input type="text" id="firstname" name="register_firstname" required>
							<br><br>
							<label for="username">Username: </label>
							<input type="text" id="username" name="register_username" required>
							<br><br>
							<label for="password">Password: </label>
							<input type="password" id="password" name="register_password" required>
							<br><br>
							<label for="repeatPassword">Repeat Password: </label>
							<input type="password" id="repeatPassword" name="register_repeatPassword" required>
							<br><br><br><br>
							<input type="submit" value="Create Account">
						</form>
					</div>
				</div>
			</div>
		</div>

		<?php
			include "../footer/footer.php";
		?>
       
	</body>
</html>
