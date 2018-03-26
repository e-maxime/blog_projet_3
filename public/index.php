<?php
session_start();

require('../app/Autoloader.php');
\App\Autoloader::register();

$callRouter = new \App\Router();
$callRouter->route();
