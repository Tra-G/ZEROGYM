<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h1><?php echo $gym['name']; ?></h1>
    <b>Address: <?php echo $gym['address']; ?></b><br>
    <b>City: <?php echo $gym['city']; ?></b><br>
    <b>State: <?php echo $gym['state']; ?></b><br>
    <b>Map: </b><br><br><?php echo $gym['map']; ?>

    <br><br><a href='<?php echo redirect('admin/dashboard'); ?>'>Dashboard</a>
</body>
</html>