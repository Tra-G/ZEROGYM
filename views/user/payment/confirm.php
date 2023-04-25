<?php require_once(__DIR__.'/../inc/header.php'); ?>

<!-- DISPLAY MODAL CONTENT -->
<section id="dashboard-display" class="relative flex align-center justify-center">
    <!--Menu For Mobile -->
    <div class="mobile-menu-open absolute flex align-center">
        <i class="fa fa-bars"></i> <span>Menu</span>
    </div>
    <h4 class="display-heading absolute">
        <?php echo $status; ?>
    </h4>

    <div class="dashboard-modal flex align-center justify-center">
                <!-- Select Gym Buttons -->
        <div class="modal-content selected-gym flex justify-center">

            <div class="selected-gym-btns flex align-center justify-center">

                <a href="<?php echo redirect('user/dashboard'); ?>">
                    <button class="btn change-btn">RETURN TO DASHBOARD</button>
                </a>

            </div>
        </div>
    </div>
</section>

<?php require_once(__DIR__.'/../inc/footer.php'); ?>