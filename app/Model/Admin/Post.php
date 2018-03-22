<?php
namespace App\Model\Admin;

use \App\App;
use \App\Router;

class Post
{
    public static $nbPostsByPage = 3;
    public static $currentPage = 1;

	public static function getAllEpisodes()
    {
        return App::getDb()->query("
            SELECT id, author, title, content, DATE_FORMAT(date_create, '%d/%m/%Y') AS date_create_fr 
            FROM posts 
            ORDER BY date_create LIMIT ".((self::$currentPage-1)*self::$nbPostsByPage).",".self::$nbPostsByPage, __CLASS__
            );
    }

    public static function getOneEpisode($id)
    {
        return App::getDb()->prepare("
            SELECT id, author, title, content, DATE_FORMAT(date_create, '%d/%m/%Y ') AS date_create_fr 
            FROM posts 
            WHERE id = ?", [$_GET['id']], __CLASS__, true);
    }

    public static function updatePost()
    {
        return App::getDb()->update("UPDATE posts SET title = \"".$_POST['titre']."\", content = \"".$_POST['contenu']."\" WHERE id = ?", array($_GET['id']));

    }

    public static function addPost()
    {
        return App::getDb()->insert("INSERT INTO posts(author, title, content, date_create) VALUES ('Jean Forteroche', ?, ?, NOW())", array($_POST['title'], $_POST['content']));
    }

    public static function deleted()
    {
        $req = App::getDb()->prepare('SELECT posts.id FROM posts INNER JOIN comments ON posts.id = comments.post_id WHERE posts.id = ?', array($_POST['id']));

        if($req)
        {
            return App::getDb()->delete("DELETE posts, comments FROM posts INNER JOIN comments ON posts.id = comments.post_id WHERE posts.id = ?", array($_POST['id']));
        }
        else{
            return App::getDb()->delete("DELETE posts FROM posts WHERE posts.id = ?", array($_POST['id']));
        }
    }

    public static function counting()
    {
        return App::getDb()->counter('SELECT COUNT(id) AS nbThings FROM posts');
    }

    public static function paging()
    {
        $nbPosts = self::counting();
        $nbPage = ceil($nbPosts/self::$nbPostsByPage);

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
            $pagination .="<a href=" . Router::routeUrl('adminEpisodes') . "?p=$i>$i</a>";
        }
        return $pagination;
    }
}
