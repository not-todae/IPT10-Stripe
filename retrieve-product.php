<?php
require "vendor/autoload.php";

$stripe = new \Stripe\StripeClient(
    'sk_test_51LgIRFGAOq0pe7zJeG6YHiZutOOhgtECPd5G2cwCUjwFH5tXIemPcmbXT8KzxkU0XfYlBkuSWYqS7IS0AfSBdGNx00Q0MrRkA5'
  );
  $result = $stripe->products->retrieve(
    'prod_MP7mUF9rkYTySn',
  []
);
  var_dump($result);