
<!-- navbar is sticky -->
<div class="navbar">
	<link rel ="stylesheet" href="../navbar/navbar.css?v=<?php echo time();?>">
	<!-- navbar contains the entirety of the items below -->
	<div id="logo-small" class="navbar-item">
		<img src="../img/logo.png" class="" alt="small logo prisminspace">
	</div>
	<!-- menubar, will be responsive based on viewport -->
	<div id="menu-bar" class="navbar-item">


		<form class="menu-item" id="search" method="post" action="../products/products.php">
			<input type="submit" hidden />
			<input class="menu-item" id="searchbar" type="text" placeholder="Search here..." cols="5">
			<div id="filterholder">
				<select name="filter" id="filter">
					<option value="productname">Name</option>
					<option value="category">Category</option>
					<option value="price">Price</option>
				</select> 
			</div>
		</form>

		<!-- menubar, will be responsive based on viewport -->
		<div class="menu-item">
			<a href="../products/products.php">Products</a>
		</div>
		<div class="menu-item">
			<a href="#">About</a>
		</div>
		<div class="menu-item">
			<a href="#">Contact</a>
		</div>
		</div>
		<!-- has a scalable image of the main logo -->
		<div id="logo-big" class="navbar-item">
			<a href="../index/index.php"><h1>PRISMINSPACE</h1></a>
	</div>
	<!--
	will check whether the user is currently logged in
	will be replaced by a "log in/register prompt" if not,
	if logged in, will forward the user to their shopping basket
	-->
	<div id="user-welcome" class="navbar-item">
		<!-- Contains the username of user if logged in,
		otherwise prompts user to log in-->
		<!-- <div class="user-item"><p>Welcome, [USERNAME]!</p></div> -->
		<?php
			session_start();
			//unset($_SESSION['login_username']);
			if(($_SESSION['login_username'] ?? "an") == "an"){
				echo "<div class='user-item'><p>Welcome, [USERNAME]!</p></div>";
			}
			else{
				echo "<div class='user-item'><p>Welcome, ";
				echo $_SESSION['login_username'];
				echo "!</p></div>";
			}
		?>
		<div class="user-item"><a href="../basket/basket.php"><img src="../img/shoppingcart.svg" alt="shopping basket icon"></a></div>
	</div>
	<!-- Contains the icon of user if logged in,
	otherwise prompts user to log in-->
	<div id="user-icon" class="navbar-item">

	<?php

		$rootdir = $_SERVER['DOCUMENT_ROOT'];

		$servername = "localhost";
		$username = "root";
		$password = "123";
		$dbname = "prisminspacedb";

		try {
			$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo("Database error: " . $e->getMessage());
		}

		if (isset($_SESSION['login_username'])) {
			$login_username = $_SESSION['login_username'];
		} else {
			$login_username = null;
		}

		try {
			$stmt = $pdo->prepare("SELECT profilepicture FROM users WHERE username = :login_username");
			$stmt->execute(['login_username' => $login_username]);
			$user = $stmt->fetch(PDO::FETCH_ASSOC);

			$profilepicture = !empty($user['profilepicture']) ? $user['profilepicture'] : 'usericon.svg';

			// Ensure file exists in server's filesystem
			if (!file_exists("$rootdir/userPage/userprofiles/$profilepicture")) {
				$profilepicture = 'usericon.svg';
			}

			$imgpath = "/userPage/userprofiles/" . htmlspecialchars($profilepicture);

			if($login_username == "an") {
				echo "<a href='../login/login.php'>
					<img src='$imgpath' alt='User Login Icon' width='64'>
				</a>";
			}else{
				echo "<a href='../userPage/userPage.php'>
					<img src='$imgpath' alt='User Login Icon' width='64'>
				</a>";
			}
		} catch (PDOException $e) {
			echo("WOmp woopmp: " . $e->getMessage());
		}
	?>


	</div>
</div>