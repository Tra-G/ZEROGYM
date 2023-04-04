<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h1><?php echo $title; ?></h1>
    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form action="" method="post">
        <label for="title">Post Title:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="content">Content:</label>
        <textarea id="content" name="content" required></textarea><br>

        <input type="submit" value="Add Post">
    </form>

    <br>
    <a href='<?php echo redirect('admin/dashboard'); ?>'>Dashboard</a>
</body>
</html>