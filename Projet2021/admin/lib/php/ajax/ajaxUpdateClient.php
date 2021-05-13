<?php
header('Content-Type: application/json');

include ('../pg_connect.php');
include ('../classes/Connexion.class.php');
include ('../classes/Client.class.php');
include ('../classes/ClientDB.class.php');
$cnx = Connexion::getInstance($dsn,$user,$password);
$cli = array();
$client = new ClientDB($cnx);

extract($_GET,EXTR_OVERWRITE);
$cli[] = $client->updateClient($champ,$id,$nouveau);