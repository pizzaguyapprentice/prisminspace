<?php
require_once 'basket_functions.php';


require_once "../onload/navbar.php";

//require_once "getbasket.php";

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
    die("Database connection failed: " . $e->getMessage());
}

$username = $_SESSION['login_username'];
$stmt = $conn->prepare("SELECT userid FROM users WHERE username = :username");
$stmt->bindParam(':username', $username);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$userID = $user['userid'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_to_basket'])) {
        addToBasket($_POST['productid']);
    } elseif (isset($_POST['remove_from_basket'])) {
        removeFromBasket($_POST['productid']);
    }
}

$products = getBasketItems();
$basketItems = $products;
$total = calculateTotal($basketItems);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="../img/placeholderlogo.svg">
    <title>Your Basket - prisminspace</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="basket.css">
</head>
<body>


    <div class="main">
        <div class="cardholder">
            <div class="products-grid">
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <img src="<?= htmlspecialchars($product['productimage'] ?: '../img/placeholderlogo.svg') ?>" 
                             alt="<?= htmlspecialchars($product['productname']) ?>">
                        <h3><?= htmlspecialchars($product['productname']) ?></h3>
                        <p class="price">€<?= htmlspecialchars($product['productprice']) ?></p>

                        <form method="POST">
                            <input type="hidden" name="productid" value="<?= htmlspecialchars($product['productid']) ?>">
                            <?php if (isset($_SESSION['basket']) && in_array($product['productid'], $_SESSION['basket'])): ?>
                                <button type="submit" name="remove_from_basket" class="remove-btn">Remove from Basket</button>
                            <?php else: ?>
                                <button type="submit" name="add_to_basket" class="add-btn">Add to Basket</button>
                            <?php endif; ?>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if (!empty($basketItems)): ?>
                <div class="basket-summary">
                    <h2>Your Basket</h2>
                    <?php foreach ($basketItems as $item): ?>
                        <div class="basket-item">
                            <span><?= htmlspecialchars($item['productname']) ?></span>
                            <span>€<?= htmlspecialchars($item['productprice']) ?></span>
                        </div>
                    <?php endforeach; ?>
                    
                    <div class="total">
                        <strong>Total: €<?= htmlspecialchars($total) ?></strong>
                    </div>
                    
                    <a href="confirm_order.php" class="checkout-btn" style="display: block; text-align: center; text-decoration: none;">Proceed to Checkout</a>
                </div>
            <?php endif; ?>
          </div>
    </div>

    <?php include "../onload/footer.php"; ?>
</body>
</html>
