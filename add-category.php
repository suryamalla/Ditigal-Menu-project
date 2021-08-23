<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin_button_css.css">
</head>

<body>
    <div class="main-container">
        <div class="wrapper">
            <h1>add category</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>title:</td>
                        <td>
                            <input type="text" name="title" placeholder="category title">
                        </td>
                    </tr>
                    <tr>
                    <td>select image</td>
                    <td>
                    <input type="file" name="image">
                    </td>
                    </tr>
                    <tr>
                        <td>featured:</td>
                        <td>
                            <input type="radio" name="featured" value="yes">yes
                            <input type="radio" name="featured" value="no">no
                        </td>
                    </tr>

                    <tr>
                        <td>active:</td>
                        <td>
                            <input type="radio" name="active" value="yes">yes
                            <input type="radio" name="active" value="no">no
                        </td>
                    </tr>
                    <tr>
                    <td colspan="2">
                    <input type="submit" name="submit" value="add-category">
                    </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
<?php 
include "upadminconnection.php";

if(isset($_POST['submit'])){
    $title=$_POST['title'];

    if(isset($_POST['featured'])){
    $featured=$_POST['featured'];
    }else{
        $featured="no";
    }
    if(isset($_POST['active'])){
        $active=$_POST['active'];
        }else{
            $active="no";
        }
        // print_r($_FILES['image']);

if(isset($_FILES['image']['name'])){
$image_name=$_FILES['image']['name'];
$source_path=$_FILES['image']['tmp_name'];
$destination_path="images/".$image_name;
$upload=move_uploaded_file($source_path,$destination_path);

if($upload==false)
{
    header('location:manage category.php');
}
}else{
    $image_name="";
}
   $insertquery="INSERT into tbl_category SET 
   title='$title',
   image_name='$image_name',
   featured='$featured',
   active='$active'
   ";
   $result=mysqli_query($connect,$insertquery);
    
   if($result==true){
       header('location:manage category.php');
   }
}


?>

</body>

</html>