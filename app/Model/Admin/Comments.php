<?php
namespace App\Model\Admin;

use \App\App;

class Comments
{
	public static function getAllComments()
    {
        return App::getDb()->query("
            SELECT id, post_id, nickname, content, DATE_FORMAT(date_publish, '%d/%m/%Y') AS date_publish_fr 
            FROM comments 
            ORDER BY post_id", __CLASS__);
    }
}
