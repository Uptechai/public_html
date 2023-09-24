<?php
// Turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

//start session cookie usage
session_start();
$id = $_SESSION["usrId"];

//get user information from the url
$checkout_session_id = $_GET["checkout_session_id"];
$pricing_plan = $_GET["pricing_plan"];


// Load the Stripe PHP library
require_once('vendor/autoload.php');

//get the stripe key
require_once("db-connection/stripe_access_key.php");

// Setting API key
Stripe\Stripe::setApiKey($stripe_access_token);


// Get the checkout session ID and user email from your database or elsewhere
$user_email = $_SESSION["email"];

// Retrieve the checkout session from Stripe
$checkout_session = \Stripe\Checkout\Session::retrieve($checkout_session_id);

// Retrieve the subscription associated with the checkout session
$subscription_id = $checkout_session->subscription;
$subscription = \Stripe\Subscription::retrieve($subscription_id);

// Get the subscription ID
$subscription_id = $subscription->id;

// Retrieve the customer associated with the subscription
$customer_id = $subscription->customer;
$customer = \Stripe\Customer::retrieve($customer_id);

// access the subscription and customer information
$customer_name = $customer->name;

// Get the current period end timestamp
$current_period_end = $subscription->current_period_end;

// Convert the timestamp to a comparable date format
$next_billing_date = date('Y-m-d H:i:s', $current_period_end);

//check what pricing plan was subscribed
if ($pricing_plan == 2) {
    $newCredits = 260;
}
if ($pricing_plan == 3) {
    $newCredits = 1000;
}

//update the database information of the user
require("db-connection/user.php");

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . "Please contact the customer support.");
}

$stmt = $conn->prepare("UPDATE user_general SET 
    credits = :newCredits, 
    pricing_plan = :pricing_plan,
    stripe_customer_id = :customer_id,
    stripe_checkout_session_id = :checkout_session_id,
    stripe_subscription_id = :subscription_id,
    stripe_customer_name = :customerName,
    next_billing_date = :next_billing_date
    WHERE id = :id");
$stmt->bindParam(":newCredits", $newCredits);
$stmt->bindParam(":pricing_plan", $pricing_plan);
$stmt->bindParam(":customer_id", $customer_id);
$stmt->bindParam(":checkout_session_id", $checkout_session_id);
$stmt->bindParam(":subscription_id", $subscription_id);
$stmt->bindParam(":customerName", $customer_name);
$stmt->bindParam(":next_billing_date", $next_billing_date, PDO::PARAM_STR); // bind as string
$stmt->bindParam(":id", $id);
$stmt->execute();

$conn = null;

$_SESSION["pricing_plan"] = $pricing_plan;

header("location: member");
exit();
