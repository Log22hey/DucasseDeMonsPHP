<!DOCTYPE html> 
<?php
session_start();
?>
<?php
require './admin/lib/php/admin_liste_include.php';
$cnx = Connexion:: getInstance($dsn, $user, $pass);
?>

<html>
    <head> <meta charset="UTF-8">        
        <title>Ducasse de Mons</title>
        <link rel="shorcut icon"  href="./admin/images/licon.JPG" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous"/>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" crossorigin="anonymous">
        <link rel="stylesheet" href="./admin/lib/css/custom2021.css" />
        <link rel="stylesheet" type="text/css" href="./admin/lib/css/2021Style.css"/>
    </head>
    <br>
    <body class="container body">
        <header>
            <div class="container">
                <?php
                if (file_exists('./lib/php/header.php')) {
                    include ('./lib/php/header.php');
                }
                ?>   
                <br><br>
            </div> 
            <div class ="container menu">
                <?php
                if (file_exists('./lib/php/public_menu.php')) {
                    require('./lib/php/public_menu.php');
                }
                ?>
            </div>
        </header>
        <section>
            <br><br>
            <div class="container">

                <?php
                if (!isset($_SESSION['page'])) {
                    $_SESSION['page'] = "accueil.php"; // page par défaut 
                }
                if (isset($_GET['page'])) {
                    $_SESSION['page'] = $_GET['page'];
                }
                $path = "./page/" . $_SESSION['page'];

                if (file_exists($path)) {
                    include ($path);
                } else {
                    include ('admin/page/page404.php');
                }
                ?>
            </div>
        </section>

        <footer>
            <div class="container text-center" id="footer">
                <?php
                if (file_exists('./lib/php/public_footer.php')) {
                    include ('./lib/php/public_footer.php');
                } else {
                    print "<br>Ducasse de Mons";
                }
                ?>
        </footer>
        <br><br>
    </body>
</html> 

