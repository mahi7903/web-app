<p align="center">
  <h1 align="center">Mahi Pharmacy</h1>
  <p align="center">
    MVC Architecture • API Integration • Location-Based Search • Secure Routing
  </p>
</p>

---

## Project Overview

Mahi Pharmacy is a full-stack web application built using CodeIgniter 4 following the MVC architectural pattern. The system simulates an online pharmacy platform with live medicine search, postcode-based pharmacy location lookup, user authentication, and database-driven functionality.

The application demonstrates structured backend logic, third-party API integration, controlled routing, and dynamic frontend behaviour within a clean and maintainable framework setup.

---

## Technical Highlights

- Built using CodeIgniter 4 (MVC structure)
- Integrated 2 external APIs (OpenFDA + Google Maps/Places)
- Implemented 10+ defined application routes
- Developed 4 custom controllers
- Built dynamic AJAX-based medicine search
- Implemented user registration and login system
- Added server-side filtering and database save functionality
- Applied dark/light theme support
- Structured for scalability and clean separation of concerns

---

## Application Architecture

### Controllers Implemented

- UserController
- MedicineController
- PainController
- MapController

### MVC Structure

~~~
app/
 ├── Config/
 ├── Controllers/
 ├── Models/
 ├── Views/
public/
writable/
tests/
~~~

The project maintains proper separation:

- Controllers handle business logic and request processing  
- Models manage database interaction  
- Views render frontend content  
- Routes centralize endpoint definitions  

---

## External API Integrations

### OpenFDA Drug Label API

Used for live medicine search functionality.

Features:
- Retrieves medicine purpose
- Retrieves side effects
- Supports live autocomplete suggestions
- AJAX-powered result rendering
- Option to save medicine data locally

---

### Google Maps & Places API

Used for postcode-based pharmacy location search.

Features:
- Nearby pharmacy search
- Dynamic map rendering
- Postcode lookup
- localStorage-based recent search history
- Dark and light mode compatibility

---

## Routing Structure

~~~
$routes->get('/', 'Home::index');

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
~~~

The routing setup clearly separates GET and POST requests and ensures structured request handling at the controller level.

---

## Authentication System

- User registration with validation
- Login processing via POST routes
- Session-based access control
- Controller-managed authentication flow

The authentication system demonstrates secure handling of user input and structured route protection.

---

## Medicine Search System

The medicine search module includes:

- Live AJAX search
- Autocomplete suggestions
- API-driven data retrieval
- Server-side filtering logic
- Database save functionality
- Responsive Bootstrap interface
- Dark mode UI support

---

## Location-Based Pharmacy Finder

- Postcode-based search
- Google Places integration
- Dynamic map rendering
- Local storage for recent searches
- Theme adaptation for UI consistency

---

## Database Design

Example medicine table structure:

~~~
id             INT (Primary Key)
name           VARCHAR(255)
purpose        TEXT
side_effects   TEXT
image_url      VARCHAR(511)
~~~

Database operations are handled through a model, ensuring clean separation between business logic and data access.

---

## Technology Stack

Backend:
- PHP 8.1+
- CodeIgniter 4

Database:
- MySQL

Frontend:
- Bootstrap 5
- JavaScript (AJAX, DOM manipulation)

External Services:
- OpenFDA Drug Label API
- Google Maps & Places API

Testing:
- PHPUnit

---

## Project Metrics

Custom Controllers: 4  
API Integrations: 2  
Defined Routes: 10+  
Authentication Flows: 2 (Register and Login)  
Database-Driven Modules: 1+  
AJAX Implementations: Multiple  

---

## Installation

### Clone Repository

~~~
git clone https://github.com/mahi7903/web-app
cd web-app
~~~

### Install Dependencies

~~~
composer install
~~~

### Configure Environment (.env)

~~~
app.baseURL = 'http://localhost/'
database.default.database = pharmacy
database.default.username = root
database.default.password =
~~~

### Run Local Server

~~~
php -S localhost:8080 -t public
~~~

Visit:

~~~
http://localhost:8080/
~~~

---

## What This Project Demonstrates

- Ability to build structured MVC applications
- Experience integrating external APIs into production-style systems
- Clean route management and controller logic
- Database-driven backend functionality
- Combination of server-side processing and client-side interactivity
- Maintainable application architecture using modern PHP practices

---

## Notes

- Built using the official CodeIgniter 4 starter framework.
- Custom controllers, routes, business logic, and integrations were implemented independently.
- API keys are excluded from the repository for security reasons.

---

Author  
Mahi Chudela  
Software Developer  
United Kingdom
