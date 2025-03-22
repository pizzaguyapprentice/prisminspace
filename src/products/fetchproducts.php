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

$conn = null;
?>