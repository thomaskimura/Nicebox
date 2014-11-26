<?php
require_once('./lib/Stripe.php');

$stripe = array(
	"secret_key"      => "sk_test_SBTPQ4LUqS6n5mjtLXIfjjF7",
	"publishable_key" => "pk_test_VzJc4gJBR7SeNdBIZFN6xnNH"
);

Stripe::setApiKey($stripe['secret_key']);
?>
