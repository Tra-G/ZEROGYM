<?php require_once(__DIR__.'/../inc/header.php'); ?>

<!-- DISPLAY MODAL CONTENT -->
<section id="dashboard-display" class="relative flex align-center justify-center">
    <!--Menu For Mobile -->
    <div class="mobile-menu-open absolute flex align-center">
        <i class="fa fa-bars"></i> <span>Menu</span>
    </div>
    <h3 class="display-heading absolute">
        PLAN DETAILS
    </h3>

    <div class="dashboard-modal flex align-center justify-center">
        <ul>
            <li><b>Plan Name:</b> <?php echo $plan['name']; ?></li>
            <li><b>Description:</b> <?php echo $plan['description']; ?></li>
            <li><b>Price:</b> <?php echo getenv('CURRENCY') . $plan['price']; ?></li>
            <li><b>Duration:</b> <?php echo $plan['duration']; ?> days</li>
            <li><b>Total Training Days:</b> <?php echo $plan['training_days']; ?> days</li>
        </ul>
    </div>
</section>

<?php require_once(__DIR__.'/../inc/footer.php'); ?>