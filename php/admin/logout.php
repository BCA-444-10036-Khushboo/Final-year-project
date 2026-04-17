<?php
session_start();

// Destroy all admin session data
session_unset();
session_destroy();

// Redirect back to admin login page
header("Location: admin_login.php");
exit();
?>