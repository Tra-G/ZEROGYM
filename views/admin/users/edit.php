<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo pageTitle("Edit User: ".$user['name']); ?></title>
  </head>
  <body>
    <h1>Edit User Details</h1>
    <?php if (!empty($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    <form method="post" action="">
      <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" value="<?php echo $user['name']; ?>"><br>
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" value="<?php echo $user['email']; ?>"><br>
      <label for="phone">Phone:</label>
      <input type="tel" name="phone" id="phone" value="<?php echo $user['phone']; ?>"><br>
      <label for="address">Address:</label>
      <input type="text" name="address" id="address" value="<?php echo $user['address']; ?>"><br>
      <label for="city">City:</label>
      <input type="text" name="city" id="city" value="<?php echo $user['city']; ?>"><br>
      <label for="state">State:</label>
      <input type="text" name="state" id="state" value="<?php echo $user['state']; ?>"><br>
      <input type="submit" value="Save Changes">
    </form>
  </body>
</html>