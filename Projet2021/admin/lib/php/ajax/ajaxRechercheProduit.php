<?php
header('Content-Type: application/json');

include ('../pgConnect.php');
include ('../classes/Connexion.class.php');
include ('../classes/Produit.class.php');
include ('../classes/ProduitDB.class.php');
$cnx = Connexion::getInstance($dsn,$user,$pass);
$pr = array();
$produit = new ProduitDB($cnx);

extract($_GET,EXTR_OVERWRITE);
$pr[] = $produit->updateProduit($champ,$id,$nouveau);