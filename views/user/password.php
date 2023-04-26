<?php require_once(__DIR__.'/inc/header.php'); ?>

<!-- DISPLAY MODAL CONTENT -->
<section id="dashboard-display" class="relative flex align-center justify-center">
    <!--Menu For Mobile -->
    <div class="mobile-menu-open absolute flex align-center">
        <i class="fa fa-bars"></i> <span>Menu</span>
    </div>
    <h3 class="display-heading absolute">
        CHANGE PASSWORD
    </h3>

    <div class="dashboard-modal flex align-center justify-center">
        <!-- Planning -->
        <!-- Change Password -->
        <div class="modal-content change-password">
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
                <input type="password" placeholder="Old Password" id="old_password" name="old_password" required>
                <input type="password" placeholder="New Password" id="new_password" name="new_password" required>
                <input type="password" placeholder="Confirm Password" id="confirm_password" name="confirm_password" required>
                <button type="submit" class="btn">Save New Password</button>
            </form>
        </div>
    </div>
</section>

<?php require_once(__DIR__.'/inc/footer.php'); ?>