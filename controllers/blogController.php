<?php

// load the functions
require_once(__DIR__ . "/../models/functions.php");

class blogController {

    // all blog post
    public function index() {
        $title = "Blog";
        $posts = getRows('blog_posts', null, null, 'created_at', 'DESC')['rows'];

        return array(
            'title' => $title,
            'posts' => $posts,
        );
    }

    public function showPost($id) {
        $post = getRowBySelector('blog_posts', 'id', $id);
        $title = $post['title'];

        return array(
            'title' => $title,
            'post' => $post,
        );
    }
}


?>