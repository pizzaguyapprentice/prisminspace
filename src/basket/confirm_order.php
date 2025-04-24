<?php
include("../onload/header.php");

require_once 'basket_functions.php';

include "../onload/navbar.php";

if (!isset($_SESSION['login_username'])) {
    header('Location: ../login/login.php');
    exit();
}

$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "prisminspacedb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo("Womp weomp: " . $e->getMessage());
}

$username = $_SESSION['login_username'];
$stmt = $conn->prepare("SELECT userid FROM users WHERE username = :username");
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("User not found.");
}

$userID = $user['userid'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $address = $_POST['address'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];

    $basketItems = getBasketItems();
    $total = calculateTotal($basketItems);
    
    if (empty($basketItems)) {
        die("Your basket is empty.");
    }


    $date = date('Y-m-d H:i:s');

    try {
        $conn->beginTransaction();

        foreach ($basketItems as $item) {

            $stmt = $conn->prepare("INSERT INTO orders (date, userid, productid, address, city, postcode) 
                                    VALUES (:date, :userid, :productid, :address, :city, :postcode)");
            $stmt->execute([
                ':date' => $date,
                ':userid' => $userID,
                ':productid' => $item['productid'],
                ':address' => $address,
                ':city' => $city,
                ':postcode' => $postcode
            ]);
            $orderId = $conn->lastInsertId();

            $stmt = $conn->prepare("INSERT INTO receipts (userid, orderid, date, totalprice)
                        VALUES (:userid, :orderid, :date, :totalprice)");
            $stmt->execute([
                ':userid' => $userID,
                ':orderid' => $orderId,
                ':date' => $date,
                ':totalprice' => $total

            ]);
        }

        $conn->commit();

        $receipt = "<div class='receipt'>";
        $receipt .= "<h3>Order Confirmation</h3>";
        $receipt .= "<div class='receipt-address'>";
        $receipt .= "<p>Shipping to:</p>";
        $receipt .= "<p>$address</p>";
        $receipt .= "<p>$city</p>";
        $receipt .= "<p>$postcode</p>";
        $receipt .= "</div>";
        $receipt .= "<div class='receipt-items'>";

        foreach ($basketItems as $item) {
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

        header('Location: order_success.php');
        exit();
    } catch (PDOException $e) {
        $conn->rollBack(); 
        echo("Error processing order: " . $e->getMessage());
    }
}

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

            <?php foreach ($basketItems as $item): ?>
                <div class="basket-item">
                    <span><?php echo htmlspecialchars($item['productname'], ENT_QUOTES, 'UTF-8'); ?></span>
                    <span>€<?php echo htmlspecialchars($item['productprice'], ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
            <?php endforeach; ?>
            
            <div class="total">
                <strong>Total: €<?php echo htmlspecialchars($total, ENT_QUOTES, 'UTF-8'); ?></strong>
            </div>
            
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

    <?php include "../onload/footer.php"; ?>
</body>
</html>
