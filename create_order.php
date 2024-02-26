<?php
// Replace with your Razorpay API key and secret
$razorpay_key = 'rzp_test_OXccIPqb2vfgUr';
$razorpay_secret = 'NYPHw3fU1hrnN3vxiruD9XSr';

$product_id = $_POST['product_id'];
$amount = $_POST['amount'];

// Make an API call to create a Razorpay order
$api_url = 'https://api.razorpay.com/v1/orders';

$api_key = base64_encode($razorpay_key . ':' . $razorpay_secret);

$headers = array(
    'Content-Type: application/json',
    'Authorization: Basic ' . $api_key
);

$data = array(
    'amount' => $amount, // Amount in paise
    'currency' => 'INR',
    'payment_capture' => 1
);

$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>
