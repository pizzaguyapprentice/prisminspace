<!DOCTYPE html>

<html lang="en">
    <head>
        <title>prisminspace</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel ="stylesheet" href="products.css?v=<?php echo time(); ?>">

		<style> 
            #grained{
                pointer-events: none;
				isolation: isolate;
            }
    	</style>
    </head>

    <body>

        <!-- Navbar enabled-->
        <?php
            include("../navbar/navbar.php");
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
						include("fetchproducts.php");
					?>
            	</div>
			</div>
        </div>
        <?php
            include("../footer/footer.php");
        ?>
    </body>

	<!-- Has to be below body for grained to be enabled -->
	<script src="../grained-master/options.js">
    </script>

</html>
