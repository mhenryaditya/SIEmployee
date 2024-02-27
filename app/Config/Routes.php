<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  Authentication
$routes->get('/', 'Auth::login');
$routes->get('/register', 'Auth::register');

// Page
$routes->get('/home', 'Home::index');

$routes->get('/project', 'Project::index');

$routes->get('/data', 'Data::index');