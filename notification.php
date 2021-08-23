<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="admin_button_css.css">
    <link rel="stylesheet" href="home.css">
<style>
    .tbl-full {
      width: 100%;
  }
</style>
</head>
<body>
<header>
        <div class="logo">
            <img src="coffee.jpg" alt="cafe" id="logo">
        </div>
        <div class="nav">
            <div class="menu">
                <ul>
                  <a href="home.php" id="h1">Home</a>
                    <a href="manage admin.php" id="h1">Admin</a>
                    <a href="manage category.php" id="h1">category</a>
                    <a href="food.php" id="h1">food</a>
                    <a href="foodorder.php" id="h1">order</a>
                    <a href="about.php" id="h1">logout</a>
                </ul>
            </div>
               
        </div>
       
    </header>
    <div class="blank" style="height: 150px;">
    
</div>
<form action="" method="post">
    <table class="tbl-full">
        <tr>
            <th>S.N.</th>
            <th>Table No.</th>
            <th>Messege</th>
           <th>status</th>
           <th>Action</th>
        </tr>
<?php
include 'upadminconnection.php';
$sql="SELECT * FROM notification ORDER BY id DESC ";
$sn=1;
$res=mysqli_query($connect,$sql);
$count=mysqli_num_rows($res);
if($count>0){
    while($row=mysqli_fetch_assoc($res)){
        $id=$row['id'];
        $table_id=$row['table_id'];
        $message=$row['message'];
        $status=$row['status'];
   
?>
        <tr>
<td><?php echo $sn++;  ?></td>
<td><?php echo $table_id;  ?></td>
<td><?php echo $message;  ?></td>

<td>
        <?php 
        
        if($status=="unread"){
            echo "<label>$status</label>";

        }
        elseif($status=="read"){
            echo "<label style='color:red;'>$status</label>";
        }   
        ?>



</td>
 

     
    <td> <a href="compress/update-notification.php?id=<?php echo $id; ?>" class="btn-secondary">update status</a> 
    <!-- <a href="compress/delete-order.php" class="btn-target">delete order</a></td> -->


        </tr><?php
    }
}
   ?>
    </table>
</form>
</body>
</html>


