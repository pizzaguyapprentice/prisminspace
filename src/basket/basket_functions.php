<?php
session_start();
require_once 'db_connect.php';

function addToBasket($userID, $productID, $quantity = 1) {
    global $pdo;
    try {
        // Check if item already exists in basket
        $stmt = $pdo->prepare("SELECT basketID, quantity FROM basket WHERE userID = ? AND productID = ?");
        $stmt->execute([$userID, $productID]);
        $existingItem = $stmt->fetch();

        if ($existingItem) {
            // Update quantity if item exists
            $newQuantity = $existingItem['quantity'] + $quantity;
            $stmt = $pdo->prepare("UPDATE basket SET quantity = ? WHERE basketID = ?");
            $stmt->execute([$newQuantity, $existingItem['basketID']]);
        } else {
            // Add new item if it doesn't exist
            $stmt = $pdo->prepare("INSERT INTO basket (userID, productID, quantity) VALUES (?, ?, ?)");
            $stmt->execute([$userID, $productID, $quantity]);
        }
        return true;
    } catch(PDOException $e) {
        return false;
    }
}

function removeFromBasket($basketID) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("DELETE FROM basket WHERE basketID = ?");
        $stmt->execute([$basketID]);
        return true;
    } catch(PDOException $e) {
        return false;
    }
}

function updateQuantity($basketID, $quantity) {
    global $pdo;
    try {
        if ($quantity <= 0) {
            return removeFromBasket($basketID);
        }
        $stmt = $pdo->prepare("UPDATE basket SET quantity = ? WHERE basketID = ?");
        $stmt->execute([$quantity, $basketID]);
        return true;
    } catch(PDOException $e) {
        return false;
    }
}

function getBasketItems($userID) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("
            SELECT b.basketID, b.quantity, p.productID, p.productName, p.productPrice, p.productImage 
            FROM basket b 
            JOIN products p ON b.productID = p.productID 
            WHERE b.userID = ?
        ");
        $stmt->execute([$userID]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return [];
    }
}

function getBasketTotal($userID) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("
            SELECT SUM(p.productPrice * b.quantity) as total 
            FROM basket b 
            JOIN products p ON b.productID = p.productID 
            WHERE b.userID = ?
        ");
        $stmt->execute([$userID]);
        $result = $stmt->fetch();
        return $result['total'] ?? 0;
    } catch(PDOException $e) {
        return 0;
    }
}

function createOrder($userID) {
    global $pdo;
    try {
        $pdo->beginTransaction();
        
        // Get basket items
        $basketItems = getBasketItems($userID);
        
        // Create orders for each basket item
        foreach ($basketItems as $item) {
            $stmt = $pdo->prepare("
                INSERT INTO orders (orderDate, userID, productID) 
                VALUES (NOW(), ?, ?)
            ");
            $stmt->execute([$userID, $item['productID']]);
        }
        
        // Clear the user's basket
        $stmt = $pdo->prepare("DELETE FROM basket WHERE userID = ?");
        $stmt->execute([$userID]);
        
        $pdo->commit();
        return true;
    } catch(PDOException $e) {
        $pdo->rollBack();
        return false;
    }
}
?>