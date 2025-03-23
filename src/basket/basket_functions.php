<?php
// Simple database connection
$conn = new mysqli('localhost', 'root', '123', 'prisminspacedb');

// Function to get all products
function getProducts() {
    global $conn;
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Function to get userID from username
function getUserId($username) {
    global $conn;
    $sql = "SELECT userid FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    return $user ? $user['userid'] : null;
}

// Function to add item to session basket
function addToBasket($productId) {
    if(!isset($_SESSION['basket'])) {
        $_SESSION['basket'] = array();
    }
    
    if(!in_array($productId, $_SESSION['basket'])) {
        $_SESSION['basket'][] = $productId;
        
        // Add to database if user is logged in
        if(isset($_SESSION['login_username'])) {
            global $conn;
            $userId = getUserId($_SESSION['login_username']);
            if($userId) {
                $sql = "INSERT INTO baskets (userid, productid) VALUES ($userId, $productId)";
                mysqli_query($conn, $sql);
            }
        }
    }
}

// Function to remove item from session basket
function removeFromBasket($productId) {
    if(isset($_SESSION['basket'])) {
        $key = array_search($productId, $_SESSION['basket']);
        if($key !== false) {
            unset($_SESSION['basket'][$key]);
            $_SESSION['basket'] = array_values($_SESSION['basket']); // Reindex array
            
            // Remove from database if user is logged in
            if(isset($_SESSION['login_username'])) {
                global $conn;
                $userId = getUserId($_SESSION['login_username']);
                if($userId) {
                    $sql = "DELETE FROM baskets WHERE userid = $userId AND productid = $productId";
                    mysqli_query($conn, $sql);
                }
            }
        }
    }
}

// Function to get items in basket
function getBasketItems() {
    global $conn;
    $items = array();
    
    if(isset($_SESSION['basket']) && !empty($_SESSION['basket'])) {
        $ids = implode(',', $_SESSION['basket']);
        $sql = "SELECT * FROM products WHERE productid IN ($ids)";
        $result = mysqli_query($conn, $sql);
        $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    
    return $items;
}

// Function to calculate total
function calculateTotal($items) {
    $total = 0;
    foreach($items as $item) {
        $total += $item['productprice'];
    }
    return $total;
}

// Function to save receipt
function saveReceipt($userId, $items, $total) {
    global $conn;
    
    // Get current date
    $date = date('Y-m-d H:i:s');
    
    // Insert into orders first
    foreach($items as $item) {
        $sql = "INSERT INTO orders (date, userid, productid) VALUES ('$date', $userId, {$item['productid']})";
        mysqli_query($conn, $sql);
        $orderId = mysqli_insert_id($conn);
        
        // Then create receipt
        $sql = "INSERT INTO receipts (userid, orderid, date, totalprice) 
                VALUES ($userId, $orderId, '$date', $total)";
        mysqli_query($conn, $sql);
    }
    
    // Clear session basket after purchase
    unset($_SESSION['basket']);
}

// Function to print receipt
function printReceipt($items, $total) {
    $receipt = "<div class='receipt'>";
    $receipt .= "<h3>Receipt</h3>";
    $receipt .= "<div class='receipt-items'>";
    
    foreach($items as $item) {
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
    
    return $receipt;
}
?>