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

    public function getProduitsByCat($id_theme){
        try{
            $query="select * from vue_produit_theme where id_theme=:id_theme";
            $_resulset = $this-> _db->prepare($query);
            $_resulset->bindValue(':id_theme',$id_theme);
            $_resulset->execute();

            while($d = $_resulset->fetch()){
                $_data[] = new produit($d);
            }
            // var_dump($_data);
            return $_data;
        }catch(PDOException $e){
            print "Echec de la requête ".$e->getMessage();
        }
    }

    public function updateProduit($champ,$id,$valeur){
        try{
            //appeler une proccedure emnbarquée
            $query = "update bp_produit set ".$champ."='".$valeur."' where id_produit='".$id."'";
            $resulset= $this->_db->prepare($query);//transformer la requete
            $resulset->execute();
        }catch(PDOException $e)
        {
            print $e->getMessage();
        }
    }

    public function getProduitByRef($ref){
        try {
            $this->_db->beginTransaction();
            $query = "select * from bp_produit where reference = :ref";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':ref', $ref);
            $resultset->execute();
            $data = $resultset->fetch();
            return $data;

            $this->_db->commit();
        } catch(PDOException $e){
            print "Echec de la requête : ".$e->getMessage();
            $_db->rollback();
        }
    }

    public function mise_a_jourProduit($id_produit,$nom_produit,$photo,$prix,$stock,$description,$id_cat,$reference){
        try{
            $query="update bp_produit set nom_produit=:nom_produit,photo=:photo,prix=:prix,stock=:stock,";
            $query.="description=:description,id_type=:id_type,id_cat=:id_cat,reference=:reference where id_produit=:id_produit";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':id_produit', $id_produit);
            $_resultset->bindValue(':nom_produit', $nom_produit);
            $_resultset->bindValue(':photo', $photo);
            $_resultset->bindValue(':prix', $prix);
            $_resultset->bindValue(':stock', $stock);
            $_resultset->bindValue(':description', $description);
            $_resultset->bindValue(':id_cat', $id_cat);
            $_resultset->bindValue(':reference', $reference);
            $_resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

    public function ajout_produit($nom_produit,$photo,$prix,$stock,$description,$id_cat,$reference){
        try{
            $query="insert into bp_produit (nom_produit,photo,prix,stock,description,id_cat,reference) values ";
            $query.="(:nom_produit,:photo,:prix,:stock,:description,:id_type,:id_cat,:reference)";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':nom_produit', $nom_produit);
            $_resultset->bindValue(':photo', $photo);
            $_resultset->bindValue(':prix', $prix);
            $_resultset->bindValue(':stock', $stock);
            $_resultset->bindValue(':description', $description);
            $_resultset->bindValue(':id_cat', $id_cat);
            $_resultset->bindValue(':reference', $reference);
            $_resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }
}