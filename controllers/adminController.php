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
                    $errors[] = $e;
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
}


?>