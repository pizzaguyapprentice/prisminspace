<?php

$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "prisminspacedb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo("Database error: " . $e->getMessage());
}

try {
    $query = $_GET['query'] ?? '';
    $filter = $_GET['filter'] ?? 'productname';

    $validFilters = [
        'productname' => 'productname',
        'category' => 'productcategory',
        'price' => 'productprice'
    ];

    if (!isset($validFilters[$filter])) {
        echo("Invalid filter.");
    }

    $column = $validFilters[$filter];
    
    $sql = "SELECT * FROM products WHERE $column LIKE :query ORDER BY productid ASC";

    $stmt = $conn->prepare($sql);
    $stmt->execute([':query' => "%$query%"]);


    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($results as $row) {
        include('productcard.php');
    }
    
} catch (PDOException $e) {
    echo "Womp womp: " . $e->getMessage();
}
?>
