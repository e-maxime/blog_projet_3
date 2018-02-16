<?php
namespace App\Model\Front;
use App\App;
use \PDO;

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
        $bdd = new PDO('mysql:dbname=projet_blog;host=localhost', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $req = $bdd->query('SELECT COUNT(id) AS nbPosts FROM posts');
        $data = $req->fetch();
        $nbPosts = $data['nbPosts'];
        return $nbPosts;
    }

    public static function paging()
    {
        $nbPosts = self::counting();
        $nbPage = ceil($nbPosts/self::$nbPostsByPage);

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
            return "<a href=\"index.php?page=posts.showAllEpisodes&p=$i\">$i</a> / ";
        }
    }

    
    public function getUrl()
    {
        return 'index.php?page=posts.show&id=' . $this->id;
    }
    
    public function getExcerpt()
    {
        return substr($this->content, 0, 350) . "...<br/>" . '<a href="'.$this->getUrl().'">Lire la suite</a>';
    }
}