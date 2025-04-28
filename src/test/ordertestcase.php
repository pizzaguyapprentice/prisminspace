<?php
require_once '../classes/order.php';
require_once '../classes/database.php';
require_once '../classes/credentials.php';

echo "Running Order Test...\n";

$order = new Order(9999, date('Y-m-d'), 21, 1, "Test Address", "Test City", "T123" , "test@example.com");
$order->add_order();

$result = $order->select_order();

echo "<p>Order ID: " . htmlspecialchars($result['orderid']) . "</p>";
echo "<p>Date: " . htmlspecialchars($result['date']) . "</p>";
echo "<p>User ID: " . htmlspecialchars($result['userid']) . "</p>";
echo "<p>Product ID: " . htmlspecialchars($result['productid']) . "</p>";
echo "<p>Address: " . htmlspecialchars($result['address']) . "</p>";
echo "<p>City: " . htmlspecialchars($result['city']) . "</p>";
echo "<p>Postcode: " . htmlspecialchars($result['postcode']) . "</p>";
echo "<p>Email: " . htmlspecialchars($result['email']) . "</p>";

if ($result && $result['orderid'] == 9999) {
    echo "Order Insert and Select Test Passed.\n";
} else {
    echo "Order Insert and Select Test Failed.\n";
}

$order->delete_order();
?>