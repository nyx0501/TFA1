<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Landing page
$routes->get('/', 'Pages::index');

// About page
$routes->get('/about', 'Pages::about');

// Customer Accounts page (static array data source)
$routes->get('/customers', 'Customers::index');

// User Accounts page (static array data source)
$routes->get('/users', 'Users::index');
