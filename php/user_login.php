<?php
session_start();
require("db.php");

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $email = $_POST['email'];
    $password = md5($_POST['pass']);

    // check if email exists in members table
    $check = "SELECT user_email FROM members WHERE user_email='$email'";
    $response = $db->query($check);

    if($response->num_rows != 0)
    {
        // verify email + password
        $user_check = "SELECT * FROM members WHERE user_email='$email' AND user_pass='$password'";
        $res = $db->query($user_check);

        if($res->num_rows != 0){

            // check active status
            $check_status = "SELECT * FROM members WHERE user_email='$email' AND user_pass='$password' AND status='active'";
            $status = $db->query($check_status);

            if($status->num_rows != 0)
            {
                echo "success";
                $_SESSION['login_email'] = $email; // session variable renamed
            }
            else{
                echo "pending";
            }
        }
        else{
            echo "wrong password";
        }
    }
    else{
        echo "user not found";
    }
}
else{
    echo "unauthorized request";
}
?>
