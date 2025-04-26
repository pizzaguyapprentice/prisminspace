<?php

    include "../classes/users.php";

    $user1 = new User("N/A", "test", "123", "N/A");
    $user1->add_user();
    $user1->login_user("../index/index.php");

?>