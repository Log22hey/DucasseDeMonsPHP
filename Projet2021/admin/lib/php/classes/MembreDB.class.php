<?php
class MembreDB extends Membre
{
    private $_db;
    private $_array = array();

    public function __construct($cnx)
    {
        $this->_db = $cnx;
    }

    public function getMembre($email, $mdp)
    {
        $query = "select * from membre where email=:email and mdp=:mpd";
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':email', $email, PDO::PARAM_STR);
            $resultset->bindValue(':mdp', $mdp, PDO::PARAM_STR);
            $resultset->execute();
            while ($data = $resultset->fetch()) {
                $_array[] = new Membre($data);
            }
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        if (!empty($_array)) {
            return $_array;
        } else {
            return null;
        }
    }

    public function addMembre(array $data)
    {
        //var_dump($data);
        $query = "insert into membre (nom,prenom,email,mdp,adresse,ville,code_postal) ";
        $query .= " values (:nom,:prenom,:email,:mdp,:adresse,:ville,:code_postal)";
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom', $data['nom'], PDO::PARAM_STR);
            $resultset->bindValue(':prenom', $data['prenom'], PDO::PARAM_STR);
            $resultset->bindValue(':email', $data['email'], PDO::PARAM_STR);
            $resultset->bindValue(':mpd', $data['mdp'], PDO::PARAM_STR);
            $resultset->bindValue(':adresse', $data['adresse'], PDO::PARAM_STR);
            $resultset->bindValue(':ville', $data['ville'], PDO::PARAM_STR);
            $resultset->bindValue(':code_postal', $data['code_postal'], PDO::PARAM_STR);
            $resultset->execute();

        } catch (PDOException $e) {
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }
    }
}