
<h2>Accueil admin</h2>

<div class="card-body bg-dark">
    <div class="card-body bg-dark">
        <div class="container bg-light">

            <?php
            if(isset($_POST['submit'])){
                extract($_POST,EXTR_OVERWRITE);
                $ad =new AdminDB($cnx);
                $admin = $ad->getAdmin($login,$password);
                if($admin){
                    $_SESSION['admin']=1;
                    print 'vous etes bien connecté';
                }else{
                    $message= "Identifiants incorrects";
                }
            }
            ?>
            <p class=""><?php
                if(isset($message))
                {
                    print $message;
                }
                ?></p>
            <form action="<?php print $_SERVER['PHP_SELF'];?>" method="post">

                <h1 class="h3 mb-3 fw-normal">Se connecter</h1>
                <label for="login" class="visually-hidden">login</label>
                <input type="login" id="login" name="login" class="form-control" required autofocus>
                <label for="Password" class="visually-hidden">Password</label>
                <input type="password" name="password" id="Password" class="form-control" placeholder="Password" required>

                <button type="submit" class="w-80 btn btn-lg btn-primary" name= "submit" >submit</button>
            </form>

        </div>
    </div>