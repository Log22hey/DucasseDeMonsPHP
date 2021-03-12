<?php
if (isset($_POST['submit_login'])) {
    extract($_POST, EXTR_OVERWRITE);
    $log = new ClientDB($cnx);
    $client = $log->getClient($email, $password);
    var_dump($client);
    if (is_null($client)) {
        print "<br/>Données incorrectes";
    } else {
        $_SESSION['admin'] = 1;
        unset($_SESSION['page']);
        print "<meta http-equiv=\"refresh\": Content=\"0;URL=./admin/index.php\">";
    }
}
?>

<h5 class="card-header info-color white-text text-center py-4">
        Connexion
    </h5>
<div class="foms">
    <div class="card-body px-lg-5" >
        <form  action="<?php print $_SERVER['PHP_SELF']; ?>" method="post"">
            <div class="form-group row">
                <input type="email" name="email" class="form-control form-control-md" id="colFormLabelSm" placeholder="mons@bel.be">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label txtGras text-right col-form-label-md offset-3">Votre email </label>
            </div>
            <div class="form-group row">
                <input type="password" name="password" class="form-control" id="colFormLabel" placeholder="">
                <label for="colFormLabel" class="col-sm-2 text-right txtGras col-form-label offset-3">Mot de passe</label>
            </div>
            <input type="hidden" name="page" value="connexion.php"/>
            <input type="submit" name="submit_login" class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" value="Connexion" >
        </form>

    </div>
</div>
