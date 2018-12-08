<?php
session_start();
     include_once'fpdf.php';
    class reppdf extends FPDF{
          function Header() {
               $this->image('../Views/img/Logo_paystore.jpg',1,-20,50,50);
           $this->SetFont('Arial','B',14);
        $this->Cell(276,5,'Reports',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','I',15);
        $this->Cell(276,10,'Paystore"An online shopping system"',0,0,'C');           
        $this->Ln(10);
          }
            function footer(){
                $this->SetY(-15);
                $this->SetFont('Arial','',8);
                $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
            }
           function table_header(){
               $this->SetFont('Times','',12);
                $this->Ln(10);
                $this->SetFont('Times','B',12);
                $this->Cell(45,10,'Product name',1,0,'C');
                $this->Cell(45,10,'Type',1,0,'C');
                $this->Cell(45,10,'Brand',1,0,'C');
                $this->Cell(45,10,'Price',1,0,'C');
                  $this->Cell(45,10,'n.sold',1,0,'C');
                $this->Ln();
          }
           function view_table(){
                include_once './DataBase.php';
                 $file_name = './credential.php';
                 $db = DataBase::getInstance($file_name);
                 $db->get_connection();
                 $res=$db->fetch_query("Select * from product");
                   $result=$db->fetch_query("Select pro_id,pro_qn from sold_products");
                   //print_r($result);
                 for($i=0;$i<count($res);$i++){
                    $csold=0;
                     for($j=0;$j<count($result);$j++){
                         if($result[$j]['pro_id']==$res[$i]['Id']){
                             $csold+=$result[$j]['pro_qn'];
                         }
                     }
                     $this->Cell(45,10,$res[$i]['Name'],1,0,'C');
                      $this->Cell(45,10,$res[$i]['Type'],1,0,'C');
                       $this->Cell(45,10,$res[$i]['Brand'],1,0,'C');
                        $this->Cell(45,10,$res[$i]['Price'].'$',1,0,'C');
                         $this->Cell(45,10,$csold,1,0,'C');
                         $this->Ln();
                 }    
          }
    }
if(isset($_SESSION['admin_id'])){
        $pdf=new reppdf();
         $pdf->AliasNbPages();
          $pdf->AddPage('L','A4',0);
          $pdf->table_header();
          $pdf->view_table();
                    $pdf->Output();
        }else{
    echo '<SCRIPT> alert("You have not logged in yet "); </SCRIPT>';
        }
