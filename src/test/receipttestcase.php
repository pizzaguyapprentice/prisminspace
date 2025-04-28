<?php
require_once '../classes/receipt.php';
require_once '../classes/database.php';
require_once '../classes/credentials.php';

echo "Running Receipt Test...\n";

$receipt = new Receipt(9999, 1, 1, date('Y-m-d'), 99.99, "hey@gmail.com");
$receipt->add_receipt();

$result = $receipt->select_receipt();

echo "<p>Receipt ID: " . htmlspecialchars($result['receiptid']) . "</p>";
echo "<p>User ID: " . htmlspecialchars($result['userid']) . "</p>";
echo "<p>Order ID: " . htmlspecialchars($result['orderid']) . "</p>";
echo "<p>Date: " . htmlspecialchars($result['date']) . "</p>";
echo "<p>Total Price: €" . htmlspecialchars($result['totalprice']) . "</p>";
echo "<p>Email: " . htmlspecialchars($result['email']) . "</p>";

if ($result && $result['receiptid'] == 9999) {
    echo "Receipt Insert and Select Test Passed.\n";
} else {
    echo "Receipt Insert and Select Test Failed.\n";
}

$receipt->delete_receipt();
?>