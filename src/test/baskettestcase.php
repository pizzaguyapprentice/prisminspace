<?php
require_once '../classes/basket.php';
require_once '../classes/database.php';
require_once '../classes/credentials.php';

echo "Running Basket Test...\n";

$baskets = new Basket(9999, 1, 1);
$baskets->add_basket();

$result = $baskets->select_basket();

if ($result && $result['basketid'] == 9999) {
    echo "Basket Insert and Select Test Passed.\n";
} else {
    echo "Basket Insert and Select Test Failed.\n";
}

$baskets->delete_basket();
?>