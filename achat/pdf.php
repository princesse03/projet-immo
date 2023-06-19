<?php
session_start();
require_once('../database.php');
$id=$_GET['id'];
$re=$connexion->prepare('SELECT * FROM biens WHERE id=?');
	$re->execute([$id]);
	$image=$re->fetchAll();
	// $sup = $_GET['sup'];
	// $montant=10000*$sup;
    $nombr=$_GET["nom"];
    $supe =$_GET["sup"];
    $quartier =$_GET["surf"];
    $maison =$_GET["situ"];
    $surf =$_GET['typ'];
    $calcul =$_GET['sup']*10000;
    $id_visiteur=$_SESSION['visiteur']['id_visiteur'];
    $requete="INSERT INTO paiement values(?,?,?,?,?,?);";
    $prepare=$connexion->prepare($requete);
    $prepare->execute([NULL,$id_visiteur,$calcul,$supe,$quartier,$surf]);
    
	
    

include('../fpdf/fpdf.php');

$title='Recu de paiement';
$pdf=new FPDF();  
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 18);
$pdf->SetDrawColor(224, 203, 40);
$pdf->SetFillColor(0,0,0);
$pdf->SetTitle($title);
$w = $pdf->GetStringWidth($title)+6;
$pdf->Cell(0, 10, $title, 1, 1, 'C');
$pdf->Ln(20);

$pdf->SetFont('Arial', 'B', 15);
$pdf->SetDrawColor(224, 203, 40);
$pdf->SetX((110-$w)/2);
$pdf->Cell(70, 10, 'informations personnelles', 1, 1, 'L');
$pdf->Ln(4);
$pdf->SetFont('Times', 'B', 13);
$pdf->SetX((120-$w)/2);
$pdf->Cell(40, 10, 'Nom:', 0, 0, 'L');
$pdf->Cell(40, 10, $_SESSION['visiteur']['nom'], 0, 1, 'C');

$pdf->SetFont('Times', 'B', 13);
$pdf->SetX((120-$w)/2);
$pdf->Cell(40, 10, 'Prenom:', 0, 0, 'L');
$pdf->Cell(40, 10, $_SESSION['visiteur']['prenom'], 0, 1, 'C');

$pdf->SetFont('Times', 'B', 13);
$pdf->SetX((120-$w)/2);
$pdf->Cell(40, 10, 'Sexe:', 0, 0, 'L');
$pdf->Cell(40, 10, $_SESSION['visiteur']['sexe'], 0, 1, 'C');

$pdf->SetFont('Times', 'B', 13);
$pdf->SetX((120-$w)/2);
$pdf->Cell(40, 10, 'Contact:', 0, 0, 'L');
$pdf->Cell(40, 10, $_SESSION['visiteur']['contact'], 0, 1, 'C');

$pdf->SetFont('Times', 'B', 13);
$pdf->SetX((120-$w)/2);
$pdf->Cell(40, 10, 'Email:', 0, 0, 'L');
$pdf->Cell(40, 10, $_SESSION['visiteur']['email'], 0, 1, 'C');
$pdf->Ln(20);


$pdf->SetX((110-$w)/2);
$pdf->Cell(50, 10, 'Details de la maison', 1, 1, 'L');
$pdf->Ln(4);
$pdf->SetFont('Times', 'B', 13);
$pdf->SetX((120-$w)/2);
$pdf->Cell(40, 10, 'Nombre de pieces:', 0, 0, 'L');
$pdf->Cell(40, 10, $nombr, 0, 1, 'C');

$pdf->SetFont('Times', 'B', 13);
$pdf->SetX((120-$w)/2);
$pdf->Cell(40, 10, 'Quartier:', 0, 0, 'L');
$pdf->Cell(40, 10,$maison, 0, 1, 'C');

$pdf->SetFont('Times', 'B', 13);
$pdf->SetX((120-$w)/2);
$pdf->Cell(40, 10, 'Type de maison:', 0, 0, 'L');
$pdf->Cell(40, 10,$quartier, 0, 1, 'C');

$pdf->SetFont('Times', 'B', 13);
$pdf->SetX((120-$w)/2);
$pdf->Cell(40, 10, 'Type de surface:', 0, 0, 'L');
$pdf->Cell(40, 10,  $surf, 0, 1, 'C');

$pdf->SetFont('Times', 'B', 13);
$pdf->SetX((120-$w)/2);
$pdf->Cell(40, 10, 'Prix de la maison:', 0, 0, 'L');
$pdf->Cell(40, 10, $calcul, 0, 1, 'C');
$pdf->Output();
?>
