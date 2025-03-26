<?php
require_once 'basket_functions.php';

// Include navbar first (which starts the session)
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

// Handle form submission
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];
    
    // Get basket items
    $basketItems = getBasketItems();
    $total = calculateTotal($basketItems);
    
    // Save order with address
    $date = date('Y-m-d H:i:s');
    
    // Insert into orders
    foreach($basketItems as $item) {
        $sql = "INSERT INTO orders (date, userid, productid, address, city, postcode) 
                VALUES ('$date', $userID, {$item['productid']}, '$address', '$city', '$postcode')";
        mysqli_query($conn, $sql);
        $orderId = mysqli_insert_id($conn);
        
        // Create receipt
        $sql = "INSERT INTO receipts (userid, orderid, date, totalprice) 
                VALUES ($userID, $orderId, '$date', $total)";
        mysqli_query($conn, $sql);
    }
    
    // Generate receipt HTML
    $receipt = "<div class='receipt'>";
    $receipt .= "<h3>Order Confirmation</h3>";
    $receipt .= "<div class='receipt-address'>";
    $receipt .= "<p>Shipping to:</p>";
    $receipt .= "<p>$address</p>";
    $receipt .= "<p>$city</p>";
    $receipt .= "<p>$postcode</p>";
    $receipt .= "</div>";
    $receipt .= "<div class='receipt-items'>";
    
    foreach($basketItems as $item) {
        $receipt .= "<div class='receipt-item'>";
        $receipt .= "<span>{$item['productname']}</span>";
        $receipt .= "<span>€{$item['productprice']}</span>";
        $receipt .= "</div>";
    }
    
    $receipt .= "</div>";
    $receipt .= "<div class='receipt-total'>";
    $receipt .= "<strong>Total: €$total</strong>";
    $receipt .= "</div>";
    $receipt .= "</div>";
    
    $_SESSION['receipt'] = $receipt;
    unset($_SESSION['basket']);
    
    // Redirect to success page
    header('Location: order_success.php');
    exit();
}

// Get basket items for display
$basketItems = getBasketItems();
$total = calculateTotal($basketItems);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" href="../img/placeholderlogo.svg">
        <title>Confirm Order - prisminspace</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../main.css">
        <link rel="stylesheet" href="basket.css">
    </head>
    <body>
        <div class="main">
            <div class="cardholder">
                <h2>Order Summary</h2>
                
                <!-- Show basket items -->
                <?php foreach($basketItems as $item): ?>
                    <div class="basket-item">
                        <span><?php echo $item['productname']; ?></span>
                        <span>€<?php echo $item['productprice']; ?></span>
                    </div>
                <?php endforeach; ?>
                
                <div class="total">
                    <strong>Total: €<?php echo $total; ?></strong>
                </div>
                
                <!-- Address Form -->
                <form method="POST" class="address-form">
                    <h3>Shipping Address</h3>
                    
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="city">City:</label>
                        <input type="text" id="city" name="city" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="postcode">Post Code:</label>
                        <input type="text" id="postcode" name="postcode" required>
                    </div>
                    
                    <button type="submit" class="checkout-btn">Confirm Order</button>
                </form>
            </div>
        </div>

        <?php include "../footer/footer.php"; ?>
    </body>
</html>