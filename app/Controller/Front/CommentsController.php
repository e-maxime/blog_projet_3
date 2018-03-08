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
                $addPostComment = Comments::addComment();
                header('Location: episode?id='.$_GET['id'].'&msg=1');
            }
            
            else
            {
                header('Location: episode?id='.$_GET['id'].'&msg=2');
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
            $report = Comments::reportComment();
            header('Location: episode?id='.$_GET['id'].'&msg=3');
        }

        else
        {
            echo "Aucun identifiant de billet n'a été envoyé.";
        }
    }
}