<!-- navbar is sticky -->
<div class="navbar">
	<link rel ="stylesheet" href="../navbar.css">
	<!-- navbar contains the entirety of the items below -->
	<div id="logo-small" class="navbar-item">
		<img src="../img/placeholderlogo.svg" class="" alt="small logo prisminspace">
	</div>
	<!-- menubar, will be responsive based on viewport -->
	<div id="menu-bar" class="navbar-item">
	<div class="menu-item">
		<input type="text" placeholder="Search here...">
	</div>
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
		<a href="../index/index.php" class="removeStyle"><h1>PRISMINSPACE</h1></a>
	</div>
	<!--
	will check whether the user is currently logged in
	will be replaced by a "log in/register prompt" if not,
	if logged in, will forward the user to their shopping basket
	-->
	<div id="user-welcome" class="navbar-item">
		<!-- Contains the username of user if logged in,
		otherwise prompts user to log in-->
		<div class="user-item">Welcome, [USERNAME]!</div>
		<div class="user-item"><a href="../basket/basket.php"><img src="../img/shoppingcart.svg" alt="shopping basket icon"></a></div>
	</div>
	<!-- Contains the icon of user if logged in,
	otherwise prompts user to log in-->
	<div id="user-icon" class="navbar-item">
		<a href="../login/login.php"><img src="../img/usericon.svg" alt="user login icon"></a>
	</div>
</div>