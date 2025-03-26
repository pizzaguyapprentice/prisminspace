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
 
function getProducts() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUserId($username) {
    global $conn;
    $stmt = $conn->prepare("SELECT userid FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user ? $user['userid'] : null;
}

function addToBasket($productId) {
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
}

function removeFromBasket($productId) {
    if (isset($_SESSION['basket'])) {
        $key = array_search($productId, $_SESSION['basket']);
        if ($key !== false) {
            unset($_SESSION['basket'][$key]);
            $_SESSION['basket'] = array_values($_SESSION['basket']);

            if (isset($_SESSION['login_username'])) {
                global $conn;
                $userId = getUserId($_SESSION['login_username']);
                if ($userId) {
                    $stmt = $conn->prepare("DELETE FROM baskets WHERE userid = :userid AND productid = :productid");
                    $stmt->execute([':userid' => $userId, ':productid' => $productId]);
                }
            }
        }
    }
}

function getBasketItems() {
    global $conn;
    $items = [];

    if (isset($_SESSION['basket']) && !empty($_SESSION['basket'])) {
        $ids = implode(',', array_map('intval', $_SESSION['basket']));
        $stmt = $conn->prepare("SELECT * FROM products WHERE productid IN ($ids)");
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $items;
}

function calculateTotal($items) {
    $total = 0;
    foreach ($items as $item) {
        $total += $item['productprice'];
    }
    return $total;
}

function saveReceipt($userId, $items, $total) {
    global $conn;
    $date = date('Y-m-d H:i:s');

    try {
        $conn->beginTransaction();

        foreach ($items as $item) {
            $stmt = $conn->prepare("INSERT INTO orders (date, userid, productid) VALUES (:date, :userid, :productid)");
            $stmt->execute([
                ':date' => $date,
                ':userid' => $userId,
                ':productid' => $item['productid']
            ]);
            $orderId = $conn->lastInsertId();

            $stmt = $conn->prepare("INSERT INTO receipts (userid, orderid, date, totalprice) 
                                    VALUES (:userid, :orderid, :date, :total)");
            $stmt->execute([
                ':userid' => $userId,
                ':orderid' => $orderId,
                ':date' => $date,
                ':total' => $total
            ]);
        }

        $conn->commit();
        unset($_SESSION['basket']);
    } catch (PDOException $e) {
        $conn->rollBack();
        echo("Error processing order: " . $e->getMessage());
    }
}

function printReceipt($items, $total) {
    $receipt = "<div class='receipt'>";
    $receipt .= "<h3>Receipt</h3>";
    $receipt .= "<div class='receipt-items'>";

    foreach ($items as $item) {
        $receipt .= "<div class='receipt-item'>";
        $receipt .= "<span>" . htmlspecialchars($item['productname']) . "</span>";
        $receipt .= "<span>€" . htmlspecialchars($item['productprice']) . "</span>";
        $receipt .= "</div>";
    }

    $receipt .= "</div>";
    $receipt .= "<div class='receipt-total'>";
    $receipt .= "<strong>Total: €" . htmlspecialchars($total) . "</strong>";
    $receipt .= "</div>";
    $receipt .= "</div>";

    return $receipt;
}
?>
