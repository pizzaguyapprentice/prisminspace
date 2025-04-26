<?php
include "../classes/product.php";

try {
    $stmt = new Product();
	$stmt = $stmt->select_all_products();
    $counter = 0;
    while ($row = $stmt->fetch()) {
        $counter += 1;
       
        include('productcard.php');
        if($newin == true && $counter == 3){
            break;
        }
        else{
            ;
        }
        
    }
} catch (PDOException $e) {
    echo "Womp womp: " . $e->getMessage();
}
?>