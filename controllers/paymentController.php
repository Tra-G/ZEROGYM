<?php

// load the functions
require_once(__DIR__ . "/../models/functions.php");

// load the payment configuration file
require_once(__DIR__ . "/../models/payconfig.php");

// Include the Stripe PHP library
require_once (__DIR__ . "/../models/stripe-php/init.php");

// Set Stripe API key
\Stripe\Stripe::setApiKey(STRIPE_API_KEY);

class paymentController {

    public $user;

    public function __construct() {
        $this->user = getRowBySelector('users', 'id', $_SESSION['user_id']);

        // check if user is properly logged in
        if (!session_check() || $this->user == null || $this->user['role'] != 'user') {
            route("login");
            exit();
        }
    }

    // plan selection
    public function index() {
        $title = pageTitle("Select a Plan");
        $plans = getRows('plans')['rows'];

        return array(
            'title' => $title,
            'plans' => $plans,
        );
    }

    // user membership payment
    public function payInit($plan) {
        $title = pageTitle("Payment");
        $plan_check = getRowBySelector('plans', 'id', $plan);

        // check if plan exists
        if (!$plan_check) {
            route("user/dashboard");
            exit();
        }

        return array(
            'title' => $title,
            'plan' => $plan_check,
            'public_key' => STRIPE_PUBLISHABLE_KEY,
        );
    }

    public function payConfirm($plan)
    {
        $title = pageTitle("Payment Confirmation");
        $plan_check = getRowBySelector('plans', 'id', $plan);

        // check if plan exists
        if (!$plan_check) {
            route("user/dashboard");
            exit();
        }

        $price = $plan_check['price'];

        // Check whether stripe token is not empty
        if(!empty($_POST['stripeToken'])){

            // Retrieve stripe token, card and user info from the submitted form data
            $token  = $_POST['stripeToken'];
            $name = $this->user['name'];
            $email = $this->user['email'];

            // Set API key
            \Stripe\Stripe::setApiKey(STRIPE_API_KEY);

            // Add customer to stripe
            try {
                $customer = \Stripe\Customer::create(array(
                    'name' => $name,
                    'email' => $email,
                    'source'  => $token
                ));
            }catch(Exception $e) {
                $api_error = $e->getMessage();
            }

            if(empty($api_error) && $customer){

                // Convert price to cents
                $priceCents = ($price * 100);

                // Set description
                $description = "Payment for ".$plan_check['name'];

                // Charge a credit or a debit card
                try {
                    $charge = \Stripe\Charge::create(array(
                        'customer' => $customer->id,
                        'amount'   => $priceCents,
                        'currency' => $_ENV['CURRENCY_NAME'],
                        'description' => $description,
                    ));
                }catch(Exception $e) {
                    $api_error = $e->getMessage();
                }

                if(empty($api_error) && $charge){

                    // Retrieve charge details
                    $chargeJson = $charge->jsonSerialize();

                    // Check whether the charge is successful
                    if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){
                        // Transaction details
                        $transactionID = $chargeJson['balance_transaction'];
                        $paidAmount = $chargeJson['amount'];
                        $paidAmount = ($paidAmount/100);
                        $paidCurrency = $chargeJson['currency'];
                        $payment_status = $chargeJson['status'];

                        // Set start and end dates
                        $currentDate = date("Y-m-d");
                        $end_date = date("Y-m-d", strtotime("+31 days"));

                        // If the order is successful
                        if($payment_status == 'succeeded'){
                            // set data array
                            $data_membership = array(
                                'user_id' => $this->user['id'],
                                'plan' => $plan,
                                'start_date' => $currentDate,
                                'end_date' => $end_date,
                                'training_days' => NULL,
                                'amount' => $paidAmount,
                                'status' => 'active',
                            );

                            // check for membership
                            $membership = getRowBySelector('memberships', 'user_id', $this->user['id']);
                            if ($membership) {
                                try {
                                    $membership_id = $membership['id'];
                                    updateRowBySelector('memberships', $data_membership, 'user_id', $this->user['id']);
                                    $statusMsg = 'Your Payment has been Successful!';
                                }
                                catch (Exception $e) {
                                    $statusMsg = 'Something went wrong';
                                }
                            }
                            else {
                                try {
                                    $membership_id = insertRow('memberships', $data_membership);
                                    $statusMsg = 'Your Payment has been Successful!';
                                }
                                catch (Exception $e) {
                                    $statusMsg = 'Something went wrong';
                                }
                            }

                            // Insert records into payments table
                            $data_payments = array(
                                'user_id' => $this->user['id'],
                                'membership_id' => $membership_id,
                                'amount' => $paidAmount,
                                'currency' => $_ENV['CURRENCY_NAME'],
                                'txn_id' => $transactionID,
                                'payment_status' => $payment_status,
                            );

                            try {
                                insertRow('payments', $data_payments);
                            }
                            catch (Exception $e) {
                                $statusMsg = "Something went wrong";
                            }
                        }else{
                            $statusMsg = "Your Payment has Failed!";
                        }
                    }else{
                        $statusMsg = "Transaction has been failed!";
                    }
                }else{
                    $statusMsg = "Charge creation failed! $api_error";
                }
            }else{
                $statusMsg = "Invalid card details! $api_error";
            }
        }else{
            $statusMsg = "Error on form submission.";
        }

        return array(
            'title' => $title,
            'status' => $statusMsg,
        );
    }
}

?>