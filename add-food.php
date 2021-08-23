<?php
include 'upadminconnection.php';
?>
<link rel="stylesheet" href="admin_button_css.css">
<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">

                <tr>
                    <td>title:</td>
                    <td><input type="text" name="title" placeholder="title of the food"></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><textarea name="description" cols="30" rows="5"placeholder="description of the food"></textarea></td>
                </tr>
<tr>
    <td>price:</td>
    <td>
        <input type="number" name="price">
    </td>
</tr>

<tr>
    <td>select image:</td>
    <td><input type="file" name="image"></td>
</tr>
<tr>
    <td>category:</td>
    <td><select name="category" id="">
        <?php
$sql="SELECT * FROM tbl_category WHERE active='yes'";

$res=mysqli_query($connect,$sql);
$count=mysqli_num_rows($res);
if($count>0){
while($row=mysqli_fetch_assoc($res)){
    $id=$row['id'];
    $title=$row['title'];
    ?>
<option value="<?php echo $id; ?>"><?php echo $title; ?></option>
    <?php
}
}else{
?>
<option value="0">No Category Found</option>
<?php
}
        ?>
    </select></td>
</tr>

<tr>
    <td>featured:</td>
    <td><input type="radio" value="yes" name="featured">yes
<input type="radio" value="no" name="featured">no</td>
</tr>

<tr>
    <td>Active:</td>
    <td><input type="radio" value="yes" name="active">yes
<input type="radio" value="no" name="active">no</td>
</tr>

<tr>
    <td colspan="2"><input type="submit" name="submit" value="Add food" class="btn-secondary"></td>
</tr>
            </table>

        </form>
<?php  
if(isset($_POST['submit'])){
     $title=$_POST['title'];
     $description=$_POST['description'];
     $price=$_POST['price'];
     $category=$_POST['category'] ;
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
    if(isset($_FILES['image']['name'])){
        $image_name=$_FILES['image']['name'];
            $src=$_FILES['image']['tmp_name'];
            $des="images/".$image_name;
            $upload=move_uploaded_file($src,$des);

            if($upload==false){
                header('location:add-food.php');
                die();
            }
        
    }else{
$image_name="";
    }
$sql2="INSERT INTO tbl_food SET
 title='$title',
 description='$description',
 price=$price,
 image_name='$image_name',
 category_id=$category,
 featured='$featured',
 active='$active'
 ";
$res2=mysqli_query($connect,$sql2);

if($res2==true){
    header('location:food.php');
}
}

?>



    </div>
</div>