<?php
namespace App\Controller\Front;
use \App\Model\Front\Comments;
use \App\Controller\Controller;

class CommentsController extends Controller
{
    public function checkInsertComment()
    {
        if(isset($_GET['id']) && $_GET['id'] > 0)
        {
            if(!empty($_POST['pseudo']) && !empty($_POST['comment']))
            {
                $this->loadModel('Comments');
                $addPostComment = Comments::addComment();
                header('Location: episode?id='.$_GET['id']);
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

    public function report()
    {
        if(isset($_GET['id']) && $_GET['id'] > 0)
        {  
            $this->loadModel('Comments');
            $report = Comments::reportComment();
            header('Location: episode?id='.$_GET['id']);
        }

        else
        {
            echo "Aucun identifiant de billet n'a été envoyé.";
        }
    }
}