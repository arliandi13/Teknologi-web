<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Route ke halaman login and register
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attemptLogin');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::attemptRegister');
$routes->get('/logout', 'Auth::logout');

// Dashboard Admin and admin
$routes->get('/admin', 'Dashboard\Dashboard::dbadmin');
$routes->get('/user', 'Dashboard\DashboardUser::dbuser');

// Route ke halaman forum
$routes->get('/forum', 'Forum::index');
$routes->get('/forum/create', 'Forum::create');
$routes->post('/forum/store', 'Forum::store');
$routes->get('/forum/detail/(:num)', 'Forum::detail/$1');
$routes->post('/forum/reply/(:num)', 'Forum::reply/$1');

// Route ke halaman utama
$routes->get('/index', 'Home::index');

// Route ke halaman Profile
$routes->get('/profile', 'ProfileBase::profile');

// Route ke halaman forum
$routes->get('/forum', 'ForumPost::forum');

// Route ke halaman forum
$routes->get('/dashboarduser', 'DashboardUser::Dbuser');

// Route ke halaman update user
$routes->get('/dashboard', 'Dashboard::views');

// Route ke halaman update user
$routes->get('/admin', 'AdminController::admincontroller');
