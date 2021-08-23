<?php
include '../upadminconnection.php';
?>
<link rel="stylesheet" href="../admin_button_css.css">

<div class="main-content">
    <div class="wrapper">

    <h1>Update notification</h1>
    <br><br>

<?php

if(isset($_GET['id'])){

    $id=$_GET['id'];
    $sql="SELECT * FROM notification WHERE id=$id";
    $res=mysqli_query($connect,$sql);
    $count=mysqli_num_rows($res);
    if($count==1){
$row=mysqli_fetch_assoc($res);

$table_id=$row['table_id'];
$status=$row['status']; 
echo $status;
    }else{
        // echo "something error";
        header('location:../foodorder.php');
    }


}else{
    // echo "error in this phase";
    header('location:../foodorder.php');
}

?>



<form action="" method="post">
<table class="tbl-30">
<tr>
    <td>Table Name:</td>
    <td><?php echo $table_id; ?></td>
</tr>
 
<tr>
    <td>Status</td>
    <td>
        <select name="status" id="">
        <option <?php if($status=="read"){echo "selected";} ?>value="read">read</option>
            <option <?php if($status=="unread"){echo "selected";} ?> value="unread">unread</option>
            
        </select>
    </td>
</tr>
<tr>
    <td colspan="2">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="table_id" value="<?php echo $table_id; ?>">
        <input type="submit"name="submit" value="update"class="btn-secondary">
    </td>
</tr>
</table>
</form>
<?php
if(isset($_POST['submit'])){

$id=$_POST['id'];
$table_id=$_POST['table_id'];
 
$status=$_POST['status'];

$sql2="UPDATE notification SET 
status='$status'
WHERE id=$id
";
echo $status;
$res2=mysqli_query($connect,$sql2);
if($res2==true){

// echo  "update successfully";
// echo $status;
    header('location:../notification.php');
}

}
?>
    </div>
</div>