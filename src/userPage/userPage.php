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
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "123";
		$dbname = "prisminspacedb";

		/*try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$userfirstname = $_POST["firstname"];
			$userusername = $_POST["username"];
			$userpassword = $_POST["password"];
			$stmt = $conn->prepare("INSERT INTO users (firstname, username, password) VALUES ('$userfirstname', '$userusername', '$userpassword')");
			$stmt->execute();
		  } catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		  }
		  $conn = null;*/
	?>
	<body>
		<?php
			include "../navbar/navbar.php";	
		?>
		<br>
		<p>Hello <?php echo $_POST["firstname"]; ?>, You Have Logged In.<br>
		<input type="button" value="Delete Account">
	</body>

</html>