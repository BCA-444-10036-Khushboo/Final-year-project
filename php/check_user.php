<?php
require("db.php");
if($_SERVER['REQUEST_METHOD']=="POST")
    {
  $email=  $_POST['email'];
    $check="select email from users where email='$email'";
    $response = $db->query($check);
    if($response->num_rows !=0)
        {
            echo "usermatch";

    }
    else{
        echo "notfound";
    }
}

else {
    echo "unauthorized request";
}

?>