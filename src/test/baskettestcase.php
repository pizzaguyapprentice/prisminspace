<?php
require_once '../classes/basket.php';
require_once '../classes/database.php';
require_once '../classes/credentials.php';


echo "Running Basket Test...\n";

$baskets = new Basket(999, 21, 1);
$baskets->add_basket();

$result = $baskets->select_basket();
echo "<p>Basket ID: " . htmlspecialchars($result['basketid']) . "</p>";
echo "<p>User ID: " . htmlspecialchars($result['userid']) . "</p>";
echo "<p>Product ID: " . htmlspecialchars($result['productid']) . "</p>";

if ($result && $result['basketid'] == 999) {
    echo "Basket Insert and Select Test Passed.\n";
} else {
    echo "Basket Insert and Select Test Failed.\n";
}

$baskets->delete_basket();
?>