<?php
header('Content-Type: application/json');
require '../pgConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Client.class.php';
require '../classes/ClientDB.class.php';

$cnx = Connexion::getInstance($dsn,$user,$pass);

try{       
    $search = new ClientDB($cnx);
    $retour = $search->getClient($_GET['email'],$_GET['password']);    
    print json_encode($retour);    
}
catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace();
}

