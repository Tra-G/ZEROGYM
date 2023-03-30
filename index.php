<?php

// Define the routes
$routes = array(
    // Homepage
    '' => array(
        'controller' => 'homeController',
        'action' => 'index',
        'view' => 'index'
    ),

    // Other pages
    'about' => array(
        'controller' => 'homeController',
        'action' => 'about',
        'view' => 'about'
    ),
    'contact' => array(
        'controller' => 'homeController',
        'action' => 'contact',
        'view' => 'contact'
    ),

    // Blog
    'blog' => array(
        'controller' => 'blogController',
        'action' => 'index',
        'view' => 'blog/index'
    ),

    // User authentication
    'login' => array(
        'controller' => 'authController',
        'action' => 'login',
        'view' => 'auth/login'
    ),
    'register' => array(
        'controller' => 'authController',
        'action' => 'register',
        'view' => 'auth/register'
    ),
    'logout' => array(
        'controller' => 'authController',
        'action' => 'logout',
        'view' => 'auth/logout'
    ),

    // User dashboard
    'user/dashboard' => array(
        'controller' => 'userController',
        'action' => 'index',
        'view' => 'user/index'
    ),
);

// Get the requested URL
$url = isset($_GET['url']) ? $_GET['url'] : '';

// Check if the requested URL is valid
if (array_key_exists($url, $routes)) {
    // If the URL is valid, redirect to the appropriate controller and action
    $route = $routes[$url];
    $controller = $route['controller'];
    $action = $route['action'];
    $view = $route['view'];

    include_once('controllers/' . $controller . '.php');
    $controller = new $controller();
    if (method_exists($controller, $action)) {
        // If the action exists in the controller, execute it
        $data = $controller->$action();
        if (isset($data)) {
            // If the action returns data, extract it for use in the view
            extract($data);
        }
        // Load the appropriate view for the action
        include_once('views/' . $view . '.php');
    } else {
        // If the action does not exist in the controller, redirect to the 404 page
        include_once('views/404.php');
    }
} else {
    // If the URL is not valid, redirect to the 404 page
    include_once('views/404.php');
}

?>