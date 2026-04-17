<?php
session_start();
require("db.php");

if(!isset($_SESSION['login_email'])){
    die(json_encode(array("error"=>"User not logged in")));
}

$user_email = $_SESSION['login_email'];
$id     = $_POST['id'];
$folder = $_POST['folder'];
$file   = $_POST['file'];

// delete file from folder
$del = unlink("../data/".$folder."/".$file);
if($del)
{
    // delete record from user-specific table
    $del_sql = $db->query("DELETE FROM $folder WHERE id ='$id'");
    if($del_sql)
    {
        // recalculate used storage
        $fs_sql   = "SELECT SUM(file_size) AS uds FROM $folder";
        $response = $db->query($fs_sql);
        $aa       = $response->fetch_assoc();
        $total_used_file_size = $aa['uds'];

        // update members table
        $update = "UPDATE members
                   SET used_storage = '$total_used_file_size' 
                   WHERE user_email='$user_email'";

        if($db->query($update))
        {
            echo json_encode(array(
                "msg"=>"File Deleted Successfully",
                "used_storage"=>$total_used_file_size
            ));
        }
        else
        {   
            echo json_encode(array("msg"=>"Storage not updated"));
        }
    }
    else
    {
        echo json_encode(array("msg"=>"failed"));
    }
}
else
{
    echo json_encode(array("msg"=>"file not deleted"));
}
?>
