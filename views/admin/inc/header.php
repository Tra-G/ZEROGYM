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
                        <h4 class="user-name"><?php echo $admin_details['name']; ?></h4>
                        <small class="plan align-center">Admin</small>
                    </div>
            </div>

            <ul class="dashboard-lists">
                <a href="<?php echo redirect('admin/users'); ?>">
                    <li class="dashboard-list flex align-center <?php if ($_SERVER['REQUEST_URI'] == '/admin/users') { echo 'active'; } ?>" data-modal="edit-profile"> <i class="fas fa-user-circle"></i> <p>Users Management</p></li>
                </a>

                <a href="<?php echo redirect('admin/gyms'); ?>">
                    <li class="dashboard-list flex align-center <?php if ($_SERVER['REQUEST_URI'] == '/admin/gyms') { echo 'active'; } ?>" data-modal="edit-profile"> <i class="fa fa-dumbbell"></i> <p>Gyms Management</p></li>
                </a>

                <a href="<?php echo redirect('admin/plans'); ?>">
                    <li class="dashboard-list flex align-center <?php if ($_SERVER['REQUEST_URI'] == '/admin/plans') { echo 'active'; } ?>" data-modal="edit-profile"> <i class="fas fa-credit-card"></i> <p>Plans Management</p></li>
                </a>

                <a href="<?php echo redirect('admin/blog'); ?>">
                    <li class="dashboard-list flex align-center <?php if ($_SERVER['REQUEST_URI'] == '/admin/blog') { echo 'active'; } ?>" data-modal="edit-profile"> <i class="far fa-newspaper"></i> <p>Blog Management</p></li>
                </a>

                <!-- <a href="<?php echo redirect('admin/payments'); ?>">
                    <li class="dashboard-list flex align-center <?php if ($_SERVER['REQUEST_URI'] == '/admin/payments') { echo 'active'; } ?>" data-modal="edit-profile"> <i class="fas fa-history"></i> <p>Payment History</p></li>
                </a> -->

                <a href="<?php echo redirect('admin/profile'); ?>">
                    <li class="dashboard-list flex align-center <?php if ($_SERVER['REQUEST_URI'] == '/admin/profile') { echo 'active'; } ?>" data-modal="edit-profile"> <i class="fa fa-user"></i> <p>Edit Profile</p></li>
                </a>

                <a href="<?php echo redirect('admin/change/password'); ?>">
                    <li class="dashboard-list flex align-center <?php if ($_SERVER['REQUEST_URI'] == '/admin/change/password') { echo 'active'; } ?>" data-modal="change-password"> <i class="fa fa-lock"></i> <p>Change Password</p></li>
                </a>
            </ul>
            <button class="btn" onclick="location.href='<?php echo redirect('logout'); ?>'">Logout</button>
        </section>
