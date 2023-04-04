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
        $total_plans = getRows('plans')['count'];
        $total_blog = getRows('blog_posts')['count'];
        $total_revenue = sumAmounts('payments', 'amount');

        return array(
            'title' => $title,
            'admin' => $this->admin,
            'total_users' => $total_users,
            'total_gyms' => $total_gyms,
            'total_plans' => $total_plans,
            'total_blog' => $total_blog,
            'total_revenue' => $total_revenue,
        );
    }

    // All users
    public function userIndex() {
        $title = pageTitle("All Users");
        $user_rows = getRows('users', 'role', 'user')['rows'];

        return array(
            'title' => $title,
            'user_rows' => $user_rows,
        );
    }

    // View user
    public function userView($id) {
        $title = pageTitle("View User");
        if (getRowBySelector('users', 'id', $id))
            $user = getRowBySelector('users', 'id', $id);
        else
            route("admin/dashboard");

        if (getRowBySelector('memberships', 'user_id', $id))
            $plan = getRowBySelector('memberships', 'user_id', $id);
        else
            $plan = array('plan' => 'None', 'start_date' => 'None', 'end_date' => 'None', 'training_days' => 'None', 'amount' => 0.00, 'status' => 'Inactive');

        return array(
            'title' => $title,
            'user' => $user,
            'user_plan' => $plan,
        );
    }

    // Edit user
    public function userEdit($id) {
        $title = pageTitle("View User");
        $errors = [];

        if (getRowBySelector('users', 'id', $id))
            $user = getRowBySelector('users', 'id', $id);
        else
            route("admin/dashboard");

        // check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);
            $address = trim($_POST['address']);
            $city = trim($_POST['city']);
            $state = trim($_POST['state']);
            $zip_code = trim($_POST['zip_code']);

            if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($city) || empty($state) || empty($zip_code)) {
                $errors[] = "All fields are required.";
            }

            // Validate email and phone
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format.";
            }
            if (!ctype_digit($phone)) {
                $errors[] = "Phone number is not valid";
            }

            // Insert if no error
            if (count($errors) == 0) {

                $data_array = array(
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address,
                    'city' => $city,
                    'state' => $state,
                    'zip_code' => $zip_code,
                );

                updateRowBySelector('users', $data_array, 'id', $id);
                route("admin/users/".$id);
            }
        }

        return array(
            'title' => $title,
            'errors' => $errors,
            'user' => $user,
        );
    }

    // Delete user
    public function userDelete($id) {
        if (!getRowBySelector('users', 'id', $id))
            route("admin/dashboard");

        $delete = deleteRowBySelector('users', 'id', $id);
        if ($delete)
            route("admin/users");
        else
            route("admin/users/".$id);
        exit();
    }

    // All gyms
    public function gymIndex() {
        $title = pageTitle("Gyms");

        $total_gyms = getRows('gyms')['count'];
        $gym_rows = getRows('gyms')['rows'];

        return array(
            'title' => $title,
            'gym_rows' => $gym_rows,
            'total_gyms' => $total_gyms,
        );
    }

    // New gym
    public function gymNew() {
        $title = pageTitle("Add New Gym");
        $errors = [];

        // check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST['name']);
            $address = trim($_POST['address']);
            $city = trim($_POST['city']);
            $state = trim($_POST['state']);
            $zip_code = trim($_POST['zip_code']);
            $latitude = trim($_POST['latitude']);
            $longitude = trim($_POST['longitude']);

            // Validate input
            $errors = array();
            if (empty($name) || empty($address) || empty($city) || empty($state) || empty($zip_code) || empty($latitude) || empty($longitude)) {
                $errors[] = "All fields are required.";
            }
            if (!is_numeric($latitude) || !is_numeric($longitude)) {
                $errors[] = "Latitude and longitude must be numeric.";
            }

            // Insert if no error
            if (count($errors) == 0) {
                $data_array = array(
                    'name' => $name,
                    'address' => $address,
                    'city' => $city,
                    'state' => $state,
                    'zip_code' => $zip_code,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                );

                try {
                    insertRow('gyms', $data_array);
                    route("admin/gyms");
                    exit();
                }
                catch (Exception $e) {
                    $errors[] = "Something went wrong";
                }
            }
        }

        return array(
            'title' => $title,
            'errors' => $errors,
        );
    }

    // View gym
    public function gymView($id) {
        if (getRowBySelector('gyms', 'id', $id))
            $gym = getRowBySelector('gyms', 'id', $id);
        else
            route("admin/dashboard");

        $title = pageTitle("View Gym: ".$gym['name']);

        return array(
            'title' => $title,
            'gym' => $gym,
        );
    }

    // Edit gym
    public function gymEdit($id) {
        $title = pageTitle("Edit Gym");
        $errors = [];

        if (getRowBySelector('gyms', 'id', $id))
            $gym = getRowBySelector('gyms', 'id', $id);
        else
            route("admin/dashboard");

        // check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST['name']);
            $address = trim($_POST['address']);
            $city = trim($_POST['city']);
            $state = trim($_POST['state']);
            $zip_code = trim($_POST['zip_code']);
            $latitude = trim($_POST['latitude']);
            $longitude = trim($_POST['longitude']);

            if (empty($name) || empty($address) || empty($city) || empty($state) || empty($zip_code) || empty($latitude) || empty($longitude)) {
                $errors[] = "All fields are required.";
            }

            // Validate latitude and longitude
            if (!is_numeric($latitude) || !is_numeric($longitude)) {
                $errors[] = "Latitude and longitude must be numeric.";
            }

            // Insert if no error
            if (count($errors) == 0) {

                $data_array = array(
                    'name' => $name,
                    'address' => $address,
                    'city' => $city,
                    'state' => $state,
                    'zip_code' => $zip_code,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                );

                try {
                    updateRowBySelector('gyms', $data_array, 'id', $id);
                    route("admin/gyms/".$id);
                    exit();
                }
                catch (Exception $e) {
                    $errors[] = "Something went wrong";
                }
            }
        }

        return array(
            'title' => $title,
            'errors' => $errors,
            'gym' => $gym,
        );
    }

    // Delete gym
    public function gymDelete($id) {
        if (!getRowBySelector('gyms', 'id', $id))
            route("admin/dashboard");

        $delete = deleteRowBySelector('gyms', 'id', $id);
        if ($delete)
            route("admin/gyms");
        else
            route("admin/gyms/".$id);
        exit();
    }

    // All plans
    public function planIndex() {
        $title = pageTitle("Plans");

        $total_plans = getRows('plans')['count'];
        $plan_rows = getRows('plans')['rows'];

        return array(
            'title' => $title,
            'plan_rows' => $plan_rows,
            'total_plans' => $total_plans,
        );
    }

    // View plan
    public function planView($id) {
        if (getRowBySelector('plans', 'id', $id))
            $plan = getRowBySelector('plans', 'id', $id);
        else
            route("admin/dashboard");

        $title = pageTitle("View Plan: ".$plan['name']);

        return array(
            'title' => $title,
            'plan' => $plan,
        );
    }

    // New plan
    public function planNew() {
        $title = pageTitle("Add New Plan");
        $errors = [];

        // check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST['name']);
            $description = trim($_POST['description']);
            $price = trim($_POST['price']);
            $duration = trim($_POST['duration']);
            $training_days = trim($_POST['training_days']);

            // Validate input
            $errors = array();
            if (empty($name) || empty($description) || empty($price) || empty($duration) || empty($training_days)) {
                $errors[] = "All fields are required.";
            }
            if (!is_numeric($price) || !is_numeric($duration) || !is_numeric($training_days)) {
                $errors[] = "Price, duration and training days must be numeric.";
            }

            // Insert if no error
            if (count($errors) == 0) {
                $data_array = array(
                    'name' => $name,
                    'description' => $description,
                    'price' => $price,
                    'duration' => $duration,
                    'training_days' => $training_days,
                );

                try {
                    insertRow('plans', $data_array);
                    route("admin/plans");
                    exit();
                }
                catch (Exception $e) {
                    $errors[] = "Something went wrong";
                }
            }
        }

        return array(
            'title' => $title,
            'errors' => $errors,
        );
    }

    // Edit plan
    public function planEdit($id) {
        $title = pageTitle("Edit Plan");
        $errors = [];

            if (getRowBySelector('plans', 'id', $id)) {
                $plan = getRowBySelector('plans', 'id', $id);
            }
            else {
                route("admin/dashboard");
                exit();
            }

            // check if form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = trim($_POST['name']);
                $description = trim($_POST['description']);
                $price = trim($_POST['price']);
                $duration = trim($_POST['duration']);
                $training_days = trim($_POST['training_days']);

                if (empty($name) || empty($description) || empty($price) || empty($duration) || empty($training_days)) {
                    $errors[] = "All fields are required.";
                }

                // Validate price, duration, and training_days
                if (!is_numeric($price) || !is_numeric($duration) || !is_numeric($training_days)) {
                    $errors[] = "Price, duration, and training days must be numeric.";
                }

                // Insert if no error
                if (count($errors) == 0) {

                    $data_array = array(
                        'name' => $name,
                        'description' => $description,
                        'price' => $price,
                        'duration' => $duration,
                        'training_days' => $training_days,
                    );

                    try {
                        updateRowBySelector('plans', $data_array, 'id', $id);
                        route("admin/plans/".$id);
                        exit();
                    }
                    catch (Exception $e) {
                        $errors[] = "Something went wrong";
                    }
                }
            }

            return array(
                'title' => $title,
                'errors' => $errors,
                'plan' => $plan,
            );
    }

    // Delete plan
    public function planDelete($id) {
        if (!getRowBySelector('plans', 'id', $id))
            route("admin/dashboard");

        $delete = deleteRowBySelector('plans', 'id', $id);
        if ($delete)
            route("admin/plans");
        else
            route("admin/plans/".$id);
        exit();
    }

    // All posts
    public function blogIndex() {
        $title = pageTitle("Blog Posts");

        $total_posts = getRows('blog_posts')['count'];
        $blog_rows = getRows('blog_posts')['rows'];

        return array(
            'title' => $title,
            'blog_rows' => $blog_rows,
            'total_posts' => $total_posts,
        );
    }

    // New blog post
    public function blogNew() {
        $title = pageTitle("Add New Post");
        $errors = [];

        // check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_id = $this->admin['id'];
            $post_title = trim($_POST['title']);
            $post_content = $_POST['content'];

            // Validate input
            $errors = array();
            if (empty($user_id) || empty($post_title) || empty($post_content)) {
                $errors[] = "All fields are required.";
            }

            // Insert if no error
            if (count($errors) == 0) {
                $data_array = array(
                    'user_id' => $user_id,
                    'title' => $post_title,
                    'content' => $post_content,
                );

                try {
                    insertRow('blog_posts', $data_array);
                    route("admin/blog");
                    exit();
                }
                catch (Exception $e) {
                    $errors[] = "Something went wrong";
                }
            }
        }

        return array(
            'title' => $title,
            'errors' => $errors,
        );
    }

    // Edit blog post
    public function blogEdit($id) {
        $title = pageTitle("Edit Blog Post");
        $errors = [];

        if (getRowBySelector('blog_posts', 'id', $id)) {
            $post = getRowBySelector('blog_posts', 'id', $id);
        }
        else {
            route("admin/dashboard");
            exit();
        }

        // check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = trim($_POST['title']);
            $content = trim($_POST['content']);

            if (empty($title) || empty($content)) {
                $errors[] = "Title and content fields are required.";
            }

            // Insert if no error
            if (count($errors) == 0) {

                $data_array = array(
                    'title' => $title,
                    'content' => $content,
                );

                try {
                    updateRowBySelector('blog_posts', $data_array, 'id', $id);
                    route("admin/blog");
                    exit();
                }
                catch (Exception $e) {
                    $errors[] = "Something went wrong";
                }
            }
        }

        return array(
            'title' => $title,
            'errors' => $errors,
            'post' => $post,
        );
    }

    // Delete blog post
    public function blogDelete($id) {
        if (!getRowBySelector('blog_posts', 'id', $id))
            route("admin/dashboard");

        $delete = deleteRowBySelector('blog_posts', 'id', $id);
        if ($delete)
            route("admin/blog");
        else
            route("admin/blog/".$id);
        exit();
    }

    // Payments History
    public function payments() {
        $title = pageTitle("Payments History");

        $total_revenue = sumAmounts('payments', 'amount');
        $all_payments = getRows('payments')['rows'];

        return array(
            'title' => $title,
            'total_revenue' => $total_revenue,
            'all_payments' => $all_payments,
        );
    }

    // Profile
    public function profile() {
        $title = pageTitle("Edit Profile");
        $errors = [];
        $success = [];

        // check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);
            $address = trim($_POST['address']);
            $city = trim($_POST['city']);
            $state = trim($_POST['state']);
            $zip_code = trim($_POST['zip_code']);

            if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($city) || empty($state) || empty($zip_code)) {
                $errors[] = "All fields are required.";
            }

            // Validate email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format.";
            }
            if (getRowBySelector('users', 'email', $email) && $this->admin['email'] != $email) {
                $errors[] = "Email is already taken.";
            }

            // Validate phone number
            if (getRowBySelector('users', 'phone', $phone) && $this->admin['phone'] != $phone) {
                $errors[] = "Phone number is already taken.";
            }
            if (!ctype_digit($phone)) {
                $errors[] = "Phone number is not valid";
            }

            // Insert if no error
            if (count($errors) == 0) {

                $data_array = array(
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address,
                    'city' => $city,
                    'state' => $state,
                    'zip_code' => $zip_code,
                );

                try {
                    updateRowBySelector('users', $data_array, 'id', $this->admin['id']);
                    $this->admin = getRowBySelector('users', 'id', $_SESSION['user_id']);
                    $success[] = "Profile updated successfully";
                }
                catch (Exception $e) {
                    $errors[] = "Something went wrong";
                }
            }
        }

        return array(
            'title' => $title,
            'errors' => $errors,
            'success' => $success,
            'admin' => $this->admin,
        );
    }

    // Change password
    public function changePassword() {
        $title = pageTitle("Change Password");
        $errors = [];
        $success = [];

        // check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $old_password = trim($_POST['old_password']);
            $new_password = trim($_POST['new_password']);
            $confirm_password = trim($_POST['confirm_password']);

            if (empty($old_password) || empty($new_password) || empty($confirm_password)) {
                $errors[] = "All fields are required.";
            }

            if ($new_password != $confirm_password) {
                $errors[] = "Password confirmation incorrect";
            }

            // Insert if no error
            if (count($errors) == 0) {
            $user = getRowBySelector('users', 'id', $this->admin['id']);
                if ($user) {
                    $hashed_password = $user['password'];
                    if(password_verify($old_password, $hashed_password)){
                        $data_array = array(
                            'password' => password_hash($new_password, PASSWORD_DEFAULT),
                        );
                        try {
                            updateRowBySelector('users', $data_array, 'id', $this->admin['id']);
                            $success[] = "Password changed successfully";
                        }
                        catch (Exception $e) {
                            $errors[] = "Something went wrong";
                        }
                    }
                    else{
                        $errors[] = "Incorrect password";
                    }
                }
                else {
                    $errors[] = "No user was not found";
                }
            }
        }

        return array(
            'title' => $title,
            'errors' => $errors,
            'success' => $success,
        );
    }
}

?>