<?php if($arr[$i]['Quantity'] > 0) { ?>

<div class="col-md-3 col-sm-6 col-xs-6">
    
    <div class="product product-single">

        <div class="product-thumb">

            <form action="product_details.php" method="post">
                <input type="hidden" name="id" value="<?php echo $arr[$i]['Id'] ?>">
                <button type="submit" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
            </form>

            <img src="./img/<?php echo $arr[$i]['image_name']; ?>" alt="Image">
        </div>

        <div class="product-body">

            <h3 class="product-price"> <?php echo $arr[$i]['Price']; ?> $</h3>

            <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>

            <h2 class="product-name">Name: <?php echo $arr[$i]['Name']; ?> </h2>

            <div class="product-btns">

                <?php

                if(!isset($_SESSION['admin_id'])) {
                      
                    $like = false;

                    if(isset($_SESSION['s_id'])) {
                        include_once '../Controllers/WhiteList.php';
                        $love = new WhiteList();
                        $love_list = $love->get_my_likes($_SESSION['s_id']);

                        for($q=0; $q<sizeof($love_list); $q++) {    
                            if($arr[$i]['id'] == $love_list[$q]['pro_id']) {
                                $like = true;
                                break;
                            }
                        }
                    }

                    if(!$like) {

                ?>

                <form class="left_form" action="../Controllers/action_add_to_love.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $arr[$i]['id'] ?>">
                    <button type="submit" class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                </form>

                <?php } else { ?>

                <i class="fa fa-heart fa-2x like"></i>
                <form class="left_form" action="../Controllers/action_remove_from_love.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $arr[$i]['id'] ?>">
                    <button type="submit" class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                </form>

                <?php } ?>
                
                
                <?php
                
                $added = FALSE;
                
                if (isset($_SESSION['s_id'])) {
                
                    include_once '../Controllers/ShoppingCart.php';
                    $cart = new ShoppingCart();
                    $ids = $cart->get_my_products_ids($_SESSION['s_id']);

                    for($k=0; $k< count($ids); $k++) {
                        if($arr[$i]['Id'] == $ids[$k]['pro_id']) {
                            $added = TRUE;
                            break;
                        }
                    }
                    
                }
                
                if(!$added) {
                    
                ?>
                
                <form class="right_form" action="../Controllers/action_add_to_cart.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $arr[$i]['id']; ?>">
                    <button type="submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                </form>
                
                <?php } else { ?>
                
                <form class="right_form" action="../Controllers/action_remove_from_cart.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $arr[$i]['id']; ?>">
                    <button type="submit" class="primary-btn add-to-cart"><i class="fa fa-remove"></i> Drop</button>
                </form>
                
                <?php } ?>
                
                
                <?php } else { ?>

                <form class="right_form" action="../Controllers/action_remove_product.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $arr[$i]['id']; ?>">
                    <button type="submit" class="primary-btn add-to-cart">Remove</button>
                </form>

                <form class="left_form" action="update_product_page.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $arr[$i]['id']; ?>">
                    <button type="submit" class="primary-btn add-to-cart">Update</button>
                </form>

                <?php } ?>

                <div class="clear"></div>

            </div>

        </div>

    </div>
    
</div>

<?php } ?>