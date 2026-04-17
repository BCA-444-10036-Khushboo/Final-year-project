<?php
session_start();
require("db.php");

if(!isset($_SESSION['login_email'])){
    die(json_encode(array("error"=>"User not logged in")));
}

$user_email = $_SESSION['login_email'];
$file       = $_FILES['data'];
$filename   = strtolower($file['name']);
$location   = $file['tmp_name'];
$f_size     = round($file['size']/1024/1024,2);

// get user details from members table
$get_details = "SELECT * FROM members WHERE user_email = '$user_email'";
$res         = $db->query($get_details);
$user_data   = $res->fetch_assoc();

$user_id_folder   = "member_".$user_data['id']; // prefix changed
$total_storage    = $user_data['storage'];
$old_used_storage = $user_data['used_storage'];

$free_space = $total_storage - $old_used_storage;

if($f_size < $free_space)
{
   if(file_exists("../data/".$user_id_folder."/".$filename))
   {
     echo json_encode(array("msg"=>"file already exist"));
   }
   else{
       if(move_uploaded_file($location,"../data/".$user_id_folder."/".$filename))
       {
            $file_store = "INSERT INTO $user_id_folder(file_name,file_size) VALUES('$filename','$f_size')";
            if($db->query($file_store))
            {
                $fs_sql   = "SELECT SUM(file_size) AS uds FROM $user_id_folder";
                $response = $db->query($fs_sql);
                $aa       = $response->fetch_assoc();
                $total_used_file_size = $aa['uds'];

                $update = "UPDATE members
                           SET used_storage = '$total_used_file_size' 
                           WHERE user_email='$user_email'";

                if($db->query($update))
                {
                    echo json_encode(array(
                        "msg"=>"File Upload Successfully",
                        "used_storage"=>$total_used_file_size
                    ));
                }
                else 
                {
                    echo json_encode(array("msg"=>"used_storage not updated"));
                }
            }
            else
            {
                echo json_encode(array("msg"=>"file details not stored in table"));
            }
       }
       else
       {
            echo json_encode(array("msg"=>"upload failed"));
       }
   }
}
else
{
    echo json_encode(array("msg"=>"file size too large, kindly purchase more storage"));
}
?>
