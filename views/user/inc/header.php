<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Sono:wght@400;500&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo assets('css/global.css'); ?>">
    <link rel="stylesheet" href="<?php echo assets('css/dashboard.css'); ?>">
    <title><?php echo $title; ?></title>
</head>
<body>
    <!-- DASHBOARD -->
    <section class="dashboard-container flex">
        <div class="logo absolute flex align-center">
            <i class="fa-solid fa-dumbbell"></i><p>zero<span>gym</span></p>
        </div>
        <section id="sidebar">

            <h3 class="heading flex align-center">
                <p>DASHBOARD</p>
                <i class="fa fa-xmark mobile-menu-close"></i>
            </h3>
            <div class="user-info flex align-center">
                    <div class="profile-pic">
                        <img src="<?php echo assets('images/avatar.png'); ?>" alt="">
                    </div>
                    <div>
                        <h4 class="user-name"><?php echo $user_details['name']; ?></h4>
                        <small class="plan align-center"><?php echo $plan_details['name']; ?></small>
                    </div>
            </div>
            <div class="membership-status">
                <p>Membership Staus: <span><?php echo strtoupper($membership_details['status']); ?></span></p>
                <small>Expires: <?php echo $membership_details['end_date']; ?></small>
            </div>

            <ul class="dashboard-lists">
                <a href="<?php echo redirect('user/dashboard'); ?>">
                    <li class="dashboard-list flex align-center <?php if ($_SERVER['REQUEST_URI'] == '/user/dashboard') { echo 'active'; } ?>" data-modal="planning"> <i class="fa fa-calendar-week"></i> Training Days</li>
                </a>

                <?php if ($membership_details['gym_id']): ?>
                <a href="<?php echo redirect('user/gym/view'); ?>">
                    <li class="dashboard-list flex align-center <?php if ($_SERVER['REQUEST_URI'] == '/user/gym/view') { echo 'active'; } ?>" data-modal="selected-gym"> <i class="fa fa-house"></i> <p>My Gym Details</p></li>
                </a>
                <?php endif; ?>

                <a href="<?php echo redirect('user/gym/select'); ?>">
                    <li class="dashboard-list flex align-center <?php if ($_SERVER['REQUEST_URI'] == '/user/gym/select') { echo 'active'; } ?>" data-modal="selected-gym"> <i class="fa fa-dumbbell"></i> <p><?php echo $membership_details['gym_id'] ? 'Change' : 'Select'; ?> Gym</p></li>
                </a>

                <?php if ($membership_details['status'] != 'active'): ?>
                <a href="<?php echo redirect('user/pay'); ?>">
                    <li class="dashboard-list flex align-center <?php if ($_SERVER['REQUEST_URI'] == '/user/pay') { echo 'active'; } ?>" data-modal="change-plan"> <i class="fa fa-pen"></i> <p>Select Plan</p></li>
                </a>
                <?php else: ?>
                <a href="<?php echo redirect('user/plan/cancel'); ?>" onclick="if(confirm('Are you sure you want to cancel this plan?')) { return true; } else { return false; }">
                    <li class="dashboard-list flex align-center" data-modal="change-plan"> <i class="fa fa-pen"></i> <p>Cancel Plan</p></li>
                </a>
                <?php endif; ?>

                <a href="<?php echo redirect('user/profile'); ?>">
                    <li class="dashboard-list flex align-center <?php if ($_SERVER['REQUEST_URI'] == '/user/profile') { echo 'active'; } ?>" data-modal="edit-profile"> <i class="fa fa-user"></i> <p>Edit Profile</p></li>
                </a>

                <a href="<?php echo redirect('user/change/password'); ?>">
                    <li class="dashboard-list flex align-center <?php if ($_SERVER['REQUEST_URI'] == '/user/change/password') { echo 'active'; } ?>" data-modal="change-password"> <i class="fa fa-lock"></i> <p>Change Password</p></li>
                </a>
            </ul>
            <button class="btn" onclick="location.href='<?php echo redirect('logout'); ?>'">Logout</button>
        </section>
