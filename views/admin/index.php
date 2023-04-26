<?php require_once(__DIR__.'/inc/header.php'); ?>

<style>
    .box {
        width: 30%;
        background-color: #f2f2f2;
        padding: 20px;
        margin: auto;
        display: inline-block;
        text-align: center;
        border: 1px solid #ccc;
    }
</style>

<!-- DISPLAY MODAL CONTENT -->
<section id="dashboard-display" class="relative flex align-center justify-center">
    <!--Menu For Mobile -->
    <div class="mobile-menu-open absolute flex align-center">
        <i class="fa fa-bars"></i> <span>Menu</span>
    </div>
    <h3 class="display-heading absolute">
        ADMIN DASHBOARD
    </h3>

    <div class="dashboard-modal flex align-center justify-center">
        <!-- Show Stats -->
        <div class="box">
            <h2>Total Users</h2><br>
            <b><?php echo $total_users; ?></b>
        </div>
        <div class="box">
            <h2>Total Gyms</h2><br>
            <b><?php echo $total_gyms; ?></b>
        </div>
        <div class="box">
            <h2>Total Revenue</h2><br>
            <b><?php echo getenv('CURRENCY') . $total_revenue; ?></b>
        </div>
    </div>
</section>

<?php require_once(__DIR__.'/inc/footer.php'); ?>