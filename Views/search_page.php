<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo "Search Page"; ?></title>

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
    
    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Search</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->
    
    <?php
        include_once '../Controllers/Product.php';
        $pro = new Product(NULL);
        $arr = $pro->get_products();
        
        if(isset($_REQUEST['search'])) {
            include_once '../Controllers/Customer.php';
            $data = $_REQUEST['search'];
            
            $cu = new customer();
            $pids = $cu->search($data);
        }
        
    ?>
    
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                
                <?php if(count($pids)==0) {echo 'not found';} ?>
                
                <?php
                    for ($i=sizeof($arr)-1; $i>=0; $i--) {
                        for($j=0; $j<count($pids); $j++) {
                            if($arr[$i]['id'] == $pids[$j]) {
                ?>
                
                <?php include './single_product.php'; ?>
                
                <?php } } } ?>

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