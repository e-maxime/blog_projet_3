<?php
namespace App\Model\Admin;

use \App\App;
use \App\Router;

class Comments
{
    public static $nbCommentsByPage = 10;
    public static $currentPage = 1;

	public static function getAllComments()
    {
        return App::getDb()->query("
            SELECT id, post_id, nickname, content, DATE_FORMAT(date_publish, '%d/%m/%Y') AS date_publish_fr 
            FROM comments 
            ORDER BY post_id LIMIT ".((self::$currentPage-1)*self::$nbCommentsByPage).",".self::$nbCommentsByPage, __CLASS__);
    }

    public static function deleted()
    {
        return App::getDb()->delete("DELETE FROM comments WHERE id = ? ", array($_POST['id']));
    }

    public static function getReportedComments()
    {
        return App::getDb()->query("SELECT * FROM comments WHERE reported = 1 ORDER BY post_id", __CLASS__);
    }

    public static function removeComments()
    {
        return App::getDb()->update("UPDATE comments SET reported = 0 WHERE id = ?", array($_GET['id']));
    }

    public static function counting()
    {
        return App::getDb()->counter('SELECT COUNT(id) AS nbThings FROM comments');
    }

    public static function paging()
    {
        $nbComments = self::counting();
        $nbPage = ceil($nbComments/self::$nbCommentsByPage);

        if(!isset($_GET['p']))
        {
            $_GET['p'] = 1;
        }

        if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPage)
        {
            self::$currentPage = $_GET['p'];
        }
        elseif($_GET['p'] > $nbPage)
        {
            die('Cette page n\'existe pas.');
        }
        else
        {
            self::$currentPage = 1;
        }

        $pagination="";

        for ($i=1; $i<=$nbPage; $i++)
        {
            $pagination .="<a href=" . Router::routeUrl('adminComments') . "?p=$i>$i</a>";
        }
        return $pagination;
    }
}
