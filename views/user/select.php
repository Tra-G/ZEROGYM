<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
  </head>
  <body>
    <h1>Select Gym</h1>
    <?php if (!empty($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>

    <b>Gyms within my location:</b>
    <?php if (!empty($closest_gyms)): ?>
    <ul>
    <?php foreach ($closest_gyms as $c_gym): ?>
            <li><?php echo $c_gym['name']; ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>

    <br><br>

    <form method="post" action="">
        <label for="gym">Select Gym</label><br>
        <select name="gym_id" id="gym_id">
            <?php
            foreach ($all_gyms as $gym) {
                $selected = ($user_gym['id'] == $gym['id']) ? 'selected' : '';
                echo "<option value='".$gym['id']."' ".$selected.">".$gym['name']."</option>";
            }
            ?>
        </select>
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>

  </body>
</html>