<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


// Route untuk halaman login dan register
$routes->get('/login', 'Auth::showLogin');
$routes->get('/register', 'Auth::showRegister');

// Route untuk proses login dan register
$routes->post('/login', 'Auth::login');
$routes->post('/register', 'Auth::register');

// Route ke halaman utama
$routes->get('/index', 'Home::index');

// Route ke halaman Profile
$routes->get('/profile', 'ProfileBase::profile');

// Route ke halaman forum
$routes->get('/forum', 'ForumPost::forum');

// Route ke halaman update user
$routes->get('/updateuser', 'UserController::updateuser');

// Route ke halaman update user
$routes->get('/admin', 'AdminController::admincontroller');
