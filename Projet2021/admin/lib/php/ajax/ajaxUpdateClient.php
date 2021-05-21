<?php
header('Content-Type: application/json');

include ('../pgConnect.php');
include ('../classes/Connexion.class.php');
include ('../classes/Client.class.php');
include ('../classes/ClientDB.class.php');

$cnx = Connexion::getInstance($dsn,$user,$pass);
$cli = array();
$client = new ClientDB($cnx);


extract($_GET,EXTR_OVERWRITE);
$cli[] = $client->updateClient($champ,$id,$nouveau);