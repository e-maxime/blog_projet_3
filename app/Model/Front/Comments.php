<?php
namespace App\Model\Front;
use App\App;
use \PDO;

class Comments
{
    public static $nbCommentsByPage = 4;
    public static $currentPage = 1;

    public static function getComments()
    {
        return App::getDb()->prepare("
            SELECT id, post_id, nickname, content, DATE_FORMAT(date_publish, '%d/%m/%Y %Hh%imin%ss') AS date_publish_fr 
            FROM comments 
            WHERE post_id = ? 
            ORDER BY date_publish LIMIT ".((self::$currentPage-1)*self::$nbCommentsByPage).",".self::$nbCommentsByPage, [$_GET['id']], __CLASS__);
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

    public static function counting()
    {
        $bdd = new PDO('mysql:dbname=projet_blog;host=localhost', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $req = $bdd->query('SELECT COUNT(id) AS nbComments FROM comments');
        $data = $req->fetch();
        $nbComments = $data['nbComments'];
        return $nbComments;
    }

    public static function paging()
    {
        $nbComments = self::counting();
        $nbPage = ceil($nbComments/self::$nbCommentsByPage);

        if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPage)
        {
            self::$currentPage = $_GET['p'];
        }
        else
        {
            self::$currentPage = 1;
        }

        for ($i=1; $i<=$nbPage; $i++)
        {
           return "<a href=\"index.php?page=posts.show&id=".$_GET['id']."&p=$i\">$i</a> / ";
        }
    }

}