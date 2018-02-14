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
                    <li><a href="index.php?page=posts.showAllEpisodes">Les épisodes</a></li>
                </ul>
            </nav>
        </div>
        
        <div class="row">
			<form method="POST" action="admin.php?page=admin.getLog" class="col-lg-6">
				<legend>Connexion</legend>
					<div class="form-group">
						<label>Nom d'utilisateur : </label>
						<input id="username" name="username" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>Mot de passe : </label>
						<input id="pass" type="password" name="pass" class="form-control">
					</div>
						<button class="btn btn-info">Envoyer</button>
			</form>
        </div>
        
        <div class="row">
            <footer>
                <nav class="navbar navbar-inverse">
                    <ul class="nav navbar-nav">
                        <li><a href="#">Se connecter</a></li>
                    </ul>
                </nav>
            </footer>
        </div>
    </div>
</body>
</html>



