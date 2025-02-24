<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" href="placeholderlogo.svg">
        <title>Your Basket - prisminspace</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="realstyles.css">
        <link rel="stylesheet" href="basket.css">
    </head>

    <body>
        <div class="navbar">
            <div id="logo-small" class="navbar-item">
                <img src="placeholderlogo.svg" alt="small logo prisminspace">
            </div>

            <div id="menu-bar" class="navbar-item">
                <div class="menu-item">
                    <input type="text" placeholder="Search here...">
                </div>
                <div class="menu-item">
                    <a href="#">Products</a>
                </div>
                <div class="menu-item">
                    <a href="#">About</a>
                </div>
                <div class="menu-item">
                    <a href="#">Contact</a>
                </div>
            </div>

            <div id="logo-big" class="navbar-item">
                <h1>PRISMINSPACE</h1>
            </div>

            <div id="user-welcome" class="navbar-item">
                <div class="user-item">Welcome, [USERNAME]!</div>
                <div class="user-item"><img src="shoppingcart.svg" alt="shopping basket icon"></div>
            </div>

            <div id="user-icon" class="navbar-item">
                <a href="login.php"><img src="usericon.svg" alt="user login icon"></a>
            </div>
        </div>

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
                    <img src="placeholderlogo.svg" alt="Product 2">
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