<?php

// load the functions
require_once(__DIR__ . "/../models/functions.php");

class authController {

    // login page
    public function login() {
        $title = pageTitle("Login");
        $errors = [];
        $fetch_url = redirect('reset');

        // Go to dashboard if user is logged in
        if (session_check()){
            route("user/dashboard");
            exit();
        }

        // check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (empty($email) || empty($password)) {
                $errors[] = "All fields are required.";
            }

            $user = getRowBySelector('users', 'email', $email);
            if ($user) {
                $hashed_password = $user['password'];
                if(password_verify($password, $hashed_password)){

                    // Unset all session variables
                    session_unset();
                    session_regenerate_id(true);

                    $_SESSION["logged"] = true;
                    $_SESSION["user_id"] = $user['id'];

                    // go to proper dashboard
                    if ($user["role"] == "admin")
                        route("admin/dashboard");
                    else if ($user["role"] == "user")
                        route("user/dashboard");
                    else
                        $errors[] = "Incorrect details";
                }
                else{
                    $errors[] = "Incorrect details";
                }
            }
            else {
                $errors[] = "Incorrect details";
            }
        }

        return array(
            'title' => $title,
            'errors' => $errors,
            'fetch_url' => $fetch_url,
        );
    }

    // register page
    public function register() {
        $title = pageTitle("Sign Up");
        $errors = [];

        // Go to dashboard if user is logged in
        if (session_check()){
            route("user/dashboard");
            exit();
        }

        // check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $phone = trim($_POST['phone']);
            $address = trim($_POST['address']);
            $city = trim($_POST['city']);
            $zip = trim($_POST['zip']);

            // $states = array(
            //     "Abia", "Adamawa", "Akwa Ibom", "Anambra", "Bauchi", "Bayelsa", "Benue", "Borno",
            //     "Cross River", "Delta", "Ebonyi", "Edo", "Ekiti", "Enugu", "Federal Capital Territory",
            //     "Gombe", "Imo", "Jigawa", "Kaduna", "Kano", "Katsina", "Kebbi", "Kogi", "Kwara",
            //     "Lagos", "Nasarawa", "Niger", "Ogun", "Ondo", "Osun", "Oyo", "Plateau", "Rivers",
            //     "Sokoto", "Taraba", "Yobe", "Zamfara"
            // );
            // if (!in_array($state, $states)) {
            //     $errors[] = "Invalid state";
            // }

            if (empty($name) || empty($email) || empty($password) || empty($phone) || empty($address) || empty($city) || empty($zip)) {
                $errors[] = "All fields are required.";
            }

            // Validate email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format.";
            }
            if (getRowBySelector('users', 'email', $email)) {
                $errors[] = "Email is already taken.";
            }

            // Validate phone number
            if (getRowBySelector('users', 'phone', $phone)) {
                $errors[] = "Phone number is already taken.";
            }
            if (!ctype_digit($phone)) {
                $errors[] = "Phone number is not valid.";
            }

            // Insert if no error
            if (count($errors) == 0) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $data_array = array(
                    'role' => 'user',
                    'name' => $name,
                    'email' => $email,
                    'password' => $hashed_password,
                    'phone' => $phone,
                    'address' => $address,
                    'city' => $city,
                    'zip' => $zip,
                );

                $id = insertRow('users', $data_array);
                if ($id) {
                    // Unset all session variables
                    session_unset();
                    session_regenerate_id(true);

                    // Set session variables
                    $_SESSION['user_id'] = $id;
                    $_SESSION['logged'] = true;

                    route("user/dashboard");
                }
            }
        }

        return array('title' => $title, 'errors' => $errors);
    }

    // logout
    public function logout() {
        // If user is not logged, return to login
        if (!session_check()){
            route("login");
            exit();
        }

        // Unset all of the session variables
        $_SESSION = array();

        // Destroy the session
        session_destroy();

        // Redirect to the login page
        route("login");
    }

    // forgot password
    public function forgotPassword() {
        $title = pageTitle("Forgot Password");
        $errors = [];

        // Go to dashboard if user is logged in
        if (session_check()) {
            route("user/dashboard");
            exit();
        }

        // check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = trim($_POST['email']);

            if (empty($email)) {
                $errors[] = "Email is required.";
            }

            // Validate email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format.";
            }
            if (!getRowBySelector('users', 'email', $email)) {
                $errors[] = "Email not found.";
            }

            if (empty($errors)) {
                // insert token
                $user = getRowBySelector('users', 'email', $email);
                $token = generate_token(16);
                $sender = 'noreply@zerogym.com';
                $data_array = array(
                    'user_id' => $user['id'],
                    'email' => $email,
                    'token' => $token,
                    'expires_at' => date('Y-m-d H:i:s', strtotime('+20 minutes'))
                );

                // insert token
                if (insertRow('password_resets', $data_array)) {
                    // send email
                    $subject = "Password Reset";
                    $message = "Click the link below to reset your password. <br><br>";
                    $message .= "<a href='".redirect('reset/'. $token .'')."'>Reset Password</a>";
                    $message .= "<br><br> If you did not request a password reset, please ignore this email.";
                    $headers = "From: ".getenv('SITE_NAME')." <".$sender."> \r\n";
                    $headers .= "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                    if (mail($email, $subject, $message, $headers)) {
                        $success = "A password reset link has been sent to your email.";
                    }
                    else {
                        $errors[] = "Email not sent. Please try again.";
                    }
                }
                else {
                    $errors[] = "Couldn't update database. Please try again.";
                }
            }
        }
        else {
            // return to login
            route("login");
            exit();
        }

        return array(
            'title' => $title,
            'errors' => $errors,
            'success' => $success ?? null
        );
    }

    // reset password form
    public function changePassword($token) {
        $title = pageTitle("Reset Password");
        $fetch_url = redirect('reset/api/'. $token .'');

        return array(
            'title' => $title,
            'fetch_url' => $fetch_url,
        );
    }

    // change password from reset link
    public function changePasswordApi($token) {
        $title = pageTitle("Change Password");
        $errors = [];

        // Go to dashboard if user is logged in
        if (session_check()){
            route("user/dashboard");
            exit();
        }

        // check if token is valid
        $token = trim($token);
        $token_row = getRowBySelector('password_resets', 'token', $token);
        if (!$token_row) {
            route("login");
            exit();
        }

        // check if token is expired
        if (strtotime($token_row['expires_at']) < time()) {
            $errors[] = "Password reset link has expired.";
        }

        // check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $password = trim($_POST['password']);
            $confirm_password = trim($_POST['confirm_password']);

            if (empty($password) || empty($confirm_password)) {
                $errors[] = "All fields are required.";
            }
            if ($password != $confirm_password) {
                $errors[] = "Passwords do not match.";
            }

            if (empty($errors)) {
                // update password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $data_array = array(
                    'password' => $hashed_password
                );

                if (updateRowBySelector('users', $data_array, 'id', $token_row['user_id'])) {
                    // delete all tokens for this user
                    deleteRowBySelector('password_resets', 'user_id', $token_row['user_id']);

                    // set success message
                    $success = "Password changed successfully. You can now login.";
                }
                else {
                    $errors[] = "Something went wrong. Please try again.";
                }
            }
        }
        else {
            // return to login
            route("login");
            exit();
        }

        return array(
            'title' => $title,
            'errors' => $errors,
            'success' => $success ?? null
        );
    }
}


?>