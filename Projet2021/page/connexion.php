<?php
if(isset($_POST['submit_login'])){
    extract($_POST,EXTR_OVERWRITE);
    $log = new ClientDB($cnx);
    $client = $log->getClient($email, $password);
    var_dump($client);
    if(is_null($client)){
        print "<br/>Données incorrectes";
    }
    else {
        $_SESSION['admin']=1;
        unset($_SESSION['page']);
        print "<meta http-equiv=\"refresh\": Content=\"0;URL=./admin/index.php\">";
    }
}
?>

<form  action="<?php print $_SERVER['PHP_SELF'];?>" method="post">
    <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-2 col-form-label txtGras text-right col-form-label-md offset-3">Votre email </label>
        <div class="col-sm-3 ">
            <input type="email" name="email" class="form-control form-control-md" id="colFormLabelSm" placeholder="Mons@bel.be">
        </div>
    </div>
    <div class="form-group row">
        <label for="colFormLabel" class="col-sm-2 text-right txtGras col-form-label offset-3">Mot de passe</label>
        <div class="col-sm-3">
            <input type="password" name="password" class="form-control" id="colFormLabel" placeholder="mot de passe">
        </div>
    </div><br>
    <div class="form-group row">
        <div class="col-sm-4 offset-5">
            <input type="hidden" name="page" value="connexion.php"/>
            <input type="submit" name="submit_login" class="btn btn-light"  placeholder="col-form-label-lg" value="Connexion" >
        </div>
    </div>
</form>
<br><br>

<div class="bouton">
    <p>
        Créez un compte si vous n’en avez pas encore un
      <br>
            <a href="./index.php?page=inscription.php"><button>Nouveau compte</button> </a>
    </p>
</div>
<br><br>