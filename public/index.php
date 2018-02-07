<?php
require('../app/Database.php');
require('../app/App.php');
require('../app/Model/CommentRegister.php');
require('../app/Controller/PostsController.php');
require('../app/Controller/CommentsController.php');
    
    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 'home';
    }

    if($page === 'home')
    {
        $controller = new \App\Controller\PostsController();
        $controller->index();
    }
    elseif($page === 'episodes')
    {
        $controller = new \App\Controller\PostsController();
        $controller->showAllEpisodes();
    }
    elseif($page === 'contact')
    {
        require '../Views/contact.php';
    }
    elseif($page === 'post')
    {
        $controller = new \App\Controller\PostsController();
        $controller->show();
    }
    elseif($page === 'comment')
    {
        $controller = new \App\Controller\CommentsController();
        $controller->checkInsertComment();
    }
    elseif($page === '404')
    {
        echo '<p>Aucun article n\'a été trouvé. </p><a href="index.php">Retourner à l\'accueil</a>';
    }

?>