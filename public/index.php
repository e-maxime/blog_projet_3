<?php

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

$controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
$controller = new $controller();
$controller->$action();