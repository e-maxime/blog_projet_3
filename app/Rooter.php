<?php
namespace App;
use \App\App;

class Rooter
{
	protected $table = [
		'' => ['path' => 'accueil', 'control' => 'Front\Posts.index'],
		'home' => ['path' => 'accueil', 'control' => 'Front\Posts.index'],
		'episodes' =>  ['path' => 'tous-les-episodes', 'control' => 'Front\Posts.showAllEpisodes'],
		'episode' => [ 'path' => 'episode', 'control' => 'Front\Posts.show'],
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

	public function root()
	{
		$path = str_replace('/Projet_3/public/', '', $_SERVER['REQUEST_URI']);
		$path = parse_url($path, PHP_URL_PATH);
		$path = rtrim($path, '/');

		$tableControl = $this->table[$path];
		
		if (array_key_exists($path, $this->table)) 
		{
			$explodeControl = explode('.', $tableControl['control']);
			$controller = '\App\Controller\\' . $explodeControl[0] . 'Controller';
			$controller = new $controller();
			
			$action = $explodeControl[1];
			if(method_exists($controller, $action))
			{
				$controller->$action();
			}

			else
			{
				App::pageNotFound();
			}
		}
		else
			{
				die('Page non trouvée.');
			}
	}

	public function urlRoot($urlPath)
	{
		// $path = str_replace('/Projet_3/public/', '', $_SERVER['REQUEST_URI']);
		// $path = parse_url($path, PHP_URL_PATH);
		// $path = rtrim($path, '/');
		
		// $tablePath = $this->table[$path];

		// if(in_array($urlPath, $tablePath, TRUE))
		// {
		// 	return $path;
		// }

		// else
		// {
		// 	App::pageNotFound();
		// }
	}
}