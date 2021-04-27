<?php
$prod = new ProduitDB($cnx);
if (isset($_GET['id_cat'])) {
    $liste = $prod->getProduitByCat($_GET['id_cat']);
} else {

    $liste = $prod->getAllProduit();
}

$nbr = count($liste);
//var_dump($liste);
//print"images ".$liste[0]->photo;
?>
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            for ($i = 0; $i < $nbr; $i++) {
                ?>
                <div class="col">
                    <div class="card">
                        <img src="./admin/images/<?php print $liste[$i]->photo; ?>" alt="Image" height="310" width="310"/>
                        <div class="card-body">
                            <p class="card-text">
                                <p><?php print  $liste[$i]->description; ?></p>
                                <p><?php print  $liste[$i]->prix; ?> EUR</p>


                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Commander</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
