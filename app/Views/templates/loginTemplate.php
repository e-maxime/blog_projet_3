<!DOCTYPE html>
<html>
<head>
	<title><?= \App\App::getTitlePage(); ?></title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-inverse" style="border-radius: 0; background-color: #343a40; border: 0; height: 90px; padding-top: 1%;"">
        <ul class="nav navbar-nav">
            <li><a href="home">Accueil</a></li>
            <li><a href="episodes">Les épisodes</a></li>
        </ul>
    </nav>

    <div>
        <header class="page-header">
            <h1 style="margin-left: 1%;">Connexion à l'administration</h1>
        </header>
    </div>
        
    <section>
        <div>
            <?= $content; ?>
        </div>
    </section>

    <footer>
        <nav class="navbar navbar-inverse" style="border-radius: 0; background-color: #343a40; border: 0; margin-bottom: 0;">
            <ul class="nav navbar-nav">
                <li><a href="login">Se connecter</a></li>
            </ul>
        </nav>
    </footer>
</body>
</html>