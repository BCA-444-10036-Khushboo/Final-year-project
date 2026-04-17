<?php
session_start();
if(!isset($_SESSION['admin_id'])){
    header("Location: admin_login.php");
    exit();
}
include("../db.php"); // adjust path if needed

$result = mysqli_query($db, "SELECT * FROM users ORDER BY reg_date_time DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>View Users</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f4f6f9;
        margin: 0;
        padding: 20px;
    }
    h2 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        border-radius: 8px;
        overflow: hidden;
    }
    th, td {
        padding: 12px 15px;
        text-align: center;
    }
    th {
        background: #2c3e50;
        color: #fff;
        font-weight: 600;
    }
    tr:nth-child(even) {
        background: #f9f9f9;
    }
    tr:hover {
        background: #ecf0f1;
        transition: 0.3s;
    }
    .status-active {
        color: #27ae60;
        font-weight: bold;
    }
    .status-pending {
        color: #f39c12;
        font-weight: bold;
    }
    .status-inactive {
        color: #e74c3c;
        font-weight: bold;
    }
</style>
</head>
<body>
    <h2>Registered Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Plan</th>
            <th>Storage (MB)</th>
            <th>Used Storage (MB)</th>
            <th>Registered On</th>
            <th>Expiry Date</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['full_name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td class="status-<?php echo strtolower($row['status']); ?>">
                <?php echo ucfirst($row['status']); ?>
            </td>
            <td><?php echo ucfirst($row['plans']); ?></td>
            <td><?php echo $row['storage']; ?></td>
            <td><?php echo $row['used_storage']; ?></td>
            <td><?php echo $row['reg_date_time']; ?></td>
            <td><?php echo $row['expiry_date'] ? $row['expiry_date'] : 'N/A'; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>