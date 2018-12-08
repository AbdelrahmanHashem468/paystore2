<?php
    session_start();
    
    if( isset($_SESSION['s_id']) || isset($_SESSION['admin_id']) ) {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=.7"> 
        <TITLE>Login</TITLE>
        <link rel="shortcut icon" href="img/title5.png" />
        <style>
            @import url(https://fonts.googleapis.com/css?family=Roboto:300);
            .login-page {width: 360px; padding: 8% 0 0; margin: auto;}
            .form {position: relative; z-index: 1; background: #F8694A; max-width: 360px; margin: 0 auto 100px; 
                    padding: 45px; text-align: center; box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);}
            .form input {font-family: "Roboto", sans-serif; outline: 0; background: #fff; width: 100%; border: 0;
                    margin: 0 0 15px; padding: 15px; box-sizing: border-box; font-size: 14px; border-radius: 8px;}
            .action {font-family: "Roboto", sans-serif; text-transform: uppercase; outline: 0; background: #fff; width: 100%; border: 0; 
                    padding: 15px; font-size: 14px; -webkit-transition: all 0.3 ease; transition: all 0.3s ease; cursor: pointer; border-radius: 8px}
            .form .message {margin: 18px 0; color: #30323A; font-size: 15px;}
            .form .message a {color: #FFF; text-decoration: none;}
            .form .message a:hover {text-decoration: underline;}
            .action:hover,.action:active,.action:focus {background-color:#30323A; transition: .5s;}
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
    
        <div class="login-page" class="col-lg-4">
            <div class="form">
                <p class="message">Back To Home <a href="index.php">PayStore</a></p>
                <form class="login-form" action="../Models/mylogin.php" method="post">
                    <input type="text" name="email" placeholder="Email" required/>
                    <input type="password" name="pass" placeholder="password" required/>
                    <input type="submit" class="action"  value="Login">
                    <p class="message">Not registered? <a href="register.php">Create an account</a></p>
                </form>
            </div>
        </div>
        
    </body>
    
</html>