<?php

$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "prisminspacedb";

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $stmt->fetch()) {
        echo "<div class='card'>
                <div class='card-border'>
                    <p>{$row['productName']}</p>
                    <p>{$row['productPrice']}</p>
                    <p>{$row['productAmount']}</p>
                    <p>{$row['productImage']}</p>
                </div>
              </div>";
    }
} catch (PDOException $e) {
    echo "Womp womp: " . $e->getMessage();
}

$conn = null;
?>