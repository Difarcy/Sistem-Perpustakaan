<?php namespace Config;

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
$routes->setDefaultController('Login');
// $routes->setDefaultController('GuestView');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Route utama
$routes->get('/', 'Login::index');
$routes->get('login', 'Login::index');
$routes->post('login', 'Login::login');
$routes->post('login/auth', 'Login::login');
$routes->get('login/logout', 'Login::logout');

// Books
$routes->get('books', 'Books::index');
$routes->get('books/detail/(:num)', 'Books::detail/$1');
$routes->get('books/edit/(:num)', 'Books::edit/$1');
$routes->post('books/update/(:num)', 'Books::update/$1');
$routes->get('books/delete/(:num)', 'Books::delete/$1');
$routes->get('books/add', 'Books::add');
$routes->post('books/add', 'Books::add');
$routes->get('books/detailisbn/(:any)', 'Books::detailIsbn/$1');
$routes->get('books/editisbn/(:any)', 'Books::editIsbn/$1');
$routes->post('books/updateisbn', 'Books::updateIsbn');
$routes->get('byisbn', 'Books::byIsbn');
$routes->get('bylost', 'Books::byLost');
$routes->get('byscrap', 'Books::byScrap');

// Dashboard
$routes->get('dashboard', 'Dashboard::index');

// Denda
$routes->get('denda', 'Denda::index');
$routes->get('denda/detail/(:num)', 'Denda::detail/$1');
$routes->get('denda/bayar/(:num)', 'Denda::bayar/$1');
$routes->post('denda/savebayar/(:num)', 'Denda::saveBayar/$1');

// GuestView
$routes->get('guestview', 'GuestView::index');

// Home
$routes->get('home', 'Home::index');

// MyProfile
$routes->get('myprofile', 'MyProfile::index');
$routes->post('myprofile/edit/(:num)', 'MyProfile::edit/$1');

// Peminjaman
$routes->get('peminjaman', 'Peminjaman::index');
$routes->get('peminjaman/detail/(:num)', 'Peminjaman::detail/$1');
$routes->get('peminjaman/add', 'Peminjaman::add');
$routes->post('peminjaman/add', 'Peminjaman::add');
$routes->get('peminjaman/delete/(:num)', 'Peminjaman::delete/$1');
$routes->get('peminjaman/pengembalian/(:num)', 'Peminjaman::pengembalian/$1');
$routes->post('peminjaman/savepengembalian/(:num)', 'Peminjaman::savePengembalian/$1');
$routes->get('riwayat', 'Peminjaman::riwayat');

// Pengembalian
$routes->get('pengembalian', 'Pengembalian::index');
$routes->get('pengembalian/detail/(:num)', 'Pengembalian::detail/$1');

// Staff
$routes->get('staff', 'Staff::index');
$routes->get('staff/addstaff', 'Staff::addStaff');
$routes->post('staff/add', 'Staff::add');
$routes->get('staff/detail/(:num)', 'Staff::detail/$1');
$routes->get('staff/delete/(:num)', 'Staff::delete/$1');
$routes->get('staff/edit/(:num)', 'Staff::edit/$1');
$routes->post('staff/update/(:num)', 'Staff::update/$1');

// Users
$routes->get('users', 'Users::index');
$routes->get('users/adduser', 'Users::addUser');
$routes->post('users/add', 'Users::add');
$routes->get('users/detail/(:num)', 'Users::detail/$1');
$routes->get('users/delete/(:num)', 'Users::delete/$1');
$routes->get('users/edit/(:num)', 'Users::edit/$1');
$routes->post('users/update/(:num)', 'Users::update/$1');

// Katalog
$routes->get('katalog', 'Books::index');

/**
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
