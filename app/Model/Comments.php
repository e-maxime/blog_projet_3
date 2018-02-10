<?php
namespace App\Model;
use App\App;

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
}