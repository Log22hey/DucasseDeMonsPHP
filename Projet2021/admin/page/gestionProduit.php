<?php
include ('./lib/php/verifier_connexion.php');
$prod = new ProduitDB($cnx);
$liste= $prod->getAllProduit();
$nbr=count($liste);
?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Nom</th>
        <th scope="col">Description</th>
        <th scope="col">Prix</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for($i=0;$i<$nbr;$i++){
        ?>
        <tr>
            <th scope="row">
                <?php print $liste[$i]->id_produit;?>
            </th>
            <td>
            <span contenteditable="true" name="nom_produit" id="<?php print $liste[$i]->id_produit;?>">
            <?php print $liste[$i]->nom_produit;?>
            </span>
            </td>
            <td>
            <span contenteditable="true" name="description" id="<?php print $liste[$i]->id_produit;?>">
            <?php print $liste[$i]->description;?>
            </span>
            </td>
            <td>
            <span contenteditable="true" name="prix" id="<?php print $liste[$i]->id_produit;?>">
            <?php print $liste[$i]->prix;?>
            </span>
            </td>
            <td>
            <span contenteditable="true" name="stock" id="<?php print $liste[$i]->id_produit;?>">
            <?php print $liste[$i]->stock;?>
            </span>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>