<?php require_once(__DIR__.'/../inc/header.php'); ?>

<!-- DISPLAY MODAL CONTENT -->
<section id="dashboard-display" class="relative flex align-center justify-center">
    <!--Menu For Mobile -->
    <div class="mobile-menu-open absolute flex align-center">
        <i class="fa fa-bars"></i> <span>Menu</span>
    </div>
    <h3 class="display-heading absolute">
        ALL USERS
    </h3>

    <div class="dashboard-modal flex align-center justify-center">
        <!-- List Users -->
        <ul>
        <?php
            $i = 1;
            foreach ($user_rows as $user_row) {
                echo "<li>";
                echo $i++ . '. ';
                echo $user_row['name'];
                echo " [<a style='color: blue;' href='".redirect("admin/users/".$user_row['id'])."'>View</a>]";
                echo "[<a style='color: blue;' href='".redirect("admin/users/".$user_row['id']."/edit")."'>Edit</a>]";
                echo "</li><br>";
            }
            ?>
        </ul>
    </div>
</section>

<?php require_once(__DIR__.'/../inc/footer.php'); ?>