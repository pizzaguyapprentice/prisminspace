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
        echo "<div class='card'>
                <div class='card-border'>

                    <div class='product-image'>
                        <img src='../img/placeholderlogo.svg' alt='shopping item' >
                    </div>

                    <div class='product-details'>

                        <div class='product-name'>
                            <p>" . htmlspecialchars($row['productname'], ENT_QUOTES, 'UTF-8') . "</p>
                        </div>

                        <div class='product-description'>
                            <p>Description: " . htmlspecialchars($row['productdesc'], ENT_QUOTES, 'UTF-8') . "</p>
                        </div>

                        <div class='product-size'>
                            <p>Size: " . htmlspecialchars($row['productsize'], ENT_QUOTES, 'UTF-8') . "</p>
                        </div>

                        <div class='product-price'>
                            <p>Price: " . htmlspecialchars($row['productprice'], ENT_QUOTES, 'UTF-8') . "</p>
                        </div>

                        <div class='basket-options'>
                            <div class='addtobasket'>
                                <button>Add To Basket</button>
                            </div>

                            <div class='isinbasket'>
                                <button>Remove from basket</button>
                            </div>
                        </div>

                    </div>
                </div>
              </div>";
    }
} catch (PDOException $e) {
    echo "Womp womp: " . $e->getMessage();
}
?>
