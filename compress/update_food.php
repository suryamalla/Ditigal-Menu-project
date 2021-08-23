<?php
include '../upadminconnection.php';
     
if(isset($_GET['id'])){
$id=$_GET['id'];
$sql2="SELECT * FROM tbl_food WHERE id=$id";

$res2=mysqli_query($connect,$sql2);

$row2=mysqli_fetch_assoc($res2);

$title=$row2['title'];
$description=$row2['description'];
$price=$row2['price'];
$current_image=$row2['image_name'];
$current_category=$row2['category_id'];
$featured=$row2['featured'];
$active=$row2['active'];
}else{
    header('location:../food.php');
}

?>




<div class="main-content">
    <div class="wrapper">
        <h1>Upadate Food</h1>
        <br><br>
        <form action="" method="post" enctype="multipart/form-data">

        <table class="tbl-30">

        <tr><td>
            title:
        </td>
    <td><input type="text" name="title" placeholder="food title goes here." value="<?php echo $title; ?>"></td>
    </tr>

    <tr>
        <td>description</td>
        <td><textarea name="description" id="" cols="30" rows="5"><?php echo $description;  ?></textarea></td>
    </tr>
<tr>
    <td>price:</td>
    <td><input type="number" name="price" value="<?php echo $price; ?>"></td>
</tr>

<tr>
    <td>current image:</td>
    <td><?php
if($current_image=="")
{
    echo "<div class='error'>image not available.</div>";
}else{

 ?>
 <img src="../images/<?php echo $current_image;?>" alt="" width="150px">

 <?php
}
    ?>
    </td>
</tr>
<tr>
    <td>
        select new image:
    </td>
    <td>
        <input type="file" name="image">
    </td>
</tr>
<tr> 
    <td>category:</td>
    <td><select name="category" id="">

    <?php
$sql="SELECT * FROM tbl_category  WHERE active='yes'";
$res=mysqli_query($connect,$sql);
$count=mysqli_num_rows($res);
if($count>0){
 
    while($row=mysqli_fetch_assoc($res))
    {
        $category_title=$row['title'];
        $category_id=$row['id'];

        // echo "<option value='$category_id'>$category_title</option>";
        ?>
    <option <?php  if($current_category==$category_id){echo "selected";}?> value="<?php echo $category_id;?>"><?php echo $category_title;?> </option>
<?php
    }
}else{

}
  ?>
    </select></td>
</tr>
<tr>
    <td>featured:</td>
    <td><input <?php if($featured=="yes") {echo "checked";} ?> type="radio" name="featured" value="yes">
    <input <?php if($featured=="no") {echo "checked";} ?> type="radio" name="featured" value="no"></td>
</tr>

<tr>
    <td>active:</td>
    <td><input <?php if($active=="yes") {echo "checked";} ?> type="radio" name="active" value="yes">
    <input  <?php if($active=="no") {echo "checked";} ?> type="radio" name="active" value="no"></td>
</tr>
<tr>
    <td>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
        <input type="submit"name="submit" value="update food" class="btn-secondary">
    </td>
</tr>
        </table>

        </form>

<?php

if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $current_image=$_POST['current_image'];
    $category=$_POST['category'];
    $featured=$_POST['featured'];
    $active=$_POST['active'];

    if(isset($_FILES['image']['name'])){
        $image_name=$_FILES['image']['name'];
        if($image_name!="")
        {
            $image_name = $_FILES['image']['name'];
            $src=$_FILES['image']['tmp_name'];
            $des="../images/". $image_name;
            $upload=move_uploaded_file($src,$des);
            $del=unlink("../images/".$current_image);
        }else{
            $image_name=$current_image;
        }  

    }else{
        $image_name=$current_image;
    }

    $sql3="UPDATE tbl_food SET 
    title='$title',
    description='$description',
    price=$price,
    image_name='$image_name',
    category_id='$category',
    featured='$featured',
    active='$active'
    WHERE id=$id
    ";
$res3=mysqli_query($connect,$sql3);
if($res==true){
header('location: ../food.php');
}else{

    echo "food update is failed";
    
}
}
?>


    </div>

</div>