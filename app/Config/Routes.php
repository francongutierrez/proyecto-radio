<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('/app', 'App::index');

$routes->get('/register', 'App::register');
$routes->get('/login', 'App::login');
$routes->get('/logout', 'App::logout');

$routes->post('/ingresar', 'App::ingresar');
$routes->post('/registrar', 'App::registrar');


$routes->post('/register-click', 'Home::registerClick');

