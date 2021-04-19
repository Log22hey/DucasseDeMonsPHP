<?php


class CategorieDB extends Categorie
{
    private $_db; // recevoir la valeur de $cnx lors de la connexion à la bd dans index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx){ //$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }

    public function getCategorie(){
        $query = "select * from categorie";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while( $d = $_resultset-> fetch()){
            $_data[] = new Categorie($d);
        }
        //var_dump($_data);
        return $_data;
    }
}