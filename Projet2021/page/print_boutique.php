<?php

include ('../admin/lib/php/pgConnect.php');
include ('../admin/lib/php/classes/Connexion.class.php');
include ('../admin/lib/php/classes/Produit.class.php');
include ('../admin/lib/php/classes/ProduitDB.class.php');

$cnx = Connexion::getInstance($dsn, $user, $pass);
$pr = array();
$produit = new ProduitDB($cnx);
$liste = $produit->getAllProduit();
$nbr = count($liste);

//var_dump($liste);

include ('../admin/lib/php/TCPDF/tcpdf.php');

$pdf = new TCPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('times','B',18);
$pdf->SetTextColor(255,0,0);
$pdf->Cell(190,20,'Les produits de la boutique',1,1,'C');
$pdf->SetFont('times','',12);
$pdf->SetTextColor(0,0,0);
$x = 20;
$y = 50;

for($i = 0;$i<$nbr; $i++){
    $pdf->WriteHTMLCell(150,50,$x,$y,$liste[$i]->nom_produit,1,1,'','2','L');
    $pdf->WriteHTMLCell(150,50,$x,$y,$liste[$i]->prix,1,1,'','2','R');
    $y+=10;
}

$pdf->Output('Boutique.pdf','D');
