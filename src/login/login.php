<!DOCTYPE html>

<?php
	include "../classes/users.php";

	if(isset($_POST['username']) && isset($_POST['password']) && $_SERVER["REQUEST_METHOD"] == "POST"){
		$user = new User();
		echo $user->login_user($_POST['username'], $_POST['password']);
	}
?>

<html lang="en">
    <head>
        <link rel="icon" href="placeholderlogo.svg">
        <title>prisminspace</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel ="stylesheet" href="../main.css">
        <link rel="stylesheet" href="login.css">
        <!-- <link rel="stylesheet" href="./output.css"> -->
    </head>

    <body>

		<?php
			include "../navbar/navbar.php";		
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
						</form>
						<br><br><br><br><br><br><br><br>
						<p>Don't Have A Login? <a href="../register/register.php">Register</a> Here!</p>
                    </div>
                </div>
            </div>

        </div>

        <?php
			include "../footer/footer.php";
		?>
       
    </body>
</html>

<?php
    //echo "It just works - Todd Howard does it";
?>