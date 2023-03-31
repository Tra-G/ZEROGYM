<?php

// load the functions
require_once(__DIR__ . "/../models/functions.php");


class adminController {

    public $admin;

    public function __construct() {
        $this->admin = getRowBySelector('users', 'id', $_SESSION['user_id']);

        // check if user is an admin
        if (!session_check() || $this->admin == null || $this->admin['role'] != 'admin') {
            route("login");
            exit();
        }
    }

    // Dashboard
    public function index() {
        $title = pageTitle("Dashboard");

        $total_users = getRows('users', 'role', 'user')['count'];
        $total_gyms = getRows('gyms')['count'];
        // $total_plan = getRows('plans')['count'];
        $total_blog = getRows('blog_posts')['count'];
        $total_revenue = sumAmounts('payments', 'amount');

        return array(
            'title' => $title,
            'admin' => $this->admin,
            'total_users' => $total_users,
            'total_gyms' => $total_gyms,
            'total_plans' => 0,
            'total_blog' => $total_blog,
            'total_revenue' => $total_revenue,
        );
    }

    public function allUsers() {
        $title = "All Users";
        $user_rows = getRows('users', 'role', 'user')['rows'];

        // don't forget to pass the links

        return array(
            'title' => $title,
            'user_rows' => $user_rows,
        );

    }
}


?>