<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h1>Total: <?php echo $total_revenue; ?></h1>
    <ol>
    <?php
    foreach ($all_payments as $pay) {
        echo "<li>";
        echo "Amount: ".$pay['amount']." | ";
        echo "Date: ".$pay['created_at']."<br>";
        echo "</li>";
    }
    ?>
    </ol>

    <br><a href='<?php echo redirect('admin/dashboard'); ?>'>Dashboard</a>
</body>
</html>