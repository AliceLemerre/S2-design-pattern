<?php
namespace  App\stripe\createPrice;

require_once('../vendor/autoload.php');

$stripe = new \Stripe\StripeClient("sk_test_51PU9jRRu8yJrd6Ll7vTEfeTagbI0zJNTK6EsEreG2cukyyZaMmlsZx1b9Lkj10ozlbKQxCqul39TJqhzWMNLzLQy00FdJ9OqpX");

$product = $stripe->products->create([
  'name' => 'Starter Subscription',
  'description' => '$12/Month subscription',
]);
echo "Success! Here is your starter subscription product id: " . $product->id . "\n";

$price = $stripe->prices->create([
  'unit_amount' => 1200,
  'currency' => 'usd',
  'recurring' => ['interval' => 'month'],
  'product' => $product['id'],
]);
echo "Success! Here is your starter subscription price id: " . $price->id . "\n";

?>
