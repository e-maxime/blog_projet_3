<?php
namespace App\Controller\Front;
use \App\Model\Front\Comments;
use \App\Controller\Controller;
use \App\Helpers\Alert;

class CommentsController extends Controller
{
    public function checkInsertComment()
    {
        if(isset($_GET['id']) && $_GET['id'] > 0)
        {
            if(!empty($_POST['pseudo']) && !empty($_POST['comment']))
            {
                $addPostComment = Comments::addComment();
                
                Alert::setAlert('Votre commentaire a bien été envoyé.');

                header('Location: episode?id='.$_GET['id']);
            }
            
            else
            {
                Alert::setAlert('Tous les champs ne sont pas remplis.', 'warning');
                header('Location: episode?id='.$_GET['id']);
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
            Alert::setAlert('Le commentaire a bien été signalé. Merci.', 'info');
            header('Location: episode?id='.$_GET['id']);
        }

        else
        {
            echo "Aucun identifiant de billet n'a été envoyé.";
        }
    }
}