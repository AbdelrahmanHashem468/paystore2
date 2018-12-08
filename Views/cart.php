<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Cart</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
        
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<link rel="stylesheet" href="css/font-awesome.min.css">

	<link type="text/css" rel="stylesheet" href="css/style.css" />
        <link type="text/css" rel="stylesheet" href="css/my_style.css" />
        
        <style>
            .upd_ptn {background-color: #F8694A; color: #fff; border: none; padding: 8px; margin-left: 10px;}
            .upd_ptn:hover {background-color: #30323A; transition: 0.3s;}
        </style>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js does not work if you view the page via file:// -->
	<!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body>
    
    <?php include_once './header.php'; ?>

    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Cart</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                    
                    <?php if(!isset($_SESSION['admin_id'])) { ?>

                    <div class="col-md-12">
                        <div class="order-summary clearfix">
                            
                            <div class="section-title">
                                <h3 class="title">My Cart</h3>
                            </div>
                            
                            <table class="shopping-cart-table table">
                                <thead>
                                        <tr>
                                                <th>Product</th>
                                                <th></th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center">Brand</th>
                                                <th class="text-right"></th>
                                        </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if(isset($_SESSION['s_id'])) {
                                        $my_products = $cart->get_my_products($_SESSION['s_id']);
                                        $total_price = $cart->get_total_price($_SESSION['s_id']);
                                        
                                        $nPro = $cart->get_n_pro($_SESSION['s_id']);
                                        if (!is_null($my_products)){ 
                                        for($l=0; $l<sizeof($my_products); $l++) {
                                    ?>

                                    <tr>
                                        <td class="thumb"><img src="./img/<?php echo $my_products[$l]['image_name']; ?>" alt=""></td>
                                        
                                        <td class="details">
                                            <a href="#"><?php echo $my_products[$l]['Name']; ?></a>
                                        </td>
                                        
                                        <td class="price text-center"><strong><?php echo $my_products[$l]['Price']; ?></strong></td>
                                        
                                        <td class="qty text-center">
                                            <form action="../Controllers/action_update_nPro.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $my_products[$l]['Id'] ?>">
                                                <input class="input" type="number" name="nPro" value="<?php echo $nPro[$l]['n_pro']; ?>" max="<?php echo $my_products[$l]['Quantity']; ?>" min="1" required>
                                                <button type="submit" class="upd_ptn">Update</button>
                                            </form>
                                        </td>
                                        
                                        <td class="price text-center"><strong><?php echo $my_products[$l]['Brand']; ?></strong></td>
                                        
                                        <td class="text-right">
                                            
                                            <form action="../Controllers/action_remove_from_cart.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $my_products[$l]['Id'] ?>">
                                                <button type="submit" class="main-btn icon-btn"><i class="fa fa-close"></i></button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                    
                                    <?php }} ?>
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>TOTAL</th>
                                        <th colspan="2" class="total">$<?php echo $total_price; ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                            
                            <?php } ?>
                            
                        </div>
                    </div>

                    <?php } ?>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <?php include_once './footer.php'; ?>

    <!-- jQuery Plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>