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
          <meta name="viewport" content="width=device-width, initial-scale=.7"> 
        <link rel="shortcut icon" href="img/title5.png" />
        <style>
            .login-page {width: 360px; padding: 8% 0 0; margin: auto;}
            .form {position: relative; z-index: 1; background: #F8694A; max-width: 360px; margin: 0 auto 100px; 
                    padding: 45px; text-align: center; box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);}
            .form input {width: 50%; border: none; margin: 0 0 15px; background-color: #fff;
                        padding: 10px; font-size: 14px; font-family: serif;  border-radius: 8px;}
            .form .message {margin: 18px 0; color: #30323A; font-size: 15px;}
            .form .message a {color: #FFF; text-decoration: none;}
            .form .message a:hover {text-decoration: underline;}
            .form .action {
                width: 40%;
                padding: 9px;
                border: none; 
                cursor: pointer;
                transition: 0.3s;
                font-size: 16px;
                margin-top: 10px;
                color: #30323A;
            }
            .action:hover,.action:active,.action:focus {color: #fff; background-color: #30323A;}
            .container {position: relative; z-index: 1; max-width: 300px; margin: 0 auto;}
            .container:before, .container:after {content: ""; display: block; clear: both;}
            .container .info {margin: 50px auto; text-align: center;}
            .container .info h1 {margin: 0 0 15px; padding: 0; font-size: 36px; font-weight: 300; color: #1a1a1a;}
            .container .info span {color: #4d4d4d; font-size: 12px;}
            .container .info span a {color: #000000; text-decoration: none;}
            .container .info span .fa {color: #EF3B3A;}
            body {background: #fff;}
            .form a{color: #fff; margin-bottom: 20px;}
        </style>
    
    </head>
    
    <body>
    
        <div class="login-page">
            <div class="form">
                <p class="message">Back To Home <a href="index.php">PayStore</a></p>
                <form class="login-form" action="action_search_customer.php" method="post">
                    <input type="number" name="id" placeholder="Enter Customer Id" required/>
                    <input type="submit" style="" class="action" value="Search">
                </form>
            </div>
        </div>
        
    </body>
    
</html>