<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h1>Add New Plan</h1>
    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form action="" method="post">
        <label for="name">Plan Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required><br>

        <label for="price">Price:</label>
        <input type="number" step="any" id="price" name="price" required><br>

        <label for="duration">Duration (days):</label>
        <input type="number" id="duration" name="duration" required><br>

        <label for="training_days">Total Number of Training Days:</label>
        <input type="number" id="training_days" name="training_days" required><br>

        <input type="submit" value="Add Plan">
    </form>

    <br>
    <a href='<?php echo redirect('admin/dashboard'); ?>'>Dashboard</a>
</body>
</html>