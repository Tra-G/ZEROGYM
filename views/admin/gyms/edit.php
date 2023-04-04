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
      <select id="state" name="state">
        <option value="Abia"<?php if ($gym['state'] == 'Abia') { echo ' selected'; } ?>>Abia</option>
        <option value="Adamawa"<?php if ($gym['state'] == 'Adamawa') { echo ' selected'; } ?>>Adamawa</option>
        <option value="Akwa Ibom"<?php if ($gym['state'] == 'Akwa Ibom') { echo ' selected'; } ?>>Akwa Ibom</option>
        <option value="Anambra"<?php if ($gym['state'] == 'Anambra') { echo ' selected'; } ?>>Anambra</option>
        <option value="Bauchi"<?php if ($gym['state'] == 'Bauchi') { echo ' selected'; } ?>>Bauchi</option>
        <option value="Bayelsa"<?php if ($gym['state'] == 'Bayelsa') { echo ' selected'; } ?>>Bayelsa</option>
        <option value="Benue"<?php if ($gym['state'] == 'Benue') { echo ' selected'; } ?>>Benue</option>
        <option value="Borno"<?php if ($gym['state'] == 'Borno') { echo ' selected'; } ?>>Borno</option>
        <option value="Cross River"<?php if ($gym['state'] == 'Cross River') { echo ' selected'; } ?>>Cross River</option>
        <option value="Delta"<?php if ($gym['state'] == 'Delta') { echo ' selected'; } ?>>Delta</option>
        <option value="Ebonyi"<?php if ($gym['state'] == 'Ebonyi') { echo ' selected'; } ?>>Ebonyi</option>
        <option value="Edo"<?php if ($gym['state'] == 'Edo') { echo ' selected'; } ?>>Edo</option>
        <option value="Ekiti"<?php if ($gym['state'] == 'Ekiti') { echo ' selected'; } ?>>Ekiti</option>
        <option value="Enugu"<?php if ($gym['state'] == 'Enugu') { echo ' selected'; } ?>>Enugu</option>
        <option value="FCT"<?php if ($gym['state'] == 'FCT') { echo ' selected'; } ?>>Federal Capital Territory</option>
        <option value="Gombe"<?php if ($gym['state'] == 'Gombe') { echo ' selected'; } ?>>Gombe</option>
        <option value="Imo"<?php if ($gym['state'] == 'Imo') { echo ' selected'; } ?>>Imo</option>
        <option value="Jigawa"<?php if ($gym['state'] == 'Jigawa') { echo ' selected'; } ?>>Jigawa</option>
        <option value="Kaduna"<?php if ($gym['state'] == 'Kaduna') { echo ' selected'; } ?>>Kaduna</option>
        <option value="Kano"<?php if ($gym['state'] == 'Kano') { echo ' selected'; } ?>>Kano</option>
        <option value="Katsina"<?php if ($gym['state'] == 'Katsina') { echo ' selected'; } ?>>Katsina</option>
        <option value="Kebbi"<?php if ($gym['state'] == 'Kebbi') { echo ' selected'; } ?>>Kebbi</option>
        <option value="Kogi"<?php if ($gym['state'] == 'Kogi') { echo ' selected'; } ?>>Kogi</option>
        <option value="Kwara"<?php if ($gym['state'] == 'Kwara') { echo ' selected'; } ?>>Kwara</option>
        <option value="Lagos"<?php if ($gym['state'] == 'Lagos') { echo ' selected'; } ?>>Lagos</option>
        <option value="Nasarawa"<?php if ($gym['state'] == 'Nasarawa') { echo ' selected'; } ?>>Nasarawa</option>
        <option value="Niger"<?php if ($gym['state'] == 'Niger') { echo ' selected'; } ?>>Niger</option>
        <option value="Ogun"<?php if ($gym['state'] == 'Ogun') { echo ' selected'; } ?>>Ogun</option>
        <option value="Ondo"<?php if ($gym['state'] == 'Ondo') { echo ' selected'; } ?>>Ondo</option>
        <option value="Osun"<?php if ($gym['state'] == 'Osun') { echo ' selected'; } ?>>Osun</option>
        <option value="Oyo"<?php if ($gym['state'] == 'Oyo') { echo ' selected'; } ?>>Oyo</option>
        <option value="Plateau"<?php if ($gym['state'] == 'Plateau') { echo ' selected'; } ?>>Plateau</option>
        <option value="Rivers"<?php if ($gym['state'] == 'Rivers') { echo ' selected'; } ?>>Rivers</option>
        <option value="Sokoto"<?php if ($gym['state'] == 'Sokoto') { echo ' selected'; } ?>>Sokoto</option>
        <option value="Taraba"<?php if ($gym['state'] == 'Taraba') { echo ' selected'; } ?>>Taraba</option>
        <option value="Yobe"<?php if ($gym['state'] == 'Yobe') { echo ' selected'; } ?>>Yobe</option>
        <option value="Zamfara"<?php if ($gym['state'] == 'Zamfara') { echo ' selected'; } ?>>Zamfara</option>
    </select>
        <br>
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