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
$routes->get('/', 'Auth::index');
$routes->get('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->get('/logout', 'Auth::logout');
$routes->get('/notification/item/get', 'Notification::getJsonItemInUserNotification');



$routes->group('admin', function ($routes) {
	$routes->add('/', 'Admin\Dashboard::index');
	$routes->add('dashboard', 'Admin\Dashboard::index');
	// admin/member
	$routes->group('members', function ($routes) {
		$routes->add('/', 'Admin\Member::index');
		$routes->add('add', 'Admin\Member::add');
		$routes->add('save', 'Admin\Member::save');
		$routes->add('edit/(:num)', 'Admin\Member::edit/$1');
		$routes->add('detail/(:num)', 'Admin\Member::detail/$1');
		$routes->add('update', 'Admin\Member::update');
	});
	$routes->group('officers', function ($routes) {
		$routes->add('/', 'Admin\Officer::index');
		$routes->add('add', 'Admin\Officer::add');
		$routes->add('save', 'Admin\Officer::save');
		$routes->add('edit/(:num)', 'Admin\Officer::edit/$1');
		$routes->add('detail/(:num)', 'Admin\Officer::detail/$1');
		$routes->add('update', 'Admin\Officer::update');
	});
	$routes->group('book', function ($routes) {
		$routes->add('/', 'Admin\Book::index');
		$routes->add('add', 'Admin\Book::add');
		$routes->add('save', 'Admin\Book::save');
		$routes->add('detail/(:num)', 'Admin\Book::detail/$1');
		$routes->add('edit/(:num)', 'Admin\Book::edit/$1');
		$routes->add('update', 'Admin\Book::update');
		$routes->group('item', function ($routes) {
			$routes->add('add/(:num)', 'Admin\Book::addItem/$1');
			$routes->add('save', 'Admin\Book::saveItem');
			$routes->add('edit/(:num)', 'Admin\Book::editItem/$1');
			$routes->add('update', 'Admin\Book::updateItem');
		});
		$routes->group('category', function ($routes) {
			$routes->add('/', 'Admin\Category::index');
			$routes->add('add', 'Admin\Category::add');
			$routes->add('edit/(:num)', 'Admin\Category::edit/$1');
			$routes->add('save', 'Admin\Category::save');
			$routes->add('update', 'Admin\Category::update');
		});
	});
	$routes->group('ebook', function ($routes) {
		$routes->add('/', 'Admin\Ebook::index');
		$routes->add('add', 'Admin\Ebook::add');
		$routes->add('save', 'Admin\Ebook::save');
		$routes->add('detail/(:num)', 'Admin\Ebook::detail/$1');
		$routes->add('edit/(:num)', 'Admin\Ebook::edit/$1');
		$routes->add('update', 'Admin\Ebook::update');
	});

	$routes->group('kelas', function ($routes) {
		$routes->add('/', 'Admin\Kelas::index');
	});
	$routes->group('rombel', function ($routes) {
		$routes->add('/', 'Admin\Rombel::index');
	});
	$routes->group('fine', function ($routes) {
		$routes->add('/', 'Admin\Fine::index');
		$routes->add('update', 'Admin\Fine::update');
	});
	$routes->group('borrowing', function ($routes) {
		$routes->add('/', 'Admin\Borrowing::index');
		$routes->add('detail/(:any)', 'Admin\Borrowing::detail/$1');
		$routes->add('history', 'Admin\Borrowing::history');
	});
	$routes->group('transaction', function ($routes) {
		$routes->add('/', 'Admin\Transaction::index');
		$routes->add('save', 'Admin\Transaction::save');
		$routes->add('returnbook/(:num)', 'Admin\Transaction::returnBook/$1');
		$routes->add('extend/(:num)', 'Admin\Transaction::extend/$1');
		$routes->add('lost/(:num)', 'Admin\Transaction::lost/$1');
		$routes->add('lostbook', 'Admin\Transaction::lostBook');
		$routes->group('return', function ($routes) {
			$routes->add('/', 'Admin\Transaction::return');
			$routes->add('result', 'Admin\Transaction::returnResult');
		});

	});
});

$routes->group('user', function ($routes) {
	$routes->add('/', 'User\Dashboard::index');
	$routes->group('profile', function ($routes) {
		$routes->add('(:num)', 'User\Profile::index/$1');
		$routes->add('edit/(:num)', 'User\Profile::edit/$1');
		$routes->add('update', 'User\Profile::update');
	});
	$routes->group('book', function ($routes) {
		$routes->add('/', 'User\Book::index');
		$routes->add('detail/(:num)', 'User\Book::detail/$1');
	});
	$routes->group('ebook', function ($routes) {
		$routes->add('/', 'User\Ebook::index');
		$routes->add('detail/(:num)', 'User\Ebook::detail/$1');
	});

	$routes->group('request', function ($routes) {
		$routes->add('', 'User\Request::index');
		$routes->add('save', 'User\Request::save');
	});
	$routes->group('transaction', function ($routes) {
		$routes->add('', 'User\Transaction::index');
	});
});


// $routes->delete('/admin/user/(:num)', 'Admin\User::delete/$1');
$routes->delete('/officer/(:num)', 'Admin\Officer::delete/$1');
$routes->delete('/member/(:num)', 'Admin\Member::delete/$1');
$routes->delete('/book/(:num)', 'Admin\Book::delete/$1');
$routes->delete('/book/item/(:num)', 'Admin\Book::deleteItem/$1');
$routes->delete('/ebook/(:num)', 'Admin\Ebook::delete/$1');
$routes->delete('/admin/book/category/(:num)', 'Admin\Category::delete/$1');
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
