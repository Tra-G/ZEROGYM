<?php

// load the functions
require_once(__DIR__ . "/../models/functions.php");

class UserController {

    public $user;

    public function __construct() {
        $this->user = getRowBySelector('users', 'id', $_SESSION['user_id']);

        // check if user is properly logged in
        if (!session_check() || $this->user == null) {
            route("login");
            exit();
        }
        // really, admin?
        if ($this->user['role'] === 'admin') {
            route("admin/dashboard");
            exit();
        }
    }

    // user dashboard
    public function index() {
        $title = pageTitle("Home");
        return array('title' => $title, 'user' => $this->user);
    }
}

?>