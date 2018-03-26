<?php
use \App\Router;
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= \App\App::getTitlePage(); ?></title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/Projet_3/public/css/style.css">
</head>
<body>
    <div class="container">
        <div id="header" class="jumbotron" style="background-color: #000033; color:white; border-radius: 2px 2px 5px 5px;">
            <h1>Un billet simple pour l'Alaska</h1>
            <p>Écrit par Jean FORTEROCHE</p>
        </div>

        <div class="row">
            <div id="menu" class="col-md-3">
                <h3 style="color:black;">Menu</h3>
                <ul class="nav nav-pills nav-stacked">
                    <li><a style="color: #000099;" href="<?= Router::routeUrl('home');?>">Accueil</a></li>
                    <li><a style="color: #000099;" href="<?= Router::routeUrl('episodes');?>">Les épisodes</a></li>
                </ul>
            </div>

            <div id="content" class="col-md-9">
                <?= $content; ?>
            </div>
        </div>

        <hr>

        <footer>
            <ul class="nav nav-pills">
                <li><a style="color: #000099;" href="<?= Router::routeUrl('login');?>">Se connecter</a></li>
            </ul>
            <p></p>
        </footer>
    </div>
</body>
</html>