<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        /* Style for Form Container */
        #paymentFrm {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        max-width: 500px;
        margin: 0 auto;
        background-color: #f5f5f5;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

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

        /* Style for Button */
        .btn {
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 3px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        }

        /* Style for Button Hover */
        .btn:hover {
        background-color: #3e8e41;
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
</head>
<body>
    <h2>Pay Now</h2>

    <b>Plan: <?php echo $plan['name']; ?></b><br>
    <b>Price: <?php echo $plan['price']; ?></b><br>

    <!-- Payment form -->
    <form action="<?php echo redirect("user/pay/".$plan['id']."/confirm"); ?>" method="POST" id="paymentFrm">
        <div class="form-group">
            <label>CARD NUMBER</label>
            <div id="card_number" class="field"></div>
        </div>
        <div class="row">
            <div class="left">
                <div class="form-group">
                    <label>EXPIRY DATE</label>
                    <div id="card_expiry" class="field"></div>
                </div>
            </div>
            <div class="right">
                <div class="form-group">
                    <label>CVC CODE</label>
                    <div id="card_cvc" class="field"></div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success" id="payBtn">Submit Payment</button>
    </form>
    </div>
    </div>

    <script>
        // Create an instance of the Stripe object
        // Set your publishable API key
        var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

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
</body>
</html>