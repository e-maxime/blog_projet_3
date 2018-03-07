<?php
session_start();

require('../app/Autoloader.php');
\App\Autoloader::register();

$callRoot = new \App\Rooter();
$callRoot->root();
