<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" media="screen and (max-width: 770px)" href="responsive/index_responsive.css">
    <link rel="stylesheet" media="screen and (max-width: 770px)" href="responsive/order_css.css">
    <title>Document</title>
</head>
<style>
     #food_img{
        border-radius:6px;
    }
    .container::before{
        display: none;
    }

    .container{
        margin-top: 30px;
        display: grid;
        grid-template-columns: repeat(2,1fr);
        height: auto;
        /* border: 2px solid red; */
         width: 100%;
    }
    .box3{
        /* border: 5px solid lightgreen; */
        width: auto;
        height: auto;
        margin: 13px;
        text-align: center;
        color: white;
    }
    body{
        background-image: url('images/backgrond_category.jpeg');
    }
    
</style>
<body>
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
                    <a href="about.php" id="aboutus">About us</a>
                </ul>
            </div>
            <form action="food-search.php"method="post">
            <input type="search" placeholder="search food" style="font-size: 20px; padding-left: 15px; border-radius:8px; outline: none; height: 89%;" class="search" name="search"require>


           <button type="submit" name="submit"style="background-color: black;border:5px solid black"> <i class="fa fa-search" style="  font-size: 25px; color:white;margin-top: 3px;"></i>
            </button></form>
        </div>

    </header>
    <!-- header close -->
    <div class="blank" style="height: 150px;">

    </div>

    <!-- <section class="categories"> -->
    <h1 class="text-center"style="color:white">Explore Food</h1>
    <div class="container">
           

            <?php
 include 'upadminconnection.php';
$sql="SELECT * FROM tbl_category";
$res=mysqli_query($connect,$sql);
$count=mysqli_num_rows($res);
$c=$count;
if($count>0){
    
        
while($row=mysqli_fetch_assoc($res)){
    
    $id=$row['id'];
    $title=$row['title'];
    $image_name=$row['image_name'];
    ?>
     <a href="s_category.php?category_id=<?php echo  $id; ?>">
   
   <div class="box3">

 
    <!-- check image name is available  -->
    <?php if($image_name==""){
        echo "image name is not available";
    } else{
        ?>
        <img src="images/<?php echo $image_name;  ?>" alt="" class="img-curve" style="width: 320px;"id="food_img">
        <?php
    }
   
    ?>
    
    <h3 class="float-text" style="text-align: center;justify-content:center"><?php echo $title;  ?></h3>
    
    </div>
</a>

    <?php
     
}
}else{
    echo "category is not available";
}

    ?>

         
 </div>
    <!-- </section> -->


   

</body>

</html>