<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Check Out</title>

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
            .nP {color: #F8694A;}
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
                <li class="active">Checkout</li>
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
            <form action="../Models/action_place_order.php" method="post" id="checkout-form" class="clearfix">
                    
                    <div class="col-md-6">
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Billing Details</h3>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="address" placeholder="Address" required>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="city" placeholder="City" required>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="country" placeholder="Country" required>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="zip-code" placeholder="ZIP Code" required>
                            </div>
                            <div class="form-group">
                                <input class="input" type="tel" name="tel" placeholder="Telephone" required>
                            </div>
                             <div class="form-group">
                                 <input class="input" type="text" name="payment" placeholder=" Visa number/Paypal account   ''choose your method first''" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="shiping-methods">
                            <div class="section-title">
                                <h4 class="title">Shipping Methods</h4>
                            </div>
                            <div class="input-checkbox">
                                <input type="radio" name="shipping" id="shipping-1" checked>
                                <label for="shipping-1">Free Shipping -  $0.00</label>
                                <div class="caption">
                                    <p>We Deliver The Order Free</p>
                                </div>
                            </div>
                        </div>

                        <div class="payments-methods">
                            <div class="section-title">
                                <h4 class="title">Payments Methods</h4>
                            </div>
                            <div class="input-checkbox">
                                <input type="radio" name="payments" id="payments-1" value="Visa" checked>
                                <label for="payments-1">Direct Bank Transfer</label>
                                <div class="caption">
                                    <p>By The Visa Number</p>
                                </div>
                            </div>
                            <div class="input-checkbox">
                                <input type="radio" name="payments" id="payments-3" value="Paypal">
                                <label for="payments-3">Paypal System</label>
                                <div class="caption">
                                    <p>By Paypal Number</p>
                                </div>
                            </div>                          
                            </div>
                            </div>
                            </div>
                        </div>
                    </div>

                    <?php if(!isset($_SESSION['admin_id'])) { ?>

                    <div class="col-md-12">
                        <div class="order-summary clearfix">
                            
                            <div class="section-title">
                                <h3 class="title">Order Review</h3>
                            </div>
                            
                            <table class="shopping-cart-table table">
                                <thead>
                                        <tr>
                                                <th>Product</th>
                                                <th>Name</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center">Brand</th>        
                                        </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if(isset($_SESSION['s_id'])) {
                                        $my_products = $cart->get_my_products($_SESSION['s_id']);
                                        $total_price = $cart->get_total_price($_SESSION['s_id']);
                                        
                                        $nPro = $cart->get_n_pro($_SESSION['s_id']);
                                        
                                        for($l=0; $l<sizeof($my_products); $l++) {
                                    ?>

                                    <tr>
                                        <td class="thumb"><img src="./img/<?php echo $my_products[$l]['image_name']; ?>" alt=""></td>
                                        <td class="details">
                                            <a href="#"><?php echo $my_products[$l]['Name']; ?></a>
                                        </td>
                                        <td class="price text-center"><strong><?php echo $my_products[$l]['Price']; ?></strong></td>
                                        <td class="price text-center"><strong class="nP"><?php echo $nPro[$l]['n_pro']; ?></strong></td>
                                        <td class="price text-center"><strong><?php echo $my_products[$l]['Brand']; ?></strong></td>
                                        
                                    </tr>

                                    <?php } ?>

                                </tbody>
                                
                                <tfoot>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>SUBTOTAL</th>
                                        <th colspan="2" class="sub-total">$<?php echo $total_price; ?></th>
                                    </tr>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>SHIPING</th>
                                        <td colspan="2">Free Shipping</td>
                                    </tr>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>TOTAL</th>
                                        <th colspan="2" class="total">$<?php echo $total_price; ?></th>
                                    </tr>
                                </tfoot>
                                
                            </table>
                            
                            <?php if(isset($my_products)) { ?>
                            
                            <div class="pull-right">
                                
                                <button type="submit" class="primary-btn">Place Order</button>
                            
                            </div>
                            
                            <?php } } ?>
                            
                        </div>
                    </div>

                    <?php } ?>

                </form>
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
