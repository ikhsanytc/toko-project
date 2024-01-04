<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/detail/(:segment)/(:any)', 'Home::detail_product/$1/$2');
$routes->get('/login', 'Home::login');
$routes->post('/login', 'Home::loginProcess');
$routes->get('/register', 'Home::register');
$routes->get('/produk', 'Home::produk');
$routes->get('/keranjang', 'Home::keranjang');
$routes->post('/keranjang', 'Home::keranjangProcess');
$routes->delete('/cancelPay', 'Home::cancelPay');
$routes->get('/pay/(:any)/(:any)/(:any)', 'Home::payTransaction/$1/$2/$3');
$routes->get('/pay/(:any)/(:any)', 'Home::pay/$1/$2');
$routes->post('/payProcess', 'Home::payProcess');
$routes->get('/transaction', 'Home::transaction');
$routes->get('/transaction/(:any)/(:any)', 'Home::transactionDetail/$1/$2');
$routes->get('/transaction/pay/(:any)/(:any)', 'Home::pay/$1/$2');
$routes->post('/payProcess/pending', 'Home::payProcessPending');
