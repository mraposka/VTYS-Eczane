<?php

use App\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//GetRoutes
$routes->get('/Giris', 'Eczane::Giris');
$routes->get('/Logout', 'Eczane::Logout');
$routes->get('/HomePage', 'Eczane::employeeAdd');
//GetRoutes

//PostRoutes
$routes->post('/Login', 'Eczane::Login');
$routes->post('/HomePage', 'Eczane::employeeAdd');
//PostRoutes

$routes->set404Override(function () {
	return view('404');
});

$routes->group('', ['filter' => 'session'], function ($routes) {
	$routes->get('/', 'Eczane::index');
	$routes->get('/Home', 'Eczane::home');
	$routes->get('/Ilaclar', 'Eczane::Ilaclar');
	$routes->get('/Hastalar', 'Eczane::Hastalar');
	$routes->get('/Receteler', 'Eczane::Receteler');
	$routes->get('/Stok', 'Eczane::Stok');
	$routes->get('/Personel', 'Eczane::Personel');
	$routes->get('/Faturalar', 'Eczane::Faturalar');
	$routes->get('/Sepet', 'Eczane::Sepet');
});