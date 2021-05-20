<h2>Connexion admin</h2>

        <div class="container bg-dark">
            <?php
            if(isset($_POST['submit_login'])){
                extract($_POST,EXTR_OVERWRITE);
                $log = new AdminDB($cnx);
                $client = $log->getAdmin($login, $password);
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
                <input type="password" name="password" id="Password" class="form-control" placeholder="Password" required><br><br>
                <div class="form-group row">
                    <div class="col-sm-4 offset-5">
                        <input type="hidden" name="page" value="connexion.php"/>
                        <input type="submit" name="submit_login" class="btn btn-danger"  placeholder="col-form-label-lg" value="Connexion" >
                    </div>
                </div>
            </form>