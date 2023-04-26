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
    '|^about/?$|' => array(
        'controller' => 'homeController',
        'action' => 'about',
        'view' => 'about'
    ),
    '|^contact/?$|' => array(
        'controller' => 'homeController',
        'action' => 'contact',
        'view' => 'contact'
    ),

    // Blog
    '|^blog/?$|' => array(
        'controller' => 'blogController',
        'action' => 'index',
        'view' => 'blog/index'
    ),
    '|^blog/(\d+)/?$|' => array(
        'controller' => 'blogController',
        'action' => 'showPost',
        'view' => 'blog/single'
    ),

    // User authentication
	'|^login/?$|' => array(
        'controller' => 'authController',
        'action' => 'login',
        'view' => 'auth/login'
    ),
    '|^register/?$|' => array(
        'controller' => 'authController',
        'action' => 'register',
        'view' => 'auth/register'
    ),
    '|^logout/?$|' => array(
        'controller' => 'authController',
        'action' => 'logout',
        'view' => 'auth/logout'
    ),

    // User
    '|^user/dashboard/?$|' => array(
        'controller' => 'userController',
        'action' => 'index',
        'view' => 'user/index'
    ),
    '|^user/plan/cancel/?$|' => array(
        'controller' => 'userController',
        'action' => 'cancelPlan',
        'view' => 'user/cancel'
    ),
    '|^user/gym/view/?$|' => array(
        'controller' => 'userController',
        'action' => 'gymView',
        'view' => 'user/gym'
    ),
    '|^user/gym/select/?$|' => array(
        'controller' => 'userController',
        'action' => 'gymSelect',
        'view' => 'user/select'
    ),
    '|^user/profile/?$|' => array(
        'controller' => 'userController',
        'action' => 'profile',
        'view' => 'user/profile'
    ),
    '|^user/change/password/?$|' => array(
        'controller' => 'userController',
        'action' => 'password',
        'view' => 'user/password'
    ),

    // User Payment (Stripe)
    '|^user/pay/?$|' => array(
        'controller' => 'paymentController',
        'action' => 'index',
        'view' => 'user/payment/index'
    ),
    '|^user/pay/(\d+)/?$|' => array(
        'controller' => 'paymentController',
        'action' => 'payInit',
        'view' => 'user/payment/init'
    ),
    '|^user/pay/(\d+)/confirm/?$|' => array(
        'controller' => 'paymentController',
        'action' => 'payConfirm',
        'view' => 'user/payment/confirm'
    ),

    // Admin
    '|^admin/dashboard/?$|' => array(
        'controller' => 'adminController',
        'action' => 'index',
        'view' => 'admin/index'
    ),

    // Admin - User Management
    '|^admin/users/?$|' => array(
        'controller' => 'adminController',
        'action' => 'userIndex',
        'view' => 'admin/users/index'
    ),
    '|^admin/users/(\d+)/?$|' => array(
        'controller' => 'adminController',
        'action' => 'userView',
        'view' => 'admin/users/view'
    ),
    '|^admin/users/(\d+)/edit/?$|' => array(
        'controller' => 'adminController',
        'action' => 'userEdit',
        'view' => 'admin/users/edit'
    ),
    '|^admin/users/(\d+)/delete/?$|' => array(
        'controller' => 'adminController',
        'action' => 'userDelete',
        'view' => 'admin/users/delete'
    ),

    // Admin - Gyms Management
    '|^admin/gyms/?$|' => array(
        'controller' => 'adminController',
        'action' => 'gymIndex',
        'view' => 'admin/gyms/index'
    ),
    '|^admin/gyms/new/?$|' => array(
        'controller' => 'adminController',
        'action' => 'gymNew',
        'view' => 'admin/gyms/new'
    ),
    '|^admin/gyms/(\d+)/?$|' => array(
        'controller' => 'adminController',
        'action' => 'gymView',
        'view' => 'admin/gyms/view'
    ),
    '|^admin/gyms/(\d+)/edit/?$|' => array(
        'controller' => 'adminController',
        'action' => 'gymEdit',
        'view' => 'admin/gyms/edit'
    ),
    '|^admin/gyms/(\d+)/delete/?$|' => array(
        'controller' => 'adminController',
        'action' => 'gymDelete',
        'view' => 'admin/gyms/delete'
    ),

    // Admin - Plans Management
    '|^admin/plans/?$|' => array(
        'controller' => 'adminController',
        'action' => 'planIndex',
        'view' => 'admin/plans/index'
    ),
    '|^admin/plans/new/?$|' => array(
        'controller' => 'adminController',
        'action' => 'planNew',
        'view' => 'admin/plans/new'
    ),
    '|^admin/plans/(\d+)/?$|' => array(
        'controller' => 'adminController',
        'action' => 'planView',
        'view' => 'admin/plans/view'
    ),
    '|^admin/plans/(\d+)/edit/?$|' => array(
        'controller' => 'adminController',
        'action' => 'planEdit',
        'view' => 'admin/plans/edit'
    ),
    '|^admin/plans/(\d+)/delete/?$|' => array(
        'controller' => 'adminController',
        'action' => 'planDelete',
        'view' => 'admin/plans/delete'
    ),

    // Admin - Blog Management
    '|^admin/blog/?$|' => array(
        'controller' => 'adminController',
        'action' => 'blogIndex',
        'view' => 'admin/blog/index'
    ),
    '|^admin/blog/new/?$|' => array(
        'controller' => 'adminController',
        'action' => 'blogNew',
        'view' => 'admin/blog/new'
    ),
    '|^admin/blog/(\d+)/edit/?$|' => array(
        'controller' => 'adminController',
        'action' => 'blogEdit',
        'view' => 'admin/blog/edit'
    ),
    '|^admin/blog/(\d+)/delete/?$|' => array(
        'controller' => 'adminController',
        'action' => 'blogDelete',
        'view' => 'admin/blog/delete'
    ),

    // Admin - Payment History
    '|^admin/payments/?$|' => array(
        'controller' => 'adminController',
        'action' => 'payments',
        'view' => 'admin/payments'
    ),

    // Admin Profile Management
    '|^admin/profile/?$|' => array(
        'controller' => 'adminController',
        'action' => 'profile',
        'view' => 'admin/profile'
    ),
    '|^admin/change/password/?$|' => array(
        'controller' => 'adminController',
        'action' => 'changePassword',
        'view' => 'admin/password'
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