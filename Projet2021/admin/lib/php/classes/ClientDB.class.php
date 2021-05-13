<?php

class ClientDB extends Client {

    private $_db;
    private $_array = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }

    public function getAllClient(){
        $query = "select * from client";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while( $d = $_resultset->fetch()){
            $_data[] = new Produit($d);
        }
        //var_dump($_data);
        return $_data;
    }

    public function getClient($email, $password) {
        $query = "select * from client where email=:email and password=:password";
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':email', $email, PDO::PARAM_STR);
            $resultset->bindValue(':password', $password, PDO::PARAM_STR);
            $resultset->execute();
            while ($data = $resultset->fetch()) {
                $_array[] = new Client($data);
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

    public function addClient(array $data) {
        var_dump($data);
        $query = "insert into client (nom,email,password,adresse,numero,localite,cp) ";
        $query.=" values (:nom,:email,:password,:adresse,:numero,:localite,:cp)";
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom', $data['nom'], PDO::PARAM_STR);
            $resultset->bindValue(':email', $data['email'], PDO::PARAM_STR);
            $resultset->bindValue(':password', $data['password'], PDO::PARAM_STR);
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

    public function updateClient($champ,$id,$valeur){
        try{
            $query = "update produit set ".$champ."='".$valeur."' where id_produit='".$id."'";
            $resulset= $this->_db->prepare($query);
            $resulset->execute();
        }catch(PDOException $e)
        {
            print $e->getMessage();
        }
    }

    public function mise_a_jourClient($id_client,$nom,$email,$password,$adresse,$numero,$localite,$cp){
        try{
            $query = "update client set nom=:nom,email=:email,password=:password,adresse=:adresse,numero=:numero,localite=:localite,cp=:cp where id_client=:id";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':id_client', $id_client);
            $_resultset->bindValue(':nom', $nom);
            $_resultset->bindValue(':email', $email);
            $_resultset->bindValue(':password', $password);
            $_resultset->bindValue(':$adresse', $adresse);
            $_resultset->bindValue(':numero', $numero);
            $_resultset->bindValue(':localite', $localite);
            $_resultset->bindValue(':cp', $cp);
            $_resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }
}