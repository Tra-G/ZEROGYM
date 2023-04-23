<?php

// load the functions
require_once(__DIR__ . "/../models/functions.php");

class UserController {

    public $user;
    public $membership;

    public function __construct() {
        $this->user = getRowBySelector('users', 'id', $_SESSION['user_id']);
        $this->membership = getRowBySelector('memberships', 'user_id', $this->user['id']);

        // check if user is properly logged in
        if (!session_check() || $this->user == null || $this->user['role'] != 'user') {
            route("logout");
            exit();
        }

        // Calculate membership days left and change status to inactive if expired
        $now = new DateTime();
        $end = new DateTime($this->membership['end_date']);
        if ($end < $now) {
            $data_array = array(
                'status' => 'inactive',
            );
            try {
                updateRowBySelector('memberships', $data_array, 'user_id', $this->user['id']);
                route("user/pay");
                exit();
            }
            catch (Exception $e) {
                route("user/dashboard");
            }
        }

        // If no active subscription, go to pay
        if (!$this->membership || $this->membership['status'] != 'active') {
            route("user/pay");
        }
    }

    // User dashboard
    public function index() {
        $title = pageTitle("Dashboard");
        $plan = getRowBySelector('plans', 'id', $this->membership['plan']);
        $days = json_decode($this->membership['training_days']);

        if ($this->membership['gym_id']) {
            $gym_select = getRowBySelector('gyms', 'id', $this->membership['gym_id']);
            $gym = array(
                'name' => $gym_select['name'],
                'id' => $gym_select['id'],
            );
        }
        else
            $gym = "None";

        return array(
            'title' => $title,
            'user' => $this->user,
            'membership' => $this->membership,
            'plan' => $plan,
            'days' => $days,
            'gym' => $gym,
        );
    }

    // user training days
    public function training() {
        $title = pageTitle('Training Days');
        $errors = [];
        $days = $this->membership['training_days'];

        // get total days
        $total_training_days = empty($days) ? 0 : count(explode(", ", $days));

        // Restrict if training days is set
        if ($total_training_days > 0) {
            route("user/dashboard");
            exit();
        }

        // boundaries
        $start_date = $this->membership['start_date'];
        $end_date = $this->membership['end_date'];
        $current_date = date("Y-m-d");
        $diff = date_diff(date_create($current_date), date_create($end_date));
        $date_diff = $diff->format("%a");

        // get user plan
        $plan = getRowBySelector('plans', 'id', $this->membership['plan']);

        // check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $input_dates = isset($_POST['dates']) ? $_POST['dates'] : '';
            $dates = explode(', ', $input_dates);

            // validate input
            if (empty($dates)) {
                $errors[] = "Please select valid dates";
            }

            // count the total valid dates submitted
            $validCount = 0;
            foreach ($dates as $date) {
                $datetime = DateTime::createFromFormat('d/m/Y', $date);
                if ($datetime && $datetime->format('d/m/Y') === $date) {
                    $validCount++;
                }
            }

            // valid count must correspond to plan limit
            if ($validCount !== $plan['training_days']) {
                $errors[] = "Please select ".$plan['training_days']." days";
            }

            // error if valid dates != total of dates
            if (count($dates) !== $validCount) {
                $errors[] = "Please select valid dates";
            }

            // check if valid count is greater than allowed limit
            if ($validCount > $plan['training_days']) {
                $errors[] = "Please select valid dates";
            }

            // update if no error
            if (count($errors) == 0) {
                $data_array = array(
                    'training_days' => $input_dates
                );

                try {
                    updateRowBySelector('memberships', $data_array, 'user_id', $this->membership['user_id']);
                    route("user/dashboard");
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
            'start_date' => $start_date,
            'end_date' =>$end_date,
            'plan' => $plan,
            'date_diff' => $date_diff,
        );
    }

    // user membership cancellation
    public function cancelPlan() {
        if (!getRowBySelector('memberships', 'user_id', $this->membership['user_id']))
            route("user/dashboard");

        $data_array = array(
            'status' => 'cancelled',
        );

        try {
            updateRowBySelector('memberships', $data_array, 'user_id', $this->membership['user_id']);
            route("user/pay");
        }
        catch (Exception $e) {
            route("user/dashboard");
        }
        exit();
    }

    // user gym view
    public function gymView() {
        $title = pageTitle("Gym Details");
        $gym = getRowBySelector('gyms', 'id', $this->membership['gym_id']);

        return array(
            'title' => $title,
            'gym' => $gym,
        );
    }

    // user gym selection
    public function gymSelect() {
        $title = pageTitle("Select Gym");
        $user_gym = getRowBySelector('gyms', 'id', $this->membership['gym_id']);
        $all_gyms = getRows('gyms')['rows'];
        $closest_gyms = getRows('gyms', 'state', $this->user['state'])['rows'];
        $errors = [];

        // check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $gym_id = trim($_POST['gym_id']);

            if (empty($gym_id) || !is_numeric($gym_id)) {
                $errors[] = "Please select a gym";
            }

            // check if gym exists in database
            if(!getRowBySelector('gyms', 'id', $gym_id)) {
                $errors[] = "Please select a gym";
            }

            // Insert if no error
            if (count($errors) == 0) {

                $data_array = array(
                    'gym_id' => $gym_id,
                );

                try {
                    updateRowBySelector('memberships', $data_array, 'user_id', $this->membership['user_id']);
                    route("user/dashboard");
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
            'user_gym' => $user_gym,
            'all_gyms' => $all_gyms,
            'closest_gyms' => $closest_gyms,
        );
    }

    // user profile edit
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

            $states = array(
                "Abia", "Adamawa", "Akwa Ibom", "Anambra", "Bauchi", "Bayelsa", "Benue", "Borno",
                "Cross River", "Delta", "Ebonyi", "Edo", "Ekiti", "Enugu", "Federal Capital Territory",
                "Gombe", "Imo", "Jigawa", "Kaduna", "Kano", "Katsina", "Kebbi", "Kogi", "Kwara",
                "Lagos", "Nasarawa", "Niger", "Ogun", "Ondo", "Osun", "Oyo", "Plateau", "Rivers",
                "Sokoto", "Taraba", "Yobe", "Zamfara"
            );
            if (!in_array($state, $states)) {
                $errors[] = "Invalid state";
            }

            if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($city) || empty($state)) {
                $errors[] = "All fields are required.";
            }

            // Validate email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format.";
            }
            if (getRowBySelector('users', 'email', $email) && $this->user['email'] != $email) {
                $errors[] = "Email is already taken.";
            }

            // Validate phone number
            if (getRowBySelector('users', 'phone', $phone) && $this->user['phone'] != $phone) {
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
                );

                try {
                    updateRowBySelector('users', $data_array, 'id', $this->user['id']);
                    $this->user = getRowBySelector('users', 'id', $_SESSION['user_id']);
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
            'user' => $this->user,
        );
    }

    // user password modification
    public function password() {
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
            $user = getRowBySelector('users', 'id', $this->user['id']);
                if ($user) {
                    $hashed_password = $user['password'];
                    if(password_verify($old_password, $hashed_password)){
                        $data_array = array(
                            'password' => password_hash($new_password, PASSWORD_DEFAULT),
                        );
                        try {
                            updateRowBySelector('users', $data_array, 'id', $this->user['id']);
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