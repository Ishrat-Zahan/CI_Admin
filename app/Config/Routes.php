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
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

// product
$routes->get('admin/product', 'Admin\ProductController::index');
$routes->get('admin/product/all', 'Admin\ProductController::all');
$routes->post('admin/product/create', 'Admin\ProductController::create');
$routes->get('admin/product/create', 'Admin\ProductController::create');
$routes->post('admin/product/delete', 'Admin\ProductController::delete');

$routes->get('admin/subcategory', 'Admin\SubcategoryController::index');
$routes->post('admin/subcategory/new', 'Admin\SubcategoryController::create');
$routes->post('admin/subcategory/delete', 'Admin\SubcategoryController::delete');
$routes->get('admin/subcategory/all', 'Admin\SubcategoryController::all');
$routes->get('getsubcat/(:num)', 'Admin\SubcategoryController::subcat/$1');


$routes->get('admin/order', 'Admin\OrderController::index');
$routes->get('admin/order/all', 'Admin\OrderController::all');
$routes->post('admin/order/delete', 'Admin\OrderController::delete');
$routes->get('admin/order/details/(:any)', 'Admin\OrderController::details/$1');
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
