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
						<form action="../registered/registered.php" method="POST">
							<br>
							<h2>Register</h2>
							<br>
							<label for="firstname">Firstname: </label>
							<input type="text" id="firstname" name="firstname" required>
							<br><br>
							<label for="username">Username: </label>
							<input type="text" id="username" name="username" required>
							<br><br>
							<label for="password">Password: </label>
							<input type="password" id="password" name="password" required>
							<br><br>
							<label for="repeatPassword">Repeat Password: </label>
							<input type="password" id="repeatPassword">
							<br><br><br><br>
							<input type="submit" value="Create Account">
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="footer">
			<div class="copyright">

			</div>
			<div class="">
    
			</div>
			<div class="">
                
			</div>
		</div>
       
	</body>
</html>

<?php
    //echo "It just works - Todd Howard does it";
?>