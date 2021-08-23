
<link rel="stylesheet" href="home.css">
<link rel="stylesheet" href="admin_button_css.css">
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
    



<link rel="stylesheet" href="admin.css">
<div class="main-container">
    <div class="wrapper">
<h1>manage food </h1>
<br>
<a href="add-food.php" class="btn-primary">add food</a>
<br><br><br>
<table class="tbl-full">
    <tr>
        <th>S.N.</th>
        <th>title</th>
        <th>price</th>
        <th>image</th>
        <th>featured</th>
        <th>active</th>
        <th>actions</th>
    </tr>
    <?php
    include 'upadminconnection.php';
$sql="SELECT * FROM tbl_food";
$res=mysqli_query($connect,$sql);
$count=mysqli_num_rows($res);
$sn=1;
if($count>0){
    while($row=mysqli_fetch_assoc($res)){
        $id=$row['id'];
        $title=$row['title'];
        $price=$row['price'];
        $image_name=$row['image_name'];
        $featured=$row['featured'];
        $active=$row['active'];

        ?>
<tr>
    <td><?php echo $sn++; ?></td>
    <td><?php echo $title; ?></td>
    <td><?php echo $price; ?></td> 
    <td><img src="images/<?php echo $image_name;?>" alt="" width="150px"></td>
    <td><?php echo $featured; ?></td>
    <td><?php echo $active; ?></td>
    <td> <a href="compress/update_food.php?id=<?php echo $id; ?>" class="btn-secondary">update food</a> 
    <a href="compress/delete_food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-target">delete food</a></td>

</tr>
        <?php
    }
}
    ?>

</table>

    </div>
</div>