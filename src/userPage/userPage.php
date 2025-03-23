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
			include "../classes/users.php";
			if(array_key_exists("signout", $_POST)){
				$_SESSION['login_username'] = 'an';
			}

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

		<form method=POST action="uploadpicture.php" enctype="multipart/form-data" >
			<input type="file" name="profilepicture" accept="image/* required">
			<input type="submit" name="upload" value="Upload picture">
		</form>

		<form method=POST>
			<input type="submit" name="delete" value="Delete account">
		</form>

		<form method=POST>
			<input type="submit" name="signout" value="Sign Out">
		</form>
		

		<?php 
		
		?>
	</body>

</html>