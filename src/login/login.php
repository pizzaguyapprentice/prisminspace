<!DOCTYPE html>

<?php
	include "../classes/user.php";

	$message = "";

	if(isset($_POST['username']) && isset($_POST['password']) && $_SERVER["REQUEST_METHOD"] == "POST"){
		$user = new User("N/A", $_POST['username'], $_POST['password'], "N/A");
		$message = $user->login_user("../index/index.php");
	}
?>

<html lang="en">

    <!-- Header above all links -->
    <?php
        include("../onload/header.php");
    ?>

	<!-- Links based on site -->
	<link rel="stylesheet" href="login.css?v=<?php echo time(); ?>">

    <body>

		<?php
			include("../grained-master/settings.php");
		?>

		<?php
			include "../onload/navbar.php";		
		?>

        <div class="main">
			<div class="main-background" id="grained">

				<div class="cardholder">
					
					<div class="card">
						<div class="card-border">
							<form action="" method="POST">
								<br>
								<h2>Login</h2>
								<br>
								<label for="username">Username: </label>
								<input type="text" id="username" name="username" required>
								<br><br><br>
								<label for="password">Password: </label>
								<input type="password" id="password" name="password" required>
								<br><br><br>
								<input type="submit" value="Login" class="loginbutton">
								<?php
									echo "<br>";
									echo "<br>";
									echo "<p style='color: red; font-size:0.6rem'>" . $message . "</p>";
								?>
							</form>
							<br><br><br><br><br><br>
							<p>Don't Have A Login? <a href="../login/register.php">Register</a> Here!</p>
						</div>
					</div>
				</div>
			</div>

        </div>

        <?php
			include "../onload/footer.php";
		?>
       
    </body>

	<script src="../grained-master/options.js">
    </script>
</html>

<?php
    //echo "It just works - Todd Howard does it";
?>