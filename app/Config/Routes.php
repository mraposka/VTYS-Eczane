<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Eczane::index');
$routes->get('/Home', 'Eczane::home');
$routes->get('/Test', 'Eczane::Test');
