<?php
header('Content-Type: application/json');
include ('../pgConnect.php');
include ('../classes/Connexion.class.php');
include ('../classes/Produit.class.php');
include ('../classes/ProduitDB.class.php');

$cnx = Connexion::getInstance($dsn,$user,$password);

try{
    $update= new ProduitDB($cnx);

    extract($_GET,EXTR_OVERWRITE);
    $parametre = 'id='.$id.'&champ='.$champ.'&nouveau='.$nouveau;
    $update->updateProduit($champ, $nouveau, $id);
    print json_encode($update);
}
catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace()." ".$e->getCode();
}
