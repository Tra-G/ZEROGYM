<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h2>Welcome to the Admin Dashboard, <?php echo $admin['name']; ?></h2>
    <b>Total Users: <?php echo $total_users; ?></b><br>
    <b>Total Gyms: <?php echo $total_gyms; ?></b><br>
    <b>Total Plans: <?php echo $total_plans; ?></b><br>
    <b>Total Blog Posts: <?php echo $total_blog; ?></b><br>
    <b>Total Revenue: <?php echo $total_revenue; ?></b><br><br>

    <a href='<?php echo redirect('admin/users'); ?>'>All Users</a><br>
    <a href='<?php echo redirect('admin/gyms'); ?>'>All Gyms</a><br>
    <a href='<?php echo redirect('admin/plans'); ?>'>All Plans</a><br>


    <br><br><a href='<?php echo redirect('logout'); ?>'>Logout</a>
</body>
</html>