<?php
require_once('vendor/autoload.php');

$stripe = new \Stripe\StripeClient("sk_test_51LgIRFGAOq0pe7zJeG6YHiZutOOhgtECPd5G2cwCUjwFH5tXIemPcmbXT8KzxkU0XfYlBkuSWYqS7IS0AfSBdGNx00Q0MrRkA5");

$product = $stripe->products->create([
  'name' => 'Pokemon Trading Cards',
  'description' => '$12/Month subscription',
]);
echo "Success! Here is your starter subscription product id: " . $product->id . "\n";

$price = $stripe->prices->create([
  'unit_amount' => 1200,
  'currency' => 'usd',
  'recurring' => ['interval' => 'month'],
  'product' => $product['id'],
]);
echo "Success! Here is your premium subscription price id: " . $price->id . "\n";

?>