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
	<?php
		include "../classes/users.php";

		$message = "";

		if(isset($_POST['register_firstname']) && isset($_POST['register_username']) && isset($_POST['register_password']) && isset($_POST['register_username']) && $_SERVER["REQUEST_METHOD"] == "POST"){
			if(((strlen($_POST['register_username']) ?? 2) < 3)){
				$message = "Username Must Be 3 Or More Characters";
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
				$user->login_user("../registered/registered.php");
			}
		}
	?>
    <body>
		<?php
			include "../navbar/navbar.php";		
		?>
		<div class="main">
			<div class="empty"></div>
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

		<?php
			include "../footer/footer.php";
		?>
       
	</body>
</html>
