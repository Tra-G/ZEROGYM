<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h2>Gym Details</h2>

    <b>Name: <?php echo $gym['name']; ?></b><br>
    <b>Address: <?php echo $gym['address']; ?></b><br>
    <b>City: <?php echo $gym['city']; ?></b><br>
    <b>State: <?php echo $gym['state']; ?></b><br><br>

    <?php echo $gym['map']; ?>

    <br><br><a href='<?php echo redirect('user/dashboard'); ?>'>Dashboard</a>
</body>
</html>