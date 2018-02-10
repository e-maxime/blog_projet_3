<?php
namespace App\Model;
use \PDO;

class CommentRegister
{
    public function addComment()
    {
        $bdd = new PDO('mysql:dbname=projet_blog;host=localhost', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        
        $req = $bdd->prepare('INSERT INTO comments(post_id, nickname, content, date_publish) VALUES (?, ?, ?, NOW())');
        
        $req->execute(array($_GET['id'], htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['comment'])));
        
        if ($req === false) 
        {
            throw new Exception('Impossible d\'ajouter le commentaire. Veuillez réessayer.');
        }
        else 
        {
            header('Location: index.php?action=singlePost&id=' . $_GET['id']);
        } 
    }
}