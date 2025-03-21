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
    require "../basket/db_connect.php";


    try {

        $userfirstname = $_POST["firstname"];
        $userusername = $_POST["username"];
        $userpassword = $_POST["password"];
        $stmt = $conn->prepare("INSERT INTO users (firstname, username, password) VALUES ('$userfirstname', '$userusername', '$userpassword')");
        $stmt->execute();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
	<body>
		<?php
			include "../navbar/navbar.php";	
		?>
		<br>
		<p>Welcome <?php echo $_POST["firstname"]; ?>, You Have Registered.<br>
		Now Navigate To The <a href="../login/login.php">Login</a> Page To Login To The Website</p>
	</body>

</html>