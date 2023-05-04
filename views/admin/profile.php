<?php require_once(__DIR__.'/inc/header.php'); ?>

<!-- DISPLAY MODAL CONTENT -->
<section id="dashboard-display" class="relative flex align-center justify-center">
    <!--Menu For Mobile -->
    <div class="mobile-menu-open absolute flex align-center">
        <i class="fa fa-bars"></i> <span>Menu</span>
    </div>
    <h3 class="display-heading absolute">
        Edit Profile
    </h3>

    <div class="dashboard-modal flex align-center justify-center">
        <!-- Edit Profile -->
        <div class="modal-content edit-profile">
            <form action="" method="post" class="flex align-center justify-center">
                <?php if (!empty($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>

                <?php if (!empty($success)): ?>
                <ul>
                    <?php foreach ($success as $suc): ?>
                        <li><?php echo $suc; ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <h3></h3>
                <input type="text" id="name" name="name" value="<?php echo ($admin['name']); ?>" placeholder="Name">
                <input type="email" id="email" name="email" value="<?php echo ($admin['email']); ?>" placeholder="Email">
                <input type="tel" id="phone" name="phone" value="<?php echo ($admin['phone']); ?>" placeholder="Phone">
                <input type="text" id="address" name="address" value="<?php echo ($admin['address']); ?>" placeholder="Address">
                <input type="text" id="city" name="city" value="<?php echo ($admin['city']); ?>" placeholder="City">
                <input type="text" id="postcode" name="postcode" value="<?php echo ($admin['postcode']); ?>" placeholder="Postcode">
                <button class="btn">Save New Changes</button>
            </form>
        </div>
    </div>
</section>

<?php require_once(__DIR__.'/inc/footer.php'); ?>