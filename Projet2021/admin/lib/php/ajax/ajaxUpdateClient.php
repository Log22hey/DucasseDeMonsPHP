<?php
header('Content-Type: application/json');

include ('../pg_connect.php');
include ('../classes/Connexion.class.php');
include ('../classes/Client.class.php');
include ('../classes/ClientDB.class.php');

$cnx = Connexion::getInstance($dsn,$user,$password);
$pr = array();
$produit = new ClientDB($cnx);


extract($_GET,EXTR_OVERWRITE);
$pr[] = $produit->updateClient($champ,$id,$nouveau);

