<?php
session_start();
require("db.php");

if (!isset($_SESSION['user'])) {
    die("User not logged in");
}

$user_email = $_SESSION['user'];

if (!isset($_GET['plan'])) {
    die("Plan not provided");
}
$plan = $_GET['plan'];

if ($plan == "silver") {
    $storage = 51200;
} elseif ($plan == "gold") {
    $storage = 102400;
} elseif ($plan == "premium") {
    $storage = 512000;
} else {
    die("Invalid plan");
}

$purchase_date = date('Y-m-d');
$pd=new DateTime($purchase_date);
$pd->add(new DateInterval('P30D'));
$ed=$pd->format('Y-m-d');

// query
$update = "UPDATE users SET plans='$plan', storage='$storage', purchase_date='$purchase_date',expiry_date='$ed' WHERE email='$user_email'";

if ($db->query($update)) {
    echo "Update success for $user_email-> Plan: $plan, Storage: $storage MB";
    header("Location: ../profile.php");
    exit;
} else {
    echo "Update failed: " . $db->error;
}
?>