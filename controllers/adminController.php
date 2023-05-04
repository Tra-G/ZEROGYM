<?php

// load the functions
require_once(__DIR__ . "/../models/functions.php");


class adminController {

    public $admin;

    public function __construct() {
        $this->admin = getRowBySelector('users', 'id', $_SESSION['user_id']);

        // check if user is an admin
        if (!session_check() || $this->admin == null || $this->admin['role'] != 'admin') {
            route("logout");
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
            'admin_details' => $this->admin,
        );
    }

    // All users
    public function userIndex() {
        $title = pageTitle("All Users");
        $user_rows = getRows('users', 'role', 'user')['rows'];

        return array(
            'title' => $title,
            'user_rows' => $user_rows,
            'admin_details' => $this->admin,
        );
    }

    // View user
    public function userView($id) {
        $title = pageTitle("View User");
        if (getRowBySelector('users', 'id', $id))
            $user = getRowBySelector('users', 'id', $id);
        else
            route("admin/dashboard");

        if (getRowBySelector('memberships', 'user_id', $id)) {
            $plan = getRowBySelector('memberships', 'user_id', $id);

            $gym = getRowBySelector('gyms', 'id', $plan['gym_id']);
            if ($gym)
                $gym_name = $gym['name'];
            else
                $gym_name = 'N/A';

            $plan_fetch = getRowBySelector('plans', 'id', $plan['plan']);
            $plan_name = $plan_fetch['name'];
        }
        else {
            $plan = array('plan' => 'N/A', 'start_date' => 'N/A', 'end_date' => 'N/A', 'training_days' => 'N/A', 'amount' => 0.00, 'status' => 'INACTIVE');
            $gym_name = 'N/A';
            $plan_name = 'N/A';
        }

        return array(
            'title' => $title,
            'user' => $user,
            'user_plan' => $plan,
            'admin_details' => $this->admin,
            'gym_name' => $gym_name,
            'plan_name' => $plan_name,
        );
    }

    // Edit user
    public function userEdit($id) {
        $title = pageTitle("Edit User");
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
            $postcode = trim($_POST['postcode']);

            if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($city) || empty($postcode)) {
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
                    'postcode' => $postcode,
                );

