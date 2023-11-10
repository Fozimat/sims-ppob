<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/registration', 'Registration::register');
$routes->get('/login', 'Registration::login');
$routes->get('/homepage', 'HomePage::index');
$routes->get('/topup', 'TopUp::index');
