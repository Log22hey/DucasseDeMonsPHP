<?php include('lib/php/verifier_connexion.php'); ?>

<h2>Editer / ajouter un produit</h2>

<?php
$produit = new ProduitDB($cnx);
if(isset($_GET['editer'])){
    ?><pre><?php
    var_dump($_GET);
    ?></pre><?php
    extract($_GET,EXTR_OVERWRITE);
    $prod = $produit->mise_a_jour($id_produit);
}
if(isset($_GET['inserer'])){
    $prod = $produit->ajout_produit(); //ajouter les arguments vérifiés
}
?>
<form class="row g-3">
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
        <input type="number" class="form-control" id="stock" name="stock">
    </div>
    <div class="col-12">
        <input type="hidden" name="id_produit" id="id_produit">
        <button type="submit" class="btn btn-danger" id="editer" name="editer">Mettre à jour</button>
        <button type="submit" class="btn btn-danger" id="inserer" name="inserer">Enregistrer</button>
    </div>
</form>