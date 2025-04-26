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
        
         <?php
            include("../basket/getbasket.php");
        ?>

        <!-- Contains main body of content-->
        <div class="main">
            <div class="main-background" id="grained">
            
                <!-- Is the background of where cards are situated-->
                <div class="contentholder">
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
                        <p class="p-text" id="specialproductholder">
                            View our full&nbsp<a href="../products/products.php"><span class="specialproduct">products</span></a>&nbsprange.
                        </p>
                        <div class="downarrowholder">
                            <a id="downarrowlink" href="#specialtext"><img src="../img/downarrow.svg" class="downarrowimage"></a>
                        </div>
                        <p class="p-text" id="specialtext">
                            Shop the latest collection. Become something greater.
                        </p>
                        <div class="cardholder">
                            <?php
                                $newin = true;
                                include("../products/fetchproducts.php");
                                
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer enabled-->
        <?php
            include("../onload/footer.php");
        ?>

    </body>

    <script>
        document.getElementById('downarrowlink').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('specialtext').scrollIntoView({ behavior: 'smooth', block: 'center',});
        });
    </script>
    
    <!-- Has to be below body for grained to be enabled -->
    <script src="../grained-master/options.js">
    </script>
</html>
