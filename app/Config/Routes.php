<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
// $routes->get('/', 'Hello::index');
// $routes->get('users', 'UserController::index');
// $routes->get('/home', 'Home::index');

$routes->get('/', function () {
    return redirect()->to(base_url('login'));
});
$routes->get('/addUser', 'UserController::store');
$routes->get('getPrintings', 'PrintingController::getPrintings');
$routes->get('getTable', 'PrintingController::getTable');
$routes->get('db', 'PrintingController::db');

// user
$routes->group('user', ['filter' => 'authGuard'], static function ($routes) {

    // view
    $routes->get('/', 'UserController::index');
    $routes->get('dashboard', 'UserController::dashboard');
    $routes->get('printing', 'UserController::printing');
    $routes->get('laminating', 'UserController::laminating');
    $routes->get('slitting', 'UserController::slitting');

    // data fetch (getAll)
    $routes->get('getPrintings', 'UserController::getPrintings');
    $routes->get('getLaminatings', 'UserController::getLaminatings');
    $routes->get('getSlittings', 'UserController::getSlittings');

    // data fetch (getOne)
    $routes->get('getPrinting/(:num)', 'UserController::getPrinting/$1');
    $routes->get('getLaminating/(:num)', 'UserController::getLaminating/$1');
    $routes->get('getSlitting/(:num)', 'UserController::getSlitting/$1');

    // data insert
    $routes->post('printing/add', 'UserController::addPrinting');
    $routes->post('laminating/add', 'UserController::addLaminating');
    $routes->post('slitting/add', 'UserController::addSlitting');

    // data update
    $routes->post('printing/(:num)', 'UserController::updatePrinting/$1');
    $routes->post('laminating/(:num)', 'UserController::updateLaminating/$1');
    $routes->post('slitting/(:num)', 'UserController::updateSlitting/$1');

    // data delete
    $routes->delete('printing/(:num)', 'UserController::deletePrinting/$1');
    $routes->delete('laminating/(:num)', 'UserController::deleteLaminating/$1');
    $routes->delete('slitting/(:num)', 'UserController::deleteSlitting/$1');
});

// admin
$routes->group('admin', ['filter' => 'authGuard'], static function ($routes) {
    $routes->get('/', 'AdminController::index');
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->get('printing', 'AdminController::printing');
    $routes->get('laminating', 'AdminController::laminating');
    $routes->get('slitting', 'AdminController::slitting');
    $routes->post('printing/add', 'PrintingController::insertData');


    // data fetch (getAll)
    $routes->get('getPrintings', 'AdminController::getPrintings');
    $routes->get('getLaminatings', 'AdminController::getLaminatings');
    $routes->get('getSlittings', 'AdminController::getSlittings');
});

$routes->match(['get', 'post'], 'loginUser', 'LoginController::loginUser', ['filter' => 'noAuthGuard']);
$routes->match(['get', 'post'], 'loginAdmin', 'LoginController::loginAdmin', ['filter' => 'noAuthGuard']);
$routes->get('/login', 'LoginController::index', ['filter' => 'noAuthGuard']);
// $routes->get('/profile', 'ProfileController::index', ['filter' => 'authGuard']);
$routes->get('/logout', 'LoginController::logout');


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
