<?php require_once(__DIR__.'/../inc/header.php'); ?>

<!-- DISPLAY MODAL CONTENT -->
<section id="dashboard-display" class="relative flex align-center justify-center">
    <!--Menu For Mobile -->
    <div class="mobile-menu-open absolute flex align-center">
        <i class="fa fa-bars"></i> <span>Menu</span>
    </div>
    <h3 class="display-heading absolute">
        ALL PLANS
    </h3>

    <div class="dashboard-modal flex align-center justify-center">
        <ul>
            <li>
                <button class="btn plan-submit_btn" onclick="window.location.href='<?php echo redirect('admin/plans/new'); ?>'">Add New Plan</button>
            </li><br><br>
            <?php
                $i = 1;
                foreach ($plan_rows as $plan) {
                    echo "<li>";
                    echo $i++ . '. ';
                    echo $plan['name'];
                    echo " [<a style='color: blue;' href='".redirect("admin/plans/".$plan['id'])."'>View</a>]";
                    echo "[<a style='color: blue;' href='".redirect("admin/plans/".$plan['id']."/edit")."'>Edit</a>]";
                    echo "[<a style='color: blue;' href='".redirect("admin/plans/".$plan['id']."/delete")."' onclick=\"if(confirm('Are you sure you want to delete this?')) { return true; } else { return false; }\">Delete</a>]";
                    echo "</li><br>";
                }
            ?>
        </ul>
    </div>
</section>

<?php require_once(__DIR__.'/../inc/footer.php'); ?>