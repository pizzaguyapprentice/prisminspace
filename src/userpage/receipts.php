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
            include("fetchreceipts.php");
        ?>


        <?php
            include("../onload/footer.php");
        ?>
    </body>
</html>