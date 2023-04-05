<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h1>User Details</h1>
    <b>Name: <?php echo $user['name']; ?></b><br>
    <b>Email: <?php echo $user['email']; ?></b><br>
    <b>Phone: <?php echo $user['phone']; ?></b><br>
    <b>Address: <?php echo $user['address']; ?></b><br>
    <b>City: <?php echo $user['city']; ?></b><br>
    <b>State: <?php echo $user['state']; ?></b><br>
    <b>Joined: <?php echo $user['created_at']; ?></b>

    <h2>Plan Details</h2>
    <?php
    foreach ($user_plan as $key => $value) {
        echo $key.": ".$value."<br>";
    }
    ?>

    <br><br><a href='<?php echo redirect('admin/dashboard'); ?>'>Dashboard</a>
</body>
</html>