
<link rel="stylesheet" href="home.css">
<header>
        <div class="logo">
        <img src="images/coffee.jpg" alt="cafe" id="logo">
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
    

<link rel="stylesheet" href="admin_button_css.css">
<style>
    .tbl-full {
      width: 100%;
  }
</style>

<link rel="stylesheet" href="admin.css">
<div class="main-container">
    <div class="wrapper">
<h1>manage order</h1>
<br>
 
<br><br><br>
<table class="tbl-full">
    <tr>
        <th>S.N.</th>
        <th>Food</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Order Date</th>
        <th>Status</th>
        <th>Table No.</th>
        <th>Actions</th>
    </tr>
    <?php
include 'upadminconnection.php';
$sql="SELECT * FROM tbl_order ORDER BY id DESC";
$res=mysqli_query($connect,$sql);
$sn=1;
$count=mysqli_num_rows($res);
if($count>0){
while($row=mysqli_fetch_assoc($res)){
    $id=$row['id'];
    $food=$row['food'];
    $price=$row['price'];
    $quantity=$row['quantity'];
    $total=$row['total'];
    $order_date=$row['order_time'];
    $status=$row['status'];
    $table_id=$row['table_id'];
    ?>

<tr>
    <td><?php echo $sn++;  ?></td>
    <td><?php echo $food;  ?></td>
    <td><?php echo $price;  ?></td>
    <td><?php echo $quantity;  ?></td>
    <td><?php echo $total;  ?></td>
    <td><?php echo $order_date;  ?></td>

  <td>
        <?php 
        
        if($status=="ordered"){
            echo "<label>$status</label>";

        }
        elseif($status=="delivered"){
            echo "<label style='color:orange;'>$status</label>";
        }
        elseif($status=="canclled"){
            echo "<label style='color:red;'>$status</label>";
        }
        
        ?>



</td>

    <td><?php echo $table_id;  ?></td>
    <td> <a href="compress/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">update order</a> 
    <!-- <a href="compress/delete-order.php" class="btn-target">delete order</a></td> -->

</tr>
    <?php
}
}else{
    echo "order not available";
}
    ?>

</table>

    </div>
</div>