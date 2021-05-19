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

    public function getClient($email,$password) {
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

    public function getClientById($id) {
        try {
            $query = "select * from client where id_client=:id";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id', $id);
            $resultset->execute();

            $data = $resultset->fetch();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        if (!empty($data)) {
            return $data;
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

    public function modifClient($data,$id) {
        try {
            $query = "update client set nom=:nom,email=:email,password=:password,adresse=:adresse,numero=:numero,localite=:localite,cp=;cp where id_client=:id ";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom', $data['nom'], PDO::PARAM_STR);
            $resultset->bindValue(':email', $data['email'], PDO::PARAM_STR);
            $resultset->bindValue(':password', $data['password'], PDO::PARAM_STR);
            $resultset->bindValue(':adresse', $data['adresse'], PDO::PARAM_STR);
            $resultset->bindValue(':numero', $data['numero'], PDO::PARAM_STR);
            $resultset->bindValue(':localite', $data['localite'], PDO::PARAM_STR);
            $resultset->bindValue(':cp', $data['cp'], PDO::PARAM_STR);
            $resultset->bindValue(':id', $id);
            $resultset->execute();
            return 1;
        } catch (PDOException $e) {
            print $e->getMessage();
            return 0;
        }
    }
}