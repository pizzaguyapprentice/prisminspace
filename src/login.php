<!DOCTYPE html>

<html lang="en">
    <head>
        <link rel="icon" href="placeholderlogo.svg">
        <title>prisminspace</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel ="stylesheet" href="realstyles.css">
        <link rel="stylesheet" href="login.css">
        <!-- <link rel="stylesheet" href="./output.css"> -->
    </head>

    <body>

        <!-- navbar is sticky -->
        <div class="navbar">
            <!-- navbar contains the entirety of the items below -->
            <div id="logo-small" class="navbar-item">
                <img src="placeholderlogo.svg" class="" alt="small logo prisminspace">
            </div>

            <!-- menubar, will be responsive based on viewport -->
            <div id="menu-bar" class="navbar-item">
                <div class="menu-item">
                    <input type="text" placeholder="Search here...">
                </div>
            <!-- menubar, will be responsive based on viewport -->
                <div class="menu-item">
                    <a href="#">Products</a>
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
                <h1>PRISMINSPACE</h1>
            </div>

            <!--
            will check whether the user is currently logged in
            will be replaced by a "log in/register prompt" if not,
            if logged in, will forward the user to their shopping basket
            -->
            <div id="user-welcome" class="navbar-item">
                <div class="user-item">Welcome, [USERNAME]!</div>
                <div class="user-item"><img src="shoppingcart.svg" alt="shopping basket icon"></div>
                
            </div>

            <div id="user-icon" class="navbar-item">
                <a href="login.php"><img src="usericon.svg" alt="user login icon"></a>
            </div>
        </div>

        <div class="main">
            <div class="empty">

            </div>
            <div class="inputholder">
                
                <div id="card1" class="card">
                    <div class="card-border">
                    		<br>
                    		<h2>Login</h2>
                    		<br>
                    		<label for="username">Username: </label>
								<input type="text" id="username">
								<br><br><br>
								<label for="password">Password: </label>
								<input type="password" id="password">
								<br><br><br>
								<input type="button" value="Submit">
								<br><br><br><br><br><br><br><br>
								<p>Don't Have A Login? <a href="register.php">Register</a> Here!</p>

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