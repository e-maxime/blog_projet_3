<?php
namespace App\Controller;

class CommentsController extends AppController
{
    public function checkInsertComment()
    {
        if(isset($_GET['id']) && $_GET['id'] > 0)
        {
            if(!empty($_POST['pseudo']) && !empty($_POST['comment']))
            {
                $this->loadModel('Comments');
                $addPostComment = new \App\Model\Comments();
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
    
}