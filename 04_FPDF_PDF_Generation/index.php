<?php
require 'fpdf19/fpdf.php';
$conn = mysqli_connect("localhost","root","","intership");

$pdf = new FPDF();

$pdf -> AddPage();
$pdf -> SetFont("Arial","B",20);
$pdf->SetTextColor(31,41,55);
$pdf -> cell(200,30,"Student Payment Data",0,1,'C');
$pdf -> Ln(5);

$sql = 'select * from receipt order by amt desc';
$result = mysqli_query($conn, $sql);

$pdf -> SetFont("Arial","B",7);
$pdf->SetFillColor(99,102,241);
$pdf->SetTextColor(255,255,255);
$pdf -> cell(20,7,'Receipt No',1,0,'C',true);
$pdf -> cell(20,7,'Receipt Date',1,0,'C',true);
$pdf -> cell(23,7,'Student ID',1,0,'C',true);
$pdf -> cell(40,7,'Student Name',1,0,'C',true);
$pdf -> cell(16,7,'Course Code',1,0,'C',true);
$pdf -> cell(40,7,'Course Name',1,0,'C',true);
$pdf -> cell(15,7,'Amount',1,0,'C',true);
$pdf -> cell(20,7,'Payent Method',1,0,'C',true);
$pdf -> Ln();

$pdf -> SetFont("Arial","",7);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(248,250,252);
$count=0;
while($row = $result ->fetch_assoc()){
    if($count % 2 == 0){
        $pdf->SetFillColor(238,242,255);
        $pdf -> cell(20,7,$row['rno'],1,0,'C',true);
        $pdf -> cell(20,7,$row['rdate'],1,0,'C',true);
        $pdf -> cell(23,7,$row['stud_id'],1,0,'C',true);
        $pdf -> cell(40,7,$row['stud_nm'],1,0,'C',true);
        $pdf -> cell(16,7,$row['ccode'],1,0,'C',true);
        $pdf -> cell(40,7,$row['cname'],1,0,'C',true);
        $pdf -> cell(15,7,$row['amt'],1,0,'C',true);
        $pdf -> cell(20,7,$row['pay_method'],1,0,'C',true);
        $pdf -> Ln();
    }else{
        $pdf->SetFillColor(255,255,255);
        $pdf -> cell(20,7,$row['rno'],1,0,'C',true);
        $pdf -> cell(20,7,$row['rdate'],1,0,'C',true);
        $pdf -> cell(23,7,$row['stud_id'],1,0,'C',true);
        $pdf -> cell(40,7,$row['stud_nm'],1,0,'C',true);
        $pdf -> cell(16,7,$row['ccode'],1,0,'C',true);
        $pdf -> cell(40,7,$row['cname'],1,0,'C',true);
        $pdf -> cell(15,7,$row['amt'],1,0,'C',true);
        $pdf -> cell(20,7,$row['pay_method'],1,0,'C',true);
        $pdf -> Ln();
    }
    $count++;

}

$pdf -> output();

?>