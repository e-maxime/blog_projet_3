<?php
use \App\Rooter;
use \App\App;
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= App::getTitlePage(); ?></title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <div id="header" class="jumbotron" style="background-color: #000033; color:white; border-radius: 2px 2px 5px 5px;">
            <h1>Un billet simple pour l'Alaska</h1>
            <p>Écrit par Jean FORTEROCHE</p>
        </div>

        <div class="row">
            <div id="menu" class="col-md-3">
                <h3>Menu</h3>
                <ul class="nav nav-pills nav-stacked">
                    <li><a style="color: #000099;" style="font-size: 1.1em;" href="<?= Rooter::routeUrl('home'); ?>">Accueil</a></li>
                    <li><a style="color: #000099;" style="font-size: 1.1em;" href="<?= Rooter::routeUrl('episodes'); ?>">Les épisodes</a></li>
                </ul>
            </div>

            <div id="content" class="col-md-9">
                <header class="page-header">
                    <h1>Connexion à l'administration</h1>
                </header>

                <?= $content; ?>

            </div>
        </div>
    </div>
</body>
</html>