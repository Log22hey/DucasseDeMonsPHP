<?php

class AdminDB extends Admin
{
    private $_db;// va recevoir la valeur de $cnx dans les 1st ligne de connexion a la BD  dans l'index
    private $_data=array();
    private $_resulset;
    public function __construct($cnx){//$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }

    public function getAdmin($login,$password){

        try {
            $query = "select is_admin(:login, :password) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':login', $login);
            $_resultset->bindValue(':password', md5($password));// car mp crypté en md5
            $_resultset->execute();
            $retour =$_resultset->fetchColumn(0);

            return $retour;
        }catch(PDOException $e){
            print "Echec".$e->getMessage();
        }
    }
}