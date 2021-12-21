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
$routes->setDefaultController('User');
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
// $routes->group('', ['filter' => 'user'], function ($routes) {
// 	$routes->get('/', 'User::index');
// 	$routes->get('/koleksi', 'User::readKoleksi');
// 	$routes->get('/admin', 'Admin::index');
// });
$routes->get('/welcome', 'Welcome::index');
$routes->get('/contact', 'Welcome::contact');
$routes->get('/search', 'Welcome::search');
$routes->get('/detail/(:any)', 'Welcome::detail/$1');

$routes->get('/', 'User::index');

$routes->get('/koleksi', 'User::readKoleksi');
$routes->get('/koleksi/(:any)', 'User::detailKoleksi/$1');
$routes->get('/koleksi-add', 'User::addKoleksi');
$routes->post('/koleksi-add', 'User::saveKoleksi');
$routes->get('/koleksi-edit/(:any)', 'User::editKoleksi/$1');
$routes->post('/koleksi-edit', 'User::updateKoleksi');
$routes->get('/koleksi-delete/(:any)', 'User::deleteKoleksi/$1');

$routes->get('/laporan', 'User::readLaporanKoleksi');
$routes->get('/laporan-add', 'User::addLaporanKoleksi');
$routes->get('/laporan-add/(:any)', 'User::addLaporanKoleksi/$1');
$routes->post('/laporan-add', 'User::saveLaporanKoleksi');
$routes->get('/laporan-edit/(:num)', 'User::editLaporanKoleksi/$1');
$routes->post('/laporan-edit', 'User::updateLaporanKoleksi');
$routes->get('/laporan-delete/(:num)', 'User::deleteLaporanKoleksi/$1');

$routes->get('/profile', 'User::profileUser');
$routes->post('/profile-edit', 'User::profileEdit');
$routes->post('/profile-edit-image', 'User::profileEditImage');
$routes->post('/profile-edit-password', 'User::profileEditPassword');

$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);

$routes->get('/admin/kolektor', 'Admin::readKolektor', ['filter' => 'role:admin']);
$routes->post('/admin/kolektor-manage', 'Admin::manageKolektor', ['filter' => 'role:admin']);
$routes->get('/admin/kolektor-profile/(:num)', 'Admin::profileKolektor/$1', ['filter' => 'role:admin']);

$routes->get('/admin/allkoleksi', 'Admin::readKoleksi', ['filter' => 'role:admin']);
$routes->get('/admin/allkoleksi/(:any)', 'Admin::detailKoleksi/$1', ['filter' => 'role:admin']);

$routes->get('/admin/kategori', 'Admin::readKategori', ['filter' => 'role:admin']);
$routes->post('/admin/kategori-add', 'Admin::saveKategori', ['filter' => 'role:admin']);
$routes->post('/admin/kategori-edit', 'Admin::updateKategori', ['filter' => 'role:admin']);
// $routes->get('/admin/kategori-delete/(:num)', 'Admin::deleteKategori/$1', ['filter' => 'role:admin']);

$routes->get('/admin/tag', 'Admin::readTag', ['filter' => 'role:admin']);
$routes->post('/admin/tag-add', 'Admin::saveTag', ['filter' => 'role:admin']);
$routes->post('/admin/tag-edit', 'Admin::updateTag', ['filter' => 'role:admin']);
$routes->get('/admin/tag-delete/(:num)', 'Admin::deleteTag/$1', ['filter' => 'role:admin']);
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
