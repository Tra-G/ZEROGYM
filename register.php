<?php

require_once ("includes/functions.php");

// Go to dashboard if user is logged in
if (session_check()){
    redirect("dashboard");
    exit();
}

// check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = "user";
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    $zip_code = trim($_POST['zip_code']);

    $errors = [];

    if (empty($name) || empty($email) || empty($password) || empty($phone) || empty($address) || empty($city) || empty($state) || empty($zip_code)) {
        $errors[] = "All fields are required.";
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (getRowBySelector($conn, 'users', 'email', $email)) {
        $errors[] = "Email is already taken.";
    }

    // Validate phone number
    if (getRowBySelector($conn, 'users', 'phone', $phone)) {
        $errors[] = "Phone number is already taken.";
    }
    if (strlen($phone) != 11 || !ctype_digit($phone)) {
        $errors[] = "Phone number is not valid";
    }

    // Insert if no error
    if (count($errors) == 0) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $data_array = array(
            'role' => $role,
            'name' => $name,
            'email' => $email,
            'password' => $hashed_password,
            'phone' => $phone,
            'address' => $address,
            'city' => $city,
            'state' => $state,
            'zip_code' => $zip_code,
        );

        $id = insertRow($conn, 'users', $data_array);
        if ($id) {
            // Unset all session variables
            session_unset();
            session_regenerate_id(true);

            // Set session variables
            $_SESSION['user_id'] = $id;
            $_SESSION['logged'] = true;

            redirect("dashboard");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body>
    <h1>User Registration</h1>
    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <label for="phone">Phone:</label>
        <input type="tel" name="phone" id="phone" required>
        <br>
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" required>
        <br>
        <label for="city">City:</label>
        <input type="text" name="city" id="city" required>
        <br>
        <label for="state">State:</label>
        <input type="text" name="state" id="state" required>
        <br>
        <label for="zip_code">Zip Code:</label>
        <input type="text" name="zip_code" id="zip_code" required>
        <br>
        <button type="submit">Register</button>
    </form>
</body>
</html>