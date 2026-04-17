<?php
$check=mail("nitish.bcastudent23.11999@cimage.in","Testing purpose",
"This is a testing email from xampp server","from:nitishyadav97711@gmail.com");
if($check==true){
    echo "email send successfully";
}
else{
    echo "email not send successfully";
}
?>