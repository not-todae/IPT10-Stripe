<?php

require 'vendor/autoload.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51LgIRFGAOq0pe7zJeG6YHiZutOOhgtECPd5G2cwCUjwFH5tXIemPcmbXT8KzxkU0XfYlBkuSWYqS7IS0AfSBdGNx00Q0MrRkA5');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost/stripe';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => 'price_1LgKU0GAOq0pe7zJlRPeWIaW',
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);