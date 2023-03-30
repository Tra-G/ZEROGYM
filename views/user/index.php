<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h2>Welcome to your Dashboard, <?php echo $user['name']; ?></h2>
    <a href='<?php echo redirect('logout'); ?>'>Logout</a>
</body>
</html>