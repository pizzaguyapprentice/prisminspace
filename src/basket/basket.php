<?php
session_start();
require_once 'basket_functions.php';

// Check if user is logged in
//if (!isset($_SESSION['userID'])) {
   // header('Location: ../login/login.php');
    //exit();
//}

$userID = $_SESSION['userID'];

// Handle AJAX requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    $response = ['success' => false];

    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'update_quantity':
                if (isset($_POST['basketID']) && isset($_POST['quantity'])) {
                    $response['success'] = updateQuantity($_POST['basketID'], $_POST['quantity']);
                }
                break;
            case 'remove_item':
                if (isset($_POST['basketID'])) {
                    $response['success'] = removeFromBasket($_POST['basketID']);
                }
                break;
            case 'checkout':
                $response['success'] = createOrder($userID);
                break;
        }
    }

    echo json_encode($response);
    exit();
}

$basketItems = getBasketItems($userID);
$total = getBasketTotal($userID);
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <?php include "../navbar/navbar.php"; ?>

        <div class="main">
            <div class="cardholder">
                <?php if (empty($basketItems)): ?>
                    <div class="empty-basket">
                        <h2>Your basket is empty</h2>
                        <a href="../products/products.php" class="continue-shopping">Continue Shopping</a>
                    </div>
                <?php else: ?>
                    <?php foreach ($basketItems as $item): ?>
                        <div class="basket-item" data-basket-id="<?php echo $item['basketID']; ?>">
                            <img src="../img/<?php echo htmlspecialchars($item['productImage']); ?>" alt="<?php echo htmlspecialchars($item['productName']); ?>">
                            <div class="item-details">
                                <h3><?php echo htmlspecialchars($item['productName']); ?></h3>
                            </div>
                            <div class="item-quantity">
                                <button class="quantity-btn minus">-</button>
                                <span class="quantity"><?php echo $item['quantity']; ?></span>
                                <button class="quantity-btn plus">+</button>
                            </div>
                            <div class="item-price">
                                €<?php echo number_format($item['productPrice'] * $item['quantity'], 2); ?>
                            </div>
                            <button class="remove-item">×</button>
                        </div>
                    <?php endforeach; ?>

                    <div class="checkout-section">
                        <div class="total-price">
                            Total: €<?php echo number_format($total, 2); ?>
                        </div>
                        <button class="checkout-button">Proceed to Checkout</button>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                // Update quantity
                $('.quantity-btn').click(function() {
                    const basketItem = $(this).closest('.basket-item');
                    const basketID = basketItem.data('basket-id');
                    const quantitySpan = basketItem.find('.quantity');
                    let quantity = parseInt(quantitySpan.text());

                    if ($(this).hasClass('plus')) {
                        quantity++;
                    } else {
                        quantity--;
                    }

                    if (quantity > 0) {
                        $.post('basket.php', {
                            action: 'update_quantity',
                            basketID: basketID,
                            quantity: quantity
                        }, function(response) {
                            if (response.success) {
                                location.reload();
                            }
                        });
                    }
                });

                // Remove item
                $('.remove-item').click(function() {
                    const basketItem = $(this).closest('.basket-item');
                    const basketID = basketItem.data('basket-id');

                    $.post('basket.php', {
                        action: 'remove_item',
                        basketID: basketID
                    }, function(response) {
                        if (response.success) {
                            location.reload();
                        }
                    });
                });

                // Checkout
                $('.checkout-button').click(function() {
                    if (confirm('Are you sure you want to proceed with checkout?')) {
                        $.post('basket.php', {
                            action: 'checkout'
                        }, function(response) {
                            if (response.success) {
                                alert('Order placed successfully!');
                                location.reload();
                            } else {
                                alert('There was an error processing your order. Please try again.');
                            }
                        });
                    }
                });
            });
        </script>

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