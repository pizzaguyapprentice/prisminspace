<?php

    include "../classes/order.php.php";

    $order1 = new Order("100", "2025-03-01", "100","100","15 Red Road, Rocky Village","Dublin","D12 1234");
    
    $order1->add_order();
    $order1->select_order();
    $order1->update_order();
    $order1->delete_order();

?>