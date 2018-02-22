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

    public static function addComment()
    {
        App::getDb()->insert("
            INSERT INTO comments(post_id, nickname, content, date_publish) 
            VALUES (?, ?, ?, NOW())", array($_GET['id'], htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['comment'])));
    }

    public static function counting()
    {
        return App::getDb()->counter('SELECT COUNT(id) AS nbThings FROM comments WHERE post_id = ?', [$_GET['id']]);
    }

    public static function paging()
    {
        $nbComments = self::counting();
        $nbPage = ceil($nbComments/self::$nbCommentsByPage);

        if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPage)
        {
            self::$currentPage = $_GET['p'];
        }
        elseif(isset($_GET['p'])&& $_GET['p'] > $nbPage)
        {
            die('Cette page n\'existe pas.');
        }
        else
        {
            self::$currentPage = 1;
        }

        $html="";

        for ($i=1; $i<=$nbPage; $i++)
        {
            $html .="<a href=\"index.php?page=posts.show&id=".$_GET['id']."&p=$i\">$i</a>";
        }
        return $html;
    }

    public static function reportComment()
    {
        return App::getDb()->update("UPDATE comments SET reported = 1 WHERE id = ?", array($_POST['id']));
    }

}