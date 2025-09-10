<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/hello', 'Home::index');
$routes->get('/dosen', 'Dosen::display');
$routes->get('/login', 'AuthController::show_login');
$routes->post('/login', 'AuthController::login');
$routes->get('/berita', function () {
    return view('berita');
});

$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'HelloWorld::index');
    $routes->resource('/mahasiswa', ['controller' => 'MahasiswaController']);
    $routes->get('/logout', 'AuthController::logout');
}); 
