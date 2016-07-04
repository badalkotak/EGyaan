<?php
//PDF USING MULTIPLE PAGES
//FILE CREATED BY: Carlos José Vásquez Sáez
//YOU CAN CONTACT ME: carlos@magallaneslibre.com
//FROM PUNTA ARENAS, MAGALLANES
//INOVO GROUP - http://www.inovo.cl

define('FPDF_FONTPATH', 'font/');
require('../../fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.jpg',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(40,10,'Student List',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}
}

// PDF pdf=new PDF();
//Connect to your database
include("../dbcon.php");

//Create new pdf file
$pdf=new PDF();

//Open file
$pdf->Open();

//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//Add first page
$pdf->AddPage();

//Set Row Height
$row_height = 6;
$y_axis=25;
//set initial y axis position per page
$y_axis_initial = 25;

//print column titles for the actual page
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetY($y_axis_initial);
$pdf->SetX(10);
$pdf->Cell(20, 6, 'ID', 1, 0, 'L', 1);
$pdf->Cell(55, 6, 'NAME', 1, 0, 'L', 1);
$pdf->Cell(70, 6, 'BATCH', 1, 0, 'R', 1);
$pdf->Cell(50, 6, 'MOBILE NO.', 1, 0, 'R', 1);

$y_axis = $y_axis + $row_height;

//Select the Products you want to show in your PDF file
$result=mysqli_query($con,"Select * from Student_Login ORDER BY(branch)");

//initialize counter
$i = 0;
$id=0;

//Set maximum rows per page
$max = 40;


while($row = mysqli_fetch_array($result))
{
    $id++;
    //If the current row is the last one, create new page and print column title
    if ($i == $max)
    {
        $pdf->AddPage();

        //print column titles for the current page
        $pdf->SetY($y_axis_initial);
        $pdf->SetX(10);
        $pdf->Cell(20, 6, 'ID', 1, 0, 'L', 1);
        $pdf->Cell(55, 6, 'NAME', 1, 0, 'L', 1);
        $pdf->Cell(70, 6, 'BATCH', 1, 0, 'R', 1);
        $pdf->Cell(50, 6, 'MOBILE NO.', 1, 0, 'R', 1);
        $y_axis=$y_axis_initial;

        //Go to next row
        $y_axis = $y_axis + $row_height;
        
        //Set $i variable to 0 (first row)
        $i = 0;
    }

    //$id = ($i+1);

    $pdf->SetY($y_axis);
    $pdf->SetX(10);
    $name = $row['fname']." ".$row['lname'];
    $mn=$row['MobileNo'];
    $branch = $row['branch'];
    $pdf->Cell(20, 6, "$id", 1, 0, 'L', 1);
    $pdf->Cell(55, 6, "$name", 1, 0, 'L', 1);
    $pdf->Cell(70, 6, "$branch", 1, 0, 'R', 1);
    $pdf->Cell(50, 6, "$mn", 1, 0, 'R', 1);

    //Go to next row
    $y_axis = $y_axis + $row_height;
    $i = $i + 1;
}

//mysqli_close($link);

//Create file
$pdf->Output();
?>