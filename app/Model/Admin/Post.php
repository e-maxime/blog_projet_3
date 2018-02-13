<?php
namespace App\Model\Admin;

use \App\App;

class Post
{
	public static function getAllEpisodes()
    {
        return App::getDb()->query("
            SELECT id, author, title, content, DATE_FORMAT(date_create, '%d/%m/%Y') AS date_create_fr 
            FROM posts 
            ORDER BY date_create", __CLASS__);
    }
}
