<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h1>Change Password</h1>
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
		<label for="old_password">Old Password:</label>
		<input type="password" id="old_password" name="old_password" required><br>

		<label for="new_password">New Password:</label>
		<input type="password" id="new_password" name="new_password"><br>

		<label for="confirm_password">Confirm Password:</label>
		<input type="password" id="confirm_password" name="confirm_password"><br>

		<input type="submit" value="Change Password">
	</form>

    <br><a href='<?php echo redirect('admin/dashboard'); ?>'>Dashboard</a>
</body>
</html>