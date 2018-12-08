<?php
session_start();
if(isset($_SESSION['admin_id'])||isset($_SESSION['s_id']) ) {
        echo'<SCRIPT>alert("Already logged in");</SCRIPT>';
         echo "<script> window.location.assign('index.php');</script>";
    }
    ?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=.7"> 
        <title>Register</title>
          <link rel="shortcut icon" href="img/title5.png" />
        <style>
            @import url('https://fonts.googleapis.com/css?family=Joti+One');
            * {box-sizing: border-box; margin: 0; font-family: 'Joti+One';}
            .contr {max-width: 350px; margin: 0 auto;}
            body {background-color: #fff; text-align: center; color: #30323A;}
            body h1 {margin: 10px; color: #F8694A;}
            body h3 {padding: 20px;}
            .my_form {position: absolute; margin-left: -45px; background: #F8694A; width: 450px; padding: 40px; text-align: center;
                    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);}
            .my_form .inp {width: 80%; border: none; padding: 15px; margin: 15px; border-radius: 8px;}
            .my_form .sub {width: 35%; border: none; padding: 10px; margin: 15px; background-color: #fff; font-size: 14px; border-radius: 8px;}
            .my_form .sub:hover {background-color: #30323A; color: #fff; transition: 0.3s;}
            ::placeholder {font-size: 18px;}
        </style>
    </head>
    
    <body>
        <h1>JOIN US</h1>
        <h3>Welcome to PayStore</h3>
        
        <div class="contr">
            
            <div class="my_form">
                <form action="../Models/myregister.php" method="post">
                    <input class="inp" type="text"     name="name"       placeholder="First Name and Last Name" required>
                    <input class="inp" type="number"   name="age"      placeholder="Age" required>
                    <input class="inp" type="email"    name="email"    placeholder="Email" pattern="[[^;{}\()!&*+~|\/]{1,30}@.{3,10}[.]com]"  required>
                    <input class="inp" type="password" name="password" placeholder="Password (8:15)" pattern="[A-Za-z0-9]{8,15}" required title="8 characters min/15 characters max">
                    
                    <input class="sub" type="submit" value="Submit">
                    <input class="sub" type="reset"  value="Reset" >
                </form>
            </div> <!-- end of my form -->
            
        </div> <!-- end of counter -->
        
    </body>
    
</html>