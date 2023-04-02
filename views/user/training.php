<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script
    src="https://cdn.jsdelivr.net/gh/dubrox/Multiple-Dates-Picker-for-jQuery-UI@master/jquery-ui.multidatespicker.js"></script>

    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <style>
        body {
        font-family: Arial, Helvetica, sans-serif;
        }

        input {
        width: 300px;
        padding: 7px;
        }

        .ui-state-highlight {
        border: 0 !important;
        }

        .ui-state-highlight a {
        background: #363636 !important;
        color: #fff !important;
        }
    </style>

    <title><?php echo $title; ?></title>
</head>
<body>
    <h2>Pick Training Days</h2>
    <?php if (!empty($errors)): ?>
      <ul>
        <?php foreach ($errors as $error): ?>
          <li><?php echo $error; ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <b>Plan: <?php echo $plan['name']; ?></b><br>
    <b>Training Programs: <?php echo $plan['training_days']; ?></b><br>

    <h2>Select Days</h2>
    <form action="" method="post">
        <label for="num-days">Select training days:</label>
        <input type="text" name="dates" id="datePick" placeholder="Select">
        <button type="submit">Submit</button>
    </form>

    <br><br><a href='<?php echo redirect('user/dashboard'); ?>'>Dashboard</a>


    <script>
        $('#datePick').multiDatesPicker({ dateFormat: 'dd/mm/yy', maxPicks: <?php echo $plan['training_days']; ?>, minDate: 0, maxDate: <?php echo $date_diff; ?> });
    </script>
</body>
</html>