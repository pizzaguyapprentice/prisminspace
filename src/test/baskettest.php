<?php

    include "../classes/basket.php";

    $basket1 = new Basket("100", "100", "50");
    
    $basket1->add_basket();
    $basket1->select_basket();
    $basket1->update_basket();

?>