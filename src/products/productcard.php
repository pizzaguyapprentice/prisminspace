<div class='card'>
    <div class='card-border'>

        <div class='product-image'>
            <img src='../img/placeholderlogo.svg' alt='shopping item' >
        </div>
            
        <div class='product-details'>

            <div class='product-name'>
                <p><?php echo "{$row['productname']}" ?></p>
            </div>

            <form>
                <?php $product_id = $row['productid']; ?>
                <div class='useroptions'>
                    <div class='product-size'>
                        <input type="radio" id="extrasmall-<?php echo $product_id ?>" class="radioitem" name="size-<?php echo $product_id ?>" hidden>
                        <label for="extrasmall-<?php echo $product_id ?>" class="labelitem"><img src="./productlabels/extrasmall.svg"></label>

                        <input type="radio" id="small-<?php echo $product_id ?>" class="radioitem" name="size-<?php echo $product_id ?>" hidden>
                        <label for="small-<?php echo $product_id ?>" class="labelitem"><img src="./productlabels/small.svg"></label>

                        <input type="radio" id="medium-<?php echo $product_id ?>" class="radioitem" name="size-<?php echo $product_id ?>" hidden checked>
                        <label for="medium-<?php echo $product_id ?>" class="labelitem"><img src="./productlabels/medium.svg"></label>

                        <input type="radio" id="large-<?php echo $product_id ?>" class="radioitem" name="size-<?php echo $product_id ?>" hidden>
                        <label for="large-<?php echo $product_id ?>" class="labelitem"><img src="./productlabels/large.svg"></label>

                        <input type="radio" id="extralarge-<?php echo $product_id ?>" class="radioitem" name="size-<?php echo $product_id ?>" hidden>
                        <label for="extralarge-<?php echo $product_id ?>" class="labelitem"><img src="./productlabels/extralarge.svg"></label>

                        <p><?php echo "{$row['productsize']}" ?></p>
                    </div>

                    <div class='product-price'>
                        <p>€<?php echo "{$row['productprice']}" ?></p>
                    </div>

                </div>

                

                <div class='basket-options'>
                    <div class='addtobasket'>
                        <button class="addtobasketbutton"><img src="../img/addtoshoppingbasket.svg"></button>
                    </div>

                    <div class="buynow">
                        <button class="buynowbutton">Buy now!</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>