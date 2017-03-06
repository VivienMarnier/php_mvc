<?php
	require_once('modeles/Autoloader.php');
	Autoloader::register();
	$router = new Router();
	$router->dispatch();
?>

