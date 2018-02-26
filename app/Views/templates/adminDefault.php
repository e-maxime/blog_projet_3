<!DOCTYPE html>
<html>
<head>
	<title><?= \App\App::getTitlePage(); ?></title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
    <div class="container">
        <div class="row">
            <header class="page-header">
                <h1>Administration</h1>
            </header>
        </div>
        
        <div class="row">
            <nav class="navbar navbar-inverse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php?page=admin.index">Tableau de bord</a></li>
                    <li><a href="index.php?page=admin.allEpisodes">Épisodes</a></li>
                    <li><a href="index.php?page=admin.allComments">Commentaires</a></li>
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
                        <li><a href="index.php?page=admin.disconnect">Se déconnecter</a></li>
                    </ul>
                </nav>
            </footer>
        </div>
    </div>
</body>
</html>