<?php
namespace App\Controller;

class CommentsController
{
    public function checkInsertComment()
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
    
}