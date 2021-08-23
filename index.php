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
    <title>cafe food order</title>
    <link rel="stylesheet" href="home.css">
    
 <link rel="stylesheet" media="screen and (max-width: 770px)" href="responsive/index_responsive.css">

</head>
<style>
    body{
        background-image: url('responsive/background_home.jpg');
    }
</style>
<body>
    <!-- header start -->
    <header class="header-nav">
        <div class="logo">
            <img src="images/coffee.jpg" alt="cafe" id="logo">
            <!-- <img src="coffee.jpg" alt="cafe" id="logo"> -->
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
             
            <form action="food-search.php" method="post">
                <input type="search" placeholder="search food" style="font-size: 20px; padding-left: 15px; border-radius:8px; outline: none; height: 89%;" class="search" name="search" require>


                <button type="submit" name="submit" style="background-color: black;border:5px solid black"> <i class="fa fa-search" style="  font-size: 25px; color:white;margin-top: 3px;"></i>
                </button>
            </form>
             
        </div>

    </header>

    <!-- header close -->
    <div class="blank">

    </div>
    
 


        <div class="content">
            <h2 style="display: flex; justify-content: center;text-transform: capitalize;color:blue; font-weight: bold;">INSTRUCTIONS</h2>
           

            <ul>
                <li id="ins">For order food you can see food page and if want to see category then you can visit category page</li><br>
                <li id="ins">you can give feedback us in about us section</li><br>
                <li id="ins">For any query send messege to us by press on messege button</li><br>
                <li id="ins">For Bill pay press on messge and send messege want bill</li><br>
                <li id="ins">For any additional requirements you can message us</li>
            </ul>

            <div class="dis">
                <h3>Send Message</h3>
                <P>Needs:<a href="compress/s_notification.php"><input type="submit" value="message"></a> </P>
            </div>
          

        </div>
    </div>
     
    </div>

        <div class="copyright">
            <h1>@copyright2021suryamalla</h1>
        </div>
    </div>

</body>

</html>