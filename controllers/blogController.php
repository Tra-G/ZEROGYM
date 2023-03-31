<?php

// load the functions
require_once(__DIR__ . "/../models/functions.php");

class blogController {

    // all blog post
    public function index() {
        $title = "Blog";

        return array('title' => $title);
    }

    public function showPost($id) {
        // just pass the id as the title
        $title = $id;

        return array('title' => $title);
    }
}


?>