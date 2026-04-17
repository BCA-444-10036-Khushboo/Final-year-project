<?php
session_start();
require("db.php");

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $pattern = "1234567890";
    $length  = strlen($pattern);
    $v_code  = [];
    for($i=0; $i<6; $i++)
    {
        $index = rand(0, $length-1);
        $v_code[] = $pattern[$index];
    }
    $ver_code = implode($v_code);

    $fullname = $_POST['username'];
    $email    = $_POST['email'];
    $password = md5($_POST['password']);

    // Check if email already exists in members table
    $check = "SELECT user_email FROM members WHERE user_email='$email'";
    $response = $db->query($check);

    if($response->num_rows != 0)
    {
        echo "usermatch";
    }
    else
    {
        // Try sending mail (optional)
        @mail(
            $email,
            "Activation code",
            "Thank you for choosing our product.\nYour Activation Code is ".$ver_code,
            "From:nitishyadav97711@gmail.com"
        );

        // Insert into members table
        $store = "INSERT INTO members(full_name, user_email, user_pass, activation_code)
                  VALUES('$fullname','$email','$password','$ver_code')";
        if($db->query($store))
        {
            echo "success";
        }
        else
        {
            echo "failed";
        }
    }
}
else
{
    echo "unauthorized request";
}
?>
