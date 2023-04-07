<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h1><?php echo $plan['name']; ?></h1>
    <b>Description: <?php echo $plan['description']; ?></b><br>
    <b>Price: <?php echo $plan['price']; ?></b><br>
    <b>Duration: <?php echo $plan['duration']; ?></b><br>
    <b>Training Days: <?php echo $plan['training_days']; ?></b>

    <br><br><a href='<?php echo redirect('admin/dashboard'); ?>'>Dashboard</a>
</body>
</html>