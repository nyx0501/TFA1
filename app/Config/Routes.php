<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Landing page
$routes->get('/', 'Pages::index');

// About page
$routes->get('/about', 'Pages::about');

// Customer Accounts page (static array data source)
$routes->get('/customers', 'Customers::index');
$routes->get('/customers/new', 'Customers::new');
$routes->post('/customers/create', 'Customers::create');
$routes->get('/customers/edit/(:num)', 'Customers::edit/$1');
$routes->post('/customers/update/(:num)', 'Customers::update/$1');

// User Accounts page (static array data source)
$routes->get('/users', 'Users::index');
$routes->get('/customers/new', 'Customers::new');
$routes->get('/customers/create', 'Customers::create');
$routes->get('/customers/edit/(:num)', 'Customers::edit/$1');
$routes->get('/customers/update/(:num)', 'Customers::update/$1');
