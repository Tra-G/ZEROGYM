<?php require_once(__DIR__.'/../inc/header.php'); ?>

<!-- DISPLAY MODAL CONTENT -->
<section id="dashboard-display" class="relative flex align-center justify-center">
    <!--Menu For Mobile -->
    <div class="mobile-menu-open absolute flex align-center">
        <i class="fa fa-bars"></i> <span>Menu</span>
    </div>
    <h3 class="display-heading absolute">
        GYM DETAILS
    </h3>

    <div class="dashboard-modal flex align-center justify-center">
        <ul>
            <li><b>Name:</b> <?php echo $gym['name']; ?></li>
            <li><b>Address:</b> <?php echo $gym['address']; ?></li>
            <li><b>City:</b> <?php echo $gym['city']; ?></li>
            <li><b>Postcode:</b> <?php echo $gym['postcode']; ?></li><br>
            <li><?php echo $gym['map']; ?></li>
        </ul>
    </div>
</section>

<?php require_once(__DIR__.'/../inc/footer.php'); ?>