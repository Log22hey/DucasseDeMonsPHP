<?php
if(isset($_GET['ajouter'])) {
    extract($_GET, EXTR_OVERWRITE);

    if (empty($nom) || empty($email) || empty($password) || empty($adresse) || empty($numero) || empty($localite) || empty($cp)) {
        $erreur = "<span class='txtRouge txtGras'>Veuillez remplir tous les champs</span>";
    } else {
           
           $cl = new ClientDB($cnx);
           $retour = $cl->addClient($_GET);
           if($retour==1)
               echo 'insertion effectuée';
           else if($retour==2)
               echo 'personne déjà encodée';
           //var_dump($_GET);
    }
}
?>

<h5 class="card-header info-color white-text text-center py-4">
        Devenir membre
    </h5>
<div class="foms">
    <div class="card-body px-lg-5">
        <form  action="<?php print $_SERVER['PHP_SELF']; ?>" method="get"">
            <div class="form-group row">
                <input type="text" name="nom" class="form-control form-control-md" id="colFormLabelSm" placeholder="">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label txtGras text-right col-form-label-md offset-3">Votre nom </label>
            </div>
            <div class="form-group row">
                <input type="email" name="email" class="form-control" id="colFormLabel" placeholder="mons@bel.be">
                <label for="colFormLabel" class="col-sm-2 text-right txtGras col-form-label offset-3">Votre email</label>
            </div>
            <div class="form-group row">
                <input type="password" name="password" class="form-control" id="colFormLabel" placeholder="">
                <label for="colFormLabel" class="col-sm-2 text-right txtGras col-form-label offset-3">Votre password</label>
            </div>
            <div class="form-group row">
                <input type="text" name="adresse" class="form-control" id="colFormLabel" placeholder="">
                <label for="colFormLabel" class="col-sm-2 text-right txtGras col-form-label offset-3">Votre adresse</label>
            </div>
            <div class="form-group row">
                <input type="number" name="numero" class="form-control" id="colFormLabel" placeholder="">
                <label for="colFormLabel" class="col-sm-2 text-right txtGras col-form-label offset-3">Votre numero</label>
            </div>
            <div class="form-group row">
                <input type="text" name="localite" class="form-control" id="colFormLabel" placeholder="">
                <label for="colFormLabel" class="col-sm-2 text-right txtGras col-form-label offset-3">Votre localite</label>
            </div>
            <div class="form-group row">
                <input type="number" name="cp" class="form-control" id="colFormLabel" placeholder="">
                <label for="colFormLabel" class="col-sm-2 text-right txtGras col-form-label offset-3">Votre code postal</label>
            </div>
            <input type="submit" name="submit_login" class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" value="ajouter" >
        </form>
    </div>
</div>
