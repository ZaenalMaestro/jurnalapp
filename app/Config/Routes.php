<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// login
$routes->get('/', 'Login::index');
$routes->get('/registrasi', 'Login::registrasi');

// admin
$routes->group('admin', function($routes)
{
	$routes->get('/', 'Admin\Beranda::index');
	$routes->get('detail/(:num)', 'Admin\Beranda::show/$1');
	$routes->get('data', 'Admin\Data::index');
	$routes->get('data/create', 'Admin\Data::create');
	$routes->get('data/edit', 'Admin\Data::edit');
});

// admin
$routes->group('user', function($routes)
{
	$routes->get('/', 'Admin\Beranda::index');
	$routes->get('detail', 'Admin\Beranda::show');
	$routes->get('data', 'Admin\Data::index');
	$routes->get('data/create', 'Admin\Data::create');
	$routes->get('data/edit', 'Admin\Data::edit');
});



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
