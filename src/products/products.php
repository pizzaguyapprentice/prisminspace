<!DOCTYPE html>

<html lang="en">
    <?php
        include("../onload/header.php");
    ?>


    <link rel ="stylesheet" href="products.css?v=<?php echo time(); ?>">

    <body>

        <!-- Navbar enabled-->
        <?php
            include("../onload/navbar.php");
        ?>
        <?php
        $newin = false;
            include("../basket/getbasket.php");
        ?>

		<!-- Has to be above body for grained to be enabled -->
		<?php
            include("../grained-master/settings.php");
        ?>

        <!-- Contains main body of content-->
        <div class="main">
			<div class="main-background" id="grained">

				<!-- Is the background of where cards are situated-->
				<div class="cardholder">
					
					<!-- Singular Card Container that holds-->
					<?php 

                        if (isset($_GET['query']) || isset($_GET['filter'])) {

                            include("./filteredfetchproducts.php");

                            //echo "User came through search/filter.";

                        } else {

                            include("./fetchproducts.php");

                            //echo "User came through direct navigation.";
                        }
						//include("fetchproducts.php");
					?>
            	</div>
			</div>
        </div>
        <?php
            include("../onload/footer.php");
        ?>
    </body>

	<!-- Has to be below body for grained to be enabled -->
	<script src="../grained-master/options.js">
    </script>

</html>
