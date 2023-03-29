<?php

require_once ("includes/functions.php");

// Go to dashboard if user is logged in
if (session_check()){
    redirect("dashboard");
    exit();
}

// check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $errors = [];

    if (empty($email) || empty($password)) {
        $errors[] = "All fields are required.";
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    $user = getRowBySelector($conn, 'users', 'email', $email);
    if ($user) {
        $hashed_password = $user['password'];
        if(password_verify($password, $hashed_password)){

            // Unset all session variables
            session_unset();
            session_regenerate_id(true);

            $_SESSION["logged"] = true;
            $_SESSION["user_id"] = $user['id'];

            if ($user["role"] == "admin")
                redirect("admin/");
            else
                redirect("dashboard");
        }
        else{
            $errors[] = "Incorrect password";
        }
    }
    else {
        $errors[] = "Email was not found";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
</head>
<body>
    <h1>User Login</h1>
    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>