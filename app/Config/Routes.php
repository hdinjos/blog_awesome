<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->add('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->group('admin', ['filter' => 'authGuard'], function ($routes) { //middleware auth
    $routes->get('', 'Admin\AdminHome::index');
    $routes->group('articles', function ($routes) {
        $routes->get('', 'Admin\AdminArticle::index');
        $routes->add('create', 'Admin\AdminArticle::create');
        $routes->add('delete/(:num)', 'Admin\AdminArticle::destroy/$1');
        $routes->add('edit/(:num)', 'Admin\AdminArticle::update/$1');
    });
    $routes->group('categories', function ($routes) {
        $routes->get('', 'Admin\AdminCategory::index');
        $routes->add('create', 'Admin\AdminCategory::create');
        $routes->add('delete/(:num)', 'Admin\AdminCategory::destroy/$1');
    });
    $routes->group('users', ['filter' => 'roleGuard'], function ($routes) { //middleware auth not admin
        $routes->get('', 'Admin\AdminUser::index');
        $routes->add('create', 'Admin\AdminUser::create');
        $routes->add('delete/(:num)', 'Admin\AdminUser::destroy/$1');
        $routes->add('edit/(:num)', 'Admin\AdminUser::update/$1');
    });
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
