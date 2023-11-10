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
$routes->get('/transaction', 'Transaction::index/$1');
$routes->get('/transaction/history', 'Transaction::history');
$routes->get('/akun', 'Akun::index');
