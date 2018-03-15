<!DOCTYPE html>
<html>
<head>
	<title><?= \App\App::getTitlePage(); ?></title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/Projet_3/public/css/style.css">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
    <div class="container">
        <div id="header" class="jumbotron" style="background-color: #4d4d4d; color: white;">
            <h1>Administration</h1>
        </div>

        <div class="row">
            <div id="menu" class="col-md-3">
                
                <h3>Menu</h3>
            
                <ul class="nav nav-pills nav-stacked">
                    <li><a style="color: #000099;" href="dashboard">Tableau de bord</a></li>
                    <li><a style="color: #000099;" href="adminEpisodes">Épisodes</a></li>
                    <li><a style="color: #000099;" href="adminComments">Commentaires</a></li>
                </ul>
            </div>
        
            <div id="content" class="col-md-9">
                <div>
                    <?= $content; ?>
                </div>
            </div>
        </div>
        
        <hr>

        <footer>
            <ul class="nav nav-pills">
                <li class="nav-item"><a style="color: #000099;" class="nav-link" href="home">Retour à l'accueil</a></li>
                <li class="nav-item"><a style="color: #000099;" class="nav-link" href="disconnect">Se déconnecter</a></li>
            </ul>
        </footer>
    </div>
</body>
</html>