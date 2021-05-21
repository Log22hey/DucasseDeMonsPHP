<?php

class ClientDB extends Client{
    private $_db;
    private $_array = array();

    public function __construct($cnx){//$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }

    public function addClient(array $data) {
        var_dump($data);
        $query = "insert into client (nom,email,adresse,numero,localite,cp) ";
        $query.=" values (:nom,:email,:adresse,:numero,:localite,:cp)";
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom', $data['nom'], PDO::PARAM_STR);
            $resultset->bindValue(':email', $data['email'], PDO::PARAM_STR);
            $resultset->bindValue(':adresse', $data['adresse'], PDO::PARAM_STR);
            $resultset->bindValue(':numero', $data['numero'], PDO::PARAM_STR);
            $resultset->bindValue(':localite', $data['localite'], PDO::PARAM_STR);
            $resultset->bindValue(':cp', $data['cp'], PDO::PARAM_STR);
            $resultset->execute();
        } catch (PDOException $e) {
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }
    }

    public function getAllClient(){
        $query = "select * from produit";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while( $d = $_resultset->fetch()){
            $_data[] = new Client($d);
        }
        //var_dump($_data);
        return $_data;
    }

    public function updateClient($champ,$id,$valeur){
        try{
            //appeler une proccedure emnbarquée
            $query = "update client set ".$champ."='".$valeur."' where id_client='".$id."'";
            $resulset= $this->_db->prepare($query);//transformer la requete
            $resulset->execute();
        }catch(PDOException $e)
        {
            print $e->getMessage();
        }
    }
}