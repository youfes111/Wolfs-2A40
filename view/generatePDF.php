<?php 
session_start(); 
require ('./fpdf/fpdf.php');
require '../controler/loginc.php';

if(isset($_SESSION['user1']))
{   
    $user=$_SESSION['user1'];
   
    }
    $e=new loginc();
    $list=$e->selectPDF($user);
    foreach ($list as $loginc) {
                   
      
                
           
                $NomPart= $loginc['NomPart'];
               $programme= $loginc['programme']; 
              $domaine = $loginc['domaine']; 
               $ETAT= $loginc['ETAT']; 
           
                                           
               
                          
       
           
        
$pdf= new FPDF('P','mm',"A4");
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);

$pdf->Cell(71,10,'',0,0);
$pdf->Cell(59,5,$user,0,0);
$pdf->Cell(59,10,'',0,1);
$pdf->Cell(71,10,'',0,0);
$pdf->Cell(59,5,$NomPart,0,0);
$pdf->Cell(59,10,'',0,1);

$pdf->Output();
}
?>