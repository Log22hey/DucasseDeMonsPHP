<?php
include ('./lib/php/verifier_connexion.php');
$cli = new ClientDB($cnx);
$liste= $cli->getAllClient();
$nbr=count($liste);
?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Nom</th>
        <th scope="col">Email</th>
        <th scope="col">Adresse</th>
        <th scope="col">Numero</th>
        <th scope="col">Localite</th>
        <th scope="col">Code postal</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for($i=0;$i<$nbr;$i++){
        ?>
        <tr>
            <th scope="row">
                <?php print $liste[$i]->id_client;?>
            </th>
            <td>
            <span contenteditable="true" name="nom" id="<?php print $liste[$i]->id_client;?>">
            <?php print $liste[$i]->nom;?>
            </span>
            </td>
            <td>
            <span contenteditable="true" name="email" id="<?php print $liste[$i]->id_client;?>">
            <?php print $liste[$i]->email;?>
            </span>
            </td>
            <td>
            <span contenteditable="true" name="adresse" id="<?php print $liste[$i]->id_client;?>">
            <?php print $liste[$i]->adresse;?>
            </span>
            </td>
            <td>
            <span contenteditable="true" name="numero" id="<?php print $liste[$i]->id_client;?>">
            <?php print $liste[$i]->numero;?>
            </span>
            </td>
            <td>
            <span contenteditable="true" name="localite" id="<?php print $liste[$i]->id_client;?>">
            <?php print $liste[$i]->localite;?>
            </span>
            </td>
            <td>
            <span contenteditable="true" name="cp" id="<?php print $liste[$i]->id_client;?>">
            <?php print $liste[$i]->cp;?>
            </span>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>