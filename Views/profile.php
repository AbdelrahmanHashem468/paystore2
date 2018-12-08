<?php session_start();
if(!isset($_SESSION['s_id']) && !isset($_SESSION['admin_id'])) {
    header('Location: http://localhost/my_projects/PayStore/Views/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <link rel="shortcut icon" href="img/title5.png" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=.7"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profile</title>

    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <link rel="stylesheet" href="css/font-awesome.min.css">

    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <link type="text/css" rel="stylesheet" href="css/my_style.css" />
    <link type="text/css" rel="stylesheet" href="css/profile_style2.css" />

    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/component2.css" />
    
</head>

<body>
    
    <?php include_once './profile_header.php'; ?>

    <!-- Start Profile -->
    <section class="my_profile">
        <div class="over"></div>
        <div class="container">
            
            <div class="card">
                
                <div class="pro_img">
                    
                    <?php 
                    if(isset($_SESSION['s_id'])) {
                        include_once '../Controllers/Customer.php';
                        $cus = new Customer();
                        $img = $cus->get_my_image($_SESSION['s_id']);
                    }
                    ?>
                    
                    <p><?php if(isset($_SESSION['s_name'])) {echo $_SESSION['s_name'];} else {echo "Admin";} ?></p>
                    
                    <?php if(isset($img)) { ?>
                    <img src="../Models/uploads/<?php echo $img[0]['my_image'] ?>" />
                    <?php } else { ?>
                    <img src="../Models/uploads/mem.jpg"><br>
                    <?php } ?>
                    
                    <?php if(isset($_SESSION['s_id'])) { ?>
                    <form action="../Models/upload_image.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="cust_id" value="<?php echo $_SESSION['s_id']; ?>" />
                        
                        <div class="content">
                            <div class="box">
                                <input type="file" name="image" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple required />
                                <label for="file-1"><i class="fa fa-upload"></i><span> Upload Photo</span></label>
                            </div>
                        </div>
                        
                        <button type="submit" name="submit" value="img"><a>Update Profile Picture</a></button>
                    </form>
                    <?php } ?>
                    
                    <hr>
                </div>
                
                <?php if(isset($_SESSION['s_id'])) { ?>
                <div class="pro_link row">
                    <a class="col col-md-4" href="cart.php">MY CART</a>
                    <a class="col col-md-4" href="invoice_page.php">MY INVOICES</a>
                    <a class="col col-md-4" href="wishlist_page.php">MY WISHLIST</a>
                </div>
                <?php } else { ?>
                <div class="pro_link row">
                    <a class="col col-md-4" href="List_customers.php">LIST CUSTOMERS</a>
                    <a class="col col-md-4" href="add_new_product.php">ADD NEW PRODUCT</a>
                    <a class="col col-md-4" href="search_customers.php">SEARCH CUSTOMERS</a>
                </div>
                <?php } ?>
                
            </div>
            
        </div>
    </section>
    <!-- End Profile -->
    
    <?php include_once './footer.php'; ?>

    <!-- jQuery Plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>
    
    <script src="js/custom-file-input.js"></script>
</body>

</html>