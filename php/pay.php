<?php
session_start();
require("db.php");

if(!isset($_SESSION['login_email'])){   // session variable updated
    die(json_encode(array("error"=>"User not logged in")));
}

$plan = $_GET['plan'];
$amt  = $_GET['amt'];
$user_email = $_SESSION['login_email'];

$res  = $db->query("SELECT * FROM members WHERE user_email='$user_email'"); // table & column updated
$data = $res->fetch_assoc();
$name = $data['full_name'];

require("../src/Razorpay.php");
use Razorpay\Api\Api;

$api_key    = "rzp_test_RzmUuiBZ9X9hxL";
$api_secret = "8xkN2amz1haejicmEC5wRVBd";

try {
    $api = new Api($api_key, $api_secret);

    $response = $api->order->create(array(
        'receipt'  => 'receipt_'.time(),
        'amount'   => $amt * 100,   // Razorpay needs amount in paise
        'currency' => 'INR',
        'notes'    => array(
            'plan'  => $plan,
            'email' => $user_email,
            'Name'  => $name
        )
    ));

    echo json_encode(array("order_id"=>$response['id'],"amount"=>$response['amount']));
}
catch(Exception $e){
    echo json_encode(array("error"=>$e->getMessage()));
}
?>
