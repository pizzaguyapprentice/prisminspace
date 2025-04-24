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
                            PRISMINSPACE is an alternative clothing brand blending grunge, cybercigilist, and goth aesthetics into distinctive, modern designs. Our pieces are made for those who move against the current—individuals drawn to bold silhouettes, dark tones, and unconventional style. Explore the collection and discover clothing that reflects your edge.
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
