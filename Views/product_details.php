<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo "Product_details"; ?></title>

    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <link rel="stylesheet" href="css/font-awesome.min.css">

    <link type="text/css" rel="stylesheet" href="css/style.css" />
    
    <style>
        .header-search>form .search-input {padding-left: 50px; padding-right: 45px;}
        .header-logo .logo>img, .my_logo {max-width: 100px; max-height: 100px;}
        .product.product-single .product-body .right_form {float: right;}
        .product.product-single .product-body .left_form {float: left;}
        .product-body span {color: #F8694A; font-size: 16px;}
        .like {color: #F8694A; padding: 5px;}
        .add-to-cart a {color: #fff;}
        .right {float: right;  width: 40%; margin-top: -28px}
        .left {float: left; width: 40%;}
        .clear {clear: both;}
        .left::after, .right::after {clear: both;}
    </style>
    
</head>

<body>
    
    <?php include_once './header.php'; ?>

    <?php include_once './navbar2.php'; ?>

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                
                <?php
                include_once '../Controllers/Product.php';
                $pro = new Product(NULL);
                
                $pro_id = filter_input(INPUT_POST, 'id');
                $arr = $pro->get_product_by_id($pro_id);
                $i = 0;
                ?>
                
                <div class="col col-md-4"></div><!-- end of col-md-4 -->
                
                <div class="col col-md-4">
                    
                    <div class="product product-single">
                        
                        <div class="product-thumb">
                            <img src="./img/<?php echo $arr[$i]['image_name']; ?>" alt="Image">
                        </div>
                        
                        <div class="product-body">
                            
                            <h2 class="product-name">Price:</h2><span class="right">$<?php echo $arr[$i]['price'];?></span>
                            <h2 class="product-name">type: </h2><span class="right"> <?php echo $arr[$i]['type']; ?></span>
                            <h2 class="product-name">Name: </h2><span class="right"> <?php echo $arr[$i]['name']; ?></span>
                            <h2 class="product-name">Brand:</h2><span class="right"> <?php echo $arr[$i]['brand'];?></span>
                            
                            
                            
                            <div class="clear"></div>
                            
                            <div class="product-btns">
                                
                                <?php
                                
                                if(!isset($_SESSION['admin_id'])) {
                                    
                                    $like = false;
                                
                                    if(isset($_SESSION['s_id'])) {
                                        include_once '../Controllers/WhiteList.php';
                                        $love = new WhiteList();
                                        $love_list = $love->get_my_likes($_SESSION['s_id']);
                                        if(!is_null($love_list))


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
                                    <input type="hidden" name="id" value="<?php echo $arr[$i]['Id']; ?>">
                                    <button type="submit" class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                </form>
                                
                                <?php } else { ?>
                                
                                <i class="fa fa-heart fa-2x like"></i>
                                <form class="left_form" action="../Controllers/action_remove_from_love.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $arr[$i]['Id']; ?>">
                                    <button type="submit" class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                </form>
                                
                                <?php } ?>
                                              
                                <form class="right_form" action="../Controllers/action_add_to_cart.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $arr[$i]['Id']; ?>">
                                    <button type="submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i>Add to Cart</button>
                                </form>
                                
                                <?php } else { ?>
                                
                                <form class="right_form" action="../Controllers/action_remove_product.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $arr[$i]['Id']; ?>">
                                    <button type="submit" class="primary-btn add-to-cart">Remove</button>
                                </form>
                                
                                <form class="left_form" action="update_product_page.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $arr[$i]['Id']; ?>">
                                    <button type="submit" class="primary-btn add-to-cart">Update</button>
                                </form>
                                
                                <?php } ?>
                                
                                <div class="clear"></div>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div><!-- end of col col-md-4 -->
                
                <div class="col col-md-4"></div><!-- end of col-md-4 -->
                
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
    
    <?php include_once './footer.php'; ?>

    <!-- Java_Script -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>
    
</body>

</html>