<link rel="stylesheet" href="../products/products.css?v=<?php echo time(); ?>">

<div class='card'>
    <div class='card-border'>

        <div class='product-image'>
            <?php
                $product_image = $row['productimage'];
            ?>
            <img src='../products/productimages/<?php echo $product_image?>' alt='shopping item' >
        </div>
            
        <div class='product-details'>

            <div class='product-name'>
                <p><?php echo "{$row['productname']}" ?></p>
            </div>
            <form method = "POST">
                <?php 
                $product_id = $row['productid']; 
                
                
                ?>
                <div class='useroptions'>
                    <div class='product-size'>
                        <input type="radio" id="extrasmall-<?php echo $product_id ?>" class="radioitem" name="size-<?php echo $product_id ?>" hidden>
                        <label for="extrasmall-<?php echo $product_id ?>" class="labelitem"><img src="../products/productlabels/extrasmall.svg"></label>

                        <input type="radio" id="small-<?php echo $product_id ?>" class="radioitem" name="size-<?php echo $product_id ?>" hidden>
                        <label for="small-<?php echo $product_id ?>" class="labelitem"><img src="../products/productlabels/small.svg"></label>

                        <input type="radio" id="medium-<?php echo $product_id ?>" class="radioitem" name="size-<?php echo $product_id ?>" hidden checked>
                        <label for="medium-<?php echo $product_id ?>" class="labelitem"><img src="../products/productlabels/medium.svg"></label>

                        <input type="radio" id="large-<?php echo $product_id ?>" class="radioitem" name="size-<?php echo $product_id ?>" hidden>
                        <label for="large-<?php echo $product_id ?>" class="labelitem"><img src="../products/productlabels/large.svg"></label>

                        <input type="radio" id="extralarge-<?php echo $product_id ?>" class="radioitem" name="size-<?php echo $product_id ?>" hidden>
                        <label for="extralarge-<?php echo $product_id ?>" class="labelitem"><img src="../products/productlabels/extralarge.svg"></label>

                        <p><?php echo "{$row['productsize']}" ?></p>
                    </div>

                    <div class='product-price'>
                        <p>€<?php echo "{$row['productprice']}" ?></p>
                    </div>

                </div>

                

                <div class='basket-options'>

                    <div class='addtobasketholder'>
                        <input type = "submit" name = "add_to_basket" value = "" class="addtobasketbutton">
                        <input type = "hidden" name = "productid" value = "<?php echo $row['productid'] ?>" class = "productid">
                    </div>

                    <div class="buynowbuttonholder">

                        <input type = "hidden" name = "productid" value = "<?php echo $row['productid'] ?>" class = "productid">
                        <input type = "submit" name = "buy_now" value = "Buy now!" class = "buynowbutton">
                    </div>
                </div>
            </form>


        </div>

    </div>
</div>
<?php


if (isset($_SESSION['basket']) && in_array($row['productid'], $_SESSION['basket'])):
    if (isset($_POST['add_to_basket'])) {
        getbasket($_POST['productid']);

    } endif;
?>