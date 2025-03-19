<!DOCTYPE html>

<?php
			$servername = "localhost";
			$username = "root";
			$password = "123";
			$dbname = "prisminspacedb";

			//$userfirstname = $_POST["firstname"];
			//$userusername = $_POST["username"];
			//$userpassword = $_POST["password"];

			if(isset($_POST['username']) && isset($_POST['password']) && $_SERVER["REQUEST_METHOD"] == "POST"){
				try{
					$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$stmt = $conn->prepare("SELECT username FROM users WHERE username = :username AND password = :password");
					$stmt->bindParam(':username', $_POST['username']);
					$stmt->bindParam(':password', $_POST['password']);
					$stmt->execute();

					$user = $stmt->fetch(PDO::FETCH_ASSOC);

					if($user){
						echo "Welcome, ".$user['username']." you have logged in!";
						session_start();
						$_SESSION['login_username'] = $_POST['username'];
						header("location: ../index/index.php");
					}else{
						echo "This account doesn't exist, or you have given incorrect credentials";
					}

				} catch (PDOException $e){
					echo "Connection failed: ". $e->getMessage();
				}
				
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