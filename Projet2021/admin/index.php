
<!DOCTYPE html>
<?php
session_start();
?>
<?php
require './lib/php/admin_liste_include.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);
?>

<html>
    <head> <meta charset="UTF-8">        
        <title>Ducasse de Mons</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous"/>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" crossorigin="anonymous">
        <link rel="stylesheet" href="lib/css/custom2021.css" />
        <link rel="stylesheet" type="text/css" href="lib/css/2021Style.css"/>

    </head>

    <body class="body">
        <header>
            <div >
                <?php
                if (file_exists('./lib/php/header.php')) {
                    include('./lib/php/header.php');
                }
                ?>  
            </div> 
            <div class="container menu">
                <?php
                if (file_exists('./lib/php/admin_menu.php')) {
                    include ('./lib/php/admin_menu.php');
                }
                ?>   
            </div>        
        </header>
        <section>
            <div class="container">

                <div class="col-lg-3">

                </div>

                <?php
                if (!isset($_SESSION['page'])) {
                    $_SESSION['page'] = "admin_accueil.php"; // page par défaut
                }
                if (isset($_GET['page'])) {
                    $_SESSION['page'] = $_GET['page'];
                }
                $path = "./page/" . $_SESSION['page'];

                if (file_exists($path)) {
                    include ($path);
                } else {
                    include ('./page/page404.php');
                }
                ?>
            </div>
        </section>
        <footer>
            <div class="container text-center" id="footer">
                <?php
                if (file_exists('lib/php/admin_footer.php')) {
                    include ('lib/php/admin_footer.php');
                } else {
                    print "<br>Ducasse de Mons";
                }
                ?>
        </footer>
    </body>
</html> 