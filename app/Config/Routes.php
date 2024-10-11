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


$routes->get('/app/clientes', 'Clientes::index');
$routes->get('/app/clientes/new', 'Clientes::new');
$routes->post('/app/clientes/crear', 'Clientes::create');
$routes->get('app/clientes/edit/(:num)', 'Clientes::edit/$1');
$routes->post('app/clientes/edit/(:num)', 'Clientes::update/$1');
$routes->post('app/clientes/delete/(:num)', 'Clientes::delete/$1');


// $routes->get('/app/clientes/editar/(:num)', 'App::editar/$1');


$routes->post('/register-click', 'Home::registerClick');

