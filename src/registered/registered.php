<!DOCTYPE html>

<html lang="en">
    <head>
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
		<p>Welcome <?php echo $_SESSION["login_username"]; ?>, You Have Registered.<br>
		You Have Been Logged In Automatically But To Login Manually Visit The <a href="../login/login.php">Login</a> Page To Login!</p>
	</body>

</html>