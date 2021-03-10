<?php

class Vue_produit_univers_typeDB {
   
    private $_db;
    private $_array = array();

    public function __construct($db) {
        $this->_db = $db;
    }

        public function getAllProduits(){    
        try{
            $this->_db->beginTransaction();
            $query = "select * from vue_produit_univers_type";
            $resultset = $this->_db->prepare($query);            
            $resultset->execute();
            $this->_db->commit();         
            while($data = $resultset->fetch()){
                $_array[] = $data;
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
    
        public function getProduitsByType($id_type){
        try{
            $this->_db->beginTransaction();
            $query = "select * from vue_produit_univers_type where id_type=:id_type";
            $resultset = $this->_db->prepare($query);  
            $resultset->bindValue(':id_type',$id_type);
            $resultset->execute();
            $this->_db->commit();         
            while($data = $resultset->fetch()){
                $_array[] = $data;
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

}
