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
$routes->setDefaultController('Principal');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/auth', 'Auth::index', ['filter' => 'checkingLogin'] );

$routes->get('/home', 'Principal::index' , ['filter' => 'authGuard']);

//Ruta paises
$routes->get('/paises', 'Paises::index' , ['filter' => 'authGuard']);
$routes->get('eliminados_paises', 'Paises::eliminados' , ['filter' => 'authGuard']);
 
//Ruta departamentos
$routes->get('/departamentos', 'Departamentos::index' , ['filter' => 'authGuard']);
$routes->get('eliminados_dpto', 'Departamentos::eliminados' , ['filter' => 'authGuard']);

$routes->get('/municipios', 'Municipios::index' , ['filter' => 'authGuard']);
$routes->get('eliminados_municipios', 'Municipios::eliminados' , ['filter' => 'authGuard']);


$routes->get('/cargos', 'Cargos::index' , ['filter' => 'authGuard']);
$routes->get('eliminados_cargos', 'Cargos::eliminados' , ['filter' => 'authGuard']);

$routes->get('/empleados', 'Empleados::index' , ['filter' => 'authGuard']);
$routes->get('eliminados_empleados', 'Empleados::eliminados' , ['filter' => 'authGuard']);

$routes->get('/salarios', 'Salarios::index' , ['filter' => 'authGuard']);
$routes->get('eliminados_salarios', 'Salarios::eliminados', ['filter' => 'authGuard'] );

$routes->get('/usuarios', 'Usuarios::index', ['filter' => 'authGuard', 'verifyIsAdmin' ]);



// $routes->get('/inicio', 'Auth::inicio');







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
