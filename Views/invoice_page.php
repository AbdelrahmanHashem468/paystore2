<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Invoice</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
        
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<link rel="stylesheet" href="css/font-awesome.min.css">

	<link type="text/css" rel="stylesheet" href="css/style.css" />
        <link type="text/css" rel="stylesheet" href="css/my_style.css" />

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
                <li class="active">Invoice</li>
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
                <form action="../Controllers/action_remove_from_cart.php" method="post" id="checkout-form" class="clearfix">
                    
                    <?php 
                    if(!isset($_SESSION['admin_id'])) {
                        
                        include_once '../Controllers/Invoice.php';
                        $inv = new Invoice();
                        
                        include_once '../Controllers/Product.php';
                        $my_pro = new Product(NULL);
                        
                        $res = $inv->get_invoice($_SESSION['s_id']);
                        
                        for($i=0; $i<count($res); $i++) {
                            $total_cost = $res[$i]['total_cost'];
                            $pay_method = $res[$i]['pay_method'];
                            $products = explode(".", $res[$i]['products']);
                            $quants = explode(".", $res[$i]['quantities']);
                    ?>

                    <div class="col-md-12">
                        <div class="order-summary clearfix">
                            
                            <div class="section-title">
                                <h3 class="title">Invoice <?php echo $i; ?></h3>
                            </div>
                            
                            <table class="shopping-cart-table table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Name</th>
                                        <th class="text-center">quantity</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Type</th>
                                        <th class="text-center">Brand</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if(isset($_SESSION['s_id'])) {
                                        
                                        for($l=0; $l<sizeof($products); $l++) {
                                            $pro = $my_pro->get_product_by_id($products[$l]);
                                    ?>

                                    <tr>
                                        <td class="thumb"><img src="./img/<?php echo $pro[0]['image_name']; ?>"></td>
                                        <td class="details">
                                            <a href=""><?php echo $pro[0]['Name']; ?></a>
                                        </td>
                                        <td class="price text-center"><strong><?php echo $quants[$l]; ?></strong></td>
                                        <td class="price text-center"><strong><?php echo $pro[0]['Price']; ?></strong></td>
                                        <td class="price text-center"><strong><?php echo $pro[0]['Type']; ?></strong></td>
                                        <td class="price text-center"><strong><?php echo $pro[0]['Brand']; ?></strong></td>
                                        
                                    </tr>
                                    
                                    <?php } ?>
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>TOTAL COST</th>
                                        <th colspan="2" class="total">$<?php echo $total_cost; ?></th>
                                    </tr>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>PAY METHOD</th>
                                        <th colspan="2" class="total"> <?php echo $pay_method; ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                            
                            <?php } ?>
                            
                        </div>
                    </div>

                    <?php } } ?>

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