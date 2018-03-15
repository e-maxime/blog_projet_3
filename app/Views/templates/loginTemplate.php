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
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-inverse" style="border-radius: 0; background-color: #343a40; border: 0;">
                <ul class="nav navbar-nav">
                    <li><a style="font-size: 1.1em;" href="home">Accueil</a></li>
                    <li><a style="font-size: 1.1em;" href="episodes">Les épisodes</a></li>
                </ul>
            </nav>
        </div>

        <div>
            <header class="page-header">
                <h1>Connexion à l'administration</h1>
            </header>
        </div>

        <div id="content" class="col-md-12">
            <?= $content; ?>
        </div>
    </div>
</body>
</html>