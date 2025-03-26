<?php
require_once 'basket_functions.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" href="../img/placeholderlogo.svg">
        <title>Your Basket - prisminspace</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../main.css">
        <link rel="stylesheet" href="basket.css">
    </head>
    <body>
        <?php 
        include "../navbar/navbar.php";

        // Check if user is logged in
        if(!isset($_SESSION['login_username'])) {
            header('Location: ../login/login.php');
            exit();
        }

        // Get userID from username
        $conn = new mysqli('localhost', 'root', '123', 'prisminspacedb');
        $username = $_SESSION['login_username'];
        $result = mysqli_query($conn, "SELECT userid FROM users WHERE username = '$username'");
        $user = mysqli_fetch_assoc($result);
        $userID = $user['userid'];

        // Handle add/remove from basket
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['add_to_basket'])) {
                addToBasket($_POST['productid']);
            }
            elseif(isset($_POST['remove_from_basket'])) {
                removeFromBasket($_POST['productid']);
            }
        }

        // Get all products and basket items
        $products = getProducts();
        $basketItems = getBasketItems();
        $total = calculateTotal($basketItems);
        ?>

        <div class="main">
            <div class="cardholder">
                <!-- Show available products -->
                <div class="products-grid">
                    <?php foreach($products as $product): ?>
                        <div class="product-card">
                            <img src="<?php echo $product['productimage'] ? $product['productimage'] : '../img/placeholderlogo.svg'; ?>" 
                                 alt="<?php echo $product['productname']; ?>">
                            <h3><?php echo $product['productname']; ?></h3>
                            <p class="price">€<?php echo $product['productprice']; ?></p>
                            
                            <form method="POST">
                                <input type="hidden" name="productid" value="<?php echo $product['productid']; ?>">
                                <?php if(isset($_SESSION['basket']) && in_array($product['productid'], $_SESSION['basket'])): ?>
                                    <button type="submit" name="remove_from_basket" class="remove-btn">Remove from Basket</button>
                                <?php else: ?>
                                    <button type="submit" name="add_to_basket" class="add-btn">Add to Basket</button>
                                <?php endif; ?>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Show basket summary if items exist -->
                <?php if(!empty($basketItems)): ?>
                    <div class="basket-summary">
                        <h2>Your Basket</h2>
                        <?php foreach($basketItems as $item): ?>
                            <div class="basket-item">
                                <span><?php echo $item['productname']; ?></span>
                                <span>€<?php echo $item['productprice']; ?></span>
                            </div>
                        <?php endforeach; ?>
                        
                        <div class="total">
                            <strong>Total: €<?php echo $total; ?></strong>
                        </div>
                        
                        <a href="confirm_order.php" class="checkout-btn" style="display: block; text-align: center; text-decoration: none;">Proceed to Checkout</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php include "../footer/footer.php"; ?>
    </body>
</html>