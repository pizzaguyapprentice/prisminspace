<!DOCTYPE html>

<html lang="en">

    <!-- Header above all links -->
    <?php
        include("../onload/header.php");
    ?>

    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">

    <body>
        <!-- Has to be above body for grained to be enabled -->
        <?php
            include("../grained-master/settings.php");
        ?>
        <!-- Navbar enabled-->
        <?php
            include("../onload/navbar.php");
        ?>

        <!-- Contains main body of content-->
        <div class="main">
            <div class="main-background" id="grained">
            
                <!-- Is the background of where cards are situated-->
                <div class="cardholder">
                    <div class="paragraph">
                        <div class="videoholder">
                            <h2 class="p-title">Welcome to: <span id="small-logo">PRISMINSPACE</span></h2>
                            <video class="banner" type="video/mp4" autoplay muted loop>
                                <source src="../img/backgroundbanner.mp4" type="video/mp4">
                            </video>
                            
                        </div>
                    
                        <p class="p-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur metus et massa congue, ut viverra magna venenatis. Nunc congue, tellus vulputate porta eleifend, turpis enim bibendum eros, at molestie nisi felis non lectus. Vestibulum semper sed neque eget mattis. Nulla a auctor quam, vel congue magna. Sed ac nunc et mi placerat vestibulum. Mauris nec malesuada libero. Ut consequat bibendum ante id ultricies. Maecenas consequat lorem sed elit luctus, sit amet vulputate sapien faucibus. Quisque ante velit, efficitur in ante vel, vulputate egestas turpis. Maecenas ut varius lectus. 
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer enabled-->
        <?php
            include("../onload/footer.php");
        ?>

    </body>
    
    <!-- Has to be below body for grained to be enabled -->
    <script src="../grained-master/options.js">
    </script>
</html>
