<?php
require_once '../classes/order.php';
require_once '../classes/database.php';
require_once '../classes/credentials.php';

echo "Running Order Test...\n";

$order = new Order(9999, date('Y-m-d'), 999, 1, "Test Address", "Test City", "T123" , "test@example.com");
$order->add_order();

$result = $order->select_order();

if ($result && $result['orderid'] == 9999) {
    echo "Order Insert and Select Test Passed.\n";
} else {
    echo "Order Insert and Select Test Failed.\n";
}

$order->delete_order();
?>