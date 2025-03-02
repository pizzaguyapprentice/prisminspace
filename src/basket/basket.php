<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" href="placeholderlogo.svg">
        <title>Your Basket - prisminspace</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../main.css">
        <link rel="stylesheet" href="basket.css">
    </head>

    <?php
		include "../navbar/navbar.php";		
	?>

        <div class="main">
            <div class="cardholder">
                <!-- Example Basket Items -->
                <div class="basket-item">
                    <img src="placeholderlogo.svg" alt="Product 1">
                    <div class="item-details">
                        <h3>Product Name 1</h3>
                        <p>Brief product description goes here</p>
                    </div>
                    <div class="item-quantity">
                        <button>-</button>
                        <span>1</span>
                        <button>+</button>
                    </div>
                    <div class="item-price">
                        €99.99
                    </div>
                </div>

                <div class="basket-item">
                    <img src="../img/placeholderlogo.svg" alt="Product 2">
                    <div class="item-details">
                        <h3>Product Name 2</h3>
                        <p>Brief product description goes here</p>
                    </div>
                    <div class="item-quantity">
                        <button>-</button>
                        <span>2</span>
                        <button>+</button>
                    </div>
                    <div class="item-price">
                        €149.99
                    </div>
                </div>

                <div class="checkout-section">
                    <div class="total-price">
                        Total: €399.97
                    </div>
                    <button class="checkout-button">Proceed to Checkout</button>
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