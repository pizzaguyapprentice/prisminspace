<?php

require_once 'basket_functions.php';

include("../onload/header.php");

include "../onload/navbar.php";

if (!isset($_SESSION['login_username'])) {
    header('Location: ../login/login.php');
    exit();
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
    $email = $_POST['email'];

    $couponCode = isset($_POST['coupon']) ? trim($_POST['coupon']) : null;
    $couponValid = false;

    $errors = [];

    if (empty($_POST["email"])) {
        $errors[] = "Email is required.";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }
    }
    if (empty($_POST['address'])) {
        $errors[] = "Address is required.";
    }
    if (!preg_match("/^[a-zA-Z0-9]{7}$/", $_POST['postcode'])) {
        $errors[] = "Postcode must be exactly 7 letters or numbers (alphanumeric).";
    }
    if (!preg_match("/^[a-zA-Z\s]+$/", $_POST['city'])) {
        $errors[] = "City must contain only letters and spaces.";
    }


    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        exit();
    }



    $basketItems = getBasketItems();
    $total = calculateTotal($basketItems);

if (!empty($couponCode)) {
    $stmt = $conn->prepare("SELECT * FROM coupons WHERE coupon_code = :coupon_code");
    $stmt->bindParam(':coupon_code', $couponCode, PDO::PARAM_STR);
    $stmt->execute();
    $coupon = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($coupon) {
        $couponValid = true;
        $discount = $total * 0.20;
        $total -= $discount;
    } else {
        
    }
}
    
    if (empty($basketItems)) {
        die("Your basket is empty.");
    }


    $date = date('Y-m-d H:i:s');

    try {
        $conn->beginTransaction();

        foreach ($basketItems as $item) {

            $stmt = $conn->prepare("INSERT INTO orders (date, userid, productid, address, city, postcode, email) 
                                    VALUES (:date, :userid, :productid, :address, :city, :postcode, :email)");

                $stmt->execute([
                ':date' => $date,
                ':userid' => $userID,
                ':productid' => $item['productid'],
                ':address' => $address,
                ':city' => $city,
                ':postcode' => $postcode,
                    ':email' => $email
            ]);
            $orderId = $conn->lastInsertId();

            $stmt = $conn->prepare("INSERT INTO receipts (userid, orderid, date, totalprice, email)
                        VALUES (:userid, :orderid, :date, :totalprice, :email)");

            $stmt->execute([
                ':userid' => $userID,
                ':orderid' => $orderId,
                ':date' => $date,
                ':totalprice' => $total,
                ':email' => $email

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
        $receipt .= "<p>$email</p>";
        $receipt .= "</div>";
        $receipt .= "<div class='receipt-items'>";

        foreach ($basketItems as $item) {
            $receipt .= "<div class='receipt-item'>";
            $receipt .= "<div><p>{$item['productname']}</p></span></div>";
            $receipt .= "<div><p>€{$item['productprice']}</p></span></div>";
            $receipt .= "</div>";
        }

        $receipt .= "</div>";
        $receipt .= "<div class='receipt-total'>";
        if ($couponValid) {
            $receipt .= "<p>Coupon Applied: -20%</p>";
        }
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
    <link rel="stylesheet" href="orderconf.css">
</head>
<body>
    <div class="main">
        <div class="cardholder">
            <div class ="order-summary">
                <h1>Order Summary</h1>
            </div>

            <div class="basket-items-list">
                <?php foreach ($basketItems as $item): ?>
                    <div class="basket-item">
                        <div><p><?php echo htmlspecialchars($item['productname'], ENT_QUOTES, 'UTF-8'); ?></p></div>
                        <div><p>€<?php echo htmlspecialchars($item['productprice'], ENT_QUOTES, 'UTF-8'); ?></p></div>
                    </div>
                <?php endforeach; ?>
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
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="coupon">Coupon Code:</label>
                    <input type="text" id="coupon" name="coupon" placeholder="Enter coupon code">
                </div>
                
                <button type="submit" class="checkout-btn">Confirm Order</button>
                <div class="total">
                    <strong>Total: €<?php echo htmlspecialchars($total, ENT_QUOTES, 'UTF-8'); ?></strong>
                </div>
            </form>
        </div>
    </div>

    <?php include "../onload/footer.php"; ?>
</body>
</html>
