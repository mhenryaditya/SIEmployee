<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/project', 'Project::index');
$routes->get('/data', 'Data::index');
$routes->get('/data/(:alpha)', 'Data::detail');
