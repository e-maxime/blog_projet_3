<?php
require('../app/Database.php');
require('../app/App.php');
require '../app/Model/CommentRegister.php';
    
    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 'home';
    }
    
ob_start();

    if($page === 'home')
    {
        require ('../app/Views/index.php');
    }
    elseif($page === 'episodes')
    {
        require ('../app/Views/episodes.php');

    }
    elseif($page === 'contact')
    {
        require '../Views/contact.php';
    }
    elseif($page === 'post')
    {
        require ('../app/Views/single_episode.php');
    }
    elseif($page === 'comment')
    {
        if(isset($_GET['id']) && $_GET['id'] > 0)
        {
            if(!empty($_POST['pseudo']) && !empty($_POST['comment']))
            {
                $addPostComment = new \App\Model\CommentRegister();
                $addPostComment->addComment();
            }
            
            else
            {
                echo "Tous les champs ne sont pas remplis.";
            }
        }
        else
        {
            echo "Aucun identifiant de billet n'a été envoyé.";
        }
    }
    elseif($page === '404')
    {
        echo 'Aucun article n\'a été trouvé.';
    }
$content = ob_get_clean();
require('../app/Views/templates/default.php');

?>