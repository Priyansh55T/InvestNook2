<?php
require 'path/to/razorpay-php/Razorpay.php';

$razorpayKey = 'rzp_test_fdfwBaj2AEvLz4';
$razorpaySecret = 'MeWhvNtnO9U07dgLOVFe5Mck';

use Razorpay\Api\Api;

$api = new Api($razorpayKey, $razorpaySecret);

$product_id = $_POST['product_id']; // Assuming you send the product_id from the client side

// Fetch the product details from the database based on the product_id
// You'll need to implement this part based on your database structure

// Calculate the amount in paisa (Razorpay's currency is in paisa)
$amount = $product['Fund_Required'] * 100;

$orderData = [
    'receipt'         => 'order_' . $product_id,
    'amount'          => $amount,
    'currency'        => 'INR',
    'payment_capture' => 1, // Auto capture payment
];

$order = $api->order->create($orderData);

echo json_encode(['order_id' => $order->id]);
?>
