<?php
header('Content-Type: application/json');

include ('../pg_connect.php');
include ('../classes/Connexion.class.php');
include ('../classes/Produit.class.php');
include ('../classes/ProduitDB.class.php.class.php');
$cnx = Connexion::getInstance($dsn,$user,$password);
$pr = array();
$produit = new ProduitDB($cnx);

$pr[] = $produit->getProduitByRef($_GET['ref']);

print json_encode($pr);