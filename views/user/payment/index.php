<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h2>Please select a plan</h2>

    <?php foreach ($plans as $plan): ?>
        <b><?php echo $plan["name"]; ?></b><br>
        Description: <?php echo $plan["description"]; ?><br>
        Price: $<?php echo $plan["price"]; ?><br>
        Duration: <?php echo $plan["duration"]; ?><br>
        Training Programs: <?php echo $plan["training_days"]; ?><br>
        [<a href="<?php echo redirect("user/pay/".$plan['id']); ?>">Select</a>]<br><br>
    <?php endforeach; ?>

    <br><a href='<?php echo redirect('user/dashboard'); ?>'>Dashboard</a>
</body>
</html>