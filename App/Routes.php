<?php

use App\Core\Router;
use App\Auth;

$auth = new Auth();

$router = new Router();

$router->get('/', 'HomeController@index');
$router->post('/log', 'LeadController@log');

$router->post('/lead/add', 'LeadController@add');