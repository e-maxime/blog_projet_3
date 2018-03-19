<?php
namespace App\Model;

class Paging
{
    public static $currentPage = 1;

    public static function countingPosts()
    {
        return App::getDb()->counter('SELECT COUNT(id) AS nbThings FROM posts');
    }

    public static function countingComments()
    {
        return App::getDb()->counter('SELECT COUNT(id) AS nbThings FROM comments WHERE post_id = ?', [$_GET['id']]);
    }

	public static function pagingElements($tableNameForCount, $nbElementsByPage, $routeName)
    {
        if($tableNameForCount === 'posts')
        {
        	$tableElements = self::countingPosts();
        }

        else if ($tableNameForCount === 'comments')
        {
        	$tableElements = self::countingComments();
        }

        else
        {
        	die('Problème lors de la pagination.');
        }

        $nbElements = $tableElements;

        $nbPage = ceil($nbElements/self::$nbElementsByPage);

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
            $pagination .="<a href=" . Rooter::routeUrl($routeName) . "?p=$i>$i</a>";
        }
        return $pagination;
    }
}