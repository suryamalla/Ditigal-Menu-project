  
  <html>
      <title>category_food</title>
      <link rel="stylesheet" href="admin_button_css.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" media="screen and (max-width: 770px)" href="responsive/index_responsive.css">
      <link rel="stylesheet" media="screen and (max-width: 770px)" href="responsive/order_css.css">
      <style>

.container::before{
        display: none;
    }
    .container{
        display: grid;
        grid-area: 100%;
        grid-template-columns: repeat(2,1fr);
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

        border-radius: 6px;
    }

    #food_head{
        text-align:center;
        margin-top: 10px;
    }
    #m_botton{
margin-bottom: 15px;
    }
      </style>
      <link rel="stylesheet" href="home.css">
  <body>
  <!-- header start -->
  <header class="header-nav">
        <div class="logo">
        <img src="images/coffee.jpg" alt="cafe" id="logo">
        </div>
        <div class="nav">
            <div class="menu">
                <ul>
                    <a href="index.php" id="h1">Home</a>
                    <a href="order.php" id="h1">category</a>
                    <a href="category-food.php" id="h1">food</a>
                    <a href="about.php" id="aboutus"style="text-decoration:none">About us</a>
                </ul>
            </div>
            <form action="food-search.php"method="post">
            <input type="search" placeholder="search food" style="font-size: 20px; padding-left: 15px; border-radius:8px; outline: none; height: 89%;" class="search" name="search"require>


           <button type="submit" name="submit"style="background-color: black;border:5px solid black"> <i class="fa fa-search" style="  font-size: 25px; color:white;margin-top: 3px;"></i>
            </button></form>
        </div>

    </header>
    <!-- header close -->
    <div class="blank" style="height: 190px;"> 
</div>

<!-- <section class="food-menu"> -->
<h1 id="food_head">Food Menu</h1>
    <div class="container">
   

<?php

include  'upadminconnection.php';
$sql="SELECT * FROM tbl_food WHERE active='yes'";
$res=mysqli_query($connect,$sql);
$count=mysqli_num_rows($res);
if($count>0){
    while($row=mysqli_fetch_assoc($res)){
        $id=$row['id'];
        $title=$row['title'];
        $description=$row['description'];
        $price=$row['price'];
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
    <?php
}
?>


        
     </div>

     <div class="food-menu-desc">
     <h4><?php echo $title;  ?></h4>
     <p class="food-price">Rs.<?php echo $price; ?></p>
     <p class="food-detail"><?php echo $description; ?></p>
     <br>
     <a href="compress/order_submit.php?food_id=<?php echo $id; ?>" ><input type="submit"value="order now"class="btn btn-secondary"id="m_botton"></a>
     </div>
    
 </div>
   


        <?php
    }
}
?>
 </div>
<!-- </section> -->

    </body>
    </html>