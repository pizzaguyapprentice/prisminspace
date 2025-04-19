<!DOCTYPE html>
<html lang="en">

	<!-- Header above all links -->
	<?php
        include("../onload/header.php");
    ?>

	<link rel ="stylesheet" href="../main.css">
	<link rel="stylesheet" href="registered.css">

	<body>
		<?php
			include "../onload/navbar.php";	
		?>
		<br>
		
		<?php
			include "../classes/user.php";
			if(array_key_exists("signout", $_POST)){
				$_SESSION['login_username'] = 'an';
			}

			echo "<p>Hello " . $_SESSION['user']['username'] . ", Welcome To Your User Page.</p>";

			$servername = "localhost";
			$username = "root";
			$password = "123";
			$dbname = "prisminspacedb";


			if(array_key_exists("delete", $_POST)){
				$user = new User("N/A", $_SESSION['login_username'], "N/A", "N/A");
				$user->delete_user();
				$_SESSION['login_username'] = 'an';
			}


			//Keep Last
			if($_SESSION['login_username'] == 'an'){
				header("location: ../index/index.php");
			}
		?>

		<form method="post" action="uploadpicture.php" enctype="multipart/form-data" >
			<input type="file" name="profilepicture" accept="image/* required">
			<input type="submit" name="upload" value="Upload picture">
		</form>

		<form method="post" action="fetchreceipts.php" >
			<input type="submit" name="fetchreceipts" value="Show transation history">
		</form>

		<form method="POST">
			<input type="submit" name="delete" value="Delete account">
		</form>

		<form method="POST">
			<input type="submit" name="signout" value="Sign Out">
		</form>
		

		<?php
            include("../onload/footer.php");
        ?>
	</body>

</html>