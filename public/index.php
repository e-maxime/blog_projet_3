<?php
session_start();

require('../app/Autoloader.php');
\App\Autoloader::register();

$table = [
	'' => 'Front\Posts.index',
	'home' => 'Front\Posts.index',
	'episodes' => 'Front\Posts.showAllEpisodes',
	'episode' => 'Front\Posts.show',
	'login' => 'Admin\Admin.login',
	'connection' => 'Admin\Admin.getLog',
	'dashboard' => 'Admin\Admin.index',
	'adminEpisodes' => 'Admin\Admin.allEpisodes',
	'adminComments' => 'Admin\Admin.allComments',
	'report' => "Front\Comments.report",
	'disconnect' => "Admin\Admin.disconnect",
	'deleteComment' => "Admin\Admin.deleteComment",
	'insertComment' => 'Front\Comments.checkInsertComment',
	'addEpisode' => 'Admin\Admin.adding',
	'editEpisode' => 'Admin\Admin.editing',
	'adminAddNewEpisode' => 'Admin\Admin.add',
	'adminEditEpisode' => 'Admin\Admin.edit',
	'deleteEpisode' => 'Admin\Admin.deletePost',
	'removeEpisode' => 'Admin\Admin.remove'
];

$path = str_replace('/Projet_3/public/', '', $_SERVER['REQUEST_URI']);
$path = parse_url($path, PHP_URL_PATH);
$path = rtrim($path, '/');

if (array_key_exists($path, $table)) {
	$var = explode('.', $table[$path]);
	$controller = '\App\Controller\\' . $var[0] . 'Controller';
	$controller = new $controller();
	
	$action = $var[1];
	if(method_exists($controller, $action))
	{
		$controller->$action();
	}

	else
	{
		\App\App::pageNotFound();
	}
}
