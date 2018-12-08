<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>WishList</title>

	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
	
        <link rel="stylesheet" href="css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />
	<link type="text/css" rel="stylesheet" href="css/style.css" />
        <link type="text/css" rel="stylesheet" href="css/my_style.css" />

</head>

<body>
    
    <?php include_once './header.php'; ?>

    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">My WishList</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <?php
    include_once '../Controllers/Product.php';
    $pro = new Product(NULL);
    $arr = $pro->get_products();    
    ?>
    
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            
            <?php 
            if(!isset($_SESSION['admin_id']) && isset($_SESSION['s_id'])) {
                include_once '../Controllers/WhiteList.php';
                $whi = new WhiteList();
                $wids = $whi->get_my_likes($_SESSION['s_id']);
            ?>
            
            <!-- row -->
            <div class="row">
                
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">My WishList</h2>
                    </div>
                </div>
                <!-- section title -->
                
                <?php
                for ($i=0; $i<count($arr); $i++) {
                    for($j=0; $j<count($wids); $j++) {
                        if($arr[$i]['id'] == $wids[$j]['pro_id']) {
                ?>
                
                <?php include './single_product.php'; ?>
                
                <?php } } } ?>
                
            </div>
            <!-- /row -->
            
            <?php } ?>
            
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