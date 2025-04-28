<?php
require_once '../classes/product.php';
require_once '../classes/database.php';
require_once '../classes/credentials.php';

echo "Running Product Test...\n";

$product = new Product();
$products = $product->select_all_products();

echo "<p>Row count is ";
echo $products->rowCount();
echo "</p>";


if ($products->rowCount() > 0) {
    echo" Product Fetch Test Passed.\n";
} else {
    echo "Product Fetch Test Failed.\n";
}
?>