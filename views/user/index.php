<?php require_once(__DIR__.'/inc/header.php'); ?>

<!-- DISPLAY MODAL CONTENT -->
<section id="dashboard-display" class="relative flex align-center justify-center">
    <!--Menu For Mobile -->
    <div class="mobile-menu-open absolute flex align-center">
        <i class="fa fa-bars"></i> <span>Menu</span>
    </div>
    <h3 class="display-heading absolute">
        TRAINING DAYS
    </h3>

    <div class="dashboard-modal flex align-center justify-center">
        <!-- Planning -->
        <div class="planning modal-content planning">
            <div id="calendar"></div>
        </div>
    </div>
</section>

<?php require_once(__DIR__.'/inc/footer.php'); ?>