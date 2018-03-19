<?php
namespace App\Model\Front;
use App\App;
use \PDO;
use \App\Rooter;

class Post
{   
    public static $nbPostsByPage = 4;
    public static $currentPage = 1;

    public static function getLastEpisodes()
    {
       return App::getDb()->query("
            SELECT id, author, title, content, DATE_FORMAT(date_create, '%d/%m/%Y') AS date_create_fr 
            FROM posts 
            ORDER BY date_create DESC LIMIT 0,3", __CLASS__);
    }
    
    public static function getOneEpisode($id)
    {
        return App::getDb()->prepare("
            SELECT id, author, title, content, DATE_FORMAT(date_create, '%d/%m/%Y ') AS date_create_fr 
            FROM posts 
            WHERE id = ?", [$_GET['id']], __CLASS__, true);
    }
    
    public static function getAllEpisodes()
    {
        return App::getDb()->query("
            SELECT id, author, title, content, DATE_FORMAT(date_create, '%d/%m/%Y') AS date_create_fr 
            FROM posts 
            ORDER BY date_create LIMIT ".((self::$currentPage-1)*self::$nbPostsByPage).",".self::$nbPostsByPage, __CLASS__);
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
            $pagination .="<a href=" . Rooter::routeUrl('episodes') . "?p=$i>$i</a>";
        }
        return $pagination;
    }

    
    public function getUrl()
    {

        return Rooter::routeUrl('episode') . '?id=' . $this->id;
    }
    
    public function getExcerpt()
    {
        return substr($this->content, 0, 350) . '...<br/><span style="color:gray; font-size:1.2em;"> - </span><a href="'.$this->getUrl().'" style="color: #000066;">Lire la suite</a>';
    }
}