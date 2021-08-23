<?php 
include("manage admin.php");
// get the id of admin to be delete
 $id=$_GET['id'];

// create sql query to delete admin
$insertquery="delete from admin where id=$id";
$result=mysqli_query($connect,$insertquery);
// redirect to manage admin page with message
if($result==true)
{
    header('location:index.php');
}
?>
