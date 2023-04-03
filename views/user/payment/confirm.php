<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h2>Payment Confirmation</h2>

    <b>Status: <?php echo $status; ?></b><br>

    <br><a href='<?php echo redirect('user/dashboard'); ?>'>Dashboard</a>
</body>
</html>