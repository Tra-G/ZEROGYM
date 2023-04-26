<?php require_once(__DIR__.'/../inc/header.php'); ?>

<!-- DISPLAY MODAL CONTENT -->
<section id="dashboard-display" class="relative flex align-center justify-center">
    <!--Menu For Mobile -->
    <div class="mobile-menu-open absolute flex align-center">
        <i class="fa fa-bars"></i> <span>Menu</span>
    </div>
    <h3 class="display-heading absolute">
        USER DETAILS
    </h3>

    <div class="dashboard-modal flex align-center justify-center">
        <!-- User Details -->
        <ul>
            <li><b>Name:</b> <?php echo $user['name']; ?></li>
            <li><b>Email:</b> <?php echo $user['email']; ?></li>
            <li><b>Phone:</b> <?php echo $user['phone']; ?></li>
            <li><b>Address:</b> <?php echo $user['address']; ?></li>
            <li><b>City:</b> <?php echo $user['city']; ?></li>
            <li><b>Zip:</b> <?php echo $user['zip']; ?></li>
            <li><b>Date Joined:</b> <?php echo $user['created_at']; ?></li><br><br>

            <?php if ($user_plan): ?>
            <li>
                <h3>Plan Details</h3>
            </li>

            <li><b>Plan:</b> <?php echo $plan_name; ?></li>
            <li><b>Start Date:</b> <?php echo $user_plan['start_date']; ?></li>
            <li><b>End Date:</b> <?php echo $user_plan['end_date']; ?></li>
            <li><b>Gym:</b> <?php echo $gym_name; ?></li>
            <li><b>Status:</b> <?php echo strtoupper($user_plan['status']); ?></li>
            <?php endif; ?>
        </ul>
    </div>
</section>

<?php require_once(__DIR__.'/../inc/footer.php'); ?>