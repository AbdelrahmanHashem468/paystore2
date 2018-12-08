<?php session_start(); ?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="UTF-8">
     <link rel="shortcut icon" href="img/title5.png" />
    <title>Report</title>
    
    <style>
        * {
            box-sizing: border-box;
        }
        body { 
            font-family: "Open Sans", arial;
        }
        table {
            width: 100%;
            max-width: 600px;
            height: 320px;
            border-collapse: collapse;
            border: 1px solid #38678f;
            margin: 50px auto;
            background: white;
        }
        th {
            background-color: #F8694A;
            height: 54px;
            width: 25%;
            font-weight: lighter;
            text-shadow: 0 1px 0 #38678f;
            color: white;
            border: 1px solid #38678f;
            box-shadow: inset 0px 1px 2px #568ebd;
            transition: all 0.2s;
        }
        tr {
            border-bottom: 1px solid #cccccc;
        }
        tr:last-child {
            border-bottom: 0px;
        }
        td {
            border-right: 1px solid #cccccc;
            padding: 10px;
            transition: all 0.2s;
        }
        td:last-child {
            border-right: 0px;
        }
        td.selected {
             background: #d7e4ef;
        }
        td input {
            font-size: 14px;
            background: none;
            outline: none;
            border: 0;
            display: table-cell;
            height: 100%;
            width: 100%;
        }
        td input:focus {
            box-shadow: 0 1px 0 steelblue;
            color: steelblue;
        }
        .heavyTable {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: float 5s infinite;
        }
        .main {
            max-width: 600px;
            padding: 10px;
            margin: auto;
        }
        .report {
            font-family: "Roboto", sans-serif; text-transform: uppercase; outline: 0; background: #fff; width: 50%; border: none; 
            padding: 8px; font-size: 14px; -webkit-transition: all 0.3 ease; transition: 0.3s; cursor: pointer; border-radius: 5px;
        }
        .report:hover {color: #3487db; transition: 0.5s;}
        .reportdiv {
            position: relative; z-index: 1; background: #F8694A ; max-width: 350px; margin: 50px auto 100px; 
            padding: 45px; text-align: center; box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
        h1 {
            position: relative;
            text-align: center;
            color: #32313A;
            font-size: 18px;
        }
        .pdf{
            background-color:#F8694A;
            color:#fff;
            display: inline-block;
            padding: 10px 15px;
            text-transform: uppercase;
            font-weight: 700;
            border: none;
            -webkit-transition: 0.3s all;
            transition: 0.3s all;
            border-radius: 5px;
        }
        .pdf:hover{
            background-color: #32313A;
        }
    </style>
    
</head>
    
    <body>     
        <?php
        include '../Controllers/Customer.php';
        if(isset($_SESSION['admin_id'])) { //admin session
            include_once '../Controllers/Report.php';
            $rep=new Report();
            echo " <div class='main'>
                <table class='heavyTable'>
                    <thead>
                        <tr>
                          <th>Custumer id</th>
                          <th>report     </th>
                          <th>date       </th>
                        </tr>
                    </thead>
                <tbody>";
            $reports=$rep->get_reports();
            for($i=0;$i<count($reports);$i++){
     
            echo"<tr>
                    <td> ".$reports[$i]['cust_id']."</td>
                    <td>". $reports[$i]['text']."</td>
                    <td>". $reports[$i]['time']."</td>
                </tr>";
            }         
            echo" </tbody>
                </table>
            </div>";
            echo ' <form action="../Models/full_rep.php" method="post">
        <button type="submit" name="pdfgen" value="1" class="pdf">generate a full pdf Rep. </button>
        </form>';
        }
        
        if(isset($_SESSION['s_id'])) {// customer session
            echo "
                <div class='reportdiv'>  
                <h1>Inform us what you want</h1>
                <form method='post'>
                    <textarea cols='35' rows='15' name='data'></textarea><br>
                    <input type='submit' name='addareport' class='report' value='send'>              
                </form>
                </div>";
            if(isset($_REQUEST['data'])){
                $text=$_REQUEST['data'];
                $cu=new customer();
                $cu->id=2;
                $cu->makeAreport($text);
                echo "<SCRIPT> alert('your report has been saved');</SCRIPT>";
                echo "<script> window.location.assign('http://localhost/my_projects/PayStore/Views/report_page.php'); </script>";             
            }else{
             echo "<SCRIPT> alert('Enter your report,plz);</SCRIPT>";
            }
        }   
        ?>
        
    </body>  
</html>