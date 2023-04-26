<?php require_once(__DIR__.'/../inc/header.php'); ?>

<!-- DISPLAY MODAL CONTENT -->
<section id="dashboard-display" class="relative flex align-center justify-center">
    <!--Menu For Mobile -->
    <div class="mobile-menu-open absolute flex align-center">
        <i class="fa fa-bars"></i> <span>Menu</span>
    </div>
    <h3 class="display-heading absolute">
        Edit Plan
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
                <input type="hidden" name="plan_id" value="<?php echo $plan['id']; ?>">

                <input type="text" name="name" id="name" value="<?php echo $plan['name']; ?>" placeholder="Plan Name" required>
                <input type="text" name="description" id="description" value="<?php echo $plan['description']; ?>" placeholder="Description" required>
                <input type="text" name="price" id="price" value="<?php echo $plan['price']; ?>" placeholder="Price" required>
                <input type="text" name="duration" id="duration" value="<?php echo $plan['duration']; ?>" placeholder="Duration" required>
                <input type="text" name="training_days" id="training_days" value="<?php echo $plan['training_days']; ?>" placeholder="Total Training Days" required>
                <button class="btn">Save New Changes</button>
            </form>
        </div>
    </div>
</section>

<?php require_once(__DIR__.'/../inc/footer.php'); ?>