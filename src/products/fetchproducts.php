<?php
include "../classes/product.php";

try {
    $stmt = new Product();
	$stmt = $stmt->select_all_products();

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