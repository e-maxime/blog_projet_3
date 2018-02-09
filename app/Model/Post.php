<?php
namespace App\Model;
use App\App;

class Post
{   
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
            ORDER BY date_create LIMIT 0,5", __CLASS__);
    }
    
    public function getUrl()
    {
        return 'index.php?action=singlePost&id=' . $this->id;
    }
    
    public function getExcerpt()
    {
        return substr($this->content, 0, 350) . "...<br/>" . '<a href="'.$this->getUrl().'">Lire la suite</a>';
    }
}