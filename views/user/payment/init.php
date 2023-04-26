<?php require_once(__DIR__.'/../inc/header.php'); ?>

<script src="https://js.stripe.com/v3/"></script>

<style>

/* Style for Form Group */
.form-group {
display: flex;
flex-direction: column;
margin-bottom: 20px;
width: 100%;
}

/* Style for Labels */
label {
font-size: 16px;
font-weight: 600;
margin-bottom: 10px;
}

/* Style for Fields */
.field {
border: 1px solid #ddd;
border-radius: 3px;
padding: 10px;
font-size: 16px;
width: 100%;
}

/* Style for Row */
.row {
display: flex;
justify-content: space-between;
width: 100%;
}

/* Style for Left */
.left {
width: 60%;
}

/* Style for Right */
.right {
width: 35%;
}
</style>

<!-- DISPLAY MODAL CONTENT -->
<section id="dashboard-display" class="relative flex align-center justify-center">
    <!--Menu For Mobile -->
    <div class="mobile-menu-open absolute flex align-center">
        <i class="fa fa-bars"></i> <span>Menu</span>
    </div>
    <h3 class="display-heading absolute">
        SECURE CHECKOUT
    </h3>

    <div class="dashboard-modal payment-modal flex justify-center">
        <div class="payment-page relative">

            <ul class="payment-info">
                <li>
                <h4>Plan:</h4> <span><?php echo $plan['name']; ?></span>
            </li>
            <li>
                <h4>Price:</h4> <span><?php echo getenv('CURRENCY') . $plan['price']; ?></span>
            </li>
        </ul>
        <!-- Card -->
        <form action="<?php echo redirect("user/pay/".$plan['id']."/confirm"); ?>" method="POST" id="paymentFrm">
            <ul>
                <div class="form-control flex relative" style="flex-direction: column;">
                    <label for="">Card Number</label>
                    <div id="card_number" class="field"></div>
                </div>
                <div class="form-control flex">
                    <li>
                        <label for="">Exp:</label>
                        <div id="card_expiry" class="field"></div>
                    </li>
                    <li>
                        <label for="">CVC:</label>
                        <div id="card_cvc" class="field"></div>
                    </li>
                </div>
            </ul>

            <div class="form-btns flex">
                <button class="btn" type="submit" id="payBtn">Pay Now</button>
                <button class="btn cancel-payment" onclick="location.href='<?php echo redirect('user/dashboard'); ?>'">Cancel Payment</button>
            </div>
        </form>

        <div class="card-display absolute flex align-center">
            <p>
                <i class="fa-brands fa-cc-mastercard"></i>
                <i class="fa-brands fa-cc-visa"></i>
                <i class="fa-brands fa-cc-stripe"></i>
                <i class="fa-brands fa-cc-paypal"></i>
            </p>
            <small>A smarter way to pay...</small>
        </div>
    </div>

    </div>
</section>

<script>
// Create an instance of the Stripe object
// Set your publishable API key
var stripe = Stripe('<?php echo getenv('STRIPE_PUBLISHABLE_KEY'); ?>');

// Create an instance of elements
var elements = stripe.elements();

var style = {
    base: {
        fontWeight: 400,
        fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
        fontSize: '16px',
        lineHeight: '1.4',
        color: '#555',
        backgroundColor: '#fff',
        '::placeholder': {
            color: '#888',
        },
    },
    invalid: {
        color: '#eb1c26',
    }
};

var cardElement = elements.create('cardNumber', {
    style: stripe
});
cardElement.mount('#card_number');

var exp = elements.create('cardExpiry', {
    'style': stripe
});
exp.mount('#card_expiry');

var cvc = elements.create('cardCvc', {
    'style': stripe
});
cvc.mount('#card_cvc');

// Validate input of the card elements
var resultContainer = document.getElementById('paymentResponse');
cardElement.addEventListener('change', function(event) {
    if (event.error) {
        resultContainer.innerHTML = '<p>' + event.error.message + '</p>';
    } else {
        resultContainer.innerHTML = '';
    }
});

// Get payment form element
var form = document.getElementById('paymentFrm');

// Create a token when the form is submitted.
form.addEventListener('submit', function(e) {
    e.preventDefault();
    createToken();
});

// Create single-use token to charge the user
function createToken() {
    stripe.createToken(cardElement).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error
            resultContainer.innerHTML = '<p>' + result.error.message + '</p>';
        } else {
            // Send the token to your server
            stripeTokenHandler(result.token);
        }
    });
}

// Callback to handle the response from stripe
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
    // Submit the form
    form.submit();
}
</script>

<?php require_once(__DIR__.'/../inc/footer.php'); ?>