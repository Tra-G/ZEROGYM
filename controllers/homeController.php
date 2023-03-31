<?php

// load the functions
require_once(__DIR__ . "/../models/functions.php");


class homeController {

    // home page
    public function index() {
        $title = pageTitle("Home");
        return array('title' => $title);
    }

    // about page
    public function about() {
        $title = pageTitle("About");
        return array('title' => $title);
    }

    // contact page
    public function contact() {
        $title = pageTitle("Contact Us");
        return array('title' => $title);
    }
}


?>