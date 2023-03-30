<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
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
    <form action="" method="post">
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