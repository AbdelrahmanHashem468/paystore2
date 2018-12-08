<?php
session_start();
if(!isset($_SESSION['admin_id'])) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Customers</title>

	<!-- Google font -->
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
                <li class="active">List Customers</li>
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

                    <div class="col-md-12">
                        <div class="order-summary clearfix">
                            
                            <div class="section-title">
                                <h3 class="title">All Customers</h3>
                            </div>
                            
                            <table class="shopping-cart-table table">
                                <thead>
                                    <tr>
                                        <th>Profile</th>
                                        <th class="text-center">User Id</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">User Name</th>
                                        <th class="text-right"></th>
                                    </tr>
                                </thead>
                                
                                <tbody>

                                    <?php
                                    include_once '../Controllers/Admin.php';
                                    $adm = new Admin();
                                    $customers = $adm->get_customers();
                                    
                                    for($l=0; $l<sizeof($customers); $l++) {
                                    ?>
                                    
                                    <tr>
                                        <td class="thumb"><img src="../Models/uploads/<?php echo $customers[$l]['my_image']; ?>"></td>
                                        
                                        <td class="price text-center"><strong><?php echo $customers[$l]['id']; ?></strong></td>
                                        <td class="price text-center"><strong><?php echo $customers[$l]['email']; ?></strong></td>
                                        <td class="price text-center"><strong><?php echo $customers[$l]['name']; ?></strong></td>
                                        
                                        <td class="text-right">
                                            <form action="../Models/delete_customer.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $customers[$l]['id']; ?>">
                                                <button type="submit" class="main-btn icon-btn"><i class="fa fa-close"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    
                                    <?php } ?>
                                    
                                </tbody>
                                
                            </table>
                            
                        </div>
                    </div>

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