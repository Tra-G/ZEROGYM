<?php

// Define the routes
$routes = array(
    // Homepage
    '|^$|' => array(
        'controller' => 'homeController',
        'action' => 'index',
        'view' => 'index'
    ),

    // Other pages
    '|^about$|' => array(
        'controller' => 'homeController',
        'action' => 'about',
        'view' => 'about'
    ),
    '|^contact$|' => array(
        'controller' => 'homeController',
        'action' => 'contact',
        'view' => 'contact'
    ),

    // Blog
    '|^blog$|' => array(
        'controller' => 'blogController',
        'action' => 'index',
        'view' => 'blog/index'
    ),
    '|^blog/(\d+)$|' => array(
        'controller' => 'blogController',
        'action' => 'showPost',
        'view' => 'blog/single'
    ),

    // User authentication
	'|^login$|' => array(
        'controller' => 'authController',
        'action' => 'login',
        'view' => 'auth/login'
    ),
    '|^register$|' => array(
        'controller' => 'authController',
        'action' => 'register',
        'view' => 'auth/register'
    ),
    '|^logout$|' => array(
        'controller' => 'authController',
        'action' => 'logout',
        'view' => 'auth/logout'
    ),

    // User
    '|^user/dashboard$|' => array(
        'controller' => 'userController',
        'action' => 'index',
        'view' => 'user/index'
    ),

    // Admin
    '|^admin/dashboard$|' => array(
        'controller' => 'adminController',
        'action' => 'index',
        'view' => 'admin/index'
    ),
    '|^admin/users$|' => array(
        'controller' => 'adminController',
        'action' => 'allUsers',
        'view' => 'admin/allusers'
    ),

);

// Get the requested URL
$url = isset($_GET['url']) ? $_GET['url'] : '';

// Check if the requested URL is valid
$route = null;
foreach ($routes as $pattern => $routeConfig) {
    if (preg_match($pattern, $url, $matches)) {
        array_shift($matches); // Remove the full match from the matches array
        $route = $routeConfig;
        break;
    }
}

if ($route) {
    // If the URL is valid, redirect to the appropriate controller and action
    $controller = $route['controller'];
    $action = $route['action'];
    $view = $route['view'];

    include_once('controllers/' . $controller . '.php');
    $controller = new $controller();
    if (method_exists($controller, $action)) {
        // If the action exists in the controller, execute it and pass the arguments
        $data = $controller->$action(...$matches);
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