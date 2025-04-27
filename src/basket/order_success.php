<?php
include "../onload/navbar.php";

if(!isset($_SESSION['receipt'])) {
    header('Location: basket.php');
    exit();
}

$receipt = $_SESSION['receipt'];
?>

<!DOCTYPE html>
<html lang="en">

    <?php
        include("../onload/header.php");
    ?>

    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="basket.css">

    <body>
        <div class="main">
            <div class="cardholder">
                <div class="order-success">
                    <h2>Thank You For Your Order!</h2>
                    <p>Your order has been confirmed and will be processed shortly.</p>
                    
                    <?php 
                    echo $receipt;
                    
      
                    unset($_SESSION['receipt']);
                    ?>
                    
                    <a href="../products/products.php" class="continue-shopping">Continue Shopping</a>
                </div>
            </div>
        </div>


    </body>
    <?php include "../onload/footer.php"; ?>
</html>