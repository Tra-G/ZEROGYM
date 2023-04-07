<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h1>Gyms: <?php echo $total_gyms; ?></h1>
    <b><a href="<?php echo redirect("admin/gyms/new"); ?>">Add New Gym</a></b>
    <ol>
    <?php
    foreach ($gym_rows as $gym) {
        echo "<li>";
        echo $gym['name'];
        echo "<br>[<a href='".redirect("admin/gyms/".$gym['id'])."'>View</a>]";
        echo "[<a href='".redirect("admin/gyms/".$gym['id']."/edit")."'>Edit</a>]";
        echo "[<a href='".redirect("admin/gyms/".$gym['id']."/delete")."' onclick=\"if(confirm('Are you sure you want to delete this?')) { return true; } else { return false; }\">Delete</a>]";
        echo "</li><br>";
    }
    ?>
    </ol>

    <br><a href='<?php echo redirect('admin/dashboard'); ?>'>Dashboard</a>
</body>
</html>