<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'User::index');
$routes->get('/user', 'User::index');
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);

$routes->get('/user/index', 'User::index' );

$routes->get('/profile/myprofile', 'Profile::index' );

$routes->get('/profile/edit', 'Profile::edit' );

$routes->post('/profile/update', 'Profile::update' );

$routes->get('/dashboard/index', 'Home::dash' );


// $routes->get('/dashboard/write', 'Home::write' );
//product
// $routes->get('/product/create', 'ProductController::create');
// $routes->get('/product/edit', 'ProductController::edit');
// $routes->post('/product/store', 'ProductController::store');



// $routes->post('/user/update', 'User::update');


// $routes->get('/register', 'Home::register');
// $routes->get('/forgot', 'Home::forgot');
// $routes->get('/user', 'Home::user');
