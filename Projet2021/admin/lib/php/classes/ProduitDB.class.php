<?php

class ProduitDB extends Produit{
    private $_db;
    private $_array = array();
    
    public function __construct($db){
        $this->_db = $db;
    }
    
    public function getProduit(){
        try{
            $query = "select * from produit";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();

            while($data = $resultset->fetch()){
                $_array[] = new Produit($data);
            }   
        }
        catch(PDOException $e){
            print $e->getMessage(); 
        }
        if(!empty($_array)){
            return $_array;
        }
        else {
            return null;
        }
    }

    public function getProduitbyType($type) {
        try {
            $query = "select * from produit join type on produit.id_type=type.id_type where type=:type";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':type', $type);
            $resultset->execute();

            while ($data = $resultset->fetch()) {
                $_array[] = new Produit($data);
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
    
    public function updateProduit($champ,$nouveau,$id){        
        
        try {
          // PREPARER LA REQUETE COMME VU PRECEDEMMENT
            $query="UPDATE produit set ".$champ." = '".$nouveau."' where id_produit ='".$id."'";  
            echo $query;
            $resultset = $this->_db->prepare($query);
            $resultset->execute();            
            
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

}
