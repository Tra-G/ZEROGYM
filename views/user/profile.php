<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h1>Edit Profile</h1>
    <?php if (!empty($errors)): ?>
		<ul>
			<?php foreach ($errors as $error): ?>
				<li><?php echo $error; ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

    <?php if (!empty($success)): ?>
		<ul>
			<?php foreach ($success as $suc): ?>
				<li><?php echo $suc; ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<form method="post" action="">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" value="<?php echo ($user['name']); ?>"><br>

		<label for="email">Email:</label>
		<input type="email" id="email" name="email" value="<?php echo ($user['email']); ?>"><br>

		<label for="phone">Phone:</label>
		<input type="tel" id="phone" name="phone" value="<?php echo ($user['phone']); ?>"><br>

		<label for="address">Address:</label>
		<input type="text" id="address" name="address" value="<?php echo ($user['address']); ?>"><br>

		<label for="city">City:</label>
		<input type="text" id="city" name="city" value="<?php echo ($user['city']); ?>"><br>

		<label for="state">State:</label>
		<select id="state" name="state">
            <option value="Abia"<?php if ($user['state'] == 'Abia') { echo ' selected'; } ?>>Abia</option>
            <option value="Adamawa"<?php if ($user['state'] == 'Adamawa') { echo ' selected'; } ?>>Adamawa</option>
            <option value="Akwa Ibom"<?php if ($user['state'] == 'Akwa Ibom') { echo ' selected'; } ?>>Akwa Ibom</option>
            <option value="Anambra"<?php if ($user['state'] == 'Anambra') { echo ' selected'; } ?>>Anambra</option>
            <option value="Bauchi"<?php if ($user['state'] == 'Bauchi') { echo ' selected'; } ?>>Bauchi</option>
            <option value="Bayelsa"<?php if ($user['state'] == 'Bayelsa') { echo ' selected'; } ?>>Bayelsa</option>
            <option value="Benue"<?php if ($user['state'] == 'Benue') { echo ' selected'; } ?>>Benue</option>
            <option value="Borno"<?php if ($user['state'] == 'Borno') { echo ' selected'; } ?>>Borno</option>
            <option value="Cross River"<?php if ($user['state'] == 'Cross River') { echo ' selected'; } ?>>Cross River</option>
            <option value="Delta"<?php if ($user['state'] == 'Delta') { echo ' selected'; } ?>>Delta</option>
            <option value="Ebonyi"<?php if ($user['state'] == 'Ebonyi') { echo ' selected'; } ?>>Ebonyi</option>
            <option value="Edo"<?php if ($user['state'] == 'Edo') { echo ' selected'; } ?>>Edo</option>
            <option value="Ekiti"<?php if ($user['state'] == 'Ekiti') { echo ' selected'; } ?>>Ekiti</option>
            <option value="Enugu"<?php if ($user['state'] == 'Enugu') { echo ' selected'; } ?>>Enugu</option>
            <option value="FCT"<?php if ($user['state'] == 'FCT') { echo ' selected'; } ?>>Federal Capital Territory</option>
            <option value="Gombe"<?php if ($user['state'] == 'Gombe') { echo ' selected'; } ?>>Gombe</option>
            <option value="Imo"<?php if ($user['state'] == 'Imo') { echo ' selected'; } ?>>Imo</option>
            <option value="Jigawa"<?php if ($user['state'] == 'Jigawa') { echo ' selected'; } ?>>Jigawa</option>
            <option value="Kaduna"<?php if ($user['state'] == 'Kaduna') { echo ' selected'; } ?>>Kaduna</option>
            <option value="Kano"<?php if ($user['state'] == 'Kano') { echo ' selected'; } ?>>Kano</option>
            <option value="Katsina"<?php if ($user['state'] == 'Katsina') { echo ' selected'; } ?>>Katsina</option>
            <option value="Kebbi"<?php if ($user['state'] == 'Kebbi') { echo ' selected'; } ?>>Kebbi</option>
            <option value="Kogi"<?php if ($user['state'] == 'Kogi') { echo ' selected'; } ?>>Kogi</option>
            <option value="Kwara"<?php if ($user['state'] == 'Kwara') { echo ' selected'; } ?>>Kwara</option>
            <option value="Lagos"<?php if ($user['state'] == 'Lagos') { echo ' selected'; } ?>>Lagos</option>
            <option value="Nasarawa"<?php if ($user['state'] == 'Nasarawa') { echo ' selected'; } ?>>Nasarawa</option>
            <option value="Niger"<?php if ($user['state'] == 'Niger') { echo ' selected'; } ?>>Niger</option>
            <option value="Ogun"<?php if ($user['state'] == 'Ogun') { echo ' selected'; } ?>>Ogun</option>
            <option value="Ondo"<?php if ($user['state'] == 'Ondo') { echo ' selected'; } ?>>Ondo</option>
            <option value="Osun"<?php if ($user['state'] == 'Osun') { echo ' selected'; } ?>>Osun</option>
            <option value="Oyo"<?php if ($user['state'] == 'Oyo') { echo ' selected'; } ?>>Oyo</option>
            <option value="Plateau"<?php if ($user['state'] == 'Plateau') { echo ' selected'; } ?>>Plateau</option>
            <option value="Rivers"<?php if ($user['state'] == 'Rivers') { echo ' selected'; } ?>>Rivers</option>
            <option value="Sokoto"<?php if ($user['state'] == 'Sokoto') { echo ' selected'; } ?>>Sokoto</option>
            <option value="Taraba"<?php if ($user['state'] == 'Taraba') { echo ' selected'; } ?>>Taraba</option>
            <option value="Yobe"<?php if ($user['state'] == 'Yobe') { echo ' selected'; } ?>>Yobe</option>
            <option value="Zamfara"<?php if ($user['state'] == 'Zamfara') { echo ' selected'; } ?>>Zamfara</option>
        </select>
        <br>

		<label for="zip_code">Zip Code:</label>
		<input type="text" id="zip_code" name="zip_code" value="<?php echo ($user['zip_code']); ?>"><br>

		<input type="submit" value="Update">
	</form>

    <br><a href='<?php echo redirect('user/dashboard'); ?>'>Dashboard</a>
</body>
</html>