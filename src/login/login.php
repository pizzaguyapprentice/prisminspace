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
	<link rel ="stylesheet" href="../main.css">
	<link rel="stylesheet" href="login.css">

    <body>

		<?php
			include "../onload/navbar.php";		
		?>

        <div class="main">
            <div class="empty">

            </div>
            <div class="inputholder">
                
                <div id="card1" class="card">
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
							<input type="submit" value="Login">
							<?php
								echo "<br>";
								echo "<br>";
								echo "<p style='color: red; font-size:0.6rem'>" . $message . "</p>";
							?>
						</form>
						<br><br><br><br><br><br>
						<p>Don't Have A Login? <a href="../register/register.php">Register</a> Here!</p>
                    </div>
                </div>
            </div>

        </div>

        <?php
			include "../onload/footer.php";
		?>
       
    </body>
</html>

<?php
    //echo "It just works - Todd Howard does it";
?>