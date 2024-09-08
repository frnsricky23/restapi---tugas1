<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/auth/process', 'Auth::process');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/todolist', 'todolistController');
$routes->get('/register', 'Auth::register');
$routes->post('/auth/register', 'Auth::registerProcess');
$routes->get('/', 'Home::index');

$routes->get('/todo', 'todolistController::index');
$routes->post('/todo/add', 'todolistController::add');
$routes->get('/todo/complete/(:num)', 'todolistController::complete/$1');
$routes->get('/todo/delete/(:num)', 'todolistController::delete/$1');
