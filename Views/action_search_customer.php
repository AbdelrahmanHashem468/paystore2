<?php
    session_start();
    
    if(!isset($_SESSION['admin_id'])) {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
        <TITLE>Search Customer</TITLE>
         <link rel="shortcut icon" href="img/title5.png" />
        <style>
            @import url(https://fonts.googleapis.com/css?family=Roboto:300);
            .login-page {width: 360px; padding: 8% 0 0; margin: auto;}
            .form {position: relative; z-index: 1; background: #F8694A; max-width: 360px; margin: 0 auto 100px; 
                    padding: 45px; box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);}
            .form input {font-family: "Roboto", sans-serif; outline: 0; background: #fff; width: 100%; border: 0;
                    margin: 0 0 15px; padding: 15px; box-sizing: border-box; font-size: 14px; border-radius: 8px;}
            .action {font-family: "Roboto", sans-serif; text-transform: uppercase; outline: 0; background: #fff; width: 100%; border: 0; 
                    padding: 15px; font-size: 14px; -webkit-transition: all 0.3 ease; transition: all 0.3s ease; cursor: pointer; border-radius: 8px}
            .form .message ,.form h3{margin: 20px; color: #30323A; font-size: 15px; text-align: center;}
            .form h3 {border: 2px #fff;}
            .form .message a {color: #FFF; text-decoration: none;}
            .form .message a:hover {text-decoration: underline;}
            .action:hover,.action:active,.action:focus {color: #3487db ; transition: .5s;}
            .info p{color: #30323A;}
            .info span {color: #FFF;}
        </style>
    
    </head>
    
    <body>
        
        <?php 
        $id = $_REQUEST['id'];
        include '../Controllers/Admin.php';
        $admin = new Admin();
        $cust = $admin->get_customer_by_id($id);
        ?>
        
        <div class="login-page">
            <div class="form">
                <p class="message">Back To Home <a href="index.php">PayStore</a></p>
                
                <h3>Customer Info</h3>
                
                <?php if($cust == NULL) { ?>
                
                <p>Not Found</p>
                
                <?php } else { ?>
                
                <div class="info">
                    <p>Customer Id: <SPAN><?php echo $cust[0]['id'] ?></SPAN></p>
                    <p>Name: <SPAN><?php echo $cust[0]['name'] ?></SPAN></p>
                    <p>Age: <SPAN><?php echo $cust[0]['age'] ?></SPAN></p>
                    <p>Email: <SPAN><?php echo $cust[0]['email'] ?></SPAN></p>
                </div>
                
                <?php } ?>
                
            </div>
        </div>
        
    </body>
    
</html>