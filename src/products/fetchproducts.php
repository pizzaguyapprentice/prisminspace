<?php
include "../classes/product.php";

try {
    $stmt = new Product();
	$stmt = $stmt->select_all_products();

    while ($row = $stmt->fetch()) {
        include('productcard.php');
        echo $row['productid'];
    }
} catch (PDOException $e) {
    echo "Womp womp: " . $e->getMessage();
}
?>