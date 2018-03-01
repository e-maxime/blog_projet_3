<?php
session_start();

require('../app/Autoloader.php');
\App\Autoloader::register();

/*if(isset($_GET['page']))
{
	$page = $_GET['page'];
}

else
{
    $page = 'posts.index';
}

$page = explode('.', $page);
$action = $page[1];*/

$table = [
	'' => 'Front\Posts.index',
	'home' => 'Front\Posts.index',
	'episodes' => 'Front\Posts.showAllEpisodes',
	'episode' => 'Front\Posts.show',
	'login' => 'Admin\Admin.login',
	'connection' => 'Admin\Admin.getLog',
	'dashboard' => 'Admin\Admin.index'
];

$path = str_replace('/Projet_3/public/', '', $_SERVER['REQUEST_URI']);
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


/* if ($page[0] === 'posts' || $page[0] === 'comments') 
{
	$controller = '\App\Controller\Front\\' . ucfirst($page[0]) . 'Controller';

	$controller = new $controller();
	if(method_exists($controller, $action))
	{
		$controller->$action();	
	}
	else
	{
		\App\App::pageNotFound();
	}
}

elseif($page[0] === 'admin')
{
	$controller = '\App\Controller\Admin\\' . ucfirst($page[0]) . 'Controller';
	$controller = new $controller();
	if(method_exists($controller, $action))
	{
		$controller->$action();	
	}
	else
	{
		\App\App::pageNotFound();
	}
}

else
{
	\App\App::pageNotFound();	
}*/

//echo "<pre>";
//var_dump($_SERVER);
//echo "</pre";

