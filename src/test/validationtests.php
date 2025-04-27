<?php
$_POST = [
    'email' => 'test@example.com',
    'address' => 'Fortnite',
    'postcode' => '12AB34e',
    'city' => 'Dublin',
    'basket' => ["hello", "world"]
];
//$_POST = [
    //'email' => 'testexample.com',
    //'address' => '',
    //'postcode' => '12AB34',
    //'city' => 'Dublin123',
    //'basket' => []
//];

$errors = [];

if (empty($_POST['email'])) {
    $errors[] = "Validation 1 Failed: Email is required.";
} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email not valid";
}

if (empty($_POST['address'])) {
    $errors[] = "Address not valid";
}

if (!preg_match("/^[a-zA-Z0-9]{7}$/", $_POST['postcode'])) {
    $errors[] = "Invalid postcode";
}

if (!preg_match("/^[a-zA-Z\s]+$/", $_POST['city'])) {
    $errors[] = "City not valid";
}

if (empty($_POST['basket'])) {
    $errors[] = "No basket items";
}

if (!empty($errors)) {
    echo "<h2>Validation Test Results:</h2>";
    foreach ($errors as $error) {
        echo "<p >$error</p>";
    }
} else {
    echo "<p>All fields are correct.</p>";
}
?>