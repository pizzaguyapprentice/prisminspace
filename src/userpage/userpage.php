<!DOCTYPE html>
<html lang="en">
	
	<link rel="stylesheet" href="userpagestyle.css?v=<?php echo time(); ?>">

	<!-- Header above all links -->
	<?php
        include("../onload/header.php");
    ?>
	
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

			//echo "<p>Hello " . $_SESSION['user']['username'] . ", Welcome To Your User Page.</p>";

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


		<div class="userpanel">

			<div class="userpaneltitle">
				<h2> <?php echo $_SESSION['user']['username'] . ", welcome to your user page!";?> </h2>
			</div>

			<div class="profilepicture">
				<?php echo "<img src='$imgpath' alt='User Login Icon' width='128'>" ?>
			</div>


			<div class="userpanelitem">
				<div class="itemborder">
					<div class="details">
						Change and customize your profile picture here:
					</div>
				
					<form method="post" action="uploadpicture.php" enctype="multipart/form-data" >
						<input type="file" name="profilepicture" accept="image/* required" class="browsebutton">
						<input type="submit" name="upload" value="Upload picture" class="submitbutton">
					</form>
				</div>
			</div>
			<div class="userpanelitem">
				<div class="itemborder">
					<div class="details">
						View your transaction history:
					</div>
					<form method="post" action="receipts.php" >
						<input type="submit" name="receipts" value="Show transation history" class="submitbutton">
					</form>
				</div>
			</div>
			<div class="userpanelitem">
				<div class="itemborder">
					<div class="details">
						Delete your account:
					</div>
					<form method="POST">
						<input type="submit" name="delete" value="Delete account" class="submitbutton">
					</form>
				</div>
			</div>
			<div class="userpanelitem">
				<div class="itemborder">
					<div class="details">
						Sign out:
					</div>
					<form method="POST">
						<input type="submit" name="signout" value="Sign Out" class="submitbutton">
					</form>
				</div>
			</div>
		</div>
		
		<?php
            include("../onload/footer.php");
        ?>
	</body>

</html>