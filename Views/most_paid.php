<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo "Most Paid Products"; ?></title>

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

    <?php include_once './navbar2.php'; ?>

    <?php
    include_once '../Controllers/Product.php';

    $pro = new Product(NULL);
    $arr = $pro->get_most_paid();
    ?>
    
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            
            <!-- row -->
            <div class="row">
                
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title" id="shop">Most Paid Products</h2>
                    </div>
                </div>
                <!-- section title -->
                
                <?php for ($i = 0; $i < count($arr) && $i < 12; $i++) { ?>
                
                <?php include './single_product2.php'; ?>
                
                <?php } ?>

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