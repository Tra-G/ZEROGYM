<?php require_once(__DIR__.'/../inc/header.php'); ?>

<!-- DISPLAY MODAL CONTENT -->
<section id="dashboard-display" class="relative flex align-center justify-center">
    <!--Menu For Mobile -->
    <div class="mobile-menu-open absolute flex align-center">
        <i class="fa fa-bars"></i> <span>Menu</span>
    </div>
    <h3 class="display-heading absolute">
        Add New Plan
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

                <input type="text" id="name" name="name" placeholder="Plan Name">
                <input type="text" id="description" name="description" required placeholder="Description">
                <input type="number" step="any" id="price" name="price" placeholder="Price" required>
                <input type="number" id="duration" name="duration" placeholder="Duration" required>
                <input type="number" id="training_days" name="training_days" placeholder="Total Training Days" required>
                <button class="btn">Save New Changes</button>
            </form>
        </div>
    </div>
</section>

<?php require_once(__DIR__.'/../inc/footer.php'); ?>