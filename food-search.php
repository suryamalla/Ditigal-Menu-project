  
  <html>
      <title>category_food</title>
      <link rel="stylesheet" href="admin_button_css.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>

.container::before{
        display: none;
    }
    .container{
        display: grid;
        grid-area: 100%;
        grid-template-columns: repeat(3,1fr);
        height: auto;
        /* border: 2px solid red; */
        justify-items: stretch;
        
    }
    .food-menu-box{
        /* border: 5px solid lightgreen; */
        width: auto;
        height: auto;
        margin: 50px;
        text-align: center;
    }
    body{
        background-image: url('images/background_food.jpg');
    }
    #food_img{
        border-radius:6px;
    }
    #food_head{
        text-align:center;
        margin-top: 10px;
    }

    .s_result{
        height: 100%;
         display: flex;
        align-items: center;
    }
      </style>
      <link rel="stylesheet" href="home.css">
  <body>
  <!-- header start -->
  <header style="text-align: center;">
 <div class="s_result"style="color:white;"><?php 
include  'upadminconnection.php'; $search=mysqli_real_escape_string($connect,$_POST['search']) ; ?>

<h2>Food search on <?php  echo $search; ?></h2>


</div>
    </header>
    <!-- header close -->
    <div class="blank" style="height: 140px;"> 
</div>

<!-- <section class="food-menu"> -->
<h1 id="food_head">Food Menu</h1>
    <div class="container">
   

<?php




$sql="SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

$res=mysqli_query($connect,$sql);
$count=mysqli_num_rows($res);
if($count>0){

while($row=mysqli_fetch_assoc($res)){
    $id=$row['id'];
$title=$row['title'];
$price=$row['price'];
$description=$row['description'];
$image_name=$row['image_name'];
?>

<div class="food-menu-box">
     <div class="food-menu-img"> 
<?php
if($image_name==""){
    echo "image is not available";
}else{
    ?>
 <img src="images/<?php echo $image_name; ?>" alt="" id="food_img" width="300px">
 <?php }
 ?>
 </div>


 <div class="food-menu-desc">
     <h4><?php echo $title;  ?></h4>
     <p class="food-price">Rs.<?php echo $price; ?></p>
     <p class="food-detail"><?php echo $description; ?></p>
     <br>
     <a href="compress/order_submit.php?food_id=<?php echo $id; ?>" ><input type="submit"value="order now"class="btn btn-secondary"style=" margin: 3px;"></a>
     </div>
    
 </div>
   


<?php


}
}
else{
    echo "food is not available";
}

?>

 </div>
<!-- </section> -->

    </body>
    </html>