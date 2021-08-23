<?php
include '../upadminconnection.php';
if(isset($_GET['id']) & isset($_GET['image_name'])){
 $id=$_GET['id'];
 $image_name=$_GET['image_name'];
 if($image_name!=""){
     $path= "../images/".$image_name;
     $remove=unlink($path);  
 }

$sql="DELETE FROM tbl_food WHERE id =$id";
$res=mysqli_query($connect,$sql);
if($res==true){
    header('location:../food.php');
}
}else{
header('location:update_food.php');
}
?>