                updateRowBySelector('users', $data_array, 'id', $id);
                route("admin/users/".$id);
            }
        }

        return array(
            'title' => $title,
            'errors' => $errors,
            'user' => $user,
            'admin_details' => $this->admin,
        );
    }

    // Delete user
    public function userDelete($id) {
        $delete_payments = deleteRowBySelector('payments', 'user_id', $id);
        $delete_memberships = deleteRowBySelector('memberships', 'user_id', $id);
        $delete_user = deleteRowBySelector('users', 'id', $id);

        if ($delete_payments && $delete_memberships && $delete_user)
            route("admin/users");
        else
            route("admin/users");
        exit();
    }

    // Delete all users
    public function usersDeleteAll() {
        $delete_payments = deleteRowBySelector('payments');
        $delete_memberships = deleteRowBySelector('memberships');
        $delete_users = deleteRowBySelector('users', 'role', 'user');

        if ($delete_payments && $delete_memberships && $delete_users)
            route("admin/users");
        else
            route("admin/users");
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
            'admin_details' => $this->admin,
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
            $postcode = trim($_POST['postcode']);
            $map = trim($_POST['map']);

            // Validate input
            $errors = array();
            if (empty($name) || empty($address) || empty($city) || empty($postcode) || empty($map)) {
                $errors[] = "All fields are required.";
            }

            // Insert if no error
            if (count($errors) == 0) {
                $data_array = array(
                    'name' => $name,
                    'address' => $address,
                    'city' => $city,
                    'postcode' => $postcode,
                    'map' => $map,
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
            'admin_details' => $this->admin,
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
            'admin_details' => $this->admin,
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
            $postcode = trim($_POST['postcode']);
            $map = trim($_POST['map']);

            if (empty($name) || empty($address) || empty($city) || empty($postcode) || empty($map)) {
                $errors[] = "All fields are required.";
            }

            // Insert if no error
            if (count($errors) == 0) {

                $data_array = array(
                    'name' => $name,
                    'address' => $address,
                    'city' => $city,
                    'postcode' => $postcode,
                    'map' => $map,
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
            'admin_details' => $this->admin,
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

    // Delete all gyms
    public function gymsDeleteAll() {
        $delete_gyms = deleteRowBySelector('gyms');

        if ($delete_gyms)
            route("admin/gyms");
        else
            route("admin/gyms");
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
            'admin_details' => $this->admin,
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
            'admin_details' => $this->admin,
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
            'admin_details' => $this->admin,
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
                'admin_details' => $this->admin,
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

    // Delete all plans
    public function plansDeleteAll() {
        $delete_plans = deleteRowBySelector('plans');

        if ($delete_plans)
            route("admin/plans");
        else
            route("admin/plans");
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
            'admin_details' => $this->admin,
        );
    }

    // New blog post
    public function blogNew() {
        $title = pageTitle("Add New Post");
        $errors = [];

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_id = $this->admin['id'];
            $post_title = trim($_POST['title']);
            $post_content = $_POST['content'];

            // Validate input
            if (empty($user_id) || empty($post_title) || empty($post_content)) {
                $errors[] = "All fields are required.";
            }

            // Handle thumbnail upload
            if (!empty($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == UPLOAD_ERR_OK) {
                $thumbnail_name = $_FILES['thumbnail']['name'];
                $thumbnail_temp = $_FILES['thumbnail']['tmp_name'];
                $thumbnail_ext = pathinfo($thumbnail_name, PATHINFO_EXTENSION);

                // Generate unique file name for thumbnail
                $thumbnail_filename = uniqid('thumb_') . '.' . $thumbnail_ext;
                $thumbnail_path = __DIR__ . '/../assets/media/' . $thumbnail_filename;

                // Save thumbnail to server
                if (!move_uploaded_file($thumbnail_temp, $thumbnail_path)) {
                    $errors[] = "Thumbnail could not be uploaded";
                }

                // Ensure file is an image
                if (!in_array($thumbnail_ext, ['jpg', 'jpeg', 'png', 'gif'])) {
                    unlink($thumbnail_path);
                    $errors[] = "The uploaded file must be an image.";
                }

                // Check if the file is an image
                else if (getimagesize($thumbnail_path) === false) {
                    unlink($thumbnail_path);
                    $errors[] = "The uploaded file must be an image.";
                }

                // Check the image type
                else if (exif_imagetype($thumbnail_path) === false) {
                    unlink($thumbnail_path);
                    $errors[] = "The uploaded file must be an image.";
                }

                // Check the file size (<20MB)
                else if (filesize($thumbnail_path) > 20971520) {
                    unlink($thumbnail_path);
                    $errors[] = "The uploaded file must be an image.";
                }
            } else {
                $errors[] = 'Upload a thumbnail for the post';
            }

            // Insert post if no errors
            if (empty($errors)) {
                $data_array = array(
                    'user_id' => $user_id,
                    'title' => $post_title,
                    'content' => $post_content,
                    'thumbnail_path' => $thumbnail_filename,
                );

                try {
                    insertRow('blog_posts', $data_array);
                    route("admin/blog");
                    exit();
                } catch (Exception $e) {
                    $errors[] = "Error adding new post";
                }
            }
        }

        return array(
            'title' => $title,
            'errors' => $errors,
            'admin_details' => $this->admin,
        );
    }

    // Edit blog post
    public function blogEdit($id) {
        $title = pageTitle("Edit Blog Post");
        $errors = [];

        // Check if post exists
        if (getRowBySelector('blog_posts', 'id', $id)) {
            $post = getRowBySelector('blog_posts', 'id', $id);
        } else {
            route("admin/dashboard");
            exit();
        }

        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $post_title = trim($_POST['title']);
            $post_content = trim($_POST['content']);

            // Validate input
            if (empty($post_title) || empty($post_content)) {
                $errors[] = "Title and content fields are required.";
            }

            // Handle thumbnail upload
            if (!empty($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == UPLOAD_ERR_OK) {
                $thumbnail_name = $_FILES['thumbnail']['name'];
                $thumbnail_temp = $_FILES['thumbnail']['tmp_name'];
                $thumbnail_ext = pathinfo($thumbnail_name, PATHINFO_EXTENSION);

                // Generate unique file name for thumbnail
                $thumbnail_filename = uniqid('thumb_') . '.' . $thumbnail_ext;
                $thumbnail_path = __DIR__ . '/../assets/media/' . $thumbnail_filename;
                $old_path = __DIR__ . '/../assets/media/' . $post['thumbnail_path'];

                if (!move_uploaded_file($thumbnail_temp, $thumbnail_path)) {
                    $errors[] = "File could not be uploaded";
                }

                // Ensure file is an image
                if (!in_array($thumbnail_ext, ['jpg', 'jpeg', 'png', 'gif'])) {
                    unlink($thumbnail_path);
                    $errors[] = "The uploaded file must be an image.";
                }

                // Check if the file is an image
                else if (getimagesize($thumbnail_path) === false) {
                    unlink($thumbnail_path);
                    $errors[] = "The uploaded file must be an image.";
                }

                // Check the image type
                else if (exif_imagetype($thumbnail_path) === false) {
                    unlink($thumbnail_path);
                    $errors[] = "The uploaded file must be an image.";
                }

                // Check the file size (<20MB)
                else if (filesize($thumbnail_path) > 20971520) {
                    unlink($thumbnail_path);
                    $errors[] = "The uploaded file must be an image.";
                }
            } else {
                $thumbnail_filename = $post['thumbnail_path'];
            }

            // Update post if no errors
            if (empty($errors)) {

                // Delete old thumbnail if it exists
                if (!empty($post['thumbnail_path']) && file_exists($old_path)) {
                    unlink($old_path);
                }

                $data_array = array(
                    'title' => $post_title,
                    'content' => $post_content,
                    'thumbnail_path' => $thumbnail_filename,
                );

                try {
                    updateRowBySelector('blog_posts', $data_array, 'id', $id);
                    route("admin/blog");
                    exit();
                } catch (Exception $e) {
                    $errors[] = "Error updating post";
                }
            }
        }

        return array(
            'title' => $title,
            'errors' => $errors,
            'post' => $post,
            'admin_details' => $this->admin,
        );
    }

    // Delete blog post
    public function blogDelete($id) {
        $post = getRowBySelector('blog_posts', 'id', $id);
        if (!$post)
            route("admin/dashboard");
        else {
            $delete = deleteRowBySelector('blog_posts', 'id', $id);
            if ($delete) {

                // Delete old thumbnail if it exists
                $thumbnail_path = __DIR__ . '/../assets/media/' . $post['thumbnail_path'];

                if (!empty($post['thumbnail_path']) && file_exists($thumbnail_path)) {
                    unlink($thumbnail_path);
                }

                route("admin/blog");
            }
            else
                route("admin/blog/".$id);
            exit();
        }
    }

    // Delete all posts
    public function blogDeleteAll() {
        $delete = deleteRowBySelector('blog_posts');

        if ($delete) {
            // unlink all thumbnails in the assets/media folder
            $thumbnails = glob(__DIR__ . '/../assets/media/thumb_*');
            foreach ($thumbnails as $thumbnail) {
                unlink($thumbnail);
            }
            route("admin/blog");
        }
        else
            route("admin/blog");
        exit();
    }

    // Payments History
    public function payments() {
        $title = pageTitle("Payments History");

        $total_revenue = sumAmounts('payments', 'amount');
        $all_payments = getRows('payments', NULL, NULL, 'created_at', 'DESC', 10)['rows'];

        return array(
            'title' => $title,
            'total_revenue' => $total_revenue,
            'all_payments' => $all_payments,
            'admin_details' => $this->admin,
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
            $postcode = trim($_POST['postcode']);

            if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($city) || empty($postcode)) {
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
                    'postcode' => $postcode,
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
            'admin_details' => $this->admin,
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
            'admin_details' => $this->admin,
        );
    }
}

?>