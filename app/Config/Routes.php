<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');
$routes->get('generalmeds', 'Generalmeds::index');
$routes->get('personalcare', 'Personalcare::index');
$routes->get('disinfectingcream', 'Disinfectingcream::index');

$routes->get('firstaidkit', 'Firstaidkit::index');



$routes->get('map', 'MapController::index');


$routes->get('/', 'Home::index'); // Home page (welcome_message.php)


$routes->get('medicine', 'MedicineController::index');
$routes->get('medicine/search', 'MedicineController::search');




//$routes->get('/register', 'UserController::register');
//$routes->post('/register', 'UserController::registerUser');

//$routes->get('/login', 'UserController::login');
//$routes->post('/login', 'UserController::loginUser');

//$routes->get('/logout', 'UserController::logout');


$routes->get('/', 'Home::index');
$routes->get('login', 'UserController::login');
$routes->post('login/submit', 'UserController::loginUser');
$routes->get('register', 'UserController::register');
$routes->post('register/submit', 'UserController::registerUser');

