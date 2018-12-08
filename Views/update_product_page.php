<?php session_start(); 
    if(!isset($_SESSION['admin_id']) ) {
        echo"<SCRIPT>alert('Not logged in as an admin');</SCRIPT>";
         echo "<script> window.location.assign('index.php'); </script>";
    }
?>

<!DOCTYPE html>
<html>
    
    <head>
        <link rel="shortcut icon" href="img/title5.png" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=.7">
        <title>Update A Product</title>
        <style>
            * {box-sizing: border-box; margin: 0; font-family: 'Joti+One';}
            .contr {width: 35%; margin: 0 auto;}
            .text-center {text-align: center;}
            .clear {clear: both;}
            header h1, h3 {margin: 12px;}
            header a {color: #44403f; text-decoration: none;}
            header a:hover {color: #F8694A; text-decoration: underline;}
            body {background-color:#fff; text-align: center; color:#30323A;}
            span {color: #fff;}
            .myForm {background-color: #F8694A; padding: 15px 0; overflow: hidden; color: #333;}
            .myForm input, .myForm select {width: 90%; padding: 10px; margin: 10px; border: none; font-size: 18px; border-radius: 8px;}
            .myForm p {color: #30323A; text-align: left; margin-top: 10px; margin-left: 30px; font-weight: bold;}
            .action, .iFile {background-color: #fff; color: #666;}
            .action:hover {background-color: #333; color: #fff;}
            ::placeholder {font-size: 18px;}
            
           
        </style>
    </head>
    
    <body>
         <?php #if(isset($_SESSION['pro_id'])) { 
          if(isset($_SESSION['admin_id']) ) {
                $id = $_REQUEST['id'];
                 
                ?>
        <div class="contr">
            
            <header class="text-center">
                <h1>Welcome Admin</h1>
                <a href="index.php">Back to Home</a>
                <h3>You Can Update Product From Here</h3>
            </header>
            
            <div class="myForm">
                
               
                
                <p>Product Id: <?php echo $id; ?></p>
                
                <?php #} 
                
                include '../Controllers/Product.php';
                $pro = new Product(NULL);
                $info = $pro->get_product_by_id($id);
               
                ?>
                
                <form action="../Models/process_update_product.php" method="post" enctype="multipart/form-data">
                    <p>Type: <?php echo $info[0]['Type']; ?></p>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" required>
                    <p>Name</p>
                    <input type="text" name="name" placeholder="Name" value="<?php echo $info[0]['Name']; ?>" required>
                    <p>Brand</p>
                    <input type="text" name="brand" placeholder="Brand" value="<?php echo $info[0]['Brand']; ?>" required>
                    <p>Price</p>
                    <input type="text" name="price" placeholder="Price" value="<?php echo $info[0]['Price']; ?>" required>
                    <p>Quantity</p>
                    <input type="number" name="quantity" placeholder="Quantity" value="<?php echo $info[0]['Quantity']; ?>" required>
                    <p>Choose product's image</p>
                    <input type="file" name="image" class="iFile" value="<?php $info[0]['image_name'];?>">
                    <input type="submit" style="width: 30%" class="action"  name="submit" value="Update">
                </form>
                <div class="clear"></div>
            </div> <!-- end of my form -->
            
        </div><!--end of container-->
    </body>
    <?php } ?>
</html>