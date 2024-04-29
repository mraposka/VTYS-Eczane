<?php

use App\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//GetRoutes
$routes->get('/Giris', 'Eczane::Giris');
$routes->get('/Logout', 'Eczane::Logout');

//GetRoutes

//PostRoutes
$routes->post('/Login', 'Eczane::Login');
$routes->post('/EmployeeAdd', 'Eczane::EmployeeAdd');
$routes->post('/CategoryAdd', 'Eczane::CategoryAdd');
$routes->post('/PatientAdd', 'Eczane::PatientAdd');
$routes->post('/MedicineAdd', 'Eczane::MedicineAdd');
$routes->post('/MedicineEdit', 'Eczane::MedicineEdit');
$routes->post('/MedicineDel', 'Eczane::MedicineDel');
$routes->post('/EmployeeDel', 'Eczane::EmployeeDel');
$routes->post('/EmployeeEdit', 'Eczane::EmployeeEdit');
$routes->post('/StockAdd', 'Eczane::StockAdd');
$routes->post('/StockDel', 'Eczane::StockDel');
$routes->post('/PatientDel', 'Eczane::PatientDel');
$routes->post('/PatientEdit', 'Eczane::PatientEdit');
$routes->post('/StockEdit', 'Eczane::StockEdit');
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