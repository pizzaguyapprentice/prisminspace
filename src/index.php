<!DOCTYPE html>

<html lang="en">
    <head>
        <link rel="icon" href="placeholderlogo.svg">
        <title>prisminspace</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel ="stylesheet" href="realstyles.css">
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
            <div class="cardholder">
                
                <div id="card1" class="card">
                    <div class="card-border">
                        <img src="placeholderlogo.svg" alt="shopping item">
                        <span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque arcu dolor, ultrices ut tellus in, tincidunt imperdiet elit. Donec at facilisis elit. Phasellus a tortor justo. Pellentesque eleifend in nisi quis pharetra. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut eget aliquam nibh. Fusce et pellentesque tellus. Phasellus orci arcu, volutpat vulputate pharetra id, pellentesque sit amet risus. Phasellus vitae orci et massa accumsan convallis a eget nisi. Nam semper orci vel sagittis convallis. Phasellus metus arcu, gravida eget vehicula id, pulvinar et libero. Vivamus tempor purus et neque tempus egestas. Vestibulum congue varius sagittis.</span>
                    </div>
                </div>

                <div id="card2" class="card">

                </div>

                <div id="card3" class="card">

                </div>

                <div id="card4" class="card">

                </div>

                <div id="card5" class="card">

                </div>

                <div id="card6" class="card">

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
