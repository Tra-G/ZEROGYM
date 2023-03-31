<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <ol>
    <?php
    foreach ($user_rows as $user_row) {
        echo "<li>";
        echo $user_row['name'];
        echo "</li>";
    }
    ?>
    </ol>

    <br><a href='<?php echo redirect('logout'); ?>'>Logout</a>
</body>
</html>