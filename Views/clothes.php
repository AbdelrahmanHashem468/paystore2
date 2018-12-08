<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo "Clothes"; ?></title>

    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <link rel="stylesheet" href="css/font-awesome.min.css">

    <link type="text/css" rel="stylesheet" href="css/style.css" />
    
    <link type="text/css" rel="stylesheet" href="css/my_style.css" />
    
</head>

<body>
    
    <?php include_once './header.php'; ?>

    <?php include_once './navbar.php'; ?>

    <!-- HOME -->
    <div id="home">
        <!-- container -->
        <div class="container">
            <!-- home wrap -->
            <div class="home-wrap">
                <!-- home slick -->
                <div id="home-slick">
                    <!-- banner -->
                    <div class="banner banner-1">
                        <img src="./img/banner01.jpg" alt="">
                        <div class="banner-caption text-center">
                            <h1>Bags sale</h1>
                            <h3 class="white-color font-weak">Up to 50% Discount</h3>
                            <button class="primary-btn">Shop Now</button>
                        </div>
                    </div>
                    <!-- /banner -->

                    <!-- banner -->
                    <div class="banner banner-1">
                        <img src="./img/banner02.jpg" alt="">
                        <div class="banner-caption">
                            <h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50% OFF</span></h1>
                            <button class="primary-btn">Shop Now</button>
                        </div>
                    </div>
                    <!-- /banner -->

                    <!-- banner -->
                    <div class="banner banner-1">
                        <img src="./img/banner03.jpg" alt="">
                        <div class="banner-caption">
                            <h1 class="white-color">New Product <span>Collection</span></h1>
                            <button class="primary-btn">Shop Now</button>
                        </div>
                    </div>
                    <!-- /banner -->
                </div>
                <!-- /home slick -->
            </div>
            <!-- /home wrap -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOME Done -->

    <?php
        include_once '../Controllers/Product.php';
        $pro = new Product(NULL);
        $arr = $pro->get_products();
        $maxShow = 20;
    ?>
    
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            
            <h2 class="myh text-center" id="shop">Clothes</h2>
            
            <!-- row -->
            <div class="row">
                
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Dresses</h2>
                    </div>
                </div>
                <!-- section title -->
                
                <!-- banner -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="banner banner-2">
                        <img src="./img/banner14.jpg" alt="">
                        <div class="banner-caption">
                            <h2 class="white-color">NEW<br>COLLECTION</h2>
                            <button class="primary-btn">Shop Now</button>
                        </div>
                    </div>
                </div>
                <!-- /banner -->
                
                <?php
                    for ($i=sizeof($arr)-1, $j=0; $i>=0 && $j<$maxShow; $i--) {
                        if($arr[$i]['type'] == "Dress") {
                ?>
                
                <?php include './single_product.php'; ?>
                
                <?php $j++; } } ?>
                
            </div>
            <!-- /row -->
            
            <!-- row -->
            <div class="row">
                
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Bags</h2>
                    </div>
                </div>
                <!-- section title -->
                
                <!-- banner -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="banner banner-2">
                        <img src="./img/banner15.jpg" alt="">
                        <div class="banner-caption">
                            <h2 class="white-color">NEW<br>COLLECTION</h2>
                            <button class="primary-btn">Shop Now</button>
                        </div>
                    </div>
                </div>
                <!-- /banner -->
                
                <?php
                    for ($i=sizeof($arr)-1, $j=0; $i>=0 && $j<$maxShow; $i--) {
                        if($arr[$i]['type'] == "Bag") {
                ?>
                
                <?php include './single_product.php'; ?>
                
                <?php $j++; } } ?>
                
            </div>
            <!-- /row -->
            
            <!-- row -->
            <div class="row">
                
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Watches</h2>
                    </div>
                </div>
                <!-- section title -->
                
                <!-- banner -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="banner banner-2">
                        <img src="./img/elec6.jpg" alt="">
                        <div class="banner-caption">
                            <h2 class="white-color">NEW<br>COLLECTION</h2>
                            <button class="primary-btn">Shop Now</button>
                        </div>
                    </div>
                </div>
                <!-- /banner -->
                
                <?php
                    for ($i=sizeof($arr)-1, $j=0; $i>=0 && $j<$maxShow; $i--) {
                        if($arr[$i]['type'] == "Watch") {
                ?>
                
                <?php include './single_product.php'; ?>
                
                <?php $j++; } } ?>
                
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