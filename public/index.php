<?php

require('../app/Autoloader.php');
\App\Autoloader::register();

if(isset($_GET['action']))
{
    if($_GET['action'] == 'homePosts')
    {
        $controller = new \App\Controller\PostsController();
        $controller->index();
    }
    elseif($_GET['action'] == 'singlePost')
    {
        $controller = new \App\Controller\PostsController();
        $controller->show();
    }
    elseif($_GET['action'] == 'allPosts')
    {
        $controller = new \App\Controller\PostsController();
        $controller->showAllEpisodes();
    }
    elseif($_GET['action'] == 'addComment')
    {
        $controller = new \App\Controller\CommentsController();
        $controller->checkInsertComment();
    }
    elseif($_GET['action'] == '404')
    {
        echo '<p>Aucun article n\'a été trouvé. </p><a href="index.php">Retourner à l\'accueil</a>';
    }
}
else
{
    $controller = new \App\Controller\PostsController();
    $controller->index();
}