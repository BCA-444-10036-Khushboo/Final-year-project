<?php
require("db.php"); // tumhara connection file

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])){
    $name = $db->real_escape_string($_POST['name']);
    $email = $db->real_escape_string($_POST['email']);
    $message = $db->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name','$email','$message')";
    if($db->query($sql)){
        echo "success";
    } else {
        echo "error: " . $db->error; // yahan exact error dikhega
    }
}
?>
