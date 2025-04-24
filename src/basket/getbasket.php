

<?php

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
        getbasket($_POST['productid']);
    } elseif (isset($_POST['remove_from_basket'])) {
        removeFromBasket($_POST['productid']);
    }
}




function getbasket($productId) {

    if (!isset($_SESSION['basket'])) {
        $_SESSION['basket'] = [];
    }

    if (!in_array($productId, $_SESSION['basket'])) {
        $_SESSION['basket'][] = $productId;

        if (isset($_SESSION['login_username'])) {
            global $conn;
            $userId = getUserId($_SESSION['login_username']);
            if ($userId) {
                $stmt = $conn->prepare("INSERT INTO baskets (userid, productid) VALUES (:userid, :productid)");
                $stmt->execute([':userid' => $userId, ':productid' => $productId]);
            }
        }
    }



} ?>
