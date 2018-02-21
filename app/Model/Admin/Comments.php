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
}
