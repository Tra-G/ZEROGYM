<?php require_once(__DIR__.'/../inc/header.php'); ?>

<!-- DISPLAY MODAL CONTENT -->
<section id="dashboard-display" class="relative flex align-center justify-center">
    <!--Menu For Mobile -->
    <div class="mobile-menu-open absolute flex align-center">
        <i class="fa fa-bars"></i> <span>Menu</span>
    </div>
    <h3 class="display-heading absolute">
        Edit Gym
    </h3>

    <div class="dashboard-modal flex align-center justify-center">
        <div class="modal-content edit-profile">
            <form action="" method="post" class="flex align-center justify-center">

                <?php if (!empty($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>

                <h3></h3>
                <input type="hidden" name="gym_id" value="<?php echo $id; ?>">
                <input type="text" id="name" name="name" value="<?php echo ($gym['name']); ?>" placeholder="Name" required>
                <input type="text" name="address" id="address" value="<?php echo $gym['address']; ?>" placeholder="Address" required>
                <input type="text" id="city" name="city" value="<?php echo ($gym['city']); ?>" placeholder="City" required>
                <input type="text" id="zip" name="zip" value="<?php echo ($gym['zip']); ?>" placeholder="Zip" required>
                <label for="map">Map Frame URL:</label>
                <textarea style="width: 200px; height: 100px;" name="map" id="map"><?php echo $gym['map']; ?></textarea><br>
                <button class="btn">Save New Changes</button>
            </form>
        </div>
    </div>
</section>

<?php require_once(__DIR__.'/../inc/footer.php'); ?>