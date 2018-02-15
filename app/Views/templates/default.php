<!DOCTYPE html>
<html>
<head>
	<title><?= \App\App::getTitlePage(); ?></title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <header class="page-header">
                <h1>Un billet simple pour l'Alaska - Jean FORTEROCHE</h1>
            </header>
        </div>
        
        <div class="row">
            <nav class="navbar navbar-inverse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php?page=posts.index">Accueil</a></li>
                    <li><a href="index.php?page=posts.showAllEpisodes&p=1">Les épisodes</a></li>
                </ul>
            </nav>
        </div>
        
        <div class="row">
            <?= $content; ?>
        </div>
        
        <div class="row">
            <footer>
                <nav class="navbar navbar-inverse">
                    <ul class="nav navbar-nav">
                        <li><a href="admin.php?page=admin.index">Se connecter</a></li>
                    </ul>
                </nav>
            </footer>
        </div>
    </div>
</body>
</html>