<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('principal', 'Home::index');
$routes->get('quienes_somos', 'Home::quienes_somos');
$routes->get('acerca_de', 'Home::acerca_de');
$routes->get('login', 'Home::login');
$routes->get('registro', 'Home::registro');
$routes->get('lista_usuarios', 'Home::lista_usuarios');

/* rutas del registro de usuario */
$routes->get('/registro', 'usuarios_controller::create');
$routes->post('/enviar_registro', 'usuarios_controller::formValidation');

/* rutas de ingreso */
$routes->get('/ingreso', 'login_controller');
$routes->post('/enviar_ingreso', 'login_controller::auth');
$routes->get('/panel', 'panel_controller::index', ['filter' => 'auth']);
$routes->get('/logout', 'login_controller::logout');

// crud
$routes->get('/usuarios', 'usuarios_controller::index');
$routes->get('/usuarios/delete/(:num)', 'usuarios_controller::delete/$1');

$routes->post('/usuarios/update', 'usuarios_controller::update');
$routes->get('/usuarios/edit/(:num)', 'usuarios_controller::edit/$1');
