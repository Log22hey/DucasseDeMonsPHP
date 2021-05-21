<?php
if (isset($_SESSION['panier'])) {

    if (isset($_GET['viderPanier'])) { //vider panier
        $_SESSION['panier'] = null;

        print "<meta http-equiv=\"refresh\": Content=\"0;URL=./index.php\">";
        $_SESSION['page'] = "panier.php";
    }
    ?>

    <h4> Votre panier</h4>
    <div class="position">
        <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
            <button class="btn btn-danger" type="submit" id="viderPanier" name="viderPanier">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash"
                     viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd"
                          d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
                Vider mon panier
            </button><br><br>
        </form>
    </div>

    <?php
    $panier = $_SESSION['panier'];
    $liste = $panier;
    $nbr = count($liste);

    $id = new ProduitDB($cnx);
    ?>
    <div class="container d-flex">
        <table>
            <?php for ($i = 0;$i < $nbr;$i++) {
            $id_prod = $liste[$i]['id_produit'];
            $_SESSION['id_produce'] = $id_prod; //session contenant les id des produits

            $prod = $id->getProduitbyId($_SESSION['id_produce']);  //afficher ses informations du prod avec id
            $nbr2 = count($prod);
            ?>
            <tr>
                <td>
                    <div style="text-align: center;"/>
                    <img src="./admin/images/<?php print $liste[$i]['photo']; ?>" alt="Image" width="40%"/>
                </td>
                <td>
                    <?php
                    for ($j = 0; $j < $nbr2; $j++) { ?>
                        <?php print $prod[$j]->nom_produit;
                        ?>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php print $liste[$i]['prix'];
                    print"€";
                    $id_pro[] = $liste[$i]['prix'];
                    ?>
                </td>

                <?php
                $stringArra = $id_pro;
                $FloatArray = array_map(
                    function ($id_pro) {
                        return (float)$id_pro;
                    },
                    $stringArra
                );
                $total = array_sum($FloatArray); //somme des prix des produits pour faire le total
                ?>
                <?php
                }
                ?>
            </tr><br><br>
            <tr>
                <td colspan="3" style="text-align: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="24" fill="currentColor"
                         class="bi bi-truck" viewBox="0 0 16 16">
                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                    </svg>
                    Livraison sous 3-6 jours ouvrables
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">
                    <div class="total">
                        Total:
                        <?php
                        echo $total;
                        print " €"
                        ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <?php
} else {// si le panier est vide
    ?>
    <h4>Votre panier est vide</h4>
    <div class="vide">
        <a href="index.php?page=boutique.php" title="Ajouter des articles">
            <img src="./admin/images/ici.jpg" width="200px">
        </a>
    </div>
    <?php
}
?>