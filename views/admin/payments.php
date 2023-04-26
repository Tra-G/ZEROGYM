<?php require_once(__DIR__.'/inc/header.php'); ?>

<!-- DISPLAY MODAL CONTENT -->
<section id="dashboard-display" class="relative flex align-center justify-center">
    <!--Menu For Mobile -->
    <div class="mobile-menu-open absolute flex align-center">
        <i class="fa fa-bars"></i> <span>Menu</span>
    </div>
    <h3 class="display-heading absolute">
        RECENT PAYMENTS
    </h3>

    <div class="dashboard-modal flex align-center justify-center">
        <ul>
            <li>
                <h1>Total Revenue: <?php echo getenv('CURRENCY') . $total_revenue; ?></h1>
            </li><br>
            <?php
                $i = 1;
                foreach ($all_payments as $pay) {
                    echo "<li>";
                    echo $i++ . '. ';
                    echo "<b>" . getenv('CURRENCY') . $pay['amount']." </b>";
                    echo " - ".$pay['created_at']."";
                    echo "</li>";
                }
            ?>
        </ul>
    </div>
</section>

<?php require_once(__DIR__.'/inc/footer.php'); ?>