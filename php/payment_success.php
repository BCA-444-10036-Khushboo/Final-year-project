<?php
session_start();
require("db.php");

if(!isset($_SESSION['login_email'])){   // session variable updated
    die("User not logged in");
}

$user_email = $_SESSION['login_email'];
$res  = $db->query("SELECT * FROM members WHERE user_email='$user_email'"); // table & column updated
$data = $res->fetch_assoc();
$user_id = $data['id']; 
$name    = $data['full_name'];

// Safe access with null coalescing
$plan_name           = $_POST['plan_name'] ?? '';
$amount              = $_POST['amount'] ?? '';
$razorpay_order_id   = $_POST['razorpay_order_id'] ?? '';
$razorpay_payment_id = $_POST['razorpay_payment_id'] ?? '';

if(empty($razorpay_order_id) || empty($razorpay_payment_id)){
    die("Error: Missing Razorpay payment details");
}

// Razorpay amount is in paise, convert to rupees before saving
$amount_in_rupees = $amount / 100;

$sql = "INSERT INTO payments (user_id, plan_name, amount, payment_date, razorpay_order_id, razorpay_payment_id)
        VALUES ('$user_id','$plan_name','$amount_in_rupees',NOW(),'$razorpay_order_id','$razorpay_payment_id')";

if($db->query($sql)){
    echo "success";
} else {
    echo "error: " . $db->error;
}
?>
