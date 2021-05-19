<?php
include ('lib/php/verifier_connexion.php');
?>

<?php
$vue = new ClientDB($cnx);
$liste = null;
$liste = $vue->getClientById($_SESSION['id']);

if(isset($_GET['modifier'])) {
    extract($_GET, EXTR_OVERWRITE);

    if (empty($nom) || empty($email) || empty($password) || empty($password2) || empty($adresse) || empty($numero) || empty($localite) || empty($cp)) {
        $erreur = "<span class='txtRouge txtGras'>Veuillez remplir tous les champs</span>";
    }else if($password != $password2){
        $erreur = "<span class='txtRouge txtGras'>Les mots de passe sont différents</span>";
    }else {
        $retour = $vue->modifClient($_GET,$_SESSION['id']);
        if($retour==1){
            print "<br/>Modification effectuée";
            print "<meta http-equiv=\"refresh\": Content=\"0;URL=index.php?page=profil.php\">";
        }
    }
}
?>

<br/>

<?php
if (isset($erreur))
    print $erreur;
?>

<h5 class="card-header info-color white-text text-center py-4">
    Modification du profil
</h5>

<div class="container">

    <?php
    if (isset($erreur))
        print $erreur;
    ?>

    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_inscri">
        <br/>
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom"  value="<?php echo $liste['nom']?>"/>
        <br/>
        <label for="email2">email</label>
        <input type="email" id="email" name="email" placeholder="mons@bel.be" value="<?php echo $liste['mail']?>"/>
        <br/>
        <br>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" value="<?php echo $liste['password']?>"/>
        <br/>
        <label for="password">Confirmez le mot de passe</label>
        <input type="password" name="password2" id="password2" value="<?php echo $liste['password']?>"/>
        <br/>
        <br>
        <label for="adresse">Adresse</label>
        <input type="text" name="adresse" id="adresse" value="<?php echo $liste['adresse']?>"/>
        <br/>
        <label for="numero">Numero</label>
        <input type="text" name="numero" id="numero" value="<?php echo $liste['numero']?>"/>
        <br>
        <label for="localite">Localite</label>
        <input type="text" name="localite" id="localite" placeholder="Mons" value="<?php echo $liste['localite']?>"/>
        <br>
        <label for="cp">Code postal</label>
        <input type="text" name="cp" id="cp" placeholder="7000" value="<?php echo $liste['cp']?>"/>
        <br>
        <input type="submit" name="modifier" id="modifier" value="Modifier" class="pull-right"/>&nbsp;
        <input type="reset" id="reset" value="Annuler" class="pull-left"/>
    </form>
</div>

<div>
    AUTRE
</div>

<br><br>

<hgroup>
    <h3 class="aligner txtGras">Profil</h3>
    <h4 class="text-muted aligner">Client</h4>
</hgroup>
<?php
$vue = new ClientDB($cnx);
$liste = null;
$liste = $vue->getClientById($_SESSION['id']);

if(isset($_GET['modifier'])){
    extract($_GET, EXTR_OVERWRITE);
    if (empty($password) || empty($password2) || empty($email) || empty($pseudo) || empty($nom) || empty($prenom) || empty($telephone)) {
        $erreur = "<span class='txtRouge txtGras'>Veuillez remplir tous les champs</span>";
    }else if($password != $password2){
        $erreur = "<span class='txtRouge txtGras'>Les mots de passe sont différents</span>";
    }else {
        $retour = $vue->modifClient($_GET,$_SESSION['id']);
        if($retour==1){
            print "<br/>Modification effectuée";
            print "<meta http-equiv=\"refresh\": Content=\"0;URL=index.php?page=profil.php\">";
        }
    }
}
?>
<br/>

<h2 id="titre">Modification du profil</h2>

<div class="container">

    <?php
    if (isset($erreur))
        print $erreur;
    ?>

    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_inscri">
        <br/>
        <label for="email1">Email</label>
        <input type="email" id="email" name="email" placeholder="aaa@aaa.aa" value="<?php echo $liste['mail']?>"/>
        <br/>
        <label for="email2">Pseudo</label>
        <input type="test" id="pseudo" name="pseudo" placeholder="" value="<?php echo $liste['login']?>"/>
        <br/>
        <br>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" value="<?php echo $liste['password']?>"/>
        <br/>
        <label for="password">Confirmez le mot de passe</label>
        <input type="password" name="password2" id="password2" value="<?php echo $liste['password']?>"/>
        <br/>
        <br>
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" value="<?php echo $liste['nom_cl']?>"/>
        <br/>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" value="<?php echo $liste['prenom_cl']?>"/>
        <br>
        <label for="">Téléphone</label>
        <input type="text" name="telephone" id="telephone" placeholder="xxx/xx.xx.xx" value="<?php echo $liste['tel']?>"/>
        <br>
        <input type="submit" name="modifier" id="commander" value="Modifier" class="pull-right"/>&nbsp;
        <input type="reset" id="reset" value="Annuler" class="pull-left"/>
    </form>
</div>