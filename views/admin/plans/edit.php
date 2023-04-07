<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
  </head>
  <body>
    <h1>Edit Plan</h1>
    <?php if (!empty($errors)): ?>
      <ul>
        <?php foreach ($errors as $error): ?>
          <li><?php echo $error; ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <form method="post" action="">
      <input type="hidden" name="plan_id" value="<?php echo $plan['id']; ?>">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" value="<?php echo $plan['name']; ?>"><br>
      <label for="description">Description:</label>
      <input type="text" name="description" id="description" value="<?php echo $plan['description']; ?>"><br>
      <label for="price">Price:</label>
      <input type="text" name="price" id="price" value="<?php echo $plan['price']; ?>"><br>
      <label for="duration">Duration:</label>
      <input type="text" name="duration" id="duration" value="<?php echo $plan['duration']; ?>"><br>
      <label for="training_days">Training Days:</label>
      <input type="text" name="training_days" id="training_days" value="<?php echo $plan['training_days']; ?>"><br>
      <input type="submit" value="Save Changes">
    </form>
  </body>
</html>