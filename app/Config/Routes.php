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
$routes->get('login', 'Login::index');






// Route for displaying the registration form (GET request)
$routes->get('register', 'Register::index');

// Route for processing the registration form submission (POST request)
$routes->post('register', 'Register::submit');


