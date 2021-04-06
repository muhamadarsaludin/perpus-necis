<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');



$routes->group('admin', function ($routes) {
	$routes->add('/', 'Admin\Dashboard::index');
	$routes->add('dashboard', 'Admin\Dashboard::index');
	// admin/users
	$routes->group('users', function ($routes) {
		$routes->add('/', 'Admin\User::index');
		$routes->add('profile/(:num)', 'Admin\User::profile/$1');
	});
	// admin/member
	$routes->group('members', function ($routes) {
		$routes->add('/', 'Admin\Member::index');
		$routes->add('add', 'Admin\Member::add');
		$routes->add('save', 'Admin\Member::save');
		$routes->add('edit/(:num)', 'Admin\Member::edit/$1');
		$routes->add('update', 'Admin\Member::update');
	});
	$routes->group('officers', function ($routes) {
		$routes->add('/', 'Admin\Officer::index');
		$routes->add('add', 'Admin\Officer::add');
		$routes->add('save', 'Admin\Officer::save');
		$routes->add('edit/(:num)', 'Admin\Officer::edit/$1');
		$routes->add('update', 'Admin\Officer::update');
	});
	$routes->group('book', function ($routes) {
		$routes->add('/', 'Admin\Book::index');
		$routes->add('add', 'Admin\Book::add');
	});
});

// $routes->delete('/admin/user/(:num)', 'Admin\User::delete/$1');
$routes->delete('/officer/(:num)', 'Admin\Officer::delete/$1');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
