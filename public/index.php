<?php
session_start();

require('../app/Autoloader.php');
\App\Autoloader::register();

$callroute = new \App\Router();
$callroute->route();
