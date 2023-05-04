<?php require_once(__DIR__.'/../inc/header.php'); ?>

<!-- DISPLAY MODAL CONTENT -->
<section id="dashboard-display" class="relative flex align-center justify-center">
    <!--Menu For Mobile -->
    <div class="mobile-menu-open absolute flex align-center">
        <i class="fa fa-bars"></i> <span>Menu</span>
    </div>
    <h3 class="display-heading absolute">
        SELECT PLAN
    </h3>

    <div class="dashboard-modal flex align-center justify-center">

        <!-- Change Plans -->
        <div class="modal-content change-plan">
            <form action="#" class="flex align-center justify-center form">
                <ul class="choose-plan flex  justify-center">

                    <?php foreach ($plans as $plan): ?>
                    <li class="silver-plan">
                        <p>

                            <input type="radio" id="<?php echo $plan["name"]; ?>" name="fav_plan" value="<?php echo redirect("user/pay/".$plan['id']); ?>">

                            <label for="<?php echo $plan["name"]; ?>"><?php echo $plan["name"]; ?></label>
                        </p>
                            <ul class="change_plan-dropdown">
                        <li>
                            <p>Description:</p> <span><?php echo $plan["description"]; ?> </span>
                        </li>
                        <li>
                            <p>Price: </p> <span><?php echo getenv('CURRENCY') . $plan["price"]; ?></span>
                        </li>
                        <li>
                            <p>Duration: </p> <span><?php echo $plan["duration"]; ?> days</span>
                        </li>
                        <li>
                            <p>Trainning Days: </p> <span><?php echo $plan["training_days"]; ?></span>
                        </li>
                    </ul>
                </li>
                <?php endforeach; ?>
                    <button class="btn plan-submit_btn" onclick="redirectToLink(event)">Pay Now</button>
                </ul>
            </form>

        </div>

    </div>
</section>

<script>
  function redirectToLink(event) {
    event.preventDefault(); // prevent form submission

    const radios = document.querySelectorAll('input[type="radio"]');
    let selectedRadio;

    radios.forEach(radio => {
      if (radio.checked) {
        selectedRadio = radio;
      }
    });

    if (selectedRadio) {
      window.location.href = selectedRadio.value;
    }
  }
</script>

<?php require_once(__DIR__.'/../inc/footer.php'); ?>