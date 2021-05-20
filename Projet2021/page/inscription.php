<?php
if(isset($_GET['submit_login'])) {
    extract($_GET, EXTR_OVERWRITE);
    if (empty($nom) || empty($email) || empty($adresse) || empty($numero) || empty($localite) || empty($cp)) {
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

<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
    <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-2 col-form-label txtGras text-right col-form-label-md offset-3">Nom </label>
        <div class="col-sm-3 ">
            <input type="text" name="nom" class="form-control form-control-md" id="colFormLabelSm" placeholder="">
        </div>
    </div>
    <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-2 col-form-label txtGras text-right col-form-label-md offset-3">Email </label>
        <div class="col-sm-3 ">
            <input type="email" name="email" class="form-control form-control-md" id="colFormLabelSm" placeholder="Mons@bel.be">
        </div>
    </div>
    <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-2 col-form-label txtGras text-right col-form-label-md offset-3">Adresse </label>
        <div class="col-sm-3 ">
            <input type="text" name="adresse" class="form-control form-control-md" id="colFormLabelSm" placeholder="Grand place">
        </div>
    </div>
    <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-2 col-form-label txtGras text-right col-form-label-md offset-3">Numéro</label>
        <div class="col-sm-3 ">
            <input type="text" name="numero" class="form-control form-control-md" id="colFormLabelSm" placeholder="22">
        </div>
    </div>
    <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-2 col-form-label txtGras text-right col-form-label-md offset-3">Localité</label>
        <div class="col-sm-3 ">
            <input type="text" name="localite" class="form-control form-control-md" id="colFormLabelSm" placeholder="Mons">
        </div>
    </div>
    <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-2 col-form-label txtGras text-right col-form-label-md offset-3">Code postal</label>
        <div class="col-sm-3 ">
            <input type="text" name="cp" class="form-control form-control-md" id="colFormLabelSm" placeholder="7000">
        </div>
    </div><br>
    <div class="form-group row">
        <div class="col-sm-4 offset-5">
            <input type="submit" name="submit_login" class="btn btn-light"  placeholder="col-form-label-lg" value="s'enregister" >
        </div>
    </div>
</form>
<br><br>