<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Eczane::index');
$routes->get('/Home', 'Eczane::home');
$routes->get('/Giris', 'Eczane::Giris');
$routes->get('/Ilaclar', 'Eczane::Ilaclar'); 
$routes->get('/Hastalar', 'Eczane::Hastalar'); 
$routes->get('/Receteler', 'Eczane::Receteler');
$routes->get('/Stok', 'Eczane::Stok');
$routes->get('/Personel', 'Eczane::Personel');
$routes->get('/Faturalar', 'Eczane::Faturalar');
$routes->get('/Sepet', 'Eczane::Sepet');

$routes->set404Override(function() {
	return view('404');
});
