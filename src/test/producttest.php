<?php

    include "../classes/product.php.php";

    $product1= new Product("Test Name","50.50","100","image.jpg","This is a test description","","T-Shirt");
    
    $product1->select_all_products();

?>