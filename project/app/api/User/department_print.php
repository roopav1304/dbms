<?php session_start();
include_once('fpdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
    
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(60);
    // Title
    $this->Cell(60,15,'DEPARTMENT',1,0,'C');
    // Line break
 $this->Ln(40);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
if(isset($_POST['download'])){
$conn=mysqli_connect("localhost","root","roopav@123","project");
$display_heading = array('d_id'=>'DEPARTMENT_ID', 'd_name'=> 'DEPARTMENT_NAME', 'hod_id'=> 'HOD_ID');
$result=mysqli_query($conn,"SELECT d_id,d_name,hod_id FROM department WHERE d_name='".$_POST['search']."'");
$header=mysqli_query($conn,"SHOW COLUMNS FROM department");
//header
$pdf = new PDF();
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',10);
foreach($header as $heading) {
$pdf->Cell(45,10,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->SetFont('Arial','',10);
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(45,10,$column,1);
}
$pdf->Output();
}
?>