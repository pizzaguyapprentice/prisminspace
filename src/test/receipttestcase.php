<?php
require_once '../classes/receipt.php';
require_once '../classes/database.php';
require_once '../classes/credentials.php';

echo "Running Receipt Test...\n";

$receipt = new Receipt(9999, 1, 1, date('Y-m-d'), 99.99);
$receipt->add_receipt();

$result = $receipt->select_receipt();

if ($result && $result['receiptid'] == 9999) {
    echo "Receipt Insert and Select Test Passed.\n";
} else {
    echo "Receipt Insert and Select Test Failed.\n";
}

$receipt->delete_receipt();
?>