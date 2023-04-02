<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h1>Payment History: <?php echo $total_revenue; ?></h1>
    <ol>
    <?php
    foreach ($all_payments as $pay) {
        echo "<li>";
        echo $pay['membership_id']."<br>";
        echo $pay['amount']."<br>";
        echo $pay['payment_date']."<br>";
        echo "</li>";
    }
    ?>
    </ol>

    <br><a href='<?php echo redirect('admin/dashboard'); ?>'>Dashboard</a>
</body>
</html>