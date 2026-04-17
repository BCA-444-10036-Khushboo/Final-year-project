<?php
session_start();
if(!isset($_SESSION['admin_id'])){
    header("Location: admin_login.php");
    exit();
}
include("../db.php"); // adjust path if needed
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>
<style>
    body {
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f4f6f9;
    }
    .sidebar {
        width: 220px;
        height: 100vh;
        background: #2c3e50;
        position: fixed;
        top: 0;
        left: 0;
        color: #fff;
        padding-top: 20px;
    }
    .sidebar h2 {
        text-align: center;
        margin-bottom: 30px;
        font-size: 22px;
        color: #ecf0f1;
    }
    .sidebar a {
        display: block;
        padding: 12px 20px;
        color: #bdc3c7;
        text-decoration: none;
        transition: 0.3s;
    }
    .sidebar a:hover {
        background: #34495e;
        color: #fff;
    }
    .main-content {
        margin-left: 220px;
        padding: 20px;
    }
    .header {
        background: #fff;
        padding: 15px 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .header h1 {
        font-size: 20px;
        color: #2c3e50;
    }
    .cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }
    .card {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        text-align: center;
    }
    .card h3 {
        margin-bottom: 10px;
        color: #2c3e50;
    }
    .card p {
        font-size: 18px;
        color: #27ae60;
        font-weight: bold;
    }
</style>
</head>
<body>

<div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="admin_dashboard.php">Dashboard</a>
    <a href="view_users.php">View Users</a>
    <a href="view_payments.php">View Payments</a>
    <a href="logout.php">Logout</a>
</div>

<div class="main-content">
    <div class="header">
        <h1>Welcome, <?php echo $_SESSION['admin_username']; ?></h1>
        <span style="color:#7f8c8d;">Admin Dashboard</span>
    </div>

    <div class="cards">
        <!-- Total Users -->
        <div class="card">
            <h3>Total Users</h3>
            <p>
            <?php
            $res = mysqli_query($db, "SELECT COUNT(*) AS total FROM users");
            $row = mysqli_fetch_assoc($res);
            echo $row['total'];
            ?>
            </p>
        </div>

        <!-- Total Files (sum from user_xx tables) -->
        <div class="card">
            <h3>Total Files</h3>
            <p>
            <?php
            $tables = ['user_58','user_54','user_55'];
            $totalFiles = 0;
            foreach($tables as $t){
                $res = mysqli_query($db, "SELECT COUNT(*) AS total FROM $t");
                if($res){
                    $row = mysqli_fetch_assoc($res);
                    $totalFiles += $row['total'];
                }
            }
            echo $totalFiles;
            ?>
            </p>
        </div>

        <!-- Active Plans -->
        <div class="card">
            <h3>Active Plans</h3>
            <p>
            <?php
            $res = mysqli_query($db, "SELECT COUNT(DISTINCT plans) AS total FROM users WHERE plans!='free'");
            $row = mysqli_fetch_assoc($res);
            echo $row['total'];
            ?>
            </p>
        </div>

        <!-- Total Payments -->
        <div class="card">
            <h3>Total Payments</h3>
            <p>
            <?php
            $res = mysqli_query($db, "SELECT COUNT(*) AS total FROM payments");
            if($res){
                $row = mysqli_fetch_assoc($res);
                echo $row['total'];
            } else {
                echo "0";
            }
            ?>
            </p>
        </div>
    </div>
</div>

</body>
</html>