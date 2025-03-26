<?php
include "../navbar/navbar.php";

if(!isset($_SESSION['receipt'])) {
    header('Location: basket.php');
    exit();
}

$receipt = $_SESSION['receipt'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" href="../img/placeholderlogo.svg">
        <title>Order Confirmed - prisminspace</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../main.css">
        <link rel="stylesheet" href="basket.css">
    </head>
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

        <?php include "../footer/footer.php"; ?>
    </body>
</html>