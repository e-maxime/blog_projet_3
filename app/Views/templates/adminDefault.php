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
    <div id="main" style=" position: relative; min-height: 100%;">
        <nav class="navbar navbar-inverse" style="border-radius: 0; background-color: #343a40; border: 0; height: 90px; padding-top: 1%;">
        <div class="navbar-header">
            <a class="navbar-brand" href="" style="font-size: 2em;">Adminnistration</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="dashboard">Tableau de bord</a></li>
            <li><a href="adminEpisodes">Épisodes</a></li>
            <li><a href="adminComments">Commentaires</a></li>
        </ul>
    </nav>
    
    <section style="padding-bottom: 100px;">
        <div>
            <?= $content; ?>
        </div>
    </section>
        
    <footer style="position: absolute; bottom: 0; left: 0; right: 0;">
        <nav class="navbar navbar-inverse" style="border-radius: 0; background-color: #343a40; border: 0; margin-bottom: 0;">
            <ul class="nav navbar-nav">
                <li><a href="disconnect">Se déconnecter</a></li>
            </ul>
        </nav>
    </footer>
    </div>
    
</body>
</html>