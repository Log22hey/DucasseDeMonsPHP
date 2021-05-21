<br>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item">
            <img src="./admin/images/periraPas.jpeg"  height="316" width="448" alt="La Ducasse ne perira pas">
        </div>
        <div class="carousel-item active">
            <iframe width="1024" height="576" src="https://www.youtube.com/embed/eLFu1sr_-TQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        </div>
        <div class="carousel-item">
            <img src="./admin/images/2021.jpg" class="d-block w-100" alt="pas de Douou en 2021">
            <div class="carousel-caption d-none d-md-block">
                <h2><strong>Pas de Doudou en 2021</strong></h2>
                <h3><strong>Les autorités montoises et les organisateurs du « Doudou » ont annoncé le mardi 23 février,
                        l’annulation de la ducasse de Mons 2021, « sans surprise et pour des raisons évidentes de sécurité sanitaire ».
                        Le « Doudou » ne se tiendra donc pas durant le week-end de la Trinité ni à un autre moment dans l’année.</strong></h3>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./admin/images/1.jpg" class="d-block w-100" alt="Rendez-vous le 12 juin 2022">
            <div class="carousel-caption d-none d-md-block">
                <h2><strong>Rendez-vous le 12 juin 2022</strong></h2>
                <h3><strong>Et les Montois ne périront pas !</strong></h3>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<br><br>
<?php
$cat = new CategorieDB($cnx);
$liste_cat = $cat->getCategorie();
$nbr_cat = count($liste_cat);
?>

<div class="card-group">
    <?php
    for ($i = 0;$i < $nbr_cat;$i++)
    {
        ?>
        <div class="card">
            <img src="./admin/images/<?php print $liste_cat[$i]->image; ?>" class="card-img-top" alt="Doudou" height="300" width="300">
            <div class="card-body">
                <a class="lien" href="index.php?page=boutique.php&id_cat=<?php print $liste_cat[$i]->id_cat;?>">
                    <?php print $liste_cat[$i]->nom_cat; ?>
                </a>
                </h5>
            </div>
        </div>
        <?php
    }
    ?>
<br><br>