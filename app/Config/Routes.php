<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Setup Routes
$routes->get('setup', 'Setup::index');
$routes->get('setup/seed', 'Setup::seed');

// Boards Routes (Tempat kumpulan Looks)
$routes->get('boards', 'BoardController::index');
$routes->post('boards', 'BoardController::create');
$routes->get('boards/(:num)', 'BoardController::show/$1');
$routes->get('boards/search', 'BoardController::searchBoards');

// Looks Routes (Dulu Pins)
$routes->get('looks/search', 'BoardController::searchLooks'); // Ganti searchPins jadi searchLooks
$routes->post('boards/(:num)/looks', 'BoardController::addLook/$1'); // Ganti addPin jadi addLook

// API Routes
$routes->group('api', function($routes) {
    $routes->get('looks', 'ApiController::getAllLooks');        // URL: /api/looks
    $routes->get('look/(:num)', 'ApiController::getLookDetail/$1'); // URL: /api/look/1
});