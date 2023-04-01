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
		<input type="text" id="name" name="name" value="<?php echo ($admin['name']); ?>"><br>

		<label for="email">Email:</label>
		<input type="email" id="email" name="email" value="<?php echo ($admin['email']); ?>"><br>

		<label for="phone">Phone:</label>
		<input type="tel" id="phone" name="phone" value="<?php echo ($admin['phone']); ?>"><br>

		<label for="address">Address:</label>
		<input type="text" id="address" name="address" value="<?php echo ($admin['address']); ?>"><br>

		<label for="city">City:</label>
		<input type="text" id="city" name="city" value="<?php echo ($admin['city']); ?>"><br>

		<label for="state">State:</label>
		<input type="text" id="state" name="state" value="<?php echo ($admin['state']); ?>"><br>

		<label for="zip_code">Zip Code:</label>
		<input type="text" id="zip_code" name="zip_code" value="<?php echo ($admin['zip_code']); ?>"><br>

		<input type="submit" value="Update">
	</form>

    <br><a href='<?php echo redirect('admin/dashboard'); ?>'>Dashboard</a>
</body>
</html>