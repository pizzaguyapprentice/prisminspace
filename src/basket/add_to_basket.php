<?php
session_start();
require_once 'basket_functions.php';

// Check if user is logged in
if (!isset($_SESSION['userID'])) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Please log in to add items to your basket']);
    exit();
}

// Check if required parameters are present
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productID']) && isset($_POST['quantity'])) {
    $userID = $_SESSION['userID'];
    $productID = $_POST['productID'];
    $quantity = intval($_POST['quantity']);

    // Validate quantity
    if ($quantity <= 0) {
        $quantity = 1;
    }

    // Add to basket
    $success = addToBasket($userID, $productID, $quantity);

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode([
        'success' => $success,
        'message' => $success ? 'Item added to basket' : 'Failed to add item to basket'
    ]);
} else {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
?>