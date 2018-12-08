<?php
session_start();
     include_once'fpdf.php';
    class orderpdf extends FPDF{
          public $arrp;
           public $arrq;
           public $total;
        function Header() {
                  
    include_once './DataBase.php';
    $file_name = './credential.php';
    $db = DataBase::getInstance($file_name);
    $db->get_connection();
            $id=$_SESSION['s_id'];
            $result=$db->fetch_query("Select * from customer where id = $id");
            $this->image('../Views/img/Logo_paystore.jpg',1,-20,50,50);
           $this->SetFont('Arial','B',14);
        $this->Cell(276,5,'Invoice',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','I',15);
        $this->Cell(276,10,'Paystore"An online shopping system"',0,0,'C');           
        $this->Ln(5);
        $na=$result[0]['name'];
        $this->Cell(2,30,"Name : $na",0,0,"L");
        $em=$result[0]['email'];
          $this->Cell(2,45,"Email : $em",0,0,"L"); 
           $em=$result[0]['country'].','.$result[0]['city'].','.$result[0]['address'];
          $this->Cell(2,60,"Address : $em",0,0,"L");
          $np=$result[0]['phone_n'];
            $this->Cell(2,75,"Nphone : $np",0,0,"L");
             $zc=$result[0]['zip_code'];
              $this->Cell(2,90,"Zipcode : $zc",0,0,"L");
               $res=$db->fetch_query("Select * from invoice where cust_id = $id and end_time='0000-00-00'");
               //print_r($res);
               include_once '../Controllers/Order.php';
               $o=new Order();
               $end=$o->add_end_time($id);
               $this->total=$res[0]['total_cost'];
               $strp=$res[0]['products'];
               $this->arrp= explode('.',$strp);
               $strq=$res[0]['quantities'];
               $this->arrq= explode('.', $strq);
               $pm=$res[0]['pay_method'];
               $this->Cell(2,105,"Payment method : $pm",0,0,"L");
               $this->Cell(2,120,"Delivering date : $end",0,0,"L");        
                       $this->Ln(20);
    }
      function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    function table_header(){
         $this->SetFont('Times','',12);
        $this->Ln(50);
        $this->SetFont('Times','B',12);
        $this->Cell(70,10,'product name',1,0,'C');
        $this->Cell(50,10,'quantity',1,0,'C');
        $this->Cell(50,10,'Cost of .1',1,0,'C');
        $this->Ln();
    }
    function view_table(){
         include_once './DataBase.php';
    $file_name = './credential.php';
    $db = DataBase::getInstance($file_name);
    $db->get_connection();
        for($i=0;$i<count($this->arrp);$i++){
            $j=$this->arrp[$i];
         $res=$db->fetch_query("Select * from product where id = $j ");
         $name=$res[0]['Name'];
          $price=$res[0]['Price'];
            $this->Cell(70,10,$name,1,0,'L');
            $this->Cell(50,10,$this->arrq[$i],1,0,'L');
            $this->Cell(50,10,$price.'$',1,0,'L');
            $this->Ln();
        }
        $this->Cell(60,10,"Total:".$this->total."$",0,0,'L');
        $this->Ln();
        $this->Cell(38,10,"PAYSTORE,THANK YOU",0,0,'C');
        }
    
}

if(isset($_SESSION['s_id'])){
        $pdf=new orderpdf();
         $pdf->AliasNbPages();
          $pdf->AddPage('L','A4',0);
          $pdf->table_header();
          $pdf->view_table();
                    $pdf->Output();
        }else{
    echo '<SCRIPT> alert("You have not logged in yet "); </SCRIPT>';
        }