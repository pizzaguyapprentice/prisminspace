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
    
    // Validate filter to prevent SQL injection
    $validFilters = [
        'productname' => 'name',
        'category' => 'category',
        'price' => 'price'
    ];
    
    if (!array_key_exists($filter, $validFilters)) {
        die("Invalid filter.");
    }
    
    // Construct the SQL query dynamically
    $column = $validFilters[$filter];
    $sql = "SELECT * FROM products WHERE $column LIKE :query ORDER BY id ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['query' => "%$query%"]);
    
    // Fetch results
    $results = $stmt->fetchAll();

    while ($row = $stmt->fetch()) {
        echo "<div class='card'>
                <div class='card-border'>

                    <div class='product-image'>
						<img src='../img/placeholderlogo.svg' alt='shopping item' >
					</div>


                    <div class='product-details'>

                        <div class='product-name'>
                            <p>{$row['productname']}</p>
                        </div>

                        <div class='product-description'>
                            <p>Description: {$row['productdesc']}</p>
                        </div>

                        <div class='product-size'>
                            <p>Size: {$row['productsize']}</p>
                        </div>

                        <div class='product-price'>
                            <p>Price: {$row['productprice']}</p>
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