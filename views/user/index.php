<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h2>Welcome to your Dashboard, <?php echo $user['name']; ?></h2>
    <b>Membership Status: <?php echo strtoupper($membership['status']); ?></b> [Expires: <?php echo $membership['end_date']; ?>]<br>

    <b>Plan: <?php echo $plan['name']; ?></b> [<a href="<?php echo redirect('user/plan/cancel'); ?>">Cancel</a>]<br>

    <b>Training Days: <?php echo $total_training_days > 0 ? $days : "[<a href='".redirect('user/training/change')."'>Select Now</a>]" ?>

    <br><b>Selected Gym: <?php echo ($gym !== "None") ? $gym['name'] : $gym; ?></b>
    <?php if ($gym !== "None"): ?>
        [<a href="<?php echo redirect('user/gym/view'); ?>">View</a>]
    <?php endif; ?>
    [<a href="<?php echo redirect('user/gym/select'); ?>">
        <?php echo ($gym !== "None") ? "Change" : "Select"; ?>
    </a>]<br>

    <br><a href="<?php echo redirect('user/profile'); ?>">Edit Profile</a><br>
    <a href="<?php echo redirect('user/change/password'); ?>">Change Password</a>

    <br><br><a href='<?php echo redirect('logout'); ?>'>Logout</a>
</body>
</html>