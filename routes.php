<?php

// Router definition
function router($controller, $action, $view=null) {
    return array(
        'controller' => $controller,
        'action' => $action,
        'view' => $view
    );
}

function r($route) {
    // handle placeholder for {id}
    $route = str_replace("{id}", '(\d+)', $route);

    // handle placeholder for {string}
    $route = str_replace("{string}", '([a-zA-Z0-9]+)', $route);

    return '|^'. $route .'/?$|';
}

// Define the routes
$routes = array(
    // Home pages
    r('') => router('homeController', 'index', 'index'),
    r('about') => router('homeController', 'about', 'about'),
    r('contact') => router('homeController', 'contact', 'contact'),

    // Blog
    r('blog') => router('blogController', 'index', 'blog/index'),
    r('blog/{id}') => router('blogController', 'showPost', 'blog/single'),

    // Authentication
    r('login') => router('authController', 'login', 'auth/login'),
    r('register') => router('authController', 'register', 'auth/register'),
    r('logout') => router('authController', 'logout'),
    r('reset') => router('authController', 'forgotPassword', 'auth/reset/index'),
    r('reset/{string}') => router('authController', 'changePassword', 'auth/reset/change'),
    r('reset/{string}/change') => router('authController', 'changePasswordApi', 'auth/reset/api'),

    // User
    r('user/dashboard') => router('userController', 'index', 'user/index'),
    r('user/plan/cancel') => router('userController', 'cancelPlan'),
    r('user/gym/view') => router('userController', 'gymView', 'user/gym'),
    r('user/gym/select') => router('userController', 'gymSelect', 'user/select'),
    r('user/profile') => router('userController', 'profile', 'user/profile'),
    r('user/change/password') => router('userController', 'password', 'user/password'),

    // User Payment (Stripe)
    r('user/pay') => router('paymentController', 'index', 'user/payment/index'),
    r('user/pay/{id}') => router('paymentController', 'payInit', 'user/payment/init'),
    r('user/pay/{id}/confirm') => router('paymentController', 'payConfirm', 'user/payment/confirm'),

    // Admin
    r('admin/dashboard') => router('adminController', 'index', 'admin/index'),

    // Admin - User Management
    r('admin/users') => router('adminController', 'userIndex', 'admin/users/index'),
    r('admin/users/{id}') => router('adminController', 'userView', 'admin/users/view'),
    r('admin/users/{id}/edit') => router('adminController', 'userEdit', 'admin/users/edit'),
    r('admin/users/{id}/delete') => router('adminController', 'userDelete'),
    r('admin/users/all/delete') => router('adminController', 'usersDeleteAll'),

    // Admin - Gyms Management
    r('admin/gyms') => router('adminController', 'gymIndex', 'admin/gyms/index'),
    r('admin/gyms/new') => router('adminController', 'gymNew', 'admin/gyms/new'),
    r('admin/gyms/{id}') => router('adminController', 'gymView', 'admin/gyms/view'),
    r('admin/gyms/{id}/edit') => router('adminController', 'gymEdit', 'admin/gyms/edit'),
    r('admin/gyms/{id}/delete') => router('adminController', 'gymDelete'),
    r('admin/gyms/all/delete') => router('adminController', 'gymsDeleteAll'),

    // Admin - Plans Management
    r('admin/plans') => router('adminController', 'planIndex', 'admin/plans/index'),
    r('admin/plans/new') => router('adminController', 'planNew', 'admin/plans/new'),
    r('admin/plans/{id}') => router('adminController', 'planView', 'admin/plans/view'),
    r('admin/plans/{id}/edit') => router('adminController', 'planEdit', 'admin/plans/edit'),
    r('admin/plans/{id}/delete') => router('adminController', 'planDelete'),
    r('admin/plans/all/delete') => router('adminController', 'plansDeleteAll'),

    // Admin - Blog Management
    r('admin/blog') => router('adminController', 'blogIndex', 'admin/blog/index'),
    r('admin/blog/new') => router('adminController', 'blogNew', 'admin/blog/new'),
    r('admin/blog/{id}/edit') => router('adminController', 'blogEdit', 'admin/blog/edit'),
    r('admin/blog/{id}/delete') => router('adminController', 'blogDelete'),
    r('admin/blog/all/delete') => router('adminController', 'blogDeleteAll'),

    // Admin - Payment History
    r('admin/payments') => router('adminController', 'payments', 'admin/payments'),

    // Admin Profile Management
    r('admin/profile') => router('adminController', 'profile', 'admin/profile'),
    r('admin/change/password') => router('adminController', 'changePassword', 'admin/password'),
);

?>