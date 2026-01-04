<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('setup', 'Setup::index');
$routes->get('boards', 'BoardController::index');
$routes->post('boards', 'BoardController::create');
$routes->get('boards/(:num)', 'BoardController::show/$1');
$routes->post('boards/(:num)/pins', 'BoardController::addPin/$1');
$routes->get('boards/search', 'BoardController::searchBoards');
$routes->get('pins/search', 'BoardController::searchPins');
$routes->get('setup', 'Setup::index');
$routes->get('setup/seed', 'Setup::seed');
$routes->group('api', function($routes) {
    $routes->get('pins', 'ApiController::getAllPins');       // URL: /api/pins
    $routes->get('pin/(:num)', 'ApiController::getPinDetail/$1'); // URL: /api/pin/1
});
