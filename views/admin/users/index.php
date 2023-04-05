<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h1>All Users</h1>
    <ol>
    <?php
    foreach ($user_rows as $user_row) {
        echo "<li>";
        echo $user_row['name'];
        echo "<br>[<a href='".redirect("admin/users/".$user_row['id'])."'>View</a>]";
        echo "[<a href='".redirect("admin/users/".$user_row['id']."/edit")."'>Edit</a>]";
        echo "</li><br>";
    }
    ?>
    </ol>

    <br><a href='<?php echo redirect('admin/dashboard'); ?>'>Dashboard</a>
</body>
</html>