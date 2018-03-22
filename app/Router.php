<?php
namespace App;
use \App\App;

class Router
{
	protected static $table = [
		'' => ['path' => '', 'control' => 'Front\Posts.index'],
		'home' => ['path' => 'accueil', 'control' => 'Front\Posts.index'],
		'episodes' =>  ['path' => 'tous-les-episodes', 'control' => 'Front\Posts.showAllEpisodes'],
		'episode' => [ 'path' => 'chapitre', 'control' => 'Front\Posts.show'],
		'login' => ['path' => 'se-connecter', 'control' => 'Admin\Admin.login'],
		'connection' => ['path' => 'connexion', 'control' => 'Admin\Admin.getLog'],
		'dashboard' => ['path' => 'tableau-de-bord', 'control' => 'Admin\Admin.index'],
		'adminEpisodes' => ['path' => 'admin-episodes', 'control' => 'Admin\Admin.allEpisodes'],
		'adminComments' => ['path' => 'admin-commentaires', 'control' => 'Admin\Admin.allComments'],
		'report' => ['path' => 'signaler', 'control' => 'Front\Comments.report'],
		'disconnect' => ['path' => 'deconnexion', 'control' => 'Admin\Admin.disconnect'],
		'deleteComment' => ['path' => 'supprimer-commentaire', 'control' => 'Admin\Admin.deleteComment'],
		'insertComment' => ['path' => 'ajouter-commentaire', 'control' => 'Front\Comments.checkInsertComment'],
		'addEpisode' => ['path' => 'ajouter-episode', 'control' => 'Admin\Admin.adding'],
		'editEpisode' => ['path' => 'modifier', 'control' => 'Admin\Admin.editing'],
		'adminAddNewEpisode' => ['path' => 'ajout-episode', 'control' => 'Admin\Admin.add'],
		'adminEditEpisode' => ['path' => 'edition', 'control' => 'Admin\Admin.edit'],
		'deleteEpisode' => ['path' => 'supprimer-episode', 'control' => 'Admin\Admin.deletePost'],
		'removeEpisode' => ['path' => 'approuver', 'control' => 'Admin\Admin.remove']
	];

	public static function route()
	{
		$path = str_replace('/Projet_3/public/', '', $_SERVER['REQUEST_URI']);
		$path = parse_url($path, PHP_URL_PATH);
		$path = rtrim($path, '/');

		foreach (self::$table as $routeName => $routeData) 
		{
			if ($routeData['path'] == $path) 
			{
				$explodeControl = explode('.', $routeData['control']);
				$controller = '\App\Controller\\' . $explodeControl[0] . 'Controller';

				if (class_exists($controller)) {
					$controller = new $controller();
					$action = $explodeControl[1];
				}
				break;
			}
		}

		if(isset($controller, $action) && method_exists($controller, $action))
		{
			$controller->$action();
		}

		else
		{
			App::pageNotFound();
		}
	}

	public static function routeUrl($routeName)
	{	
		if(array_key_exists($routeName, self::$table))
		{
			$tableRoute = self::$table[$routeName];
		}
		return isset($tableRoute) ? $tableRoute['path'] : null;
	}
}