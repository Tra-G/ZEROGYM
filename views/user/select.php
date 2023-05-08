<?php require_once(__DIR__.'/inc/header.php'); ?>

<!-- DISPLAY MODAL CONTENT -->
<section id="dashboard-display" class="relative flex align-center justify-center">
    <!--Menu For Mobile -->
    <div class="mobile-menu-open absolute flex align-center">
        <i class="fa fa-bars"></i> <span>Menu</span>
    </div>
    <h3 class="display-heading absolute">
        SELECT GYM
    </h3>

    <div class="dashboard-modal flex align-center justify-center">
                <!-- Select Gym Buttons -->
        <div class="modal-content selected-gym flex justify-center">
            <?php if (!empty($errors)): ?>
                <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <form action="" class="gym-options" method="post">
                <ul class="flex  align-center">
                    <h3 class="heading"></h3>
                    <?php foreach ($all_gyms as $gym): ?>
                    <li>
                        <input type="radio" id="<?php echo $gym['name'] ; ?>" name="gym_id" value="<?php echo $gym['id'] ; ?>">
                        <label for="<?php echo $gym['name'] ; ?>"><?php echo $gym['name'] ; ?></label>
                    </li>
                    <?php endforeach; ?>
                    <button type="submit" name="submit" class="btn ">Save Option</button>
                </ul>
            </form>
        </div>
    </div>
</section>

<?php require_once(__DIR__.'/inc/footer.php'); ?>