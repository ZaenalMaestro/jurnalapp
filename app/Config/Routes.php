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
$routes->post('/registrasi', 'Login::signUp');

// admin
$routes->group('admin', function($routes)
{
	// beranda
	$routes->get('/', 'Admin\Beranda::index');
	$routes->get('detail/(:any)', 'Admin\Beranda::show/$1');
	// data penelitian
	$routes->get('data', 'Admin\Data::index');
	$routes->get('data/create', 'Admin\Data::create');
	$routes->post('data/insert', 'Admin\Data::store');
	$routes->get('data/edit/(:any)', 'Admin\Data::edit/$1');
	$routes->put('data/penelitian', 'Admin\Data::updatePenelitian');
	$routes->put('data/gambar', 'Admin\Data::updateGambar');
	$routes->post('data/dokumentasi', 'Admin\Data::insertDokumentasi');
	$routes->put('data/dokumentasi', 'Admin\Data::updateDokumentasi');
	$routes->delete('data/dokumentasi/(:num)', 'Admin\Data::deleteDokumentasi/$1');
	$routes->delete('data/(:any)', 'Admin\Data::delete/$1');
	// akun user
	$routes->get('akun', 'Admin\AkunUser::index');
	$routes->put('akun', 'Admin\AkunUser::update');
});

// admin
$routes->group('user', function($routes)
{
	// beranda
	$routes->get('/', 'User\Beranda::index');
	$routes->get('detail/(:any)', 'User\Beranda::show/$1');
	// data penelitian
	$routes->get('data', 'User\Data::index');
	$routes->get('data/create', 'User\Data::create');
	$routes->post('data/insert', 'User\Data::store');
	$routes->get('data/edit/(:any)', 'User\Data::edit/$1');
	$routes->put('data/penelitian', 'User\Data::updatePenelitian');
	$routes->put('data/gambar', 'User\Data::updateGambar');
	$routes->post('data/dokumentasi', 'User\Data::insertDokumentasi');
	$routes->put('data/dokumentasi', 'User\Data::updateDokumentasi');
	$routes->delete('data/dokumentasi/(:num)', 'User\Data::deleteDokumentasi/$1');
	$routes->delete('data/(:any)', 'User\Data::delete/$1');
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
