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
//$routes->get('login', 'Login::index');
//$routes->get('register', 'UserRegister::index');


$routes->get('map', 'MapController::index');


$routes->get('/', 'Home::index'); // Home page (welcome_message.php)
$routes->get('/register', 'UserRegister::index'); // Show registration form
$routes->post('/register/submit', 'UserRegister::submit'); // Handle form submission

$routes->get('/login', 'UserRegister::submit'); 
$routes->get('medicine', 'MedicineController::index');
$routes->get('medicine/search', 'MedicineController::search');




