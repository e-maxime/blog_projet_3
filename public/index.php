<?php
session_start();

require('../app/Autoloader.php');
\App\Autoloader::register();

if(isset($_GET['page']))
{
	$page = $_GET['page'];
}

else
{
    $page = 'posts.index';
}

$page = explode('.', $page);
$action = $page[1];

if ($page[0] === 'posts' || $page[0] === 'comments') 
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
}


