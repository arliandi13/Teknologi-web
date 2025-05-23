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

// Dashboard user and admin
$routes->get('/dbadmin', 'Dashboard\Dashboard::dbadmin');
$routes->get('/dbuser', 'Dashboard\DashboardUser::dbuser');


// Route ke halaman forum
$routes->get('/forum', 'Forum::index');
$routes->get('/forum/create', 'Forum::create');
$routes->post('/forum/store', 'Forum::store');
$routes->get('/forum/detail/(:num)', 'Forum::detail/$1');
$routes->post('/forum/reply/(:num)', 'Forum::reply/$1');

// Sudah ada sebelumnya, opsional sorting
$routes->get('forum/search', 'Forum::search');

// tabel pengguna
$routes->get('/userspengguna', 'UserController::index');
$routes->get('/edit', 'UserProfileController::edit');
$routes->post('/update', 'UserProfileController::update');


$routes->group('message', function($routes) {
    $routes->get('users', 'MessageController::users');                 // daftar user
    $routes->get('chat/(:num)', 'MessageController::chat/$1');        // halaman chat
    $routes->post('sendMessage', 'MessageController::sendMessage');   // kirim pesan
});

//pelaporan
$routes->post('/report/submit', 'ReportController::submit');
$routes->post('/admin/report/updateStatus', 'AdminController::updateReportStatus');

$routes->get('/admin/reports', 'AdminController::reports');
$routes->post('/admin/report/updateStatus', 'AdminController::updateReportStatus');
$routes->get('topic/(:num)', 'Forum::detail/$1');









// Route ke halaman utama
$routes->get('/', 'Auth::login');

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
