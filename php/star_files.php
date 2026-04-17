<?php
require("db.php");
$id = $_POST['sid'];
$status = $_POST['s_status'];
$table = $_POST['s_folder'];

$update = "update $table set star = '$status' where id='$id'";
if($db->query($update))
{
    echo "success";
}
else 
    {
        echo "failed";
    }

?>