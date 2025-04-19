<!DOCTYPE html>

<html lang="en">

	<!-- Header above all links -->
	<?php
        include("../onload/header.php");
    ?>

	<link rel ="stylesheet" href="../main.css">
	<body>
		<?php
			include "../onload/navbar.php";	
		?>
		<br>
		<p>Welcome <?php echo $_SESSION["login_username"]; ?>, You Have Registered.<br>
		You Have Been Logged In Automatically But To Login Manually Visit The <a href="../login/login.php">Login</a> Page To Login!</p>

		<?php
            include("../onload/footer.php");
        ?>
	</body>


</html>