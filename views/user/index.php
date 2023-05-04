<?php require_once(__DIR__ . '/inc/header.php'); ?>

<!-- DISPLAY MODAL CONTENT -->
<section id="dashboard-display" class="relative flex align-center justify-center">
    <!--Menu For Mobile -->
    <div class="mobile-menu-open absolute flex align-center">
        <i class="fa fa-bars"></i> <span>Menu</span>
    </div>
    <h3 class="display-heading absolute">
        TRAINING DAYS
    </h3>

    <div class="dashboard-modal flex align-center justify-center">
        <!-- Planning -->
        <div class="planning modal-content planning">
            <div id="calendar"></div>
        </div>
    </div>
</section>

<script>
    // Calendar Event (Library -- FullCalendar.io)
    document.addEventListener('DOMContentLoaded', function () {
        let calendarEl = document.getElementById('calendar');

        // Workout days
        let workoutDates = <?php echo $days; ?>;
        let planDays = [];

        workoutDates.forEach((item) => {
            let obj = {};
            obj.start = item;
            obj.title = 'Training Day';
            planDays.push(obj);

        });

        let calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: planDays,
        });
        calendar.render();
    });

</script>

<?php require_once(__DIR__ . '/inc/footer.php'); ?>