<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order food</title>
    <link rel="stylesheet" href="../admin_button_css.css">
    <link rel="stylesheet" href="order_submit.css">

</head>
<style>
body{
background-color: blue;
}
</style>
<body>
<?php
include '../upadminconnection.php' ;

if(isset($_GET['food_id'])){

    $food_id=$_GET['food_id'];

    $sql="SELECT * FROM tbl_food WHERE id=$food_id";

    $res=mysqli_query($connect,$sql);

    $count=mysqli_num_rows($res);

    if($count==1){

$row=mysqli_fetch_assoc($res);
$title=$row['title'];
$price=$row['price'];
$image_name=$row['image_name'];
    }else{
        header('location:../category-food.php');
    }
}
?>

<div class="container">

<form action="" class="order" method="post">

<div class="order_system">
 <h2>fill this form to confirm to your order</h2>
 
     <fieldset>
         <legend>selected food</legend>
<div class="order_food">
         <div class="food-menu-img">
<?php
if($image_name==""){
    echo "image is not available";
}else{
    ?>
 <img src="../images/<?php echo $image_name;  ?>"  alt=""width="200px"style="border-radius:10px;">
    <?php
}
?>

            
         </div>
         <div class="food-menu-desc">
             <h3><?php echo $title; ?></h3>
             <input type="hidden" name="food" value="<?php echo $title;  ?>">
             <p>Rs.<?php echo $price; ?></p>
             <input type="hidden" name="price" value="<?php echo $price;  ?>">
             <div class="order-level">Quantity</div>
             <input type="number" name="quantity" class="ipt" value="1" required>

         </div>
         </div>
     </fieldset>
 
</div>
<br><br>
Table Name:<input type="text" name="table_id" value="enter the table name">
<br><br>
<input type="submit"name="submit"value="submit"class="btn-secondary"style="margin-left:83px;">
</form>
<?php

if(isset($_POST['submit'])){
$food=$_POST['food'];
$price=$_POST['price'];
$quantity=$_POST['quantity'];
$total=$price*$quantity;
$order_date=date("Y-m-d h:i:sa");
$status="ordered";
$table_id=$_POST['table_id'];

$sql2="INSERT INTO tbl_order SET
food='$food',
price=$price,
quantity='$quantity',
total =$total,
order_time='$order_date',
status='$status',
table_id='$table_id'
";

$res2=mysqli_query($connect,$sql2);

if($res2==true){
    header('location:../category-food.php');
}else{
    echo "data can not enter";
}

}else{

}

?>


</div>



</body>
</html>
