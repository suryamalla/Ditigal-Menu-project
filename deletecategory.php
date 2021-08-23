<?php

include 'upadminconnection.php';
// include("manage category.php");
// get the id of admin to be delete
if (isset($_GET['id']) and isset($_GET['image_name'])) {
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];
    // remove the physical file available
    if ($image_name != "") {        
        $remove = unlink("images/".$image_name);
    }
    
}

$insertquery="delete from tbl_category where id=$id";
$result=mysqli_query($connect,$insertquery);
