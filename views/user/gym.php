<?php require_once(__DIR__.'/inc/header.php'); ?>

<!-- DISPLAY MODAL CONTENT -->
<section id="dashboard-display" class="relative flex align-center justify-center">
    <!--Menu For Mobile -->
    <div class="mobile-menu-open absolute flex align-center">
        <i class="fa fa-bars"></i> <span>Menu</span>
    </div>
    <h3 class="display-heading absolute">
        My Gym Details
    </h3>

    <div class="dashboard-modal flex align-center justify-center">
                <!-- Select Gym Buttons -->
        <div class="modal-content selected-gym flex justify-center">
            <div class="view-gym">
                <div class="flex justify-center">
                    <ul class="gym-address">
                        <li>
                            <p>Name:</p> <span><?php echo $gym['name']; ?></span>
                        </li>
                        <li>
                            <p>Address: </p> <span><?php echo $gym['address']; ?></span>
                        </li>
                        <li>
                            <p>City: </p> <span><?php echo $gym['city']; ?></span>
                        </li>
                        <li>
                            <p>State: </p> <span><?php echo $gym['state']; ?></span>
                        </li>
                    </ul>
                </div>
                <div id="map" class="flex align-center justify-center">
                    <?php echo $gym['map']; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once(__DIR__.'/inc/footer.php'); ?>