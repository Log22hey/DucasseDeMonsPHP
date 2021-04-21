<?php

class ProduitDB extends Produit{

    private $_db; // recevoir la valeur de $cnx lors de la connexion à la bd dans index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx){ //$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }

    public function getAllProduit(){
        $query = "select * from produit order by id_cat";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while( $d = $_resultset->fetch()){
            $_data[] = new Produit($d);
        }
        //var_dump($_data);
        return $_data;
    }

    public function getProduitByCat($id_cat){
        try{
            $query="select * from vue_produit_categorie where id_cat=:id_cat";
            $_resulset = $this-> _db->prepare($query);
            $_resulset->bindValue(':id_cat',$id_cat);
            $_resulset->execute();

            while($d = $_resulset->fetch()){
                $_data[] = new produit($d);
            }
             //var_dump($_data);

            return $_data;
        }catch(PDOException $e){
            print "Echec de la requête ".$e->getMessage();
        }
    }
}