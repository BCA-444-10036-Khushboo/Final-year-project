<?php
session_start();
include("../db.php"); // apna DB connection file

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE username='$username' AND password=MD5('$password')";
    $result = mysqli_query($db, $query);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['admin_id'] = $row['admin_id'];
        $_SESSION['admin_username'] = $row['username'];
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Invalid Username or Password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #4facfe, #00f2fe);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .login-box {
        background: #fff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0px 8px 20px rgba(0,0,0,0.2);
        width: 350px;
        text-align: center;
    }
    .login-box h2 {
        margin-bottom: 20px;
        color: #333;
    }
    .login-box input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 6px;
        outline: none;
        transition: 0.3s;
    }
    .login-box input:focus {
        border-color: #4facfe;
        box-shadow: 0 0 8px rgba(79,172,254,0.5);
    }
    .login-box button {
        width: 100%;
        padding: 12px;
        background: #4facfe;
        border: none;
        border-radius: 6px;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }
    .login-box button:hover {
        background: #00c6ff;
    }
    .error {
        color: red;
        margin-top: 10px;
    }
</style>
</head>
<body>
    <div class="login-box">
        <h2>Admin Login</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Enter Username" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <button type="submit" name="login">Login</button>
        </form>
        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
    </div>
</body>
</html>