<?php

    include "../classes/receipt.php";

    $receipt1= new Receipt("100","100","100","2025-03-01","150.99");

    $receipt1->add_receipt();
    $receipt1->select_receipt();
    $receipt1->update_receipt();
    $receipt1->delete_receipt()

?>