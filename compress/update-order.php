<?php
include '../upadminconnection.php';
?>
<link rel="stylesheet" href="../admin_button_css.css">

<div class="main-content">
    <div class="wrapper">

    <h1>Update Order</h1>
    <br><br>

<?php

if(isset($_GET['id'])){

    $id=$_GET['id'];
    $sql="SELECT * FROM tbl_order WHERE id=$id";
    $res=mysqli_query($connect,$sql);
    $count=mysqli_num_rows($res);
    if($count==1){
$row=mysqli_fetch_assoc($res);

$food=$row['food'];
$price=$row['price']; 
$quantity=$row['quantity'];
$status=$row['status']; 
    }else{
        header('location:../foodorder.php');
    }


}else{
    header('location:../foodorder.php');
}

?>



<form action="" method="post">
<table class="tbl-30">
<tr>
    <td>Food Name:</td>
    <td><?php echo $food;  ?></td>
</tr>
<tr>
    <td>price:</td>
    <td>
        <b>Rs.<?php echo $price;  ?></b></td>
</tr>
<tr>
    <td>quantity:</td>
    <td>
        <input type="number" name="quantity"  value="<?php echo $quantity; ?>">
    </td>
</tr>
<tr>
    <td>Status</td>
    <td>
        <select name="status" id="">
            <option <?php if($status=="ordered"){echo "selected";} ?> value="ordered">ordered</option>
            <!-- <option value="on delivery">on delivery</option> -->
            <option <?php if($status=="delivered"){echo "selected";} ?>value="delivered">delivered</option>
            <option <?php if($status=="canclled"){echo "selected";} ?> value="canclled">canclled</option>
        </select>
    </td>
</tr>
<tr>
    <td colspan="2">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="price" value="<?php echo $price; ?>">
        <input type="submit"name="submit" value="update"class="btn-secondary">
    </td>
</tr>
</table>
</form>
<?php
if(isset($_POST['submit'])){

$id=$_POST['id'];
$price=$_POST['price'];
$quantity=$_POST['quantity'];
$total=$price * $quantity;
$status=$_POST['status'];

$sql2="UPDATE tbl_order SET 
quantity=$quantity,
total=$total,
status='$status'
WHERE id=$id
";

$res2=mysqli_query($connect,$sql2);
if($res2==true){
    header('location:../foodorder.php');
}

}
?>
    </div>
</div>