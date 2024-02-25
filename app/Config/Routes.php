<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

$routes->get('/project', 'Project::index');

$routes->get('/data', 'Data::index');
// $routes->get('/data/(:segment)', 'Data::$1');
// $routes->post('/data/(:segment)/simpan', 'Data::$1Simpan');
// $routes->get('/data/detail/(:segment)', 'Data::detail/$1');
// $routes->delete('/data/hapusPegawai', 'Data::hapusPegawai');

