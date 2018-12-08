<?php 
   session_start();
?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <link rel="shortcut icon" href="img/title5.png" />
        <title>Add New Product</title>
        <style>
            * {box-sizing: border-box; margin: 0; font-family: 'Joti+One';}
            .contr {width: 35%; margin: 0 auto;}
            .text-center {text-align: center;}
            header h1, h3 {margin: 15px;text-align:center;}
            body {background-color: #fff; text-align: center; color: #30323A;}
            .my_form {position: absolute; margin-left: 40px; background: #F8694A; width: 450px; padding: 40px; text-align: center;
                    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24); text-align:center;}
            .my_form input, .my_form select {width: 90%; padding: 10px; margin: 10px; border: none; font-size: 18px;  border-radius: 8px;}
            .my_form p {color: #fff; text-align: left; margin-top: 10px; margin-left: 20px; font-weight: bold;}
            .action, .iFile {background-color: #fff; color: #666;}
            .action:hover {background-color: #333; color: #fff; transition: 0.3s;}
            ::placeholder {font-size: 18px;}
        </style>
    </head>
    
    <?php if(isset($_SESSION['admin_id'])) { ?>
    
    <body>
        <div class="contr" >
            
            <header class="text-center">
                <h1>Welcome Admin</h1>
                <h3>You Can Add New Product From Here</h3>
            </header>
            <!DOCTYPE html>
            
            <div class="my_form">
                <form action="../Models/process_add.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="name"  placeholder="Name"  required>
                    <select name="type" required>
                        <option value="Laptop">Laptop</option>
                        <option value="Phone" > Phone</option>
                        <option value="Tablet">Tablet</option>
                        <option value="Dress">Dress</option>
                        <option value="Bag"  >Bag  </option>
                        <option value="Watch">Watch</option>
                    </select>
                    <input type="text" name="brand" placeholder="Brand" required>
                    <input type="number" min="1" name="price" placeholder="Price" required>
                    <input type="number" name="quantity" placeholder="Quantity" min="1" required>
                    <p>Choose Product Photo</p>
                    <input type="file" name="image" class="iFile">
                    <input type="submit" style="width: 35%" class="action" name="submit" value="Add Product">
                </form>
                
            </div> <!-- end of my form -->
            
        </div><!--end of container-->
    </body>
    
    <?php } else { 
        echo "<script> window.location.assign('http://localhost/my_projects/PayStore/Views/index.php'); </script>";
    }
    ?>
    
</html>
