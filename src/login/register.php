<!DOCTYPE html>

<html lang="en">

	<!-- Header above all links -->
	<?php
        include("../onload/header.php");
    ?>

	<link rel="stylesheet" href="login.css?v=<?php echo time(); ?>">

	<?php
		include "../classes/user.php";
		$message = "";

		if(isset($_POST['register_firstname']) && isset($_POST['register_username']) && isset($_POST['register_password']) && isset($_POST['register_repeat_password']) && $_SERVER["REQUEST_METHOD"] == "POST"){
			if(((strlen($_POST['register_username']) ?? 2) < 3)){
				$message = "Username Must Be 3 Or More Characters";
			}
			else if(((strlen($_POST['register_username'])) > 30)){
				$message = "Username Must Be Less Than 30 Characters";
			}
			else if(((strlen($_POST['register_password']) ?? 0) > 30)){
				$message = "Password Must Be Less Than 30 Characters";
			}
			else if(User::does_user_exist($_POST['register_username'])){
				$message = "A User With That Username Already Exists";
			}
			else if($_POST['register_password'] != $_POST['register_repeat_password']){
				$message = "Passwords Do Not Match";
			}
			else{
				$user = new User($_POST['register_firstname'], $_POST['register_username'], $_POST['register_password'], "N/A");
				$user->add_user();
				$user->login_user("../login/login.php");
			}
		}
	?>
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
								<input type="password" id="repeatPassword" name="register_repeat_password" required>
								<br><br><br><br>
								<input type="submit" value="Create Account">
								<?php
									echo "<br>";
									echo "<br>";
									echo "<p style='color: red; font-size:0.6rem'>" . $message . "</p>";
								?>
							</form>
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
