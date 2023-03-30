<?php

// load the functions
require_once(__DIR__ . "/../models/functions.php");


class userController {

    public $user;

    public function __construct() {
        $this->user = getRowBySelector('users', 'id', $_SESSION['user_id']);
    }

    // user dashboard
    public function index() {
        $title = pageTitle("Home");

        // Go to login if user is not logged in
        if (!session_check()){
            route("login");
            exit();
        }

        return array('title' => $title, 'user' => $this->user);
    }
}

?>