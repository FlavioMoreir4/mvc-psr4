<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/App/Routes.php';

$router->start(
	$router->Routes
);