<!DOCTYPE html>
<html lang="en">
<?php // database connectivity
$db="sarkar";
$username="root";
$password="";
$server="localhost";


// $connect=mysqli_connect($username,$password,$server,$db);
$connect= mysqli_connect($server,$username,$password,$db);

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>cafe food order</title>
    <link rel="stylesheet" href="home.css">


</head>

<body>


    <!-- header start -->
    <header>
        <div class="logo">
        <img src="images/coffee.jpg" alt="cafe" id="logo">
        </div>
        <div class="nav">
            <div class="menu">
                <ul>
                  <a href="index.php" id="h1">Home</a>
                    <a href="order.php" id="h1">Order</a>
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
    <div class="blank" style="height: 140px;">
    
    </div>

    <div class="about">
        <div class="location">
            <div class="cont">
<!-- php files start -->



<?php
// if($connect){
    // echo "thank you for feedback";
    error_reporting(0);
    if(isset($_POST['_submit']))
    {
    $first1=$_POST['firstname'];
    $first2=$_POST['lastname'];
    $first3=$_POST['subject'];
    
    $insertquery="insert into surya(firstname,lastname,comments)values('$first1','$first2','$first3')";
    $result=mysqli_query($connect,$insertquery);
    }
    ?>
    

    <!-- if($result){
      echo " <script>alert('comment submitted')</script> ";
    }else{
      echo " <script>alert('comment not submitted')</script> ";
    }
    } -->
    
    <form action="" method="POST">
                  <label for="fname">First Name</label>
                  <input type="text" id="fname" name="firstname" placeholder="Your name..">
              
                  <label for="lname">Last Name</label>
                  <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                 <label for="subject">Comment</label>
                  <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
              
                  <input type="submit" value="Submit" name="_submit">
                </form>
 
              </div>
            </div>
            <div class="map">
                <h1 style="font-weight: bold;">Details</h1>

<details>
  <summary>Location</summary>
  <p>kalanki, 200m left from kalankichok, kathmandu</p>
</details>
<h2 style="font-weight:bold;">More Details</h2>
  <p>Epcot is a theme park at Walt Disney World Resort featuring exciting attractions, international pavilions, award-winning fireworks and seasonal special events.</p>
</details>
<summary>Epcot Center</summary>
  <p>Epcot is a theme park at Walt Disney World Resort featuring exciting attractions, international pavilions, award-winning fireworks and seasonal special events.</p>
</details>
<summary>Epcot Center</summary>
  <p>Epcot is a theme park at Walt Disney World Resort featuring exciting attractions, international pavilions, award-winning fireworks and seasonal special events.</p>
</details>
 
 <a href="login.php"><h5>admin</h5></a>
   
       </div>
</div>



<h1 style="font-weight: bold; display: flex;justify-content: center;">COMMENTS</h1>

<?php
$insertquery="select * from surya";
$result=mysqli_query($connect,$insertquery);
$SN=1;
if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
    ?>
    <div class="single-item">
  
    <h4> <?php echo $SN;$SN++; echo ". "; echo $row['firstname'];echo " "; echo $row['lastname']; ?></h4>
    <!-- <h4>  </h4> -->
    <p> <?php echo $row['comments']; ?> </p>
    </div>
    <?php
  }
}
?>

<style>
    .single-item{
border: 3px solid yellow;
border-radius: 6px;
background-color:#5ae85a ;
height: auto;
width: 100%;
padding-left: 14px;
  }
</style>
</body>          
  </html>