<?php

// load the functions
require_once(__DIR__ . "/../models/functions.php");

class paymentController {

    public $user;

    public function __construct() {
        $this->user = getRowBySelector('users', 'id', $_SESSION['user_id']);

        // check if user is properly logged in
        if (!session_check() || $this->user == null || $this->user['role'] != 'user') {
            route("login");
            exit();
        }
    }

    // user membership payment
    public function pay() {
        $title = pageTitle("Payment");
    }
}

?>