<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
  </head>
  <body>
    <h1>Hello, world!</h1>
    <a href="<?php echo redirect("login") ?>">Login</a><br>
    <a href="<?php echo redirect("register") ?>">Register</a><br>
    <a href="<?php echo redirect("blog") ?>">Blog</a><br>
    <a href="<?php echo redirect("logout") ?>">Logout</a><br><br>

    <h3>Exercise Generator API from [<a href="https://api-ninjas.com/api/exercises">API Ninjas</a>]</h3>

    <?php
    if ($result) {
        foreach ($result as $exercise) {
            echo '<h3>' . $exercise['name'] . '</h3>';
            echo '<ul>';
            echo '<li><b>Type:</b> ' . $exercise['type'] . '</li>';
            echo '<li><b>Muscle:</b> ' . $exercise['muscle'] . '</li>';
            echo '<li><b>Equipment:</b> ' . $exercise['equipment'] . '</li>';
            echo '<li><b>Difficulty:</b> ' . $exercise['difficulty'] . '</li>';
            echo '<li><b>Instructions:</b> ' . $exercise['instructions'] . '</li>';
            echo '</ul>';
        }
    }
    ?>
    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form action="" method="POST">
        <label for="muscle">Muscle group:</label><br>
        <select id="muscle" name="muscle">
            <option value="">Select muscle group</option>
            <option value="abdominals">Abdominals</option>
            <option value="abductors">Abductors</option>
            <option value="adductors">Adductors</option>
            <option value="biceps">Biceps</option>
            <option value="calves">Calves</option>
            <option value="chest">Chest</option>
            <option value="forearms">Forearms</option>
            <option value="glutes">Glutes</option>
            <option value="hamstrings">Hamstrings</option>
            <option value="lats">Lats</option>
            <option value="lower_back">Lower back</option>
            <option value="middle_back">Middle back</option>
            <option value="neck">Neck</option>
            <option value="quadriceps">Quadriceps</option>
            <option value="traps">Traps</option>
            <option value="triceps">Triceps</option>
        </select><br><br>

        <label for="difficulty">Difficulty level:</label><br>
        <select id="difficulty" name="difficulty">
            <option value="">Select difficulty level</option>
            <option value="beginner">Beginner</option>
            <option value="intermediate">Intermediate</option>
            <option value="expert">Expert</option>
        </select><br><br>
        <button type="submit">Generate</button>
    </form>

  </body>
</html>