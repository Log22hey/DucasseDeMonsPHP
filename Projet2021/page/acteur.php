<?php
$vue = new vue_acteur($cnx);

$liste = array();
$liste = null;
if (!isset($_GET['submit_choix_type'])) {
    $liste = $vue->getAllActeur();
} else {
    $liste = $vue->getAllActeur();
}
?>

<?php
if ($liste != null) {
    $nbr = count($liste);
    ?>
    <div class="row">
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>

            <div >
                <div class="col-sm-4">
                    <img src="admin/images/<?php print $liste[$i]['image']; ?>" alt="Photo"/><br/><br/>
                </div>
                <div class="col-sm-6">
                    <?php
                    print $liste[$i]['nom'] . "<br/><br/>";
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
} else {
    ?>
    <div class="container">
        <p>( contenu signifiant un problème ... )</p>
    </div>
    <?php
}