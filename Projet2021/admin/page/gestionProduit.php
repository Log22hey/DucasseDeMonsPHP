<?php include ('lib/php/verifier_connexion.php'); ?>

<?php
$produit = new ProduitDB($cnx);
if(isset($_GET['editer_ajouter'])){
    extract($_GET,EXTR_OVERWRITE);
    if($_GET['action']=="editer"){
        ?><pre><?php     //var_dump($_GET);     ?></pre><?php
        if(!empty($reference) && !empty($nom_produit) && !empty($description) && !empty($prix) && !empty($stock) ){
            //3 instructions artificielles (devraient arriver d'un formulaire plus complet) :
            $produit->mise_a_jourProduit($id_produit,$nom_produit,$photo,$prix,$stock,$description,$id_cat,$reference);
        }
    } else if($_GET['action'] == "inserer") {
        ?><pre><?php     //var_dump($_GET);     ?></pre><?php

        if(!empty($reference) && !empty($nom_produit) && !empty($description) && !empty($prix) && !empty($stock) ){
            print "ici";
            $retour=$produit->ajout_produit($nom_produit,$photo,$prix,$stock,$description,$id_cat,$reference);
            print "retour : ".$retour;
        }
    }

}
?>

<form class="row g-3" method="get" action="<?php print $_SERVER['PHP_SELF'];?>" id="formEditAjout">
    <div class="col-md-2">
        <label for="reference" class="form-label">Référence</label>
        <input type="text" class="form-control" id="reference" name="reference">
    </div>
    <div class="col-md-6">
        <label for="denomination" class="form-label">Dénomination</label>
        <input type="text" class="form-control" id="denomination" name="nom_produit">
    </div>
    <div class="col-md-12">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description">
    </div>
    <div class="col-md-2">
        <label for="prix" class="form-label">Prix</label>
        <input type="text" class="form-control" id="prix" name="prix">
    </div>
    <div class="col-md-2">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" class="form-control" id="stock"  name="stock">
    </div>
    <div class="col-12">
        <input type="hidden" name="id_produit" id="id_produit">
        <input type="hidden" name="action" id="action" ><br><br>
        <button type="submit" class="btn btn-dark" id="editer_ajouter" name="editer_ajouter">Nouveau ou mettre à jour</button>
    </div>
</form>
<br>
