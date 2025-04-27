<?php
require_once '../classes/user.php';
require_once '../classes/database.php';
require_once '../classes/credentials.php';

echo "Running User Test...\n";

$user = new User("Test", "testuser9999", "password123", "profile.png");
$user->add_user();

if (User::does_user_exist("testuser9999")) {
    echo "User Insert and Exists Test Passed.\n";
} else {
    echo "User Insert and Exists Test Failed.\n";
}

$user->delete_user();
?>