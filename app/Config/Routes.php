<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');


$routes->get('personalcare', 'Personalcare::index');
$routes->get('disinfectingcream', 'Disinfectingcream::index');

$routes->get('firstaidkit', 'Firstaidkit::index');


$routes->get('login', 'UserController::login');
$routes->post('login/submit', 'UserController::loginUser');


$routes->get('register', 'UserController::register');

$routes->post('register/submit', 'UserController::registerUser');

$routes->get('map', 'MapController::index');





$routes->get('medicine', 'MedicineController::index');
$routes->get('medicine/search', 'MedicineController::search');

$routes->get('/pain', 'PainController::index');

$routes->get('/pain/search', 'PainController::search');
$routes->post('/pain/save', 'PainController::save');
