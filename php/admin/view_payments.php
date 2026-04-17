<?php
session_start();
if(!isset($_SESSION['admin_id'])){
    header("Location: admin_login.php");
    exit();
}
include("../db.php");

$result = mysqli_query($db, "SELECT * FROM payments ORDER BY payment_date DESC");
?>
<!DOCTYPE html>
<html>
<head>
<title>View Payments</title>
<style>
    body { font-family: Arial, sans-serif; background:#f4f6f9; padding:20px; }
    table { width:100%; border-collapse:collapse; background:#fff; box-shadow:0 4px 8px rgba(0,0,0,0.1); }
    th, td { padding:12px; text-align:center; }
    th { background:#2c3e50; color:#fff; }
    tr:nth-child(even){ background:#f9f9f9; }
</style>
</head>
<body>
<h2>Payment Records</h2>
<table>
<tr>
<th>ID</th><th>User ID</th><th>Plan</th><th>Amount</th><th>Date</th><th>Order ID</th><th>Payment ID</th>
</tr>
<?php while($row = mysqli_fetch_assoc($result)){ ?>
<tr>
<td><?php echo $row['payment_id']; ?></td>
<td><?php echo $row['user_id']; ?></td>
<td><?php echo ucfirst($row['plan_name']); ?></td>
<td><?php echo $row['amount']; ?></td>
<td><?php echo $row['payment_date']; ?></td>
<td><?php echo $row['razorpay_order_id']; ?></td>
<td><?php echo $row['razorpay_payment_id']; ?></td>
</tr>
<?php } ?>
</table>
</body>
</html>