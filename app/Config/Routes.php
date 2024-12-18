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
$routes->get('/app/clientes/show/(:num)', 'Clientes::show/$1');
$routes->post('/app/clientes/crear', 'Clientes::create');
$routes->get('app/clientes/edit/(:num)', 'Clientes::edit/$1');
$routes->post('app/clientes/update/(:num)', 'Clientes::update/$1');
$routes->post('app/clientes/delete/(:num)', 'Clientes::delete/$1');

$routes->get('/app/usuarios', 'Usuarios::index');
$routes->get('/app/usuarios/new', 'Usuarios::new');
$routes->post('/app/usuarios/create', 'Usuarios::create');
$routes->get('app/usuarios/edit/(:num)', 'Usuarios::edit/$1');
$routes->post('app/usuarios/update/(:num)', 'Usuarios::update/$1');
$routes->post('app/usuarios/delete/(:num)', 'Usuarios::delete/$1');


$routes->get('/app/documentacion', 'Documentacion::index');
$routes->get('/app/documentacion/new', 'Documentacion::new');
$routes->get('/app/documentacion/show/(:num)', 'Documentacion::show/$1');
$routes->post('/app/documentacion/create', 'Documentacion::create');
$routes->get('app/documentacion/edit/(:num)', 'Documentacion::edit/$1');
$routes->post('app/documentacion/update/(:num)', 'Documentacion::update/$1');
$routes->post('app/documentacion/delete/(:num)', 'Documentacion::delete/$1');

// $routes->get('/app/clientes/editar/(:num)', 'App::editar/$1');


$routes->post('/register-click', 'Home::registerClick');
$routes->post('/register-banner-click', 'Home::registerBannerClick');

