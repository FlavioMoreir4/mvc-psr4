<?php

use App\Core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/login', 'LoginController@index');
$router->post('/login', 'LoginController@loginAction');