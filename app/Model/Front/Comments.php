<?php
namespace App\Model\Front;
use App\App;
use \PDO;

class Comments
{
    public static function getComments()
    {
        return App::getDb()->prepare("
            SELECT id, post_id, nickname, content, DATE_FORMAT(date_publish, '%d/%m/%Y %Hh%imin%ss') AS date_publish_fr 
            FROM comments 
            WHERE post_id = ? 
            ORDER BY date_publish LIMIT 0,5", [$_GET['id']], __CLASS__);
    }

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
            header('Location: index.php?page=posts.show&id=' . $_GET['id']);
        } 
    }
}