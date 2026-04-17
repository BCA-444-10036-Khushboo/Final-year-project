<?php
require("db.php");

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $email = $_POST['email'];
    $atc   = $_POST['atc'];

    // check activation code in members table
    $check = "SELECT * FROM members WHERE user_email='$email' AND activation_code='$atc'";
    $response = $db->query($check);

    if($response->num_rows != 0){

        // update status to active
        $status_update = "UPDATE members SET status='active' WHERE user_email='$email'";
        if($db->query($status_update)){

            // get user id
            $get_id = "SELECT id FROM members WHERE user_email='$email'";
            $id_response = $db->query($get_id);
            $id_array = $id_response->fetch_assoc();
            $user_table_name = "member_".$id_array['id']; // renamed prefix

            // create user-specific table
            $create_user_table = "CREATE TABLE $user_table_name(
                id INT(11) NOT NULL AUTO_INCREMENT,
                file_name VARCHAR(100),
                file_size VARCHAR(100),
                star VARCHAR(100) DEFAULT 'no',
                date_time DATETIME DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY(id)
            )";

            if($db->query($create_user_table))
            {
                if(mkdir("../data/".$user_table_name))
                {
                    echo "active";
                }
                else{
                    echo "folder not created";
                }
            }
            else{
                echo "table not created";
            }
        }
        else{
            echo "status not update";
        }
    }
    else{
        echo "Wrong activation code";
    }
}
else{
    echo "unauthorized request";
}
?>
