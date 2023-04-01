<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo pageTitle("Edit Gym: ".$gym['name']); ?></title>
  </head>
  <body>
    <h1>Edit Gym Details</h1>
    <?php if (!empty($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    <form method="post" action="">
      <input type="hidden" name="gym_id" value="<?php echo $id; ?>">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" value="<?php echo $gym['name']; ?>"><br>
      <label for="address">Address:</label>
      <input type="text" name="address" id="address" value="<?php echo $gym['address']; ?>"><br>
      <label for="city">City:</label>
      <input type="text" name="city" id="city" value="<?php echo $gym['city']; ?>"><br>
      <label for="state">State:</label>
      <input type="text" name="state" id="state" value="<?php echo $gym['state']; ?>"><br>
      <label for="zip_code">Zip Code:</label>
      <input type="text" name="zip_code" id="zip_code" value="<?php echo $gym['zip_code']; ?>"><br>
      <label for="latitude">Latitude:</label>
      <input type="text" name="latitude" id="latitude" value="<?php echo $gym['latitude']; ?>"><br>
      <label for="longitude">Longitude:</label>
      <input type="text" name="longitude" id="longitude" value="<?php echo $gym['longitude']; ?>"><br>
      <input type="submit" value="Save Changes">
    </form>
  </body>
</html>